<?php

namespace App\Services;

use App\Models\PrestasiMahasiswa;
use Illuminate\Support\Facades\Log;

class FuzzyRewardService
{
    public function calculate(PrestasiMahasiswa $prestasi)
    {
        $nilaiTingkat = $this->mapTingkat($prestasi->tingkatPrestasi->nama_tingkat);
        $nilaiKategori = $this->mapKategori($prestasi->kategoriPrestasi->nama_kategori);
        $nilaiJuara = $this->mapJuara($prestasi->juara);

        $inputs = [
            'tingkat' => $nilaiTingkat,
            'kategori' => $nilaiKategori,
            'juara' => $nilaiJuara,
        ];

        $ruleOutputs = $this->inferensi($inputs);
        $skor = $this->defuzzifikasi($ruleOutputs);

        return [
            'skor' => round($skor, 2),
            'rekomendasi' => $this->determineRekomendasi($skor),
            // untuk panel "Analisis Fuzzy Tsukamoto" di halaman Detail Klaim Reward
            'trace' => [
                'nilai_input' => $inputs,
                'rule_aktif' => array_map(fn ($r) => [
                    'alpha' => round($r['alpha'], 3),
                    'output_set' => $r['output'],
                    'z' => round($r['z'], 2),
                ], $ruleOutputs),
            ],
        ];
    }

    private function mapTingkat(string $tingkat): float
    {
        $normalized = strtolower(trim($tingkat));
        $normalized = str_replace([' ', '\\', '_'], ' ', $normalized);

        return match ($normalized) {
            'kampus',
            'universitas' => 20,
            'kabupaten/kota',
            'kabupaten kota' => 40,
            'provinsi' => 60,
            'nasional' => 80,
            'internasional' => 100,
            default => 0,
        };
    }

    private function mapKategori(string $kategori): float
    {
        $normalized = strtolower(trim($kategori));
        $normalized = str_replace('-', ' ', $normalized);
        $normalized = preg_replace('/\s+/', ' ', $normalized);

        return match ($normalized) {
            'akademik' => 100,
            'non akademik',
            'non-akademik' => 60,
            default => 0,
        };
    }

    private function mapJuara(string $juara): float
    {
        $normalized = strtolower(trim($juara));
        $normalized = preg_replace('/[^a-z0-9\s]/', ' ', $normalized);
        $normalized = preg_replace('/\s+/', ' ', $normalized);

        if (str_contains($normalized, 'harapan')) {
            return 40;
        }

        // Alias kata ordinal Indonesia + numerik/romawi
        $juara1 = ['1', 'i', 'pertama', 'satu', 'juara umum'];
        $juara2 = ['2', 'ii', 'kedua', 'dua'];
        $juara3 = ['3', 'iii', 'ketiga', 'tiga'];

        foreach ($juara1 as $kw) {
            if (preg_match('/\bjuara\s*' . preg_quote($kw, '/') . '\b/', $normalized) || str_contains($normalized, 'juara ' . $kw)) {
                return 100;
            }
        }
        foreach ($juara2 as $kw) {
            if (preg_match('/\bjuara\s*' . preg_quote($kw, '/') . '\b/', $normalized)) {
                return 80;
            }
        }
        foreach ($juara3 as $kw) {
            if (preg_match('/\bjuara\s*' . preg_quote($kw, '/') . '\b/', $normalized)) {
                return 60;
            }
        }

        // Fallback: catat sebagai warning agar admin tahu ada data juara
        // yang tidak dikenali sistem, bukan diam-diam dianggap "rendah".
        Log::warning('FuzzyRewardService: teks juara tidak dikenali, fallback ke nilai rendah', [
            'juara_input' => $juara,
        ]);

        return 20;
    }

    private function membershipRendah(float $nilai): float
    {
        // domain 20–100, "rendah" turun linear dari 20 ke 60
        if ($nilai <= 20) {
            return 1.0;
        }

        if ($nilai < 60) {
            return (60 - $nilai) / 40;
        }

        return 0.0;
    }

