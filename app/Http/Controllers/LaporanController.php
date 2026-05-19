<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\PrestasiMahasiswa;
use App\Models\KlaimReward;
use App\Models\PencairanReward;
use App\Models\PeriodeKlaim;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $periodeKlaims = PeriodeKlaim::orderBy('id_periode', 'desc')->get();

        $selectedPeriodeId = $request->periode;
        $selectedPeriode = $selectedPeriodeId ? PeriodeKlaim::find($selectedPeriodeId) : null;

        $totalMahasiswa = Mahasiswa::count();

        $klaimBaseQuery = KlaimReward::query();

        if ($selectedPeriodeId) {
            $klaimBaseQuery->where('id_periode', $selectedPeriodeId);
        }

        $prestasiIds = null;

        if ($selectedPeriodeId) {
            $prestasiIds = (clone $klaimBaseQuery)
                ->pluck('id_prestasi')
                ->unique()
                ->values();

            $prestasiQuery = PrestasiMahasiswa::whereIn('id_prestasi', $prestasiIds);
        } else {
            $prestasiQuery = PrestasiMahasiswa::query();
        }

        $totalPrestasi = (clone $prestasiQuery)->count();
        $prestasiMenunggu = (clone $prestasiQuery)->where('status_verifikasi', 'Menunggu')->count();
        $prestasiTerverifikasi = (clone $prestasiQuery)->where('status_verifikasi', 'Terverifikasi')->count();
        $prestasiDitolak = (clone $prestasiQuery)->where('status_verifikasi', 'Ditolak')->count();

        $totalKlaim = (clone $klaimBaseQuery)->count();
        $klaimMenunggu = (clone $klaimBaseQuery)->where('status_klaim', 'Menunggu')->count();
        $klaimDisetujui = (clone $klaimBaseQuery)->where('status_klaim', 'Disetujui')->count();
        $klaimDitolak = (clone $klaimBaseQuery)->where('status_klaim', 'Ditolak')->count();

        $pencairanQuery = PencairanReward::query();

        if ($selectedPeriodeId) {
            $pencairanQuery->whereHas('klaimReward', function ($query) use ($selectedPeriodeId) {
                $query->where('id_periode', $selectedPeriodeId);
            });
        }

        $totalPencairan = (clone $pencairanQuery)->count();
        $totalNominalDicairkan = (clone $pencairanQuery)->sum('nominal_dicairkan');

        $periodeDibuka = PeriodeKlaim::where('status', 'Dibuka')->count();

        $prestasiTerbaru = PrestasiMahasiswa::with([
            'mahasiswa',
            'kategoriPrestasi',
            'tingkatPrestasi'
        ])
            ->when($selectedPeriodeId, function ($query) use ($prestasiIds) {
                $query->whereIn('id_prestasi', $prestasiIds);
            })
            ->orderBy('id_prestasi', 'desc')
            ->take(5)
            ->get();

        $klaimTerbaru = KlaimReward::with([
            'prestasiMahasiswa.mahasiswa',
            'prestasiMahasiswa.tingkatPrestasi',
            'periodeKlaim',
            'jenisReward'
        ])
            ->when($selectedPeriodeId, function ($query) use ($selectedPeriodeId) {
                $query->where('id_periode', $selectedPeriodeId);
            })
            ->orderBy('id_klaim', 'desc')
            ->take(5)
            ->get();

        return view('laporan.index', compact(
            'periodeKlaims',
            'selectedPeriodeId',
            'selectedPeriode',
            'totalMahasiswa',
            'totalPrestasi',
            'prestasiMenunggu',
            'prestasiTerverifikasi',
            'prestasiDitolak',
            'totalKlaim',
            'klaimMenunggu',
            'klaimDisetujui',
            'klaimDitolak',
            'totalPencairan',
            'totalNominalDicairkan',
            'periodeDibuka',
            'prestasiTerbaru',
            'klaimTerbaru'
        ));
    }
}