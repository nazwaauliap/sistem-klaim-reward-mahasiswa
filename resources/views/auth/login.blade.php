<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — SIKAREMA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ── Reset ───────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy:  #0B2D5A;
            --blue:  #0B5ED7;
            --teal:  #12B886;
            --ink:   #0D1B2E;
            --muted: #64748B;
            --line:  #E2E8F0;
            --ease:  cubic-bezier(0.22, 1, 0.36, 1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 16px;
            background: #E8F2FC;
            position: relative;
            overflow-x: hidden;
        }

        /* ── Background blobs ───────────────────── */
        .bg-blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(0);
            pointer-events: none;
            z-index: 0;
        }
        .bg-blob-1 {
            width: 340px; height: 320px;
            background: #B8D8F8;
            border-radius: 62% 38% 70% 30% / 45% 55% 45% 55%;
            top: -60px; left: -80px;
            opacity: 0.9;
        }
        .bg-blob-2 {
            width: 280px; height: 280px;
            background: #A8EDD6;
            border-radius: 38% 62% 30% 70% / 55% 45% 55% 45%;
            bottom: -60px; right: -60px;
            opacity: 0.85;
        }
        .bg-blob-3 {
            width: 160px; height: 160px;
            background: #C8E8F8;
            border-radius: 50%;
            bottom: 80px; left: 40px;
            opacity: 0.6;
        }

        /* Dot pattern on bg */
        body::before {
            content: "";
            position: fixed; inset: 0; z-index: 0;
            background-image: radial-gradient(rgba(11,94,215,0.08) 1.5px, transparent 1.5px);
            background-size: 28px 28px;
            pointer-events: none;
        }

        /* ── Card shell ─────────────────────────── */
        .card-shell {
            position: relative; z-index: 1;
            max-width: 980px;
            width: 100%;
            background: #fff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow:
                0 2px 4px rgba(11,31,58,0.04),
                0 16px 40px rgba(11,31,58,0.10),
                0 48px 80px rgba(11,49,95,0.10);
            animation: fadeUp 0.6s var(--ease) both;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── LEFT — Brand panel ─────────────────── */
        .brand-panel {
            position: relative;
            background: linear-gradient(175deg, var(--navy) 0%, var(--blue) 45%, #0fa876 80%, #0DC97A 100%);
            color: #fff;
            padding: 44px 36px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            overflow: hidden;
            height: 100%;
            min-height: 620px;
        }

        .row.g-0{
            display:flex;
            align-items:stretch;
        }

        .col-lg-5,
        .col-lg-7{
            display:flex;
        }

        .brand-panel,
        .form-panel{
            width:100%;
        }

        .alert-space{
            min-height:60px;
            margin-bottom:10px;
        }

        /* Inner glow blobs */
        .brand-panel::before {
            content: "";
            position: absolute;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            top: -80px; right: -80px;
            pointer-events: none;
        }
        .brand-panel::after {
            content: "";
            position: absolute;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: rgba(18,184,134,0.18);
            bottom: 200px; left: -60px;
            pointer-events: none;
        }

        /* Dot pattern on panel */
        .brand-dots {
            position: absolute; inset: 0; z-index: 0; pointer-events: none;
            background-image: radial-gradient(rgba(255,255,255,0.15) 1.5px, transparent 1.5px);
            background-size: 18px 18px;
        }

        /* Decorative rings */
        .brand-ring {
            position: absolute; border-radius: 50%; pointer-events: none;
            border: 1.5px solid rgba(255,255,255,0.12);
        }
        .br-1 { width: 180px; height: 180px; top: 8%;  right: -50px; }
        .br-2 { width:  90px; height:  90px; top: 35%; left: -20px;  border-color: rgba(255,255,255,0.08); }

        /* Confetti */
        .cf {
            position: absolute; pointer-events: none; border-radius: 3px;
        }
    
        .cf2 { width:7px;  height:14px; background:#7DF9C2; top:52%; left:14%; opacity:0.7; transform: rotate(-30deg); }
        .cf3 { width:8px;  height:8px;  background:#FFD060; border-radius:50%; top:28%; left:22%; opacity:0.6; }
        .cf4 { width:6px;  height:12px; background:#fff; top:63%; right:22%; opacity:0.4; transform: rotate(15deg); }

        .brand-content {
            position: relative; z-index: 1;
            display: flex; flex-direction: column; align-items: center;
            width: 100%;
        }

        /* Logo area */
        .brand-logo-wrap { margin-bottom: 10px; }
        .brand-logo-img  { height: 65px; width: auto; object-fit: contain; }

        /* Fallback logo */
        .brand-logo-fallback {
            display: none; flex-direction: column; align-items: center; gap: 6px;
        }
        .brand-logo-icon {
            width: 64px; height: 64px; border-radius: 50%;
            background: rgba(255,255,255,0.18); backdrop-filter: blur(6px);
            display: flex; align-items: center; justify-content: center;
            font-size: 28px; font-weight: 800;
        }
        .brand-name { font-size: 1.5rem; font-weight: 800; letter-spacing: 0.04em; }
        .brand-tag  { font-size: 0.68rem; font-weight: 500; opacity: 0.75; letter-spacing: 0.04em; margin-top: 2px; }

        /* Headline */
        .brand-headline {
            font-size: 1.75rem; font-weight: 800;
            line-height: 1.22; letter-spacing: -0.02em;
            margin: 18px 0 12px;
        }
        .brand-headline .hl-green { color: #7DF9C2; }

        .brand-desc {
            font-size: 0.82rem; line-height: 1.75;
            opacity: 0.82; max-width: 300px;
            margin-bottom: 24px;
        }

        /* Trophy — pushed to bottom, no bottom padding so it "sits" */
        .brand-trophy {
            margin-top: auto;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }
        .brand-trophy-img {
            width: 90%; max-width: 300px;
            object-fit: contain;
            display: block;
            filter: drop-shadow(0 20px 36px rgba(0,0,0,0.28));
            animation: trophyFloat 5s ease-in-out infinite;
        }
        @keyframes trophyFloat {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-10px); }
        }

        /* ── RIGHT — Form panel ─────────────────── */
        .form-panel {
            background: #fff;
            padding: 52px 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box { width: 100%; max-width: 380px; }

        /* Avatar */
        .user-avatar {
            width: 68px; height: 68px;
            border-radius: 18px;
            background: #EEF5FF;
            border: 1.5px solid #D4E4FB;
            display: flex; align-items: center; justify-content: center;
            font-size: 28px; color: var(--blue);
            margin: 0 auto 22px;
            transition: transform 0.3s var(--ease), box-shadow 0.3s var(--ease);
        }
        .login-box:hover .user-avatar {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(11,94,215,0.12);
        }

        .login-title {
            font-size: 1.45rem; font-weight: 800;
            color: var(--ink); text-align: center;
            margin-bottom: 6px; letter-spacing: -0.02em;
        }
        .login-title .t-blue { color: var(--blue); }

        .login-sub {
            font-size: 0.8rem; color: var(--muted);
            text-align: center; line-height: 1.6;
            margin-bottom: 28px;
        }

        /* Alerts */
        .alert { border-radius: 10px; font-size: 0.8rem; padding: 10px 14px; margin-bottom: 16px; }
    .alert-success {
        background: #f0fdf6;
        border: 1px solid #bbf7d0;
        color: #166534;
        font-weight: 500;
    }
    .alert-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
        font-weight: 500;
    }

        /* Field */
        .field-wrap { margin-bottom: 16px; }
        .field-label {
            font-size: 0.8rem; font-weight: 600;
            color: var(--ink); display: block;
            margin-bottom: 7px;
        }

        .input-shell { position: relative; display: flex; align-items: center; }

        .input-icon {
            position: absolute; left: 15px;
            font-size: 0.95rem; color: #A0AABB;
            pointer-events: none; z-index: 2;
            transition: color 0.25s;
        }
        .input-shell:focus-within .input-icon { color: var(--blue); }

        .input-shell input {
            width: 100%;
            padding: 13px 15px 13px 42px;
            border: 1.5px solid var(--line);
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.855rem;
            color: var(--ink);
            background: #FAFBFC;
            outline: none;
            transition: border-color 0.25s var(--ease), box-shadow 0.25s var(--ease), background 0.25s;
        }
        .input-shell input:focus {
            border-color: var(--blue);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(11,94,215,0.09);
        }
        .input-shell input::placeholder { color: #B0BAC9; }

        .input-shell.has-toggle input { padding-right: 44px; }

        .pw-toggle {
            position: absolute; right: 13px;
            background: none; border: none; padding: 4px;
            color: #A0AABB; font-size: 0.95rem; cursor: pointer;
            transition: color 0.25s; z-index: 2;
        }
        .pw-toggle:hover { color: var(--blue); }

        /* Lupa password */
        .forgot-wrap {
            display: flex; justify-content: flex-end;
            margin-top: 4px;
        }
        .forgot-link {
            font-size: 0.77rem; font-weight: 500;
            color: var(--blue); text-decoration: none;
            transition: opacity 0.2s;
        }
        .forgot-link:hover { opacity: 0.7; }

        /* Submit */
        .btn-login {
            width: 100%; padding: 14px;
            border: none; border-radius: 999px;
            background: linear-gradient(90deg, var(--blue) 0%, var(--teal) 100%);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 0.92rem; font-weight: 700;
            cursor: pointer; position: relative; overflow: hidden;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            box-shadow: 0 8px 22px rgba(11,94,215,0.26);
            transition: transform 0.28s var(--ease), box-shadow 0.28s var(--ease);
            margin-top: 22px;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(11,94,215,0.34);
        }
        .btn-login:active { transform: translateY(0); }

        /* Ripple */
        .btn-login .ripple {
            position: absolute; border-radius: 50%;
            background: rgba(255,255,255,0.36);
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
        }
        @keyframes ripple { to { transform: scale(3); opacity: 0; } }

        /* Back link */
        .btn-back-wrap { text-align: center; margin-top: 18px; }
        .btn-back {
            font-size: 0.82rem; font-weight: 500;
            color: var(--muted); text-decoration: none;
            display: inline-flex; align-items: center; gap: 6px;
            transition: color 0.25s;
        }
        .btn-back:hover { color: var(--blue); }

        /* ── Responsive ─────────────────────────── */
        @media (max-width: 991px) {
            .brand-panel { padding: 36px 28px 0; min-height: unset; }
            .brand-headline { font-size: 1.5rem; }
            .brand-trophy-img { max-width: 220px; }
            .form-panel { padding: 36px 28px; }
        }
        @media (max-width: 575px) {
            body { padding: 20px 12px; align-items: flex-start; }
            .card-shell { border-radius: 20px; }
            .brand-panel { padding: 28px 20px 0; }
            .brand-logo-img { height: 52px; }
            .brand-headline { font-size: 1.35rem; }
            .brand-trophy-img { max-width: 180px; }
            .form-panel { padding: 28px 20px 36px; }
            .login-title { font-size: 1.25rem; }
        }
    </style>
</head>
<body>

{{-- Background blobs --}}
<div class="bg-blob bg-blob-1"></div>
<div class="bg-blob bg-blob-2"></div>
<div class="bg-blob bg-blob-3"></div>

<div class="card-shell">
    <div class="row g-0">

        {{-- ══════════════ KIRI ══════════════ --}}
        <div class="col-lg-5">
            <div class="brand-panel">
                <div class="brand-dots"></div>
                <div class="brand-ring br-1"></div>
                <div class="brand-ring br-2"></div>
                <span class="cf cf1"></span>
                <span class="cf cf2"></span>
                <span class="cf cf3"></span>
                <span class="cf cf4"></span>

                <div class="brand-content">

                    {{-- Logo --}}
                    <div class="brand-logo-wrap">
                        <img
                            src="{{ asset('images/mini-SIKAREMA.png') }}"
                            alt="Logo SIKAREMA"
                            class="brand-logo-img"
                            onerror="this.style.display='none'; document.getElementById('logo-fb').style.display='flex';"
                        >
                        <div class="brand-logo-fallback" id="logo-fb">
                            <div class="brand-logo-icon">S</div>
                            <div class="brand-name">SIKAREMA</div>
                            <div class="brand-tag">Sistem Klaim Reward Prestasi Mahasiswa</div>
                        </div>
                    </div>

                    {{-- Headline --}}
                    <h1 class="brand-headline">
                        Apresiasi Prestasi,<br>
                        Raih <span class="hl-green">Reward Terbaik</span>
                    </h1>

                    <p class="brand-desc">
                        SIKAREMA merupakan sistem informasi pengajuan prestasi dan klaim
                        reward mahasiswa yang cepat, transparan, dan terintegrasi.
                    </p>

                    {{-- Trophy --}}
                    <div class="brand-trophy">
                        {{-- Ganti src sesuai path ilustrasi trophy Anda --}}
                        <img
                            src="{{ asset('images/dashboard-sikarema.png') }}"
                            alt="Ilustrasi Trophy"
                            class="brand-trophy-img"
                        >
                    </div>

                </div>
            </div>
        </div>

        {{-- ══════════════ KANAN ══════════════ --}}
        <div class="col-lg-7">
            <div class="form-panel">
                <div class="login-box">

                    {{-- Avatar --}}
                    <div class="user-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <h2 class="login-title">
                        Masuk ke <span class="t-blue">SIKAREMA</span>
                    </h2>
                    <p class="login-sub">
                        Silakan masuk menggunakan akun Anda<br>untuk mengakses sistem.
                    </p>

                    {{-- Flash & Errors --}}
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf

                        {{-- Email --}}
                        <div class="field-wrap">
                            <label class="field-label" for="email">Email</label>
                            <div class="input-shell">
                                <i class="bi bi-envelope input-icon"></i>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Masukkan email Anda"
                                    required
                                    autocomplete="email"
                                >
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="field-wrap">
                            <label class="field-label" for="password">Password</label>
                            <div class="input-shell has-toggle">
                                <i class="bi bi-lock input-icon"></i>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan password Anda"
                                    required
                                    autocomplete="current-password"
                                >
                                <button type="button" class="pw-toggle" id="pwToggle" aria-label="Tampilkan password">
                                    <i class="bi bi-eye" id="pwIcon"></i>
                                </button>
                            </div>
                            <div class="forgot-wrap">
                                <a href="#" class="forgot-link">Lupa password?</a>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn-login" id="btnLogin">
                            <i class="bi bi-box-arrow-in-right"></i> Masuk
                        </button>

                    </form>

                    {{-- Back --}}
                    <div class="btn-back-wrap">
                        <a href="{{ url('/') }}" class="btn-back">
                            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    /* Show / hide password */
    const pwToggle = document.getElementById('pwToggle');
    const pwInput  = document.getElementById('password');
    const pwIcon   = document.getElementById('pwIcon');

    pwToggle.addEventListener('click', () => {
        const visible = pwInput.type === 'password';
        pwInput.type  = visible ? 'text' : 'password';
        pwIcon.className = visible ? 'bi bi-eye-slash' : 'bi bi-eye';
    });

    /* Ripple on login button */
    document.getElementById('btnLogin').addEventListener('click', function (e) {
        const rect   = this.getBoundingClientRect();
        const ripple = document.createElement('span');
        const size   = Math.max(rect.width, rect.height);
        ripple.classList.add('ripple');
        ripple.style.cssText = `width:${size}px;height:${size}px;left:${e.clientX-rect.left-size/2}px;top:${e.clientY-rect.top-size/2}px`;
        this.appendChild(ripple);
        setTimeout(() => ripple.remove(), 650);
    });
</script>

</body>
</html>