    private function membershipSedang(float $nilai): float
    {
        // segitiga simetris, puncak di 60 (mis. Provinsi / Juara-3)
        if ($nilai <= 20 || $nilai >= 100) {
            return 0.0;
        }

        if ($nilai < 60) {
            return ($nilai - 20) / 40;
        }

        return (100 - $nilai) / 40;
    }

    private function membershipTinggi(float $nilai): float
    {
        // "tinggi" naik linear dari 60 ke 100, penuh (1.0) HANYA di titik 100
        if ($nilai <= 60) {
            return 0.0;
        }

        if ($nilai < 100) {
            return ($nilai - 60) / 40;
        }

        return 1.0;
    }

    private function membershipKategoriAkademik(float $nilai): float
    {
        if ($nilai <= 60) {
            return 0.0;
        }

        if ($nilai >= 100) {
            return 1.0;
        }

        return ($nilai - 60) / 40;
    }

    private function membershipKategoriNonAkademik(float $nilai): float
    {
        if ($nilai < 60) {
            return 0.0;
        }

        if ($nilai >= 100) {
            return 0.0;
        }

        return (100 - $nilai) / 40;
    }

    private function inferensi(array $inputs): array
    {
        // Rule Base: 3 tingkat x 2 kategori x 3 juara = 18 rule
        $rules = [
            // tingkat tinggi
            ['tingkat' => 'tinggi', 'kategori' => 'akademik', 'juara' => 'tinggi', 'output' => 'sangat_layak'],
            ['tingkat' => 'tinggi', 'kategori' => 'akademik', 'juara' => 'sedang', 'output' => 'layak'],
            ['tingkat' => 'tinggi', 'kategori' => 'akademik', 'juara' => 'rendah', 'output' => 'kurang_layak'],
            ['tingkat' => 'tinggi', 'kategori' => 'non_akademik', 'juara' => 'tinggi', 'output' => 'layak'],
            ['tingkat' => 'tinggi', 'kategori' => 'non_akademik', 'juara' => 'sedang', 'output' => 'kurang_layak'],
            ['tingkat' => 'tinggi', 'kategori' => 'non_akademik', 'juara' => 'rendah', 'output' => 'kurang_layak'],

            // tingkat sedang
            ['tingkat' => 'sedang', 'kategori' => 'akademik', 'juara' => 'tinggi', 'output' => 'layak'],
            ['tingkat' => 'sedang', 'kategori' => 'akademik', 'juara' => 'sedang', 'output' => 'layak'],
            ['tingkat' => 'sedang', 'kategori' => 'akademik', 'juara' => 'rendah', 'output' => 'kurang_layak'],
            ['tingkat' => 'sedang', 'kategori' => 'non_akademik', 'juara' => 'tinggi', 'output' => 'kurang_layak'],
            ['tingkat' => 'sedang', 'kategori' => 'non_akademik', 'juara' => 'sedang', 'output' => 'kurang_layak'],
            ['tingkat' => 'sedang', 'kategori' => 'non_akademik', 'juara' => 'rendah', 'output' => 'tidak_layak'],

            // tingkat rendah
            ['tingkat' => 'rendah', 'kategori' => 'akademik', 'juara' => 'tinggi', 'output' => 'kurang_layak'],
            ['tingkat' => 'rendah', 'kategori' => 'akademik', 'juara' => 'sedang', 'output' => 'kurang_layak'],
            ['tingkat' => 'rendah', 'kategori' => 'akademik', 'juara' => 'rendah', 'output' => 'tidak_layak'],
            ['tingkat' => 'rendah', 'kategori' => 'non_akademik', 'juara' => 'tinggi', 'output' => 'kurang_layak'],
            ['tingkat' => 'rendah', 'kategori' => 'non_akademik', 'juara' => 'sedang', 'output' => 'tidak_layak'],
            ['tingkat' => 'rendah', 'kategori' => 'non_akademik', 'juara' => 'rendah', 'output' => 'tidak_layak'],
        ];

        $memberships = [
            'tingkat' => [
                'rendah' => $this->membershipRendah($inputs['tingkat']),
                'sedang' => $this->membershipSedang($inputs['tingkat']),
                'tinggi' => $this->membershipTinggi($inputs['tingkat']),
            ],
            'kategori' => [
                'akademik' => $this->membershipKategoriAkademik($inputs['kategori']),
                'non_akademik' => $this->membershipKategoriNonAkademik($inputs['kategori']),
            ],
            'juara' => [
                'rendah' => $this->membershipRendah($inputs['juara']),
                'sedang' => $this->membershipSedang($inputs['juara']),
                'tinggi' => $this->membershipTinggi($inputs['juara']),
            ],
        ];

        $result = [];
        $activeRuleCount = 0;
        $bestFallback = null;
        $bestAlpha = -1.0;

        foreach ($rules as $rule) {
            // Hitung derajat kebenaran setiap antecedent
            $alphaTingkat = $memberships['tingkat'][$rule['tingkat']];
            $alphaKategori = $memberships['kategori'][$rule['kategori']];
            $alphaJuara = $memberships['juara'][$rule['juara']];

            $alpha = min($alphaTingkat, $alphaKategori, $alphaJuara);

            if ($alpha > $bestAlpha) {
                $bestAlpha = $alpha;
                $bestFallback = [
                    'alpha' => $alpha,
                    'output' => $rule['output'],
                    'z' => $this->outputCrispValue($rule['output'], $alpha),
                    'rule' => $rule,
                ];
            }

            if ($alpha <= 0.0) {
                continue;
            }

            $activeRuleCount++;
            $result[] = [
                'alpha' => $alpha,
                'output' => $rule['output'],
                'z' => $this->outputCrispValue($rule['output'], $alpha),
            ];
        }

        if ($activeRuleCount === 0) {
            Log::warning('FuzzyRewardService: tidak ada rule aktif untuk kombinasi input', [
                'tingkat' => $inputs['tingkat'],
                'kategori' => $inputs['kategori'],
                'juara' => $inputs['juara'],
                'memberships' => $memberships,
                'best_rule' => $bestFallback['rule'] ?? null,
                'best_alpha' => $bestAlpha,
            ]);

            if ($bestFallback !== null) {
                $result[] = [
                    'alpha' => $bestFallback['alpha'],
                    'output' => $bestFallback['output'],
                    'z' => $bestFallback['z'],
                ];
            }
        }

        return $result;
    }

    private function outputCrispValue(string $output, float $alpha): float
    {
        // Defuzzifikasi Tsukamoto menggunakan fungsi monoton untuk setiap keluaran fuzzy
        return match ($output) {
            'tidak_layak' => 40 - ($alpha * 40),
            'kurang_layak' => 40 + ($alpha * 20),
            'layak' => 60 + ($alpha * 20),
            'sangat_layak' => 80 + ($alpha * 20),
            default => 0.0,
        };
    }

    private function defuzzifikasi(array $ruleOutputs): float
    {
        $sumAlphaZ = 0.0;
        $sumAlpha = 0.0;

        foreach ($ruleOutputs as $ruleOutput) {
            $sumAlphaZ += $ruleOutput['alpha'] * $ruleOutput['z'];
            $sumAlpha += $ruleOutput['alpha'];
        }

        if ($sumAlpha === 0.0) {
            return 0.0;
        }

        return $sumAlphaZ / $sumAlpha;
    }

    private function determineRekomendasi(float $skor): string
    {
        if ($skor <= 40) {
            return 'Tidak Layak';
        }

        if ($skor <= 60) {
            return 'Kurang Layak';
        }

        if ($skor <= 80) {
            return 'Layak';
        }

        return 'Sangat Layak';
    }
}
