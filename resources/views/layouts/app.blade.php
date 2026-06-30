<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAREMA — Apresiasi Prestasi, Raih Reward Terbaik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #0d6efd;
            --secondary: #18c29c;
            --bg-soft: #f6faff;
            --ink: #0b1f3a;
            --ink-muted: #5b6b85;
            --line: rgba(11, 31, 58, 0.08);
            --radius-lg: 24px;
            --radius-md: 18px;
            --radius-sm: 12px;
            --shadow-soft: 0 16px 40px rgba(13, 110, 253, 0.08);
            --shadow-lift: 0 24px 56px rgba(13, 110, 253, 0.14);
            --shadow-card: 0 2px 8px rgba(11, 31, 58, 0.04), 0 12px 28px rgba(11, 31, 58, 0.06);
            --shadow-card-hover: 0 8px 20px rgba(13, 110, 253, 0.08), 0 24px 48px rgba(13, 110, 253, 0.14);
            --ease: cubic-bezier(0.22, 1, 0.36, 1);
        }

        * { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-soft);
            color: var(--ink);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, .display-font {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* ════════════════════════════════════════════════════════════════
           Scroll-reveal animation system
           ════════════════════════════════════════════════════════════════ */
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s var(--ease), transform 0.7s var(--ease);
        }
        .reveal.is-visible { opacity: 1; transform: translateY(0); }

        .reveal-zoom {
            opacity: 0;
            transform: scale(0.92);
            transition: opacity 0.7s var(--ease), transform 0.7s var(--ease);
        }
        .reveal-zoom.is-visible { opacity: 1; transform: scale(1); }

        .delay-1 { transition-delay: 0.08s; }
        .delay-2 { transition-delay: 0.16s; }
        .delay-3 { transition-delay: 0.24s; }
        .delay-4 { transition-delay: 0.32s; }
        .delay-5 { transition-delay: 0.40s; }
        .delay-6 { transition-delay: 0.48s; }

        /* ════════════════════════════════════════════════════════════════
           Navbar — putih bersih, shadow tipis saat scroll
           ════════════════════════════════════════════════════════════════ */
.navbar-sikarema {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;

    height: 90px;

    display: flex;
    align-items: center;

    padding: 0;

    z-index: 1050;

    background: rgba(255,255,255,.96);

    transition:
        background .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}

.navbar-sikarema.scrolled{
    background: rgba(255,255,255,.98);
    border-bottom:1px solid var(--line);
    box-shadow:0 4px 24px rgba(11,31,58,.06);

    /* jangan ubah tinggi */
    padding:0;
}

        main{

    margin-top:75px;

}

        .navbar-brand-wrap { display: flex; align-items: center; gap: 10px; text-decoration: none; }

        .navbar-logo-img {
            height:95px;
            width: auto;
            object-fit: contain;
            flex-shrink: 0;
            margin: 0;
            transition: transform 0.3s var(--ease);
        }
        .navbar-brand-wrap:hover .navbar-logo-img { transform: scale(1.03); }

        .navbar-logo-icon {
            width: 45px; height: 45px; min-width: 45px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 19px; flex-shrink: 0;
        }

        .navbar-brand-text { line-height: 1.1; }
        .navbar-brand-name { font-weight: 800; color: var(--ink); font-size: 1.12rem; margin: 0; letter-spacing: -0.01em; }
        .navbar-brand-tag {
            font-size: 0.58rem; font-weight: 600; letter-spacing: 0.06em;
            color: var(--ink-muted); text-transform: uppercase;
        }

        .navbar-sikarema .nav-link {
            font-weight: 600; color: #344256 !important;
            margin-left: 28px; font-size: 0.9rem; position: relative;
            transition: color 0.25s var(--ease);
        }

        .navbar-sikarema .nav-link::after {
            content: ""; position: absolute; left: 0; bottom: -6px;
            width: 0; height: 2px; border-radius: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: width 0.3s var(--ease);
        }

        .navbar-sikarema .nav-link:hover::after,
        .navbar-sikarema .nav-link.active::after { width: 100%; }

        .navbar-sikarema .nav-link:hover,
        .navbar-sikarema .nav-link.active { color: var(--primary) !important; }

        .btn-masuk-sistem {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white !important;
            border: none; border-radius: 999px;
            padding: 11px 24px; font-weight: 700; font-size: 0.88rem;
            margin-left: 28px;
            display: inline-flex; align-items: center; gap: 8px;
            position: relative; overflow: hidden;
            text-decoration: none !important;
            box-shadow: 0 10px 24px rgba(13, 110, 253, 0.22);
            transition: transform 0.3s var(--ease), box-shadow 0.3s var(--ease);
        }

        .btn-masuk-sistem:hover {
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(13, 110, 253, 0.3);
        }

        /* Ripple effect */
        .btn-ripple { position: relative; overflow: hidden; }
        .ripple-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.45);
            transform: scale(0);
            animation: rippleAnim 0.6s ease-out;
            pointer-events: none;
        }
        @keyframes rippleAnim {
            to { transform: scale(2.6); opacity: 0; }
        }

        /* ════════════════════════════════════════════════════════════════
           Section generic
           ════════════════════════════════════════════════════════════════ */
        .section-pad { padding: 110px 0; }
        .section-pad-sm { padding: 70px 0; }

        .eyebrow {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(13, 110, 253, 0.08);
            color: var(--primary);
            font-weight: 700; font-size: 0.72rem;
            letter-spacing: 0.08em; text-transform: uppercase;
            padding: 7px 16px; border-radius: 999px;
            margin-bottom: 18px;
        }

        .eyebrow .dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: var(--secondary);
        }

        .section-heading {
            font-weight: 800;
            color: var(--ink);
            font-size: 2.15rem;
            letter-spacing: -0.02em;
            line-height: 1.22;
        }

        .section-lede {
            color: #51607a;
            font-size: 1.02rem;
            line-height: 1.75;
            max-width: 580px;
        }

        .text-gradient {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* ════════════════════════════════════════════════════════════════
           Hero
           ════════════════════════════════════════════════════════════════ */
        .hero-section{
            position: relative;
            min-height: calc(100vh - 88px);
            display:flex;
            align-items:center;
            padding:0;
            overflow:hidden;
            margin-top:0;
        }

        .hero-bg-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(70px);
            opacity: 0.35;
            z-index: 0;
        }

        .hero-bg-orb-1 {
            width: 480px; height: 480px;
            background: radial-gradient(circle, var(--primary), transparent 70%);
            top: -180px; right: -120px;
        }

        .hero-bg-orb-2 {
            width: 420px; height: 420px;
            background: radial-gradient(circle, var(--secondary), transparent 70%);
            bottom: -160px; left: -140px;
        }

        .hero-section .container { position: relative; z-index: 1; }

        .hero-badge-row {
            display: flex; flex-wrap: wrap; gap: 10px;
            margin-top: 26px;
        }

        .hero-badge-chip {
            display: inline-flex; align-items: center; gap: 7px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(8px);
            border: 1px solid var(--line);
            border-radius: 999px;
            padding: 7px 14px;
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--ink);
            box-shadow: 0 6px 16px rgba(13, 110, 253, 0.06);
            transition: transform 0.25s var(--ease), box-shadow 0.25s var(--ease);
        }
        .hero-badge-chip:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(13, 110, 253, 0.1);
        }

        .hero-badge-chip i { color: var(--secondary); font-size: 0.85rem; }

        .hero-title {
            font-size: 3.1rem;
            font-weight: 800;
            line-height: 1.14;
            letter-spacing: -0.025em;
            color: var(--ink);
        }

        .hero-subtitle {
            color: #51607a;
            font-size: 1.06rem;
            line-height: 1.8;
            max-width: 540px;
            margin: 22px 0 32px;
        }

        .btn-hero-primary {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white !important;
            border: none; border-radius: 999px;
            padding: 15px 30px; font-weight: 700; font-size: 0.95rem;
            display: inline-flex; align-items: center; gap: 9px;
            text-decoration: none !important;
            box-shadow: var(--shadow-lift);
            transition: transform 0.3s var(--ease), box-shadow 0.3s var(--ease);
            position: relative; overflow: hidden;
        }
        .btn-hero-primary:hover {
            color: white !important;
            transform: translateY(-3px);
            box-shadow: 0 28px 60px rgba(13, 110, 253, 0.22);
        }
        .btn-hero-primary i { transition: transform 0.3s var(--ease); }
        .btn-hero-primary:hover i { transform: translateX(3px); }

        .btn-hero-outline {
            border: 1.5px solid var(--line);
            background: rgba(255, 255, 255, 0.7);
            color: var(--ink) !important;
            border-radius: 999px;
            padding: 15px 30px; font-weight: 700; font-size: 0.95rem;
            display: inline-flex; align-items: center; gap: 9px;
            text-decoration: none !important;
            transition: 0.3s var(--ease);
        }
        .btn-hero-outline:hover {
            border-color: var(--primary);
            color: var(--primary) !important;
            background: rgba(13, 110, 253, 0.04);
            transform: translateY(-3px);
        }

        .hero-visual-wrap {
            position: relative;
            display: flex; align-items: center; justify-content: center;
            min-height: 380px;
        }

        .hero-visual-glow {
            position: absolute;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(13,110,253,0.18), rgba(24,194,156,0.18));
            filter: blur(50px);
            animation: floatGlow 6s ease-in-out infinite;
        }

        @keyframes floatGlow {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-16px) scale(1.04); }
        }

        .hero-visual-wrap img {
            position: relative; z-index: 1;
            max-width: 88%; max-height: 360px;
            object-fit: contain;
            filter: drop-shadow(0 26px 44px rgba(13, 110, 253, 0.22));
            animation: floatImgSoft 6s ease-in-out infinite;
        }

        @keyframes floatImgSoft {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(0.4deg); }
        }

        .hero-visual-fallback {
            position: relative; z-index: 1;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(10px);
            display: flex; align-items: center; justify-content: center;
            font-size: 110px; color: #f59f00;
            box-shadow: var(--shadow-lift);
            animation: floatImgSoft 6s ease-in-out infinite;
        }

        .hero-visual-fallback::before {
            content: "";
            position: absolute;
            inset: -28px;
            border-radius: 50%;
            border: 1.5px dashed rgba(13, 110, 253, 0.22);
            animation: spinSlow 22s linear infinite;
        }

        .hero-visual-fallback::after {
            content: "";
            position: absolute;
            inset: -56px;
            border-radius: 50%;
            border: 1px solid rgba(24, 194, 156, 0.14);
        }

        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .hero-floating-card {
            position: absolute;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(10px);
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 10px 16px;
            box-shadow: 0 14px 32px rgba(13, 110, 253, 0.12);
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--ink);
            display: flex; align-items: center; gap: 8px;
            z-index: 2;
            animation: floatCard 5s ease-in-out infinite;
        }

        .hero-floating-card i { color: var(--secondary); font-size: 1rem; }
        .hfc-1 { top: 14%; left: 0%; animation-delay: 0s; }
        .hfc-2 { bottom: 10%; right: -2%; animation-delay: 1.4s; }

        @keyframes floatCard {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-9px); }
        }

        /* ════════════════════════════════════════════════════════════════
           Glass card / generic card system
           ════════════════════════════════════════════════════════════════ */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-soft);
        }

        .feature-card {
            background: white;
            border-radius: var(--radius-md);
            border: 1px solid var(--line);
            padding: 2.1rem 1.8rem;
            height: 100%;
            box-shadow: var(--shadow-card);
            transition: transform 0.35s var(--ease), box-shadow 0.35s var(--ease), border-color 0.35s var(--ease);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-card-hover);
            border-color: rgba(13, 110, 253, 0.18);
        }

        .feature-icon-box {
            width: 56px; height: 56px;
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; color: white;
            margin-bottom: 22px;
            transition: transform 0.35s var(--ease), box-shadow 0.35s var(--ease);
        }

        .feature-card:hover .feature-icon-box {
            transform: scale(1.1) rotate(-5deg);
            box-shadow: 0 12px 24px rgba(13, 110, 253, 0.2);
        }

        .fi-1 { background: linear-gradient(135deg, #0d6efd, #3b8bff); }
        .fi-2 { background: linear-gradient(135deg, #18c29c, #2fe0b8); }
        .fi-3 { background: linear-gradient(135deg, #f59f00, #ffb733); }
        .fi-4 { background: linear-gradient(135deg, #7c3aed, #a463f2); }
        .fi-5 { background: linear-gradient(135deg, #0d6efd, #18c29c); }
        .fi-6 { background: linear-gradient(135deg, #ec4899, #f472b6); }

        .feature-card h5 { font-weight: 800; color: var(--ink); font-size: 1.05rem; margin-bottom: 11px; }
        .feature-card p { color: #51607a; font-size: 0.89rem; line-height: 1.75; margin: 0; }

        /* ════════════════════════════════════════════════════════════════
           Tentang section
           ════════════════════════════════════════════════════════════════ */
        .tentang-visual {
            position: relative;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lift);
            border: 1px solid var(--line);
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease);
        }
        .tentang-visual:hover {
            transform: translateY(-6px);
            box-shadow: 0 32px 64px rgba(13, 110, 253, 0.18);
        }

        .tentang-visual img { width: 100%; display: block; }

        .tentang-visual-fallback {
            aspect-ratio: 4/3;
            background: linear-gradient(135deg, rgba(13,110,253,0.1), rgba(24,194,156,0.1));
            display: flex; align-items: center; justify-content: center;
            font-size: 64px; color: var(--primary);
        }

        .highlight-pill {
            display: flex; align-items: center; gap: 12px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 12px;
            transition: transform 0.3s var(--ease), box-shadow 0.3s var(--ease), border-color 0.3s var(--ease);
        }

        .highlight-pill:hover {
            transform: translateX(6px);
            box-shadow: var(--shadow-soft);
            border-color: rgba(13, 110, 253, 0.16);
        }

        .highlight-pill-icon {
            width: 38px; height: 38px; min-width: 38px;
            border-radius: 10px;
            background: rgba(13, 110, 253, 0.08);
            color: var(--primary);
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem;
            transition: transform 0.3s var(--ease);
        }
        .highlight-pill:hover .highlight-pill-icon { transform: scale(1.1); }

        .highlight-pill-text { font-weight: 600; color: var(--ink); font-size: 0.9rem; }

        /* ════════════════════════════════════════════════════════════════
           Zig-zag "Mengapa Memilih" section — proporsi lebih premium
           ════════════════════════════════════════════════════════════════ */
        .zigzag-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            padding: 36px;
            margin-bottom: 28px;
            box-shadow: var(--shadow-card);
            transition: transform 0.35s var(--ease), box-shadow 0.35s var(--ease), border-color 0.35s var(--ease);
        }
        .zigzag-card:last-child { margin-bottom: 0; }
        .zigzag-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-card-hover);
            border-color: rgba(13, 110, 253, 0.16);
        }

        .zigzag-icon-panel {
            width: 100%;
            aspect-ratio: 1.3/1;
            border-radius: var(--radius-md);
            display: flex; align-items: center; justify-content: center;
            font-size: 2.4rem; color: white;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-card);
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease);
        }
        .zigzag-card:hover .zigzag-icon-panel {
            transform: scale(1.03);
            box-shadow: var(--shadow-card-hover);
        }

        .zigzag-icon-panel::before {
            content: "";
            position: absolute; inset: 0;
            background: radial-gradient(circle at 28% 26%, rgba(255,255,255,0.3), transparent 60%);
        }

        .zz-1 { background: linear-gradient(135deg, #0d6efd, #3b8bff); }
        .zz-2 { background: linear-gradient(135deg, #18c29c, #2fe0b8); }
        .zz-3 { background: linear-gradient(135deg, #f59f00, #ffb733); }
        .zz-4 { background: linear-gradient(135deg, #7c3aed, #a463f2); }

        .zigzag-num {
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            color: var(--primary);
            margin-bottom: 10px;
            display: block;
        }

        .zigzag-title {
            font-weight: 800;
            color: var(--ink);
            font-size: 1.7rem;
            letter-spacing: -0.015em;
            margin-bottom: 14px;
        }

        .zigzag-text {
            color: #51607a;
            font-size: 1rem;
            line-height: 1.85;
            max-width: 460px;
        }

        /* ════════════════════════════════════════════════════════════════
           Statistik / counter
           ════════════════════════════════════════════════════════════════ */
        .stat-section {
            background: linear-gradient(120deg, var(--ink) 0%, #0d3d6e 55%, #0a6e57 130%);
            border-radius: 32px;
            padding: 60px 40px;
            position: relative;
            overflow: hidden;
        }

        .stat-section::before {
            content: "";
            position: absolute; inset: 0;
            background: radial-gradient(circle at 80% 20%, rgba(24,194,156,0.25), transparent 50%);
        }

        .stat-section .row { position: relative; z-index: 1; }

        .stat-item {
            text-align: center;
            border-radius: var(--radius-md);
            padding: 14px 10px;
            transition: transform 0.35s var(--ease), background 0.35s var(--ease);
        }
        .stat-item:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.05);
        }

        .stat-counter {
            font-size: 2.6rem;
            font-weight: 800;
            color: white;
            line-height: 1;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .stat-counter .suffix { color: var(--secondary); }

        .stat-label {
            color: rgba(255, 255, 255, 0.72);
            font-weight: 600;
            font-size: 0.88rem;
            margin-top: 10px;
        }

        .stat-divider {
            width: 1px;
            background: rgba(255, 255, 255, 0.14);
            height: 56px;
            margin: 0 auto;
        }

        /* ════════════════════════════════════════════════════════════════
           Alur sistem — horizontal timeline
           ════════════════════════════════════════════════════════════════ */
        .timeline-wrap {
            position: relative;
            padding-top: 4px;
        }

        .timeline-line {
            position: absolute;
            top: 32px;
            left: 9%; right: 9%;
            height: 3px;
            border-radius: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            opacity: 0.22;
            z-index: 0;
            display: none;
        }

        .timeline-line::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            height: 100%; width: 100%;
            border-radius: 3px;
            background: repeating-linear-gradient(90deg,
                rgba(255,255,255,0.9) 0, rgba(255,255,255,0.9) 6px,
                transparent 6px, transparent 14px);
        }

        @media (min-width: 992px) { .timeline-line { display: block; } }

        .timeline-step { position: relative; z-index: 1; text-align: center; }

        .timeline-num-circle {
            width: 64px; height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.15rem;
            margin: 0 auto 20px;
            box-shadow: 0 12px 26px rgba(13, 110, 253, 0.22), 0 0 0 6px white;
            position: relative;
            transition: transform 0.35s var(--ease), box-shadow 0.35s var(--ease);
        }

        .timeline-step:hover .timeline-num-circle {
            transform: scale(1.08);
            box-shadow: 0 16px 32px rgba(13, 110, 253, 0.32);
        }

        .timeline-card {
            background: white;
            border-radius: var(--radius-md);
            border: 1px solid var(--line);
            padding: 24px 18px;
            box-shadow: var(--shadow-card);
            transition: transform 0.35s var(--ease), box-shadow 0.35s var(--ease), border-color 0.35s var(--ease);
        }

        .timeline-card:hover {
            transform: translateY(-7px);
            box-shadow: var(--shadow-card-hover);
            border-color: rgba(13, 110, 253, 0.16);
        }

        .timeline-card-icon {
            font-size: 1.6rem;
            color: var(--primary);
            margin-bottom: 10px;
            transition: transform 0.3s var(--ease);
        }
        .timeline-card:hover .timeline-card-icon { transform: scale(1.12); }

        .timeline-card-title {
            font-weight: 700;
            color: var(--ink);
            font-size: 0.92rem;
            margin-bottom: 6px;
        }

        .timeline-card-text {
            font-size: 0.78rem;
            color: #51607a;
            line-height: 1.6;
            margin: 0;
        }

        /* ════════════════════════════════════════════════════════════════
           FAQ accordion — animasi lebih smooth
           ════════════════════════════════════════════════════════════════ */
        .faq-accordion .accordion-item {
            background: white;
            border: 1px solid var(--line);
            border-radius: var(--radius-md) !important;
            margin-bottom: 14px;
            overflow: hidden;
            box-shadow: var(--shadow-card);
            transition: box-shadow 0.3s var(--ease), border-color 0.3s var(--ease);
        }
        .faq-accordion .accordion-item:hover {
            box-shadow: var(--shadow-card-hover);
            border-color: rgba(13, 110, 253, 0.14);
        }

        .faq-accordion .accordion-button {
            font-weight: 700;
            color: var(--ink);
            font-size: 0.95rem;
            padding: 20px 24px;
            background: white;
            transition: background 0.3s var(--ease), color 0.3s var(--ease);
        }

        .faq-accordion .accordion-button:not(.collapsed) {
            color: var(--primary);
            background: rgba(13, 110, 253, 0.04);
            box-shadow: none;
        }

        .faq-accordion .accordion-button:focus { box-shadow: none; }
        .faq-accordion .accordion-button:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: -2px;
        }

        .faq-accordion .accordion-button::after {
            background-size: 1.1rem;
            transition: transform 0.35s var(--ease);
        }

        .faq-accordion .accordion-collapse {
            transition: height 0.35s var(--ease);
        }

        .faq-accordion .accordion-body {
            color: #51607a;
            font-size: 0.88rem;
            line-height: 1.8;
            padding: 4px 24px 22px;
        }

        /* ════════════════════════════════════════════════════════════════
           CTA section — glow gradient halus
           ════════════════════════════════════════════════════════════════ */
        .cta-section {
            background: linear-gradient(120deg, var(--primary), var(--secondary));
            border-radius: 32px;
            padding: 64px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before, .cta-section::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
            animation: ctaGlow 7s ease-in-out infinite;
        }

        .cta-section::before { width: 260px; height: 260px; top: -120px; left: -80px; }
        .cta-section::after { width: 220px; height: 220px; bottom: -100px; right: -60px; animation-delay: 1.5s; }

        @keyframes ctaGlow {
            0%, 100% { opacity: 0.7; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.12); }
        }

        .cta-heading {
            font-weight: 800;
            color: white;
            font-size: 2.1rem;
            position: relative; z-index: 1;
            letter-spacing: -0.02em;
        }

        .cta-text {
            color: rgba(255, 255, 255, 0.88);
            max-width: 520px;
            margin: 14px auto 30px;
            position: relative; z-index: 1;
        }

        .btn-cta {
            background: white;
            color: var(--primary) !important;
            border: none; border-radius: 999px;
            padding: 16px 36px; font-weight: 800; font-size: 1rem;
            display: inline-flex; align-items: center; gap: 10px;
            position: relative; z-index: 1;
            text-decoration: none !important;
            box-shadow: 0 16px 34px rgba(0,0,0,0.18);
            transition: transform 0.3s var(--ease), box-shadow 0.3s var(--ease);
        }
        .btn-cta:hover {
            color: var(--primary) !important;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 22px 44px rgba(0,0,0,0.22);
        }

        /* ════════════════════════════════════════════════════════════════
           Footer
           ════════════════════════════════════════════════════════════════ */
        footer.site-footer {
            background: var(--ink);
            color: rgba(255, 255, 255, 0.78);
            padding: 64px 0 0;
            margin-top: 100px;
        }

        .footer-brand-wrap { display: flex; align-items: center; gap: 10px; margin-bottom: 16px; }
        .footer-logo-img { height: 50px; width: auto; object-fit: contain; }
        

        .footer-brand-name { color: white; font-weight: 800; font-size: 1.05rem; margin: 0; }
        .footer-brand-tag {
            font-size: 0.58rem; color: rgba(255,255,255,0.5);
            text-transform: uppercase; letter-spacing: 0.05em;
        }

        .footer-desc { font-size: 0.85rem; line-height: 1.85; color: rgba(255,255,255,0.55); max-width: 280px; }

        .footer-social { display: flex; gap: 10px; margin-top: 20px; }
        .footer-social a {
            width: 36px; height: 36px; border-radius: 50%;
            background: rgba(255,255,255,0.08);
            color: white; display: flex; align-items: center; justify-content: center;
            font-size: 0.92rem; transition: 0.3s var(--ease);
        }
        .footer-social a:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            transform: translateY(-3px);
        }

        .footer-col-title { color: white; font-weight: 700; font-size: 0.9rem; margin-bottom: 18px; }
        .footer-links { list-style: none; padding: 0; margin: 0; }
        .footer-links li { margin-bottom: 11px; }
        .footer-links a {
            color: rgba(255,255,255,0.58); text-decoration: none;
            font-size: 0.83rem; transition: color 0.3s var(--ease), padding-left 0.3s var(--ease);
        }
        .footer-links a:hover { color: white; padding-left: 5px; }

        .footer-contact-item {
            display: flex; align-items: flex-start; gap: 10px;
            margin-bottom: 15px; font-size: 0.83rem; color: rgba(255,255,255,0.65);
        }
        .footer-contact-item i { color: var(--secondary); margin-top: 2px; }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 40px; padding: 20px 0;
            text-align: center; font-size: 0.78rem; color: rgba(255,255,255,0.48);
        }

        .back-to-top {
            position: fixed; bottom: 28px; right: 28px;
            width: 48px; height: 48px; border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white; display: flex; align-items: center; justify-content: center;
            font-size: 1.15rem;
            box-shadow: 0 14px 30px rgba(13,110,253,0.3);
            z-index: 999; text-decoration: none;
            opacity: 0; visibility: hidden; transform: translateY(12px);
            transition: 0.3s var(--ease);
        }
        .back-to-top.visible { opacity: 1; visibility: visible; transform: translateY(0); }
        .back-to-top:hover { color: white; transform: translateY(-4px) scale(1.05); }

        /* =====================================================
   KEUNGGULAN SIKAREMA
===================================================== */

.advantage-section{
    position:relative;
    padding:110px 0;
    overflow:hidden;
}

.advantage-section::before{
    content:"";
    position:absolute;
    width:420px;
    height:420px;
    background:rgba(13,110,253,.08);
    border-radius:50%;
    filter:blur(90px);
    top:-120px;
    left:-100px;
}

.advantage-section::after{
    content:"";
    position:absolute;
    width:350px;
    height:350px;
    background:rgba(24,194,156,.08);
    border-radius:50%;
    filter:blur(90px);
    right:-120px;
    bottom:-120px;
}

.advantage-image{

    background:#fff;

    border-radius:28px;

    padding:25px;

    box-shadow:
        0 18px 45px rgba(0,0,0,.08);

    transition:.35s;

    position:relative;

    z-index:2;
}

.advantage-image:hover{

    transform:translateY(-8px);

    box-shadow:
        0 28px 60px rgba(13,110,253,.12);

}

.advantage-image img{

    border-radius:20px;

    width:100%;

}

.advantage-list{

    display:flex;

    flex-direction:column;

    gap:22px;

}

.adv-card{

    display:flex;

    align-items:flex-start;

    gap:18px;

    background:white;

    border-radius:22px;

    padding:24px;

    transition:.35s;

    box-shadow:
        0 12px 28px rgba(0,0,0,.05);

    border:1px solid rgba(0,0,0,.04);

}

.adv-card:hover{

    transform:translateY(-6px);

    box-shadow:
        0 20px 42px rgba(13,110,253,.12);

    border-color:#0d6efd;

}

.adv-icon{

    width:62px;

    height:62px;

    border-radius:18px;

    display:flex;

    align-items:center;

    justify-content:center;

    flex-shrink:0;

    font-size:24px;

}

.bg-primary-soft{

    background:rgba(13,110,253,.12);

    color:#0d6efd;

}

.bg-success-soft{

    background:rgba(25,135,84,.12);

    color:#198754;

}

.bg-warning-soft{

    background:rgba(255,193,7,.15);

    color:#d18b00;

}

.bg-danger-soft{

    background:rgba(220,53,69,.12);

    color:#dc3545;

}

.adv-card h5{

    margin-bottom:8px;

    font-size:1.2rem;

    font-weight:700;

    color:#17324d;

}

.adv-card p{

    margin:0;

    color:#6b7280;

    line-height:1.7;

    font-size:.96rem;

}

/*==========================
KEUNGGULAN
==========================*/

.advantage-section{

    padding:120px 0;

}

.section-badge{

    display:inline-flex;

    align-items:center;

    gap:8px;

    background:#EAF3FF;

    color:#0D6EFD;

    padding:8px 18px;

    border-radius:999px;

    font-weight:700;

    font-size:13px;

    letter-spacing:.08em;

    text-transform:uppercase;

}

.advantage-title{
    margin-top:20px;
    font-size:46px;
    font-weight:700;
    color:#17324D;
    line-height:1.25;
}

.advantage-title span{

    background:linear-gradient(90deg,#1565ff,#20c997);

    -webkit-background-clip:text;

    -webkit-text-fill-color:transparent;

}

.advantage-desc{
    max-width:760px;
    margin:auto;
    margin-top:18px;
    font-size:18px;
    color:#64748B;
    line-height:1.8;
    font-weight:400;
}

.advantage-image{

    background:white;

    border-radius:30px;

    overflow:hidden;

    box-shadow:0 20px 60px rgba(0,0,0,.08);

}

.advantage-image img{

    width:100%;

    display:block;

}

.advantage-card{

    display:flex;

    align-items:flex-start;

    gap:24px;

    background:white;

    border-radius:22px;

    padding:26px;

    margin-bottom:22px;

    box-shadow:0 15px 45px rgba(0,0,0,.05);

    transition:.35s;

}

.advantage-card:hover{

    transform:translateY(-8px);

    box-shadow:0 25px 60px rgba(0,0,0,.12);

}

.advantage-icon{

    width:64px;
    height:64px;

    border-radius:18px;

    display:flex;
    align-items:center;
    justify-content:center;

    flex-shrink:0;

}

.advantage-icon i{

    font-size:24px;

    line-height:1;

    display:flex;
    align-items:center;
    justify-content:center;

}

.bg-primary-soft{

    background:#EAF2FF;

}

.bg-success-soft{

    background:#EAF9F2;

}

.bg-warning-soft{

    background:#FFF6DF;

}

.bg-danger-soft{

    background:#FFEDED;

}

.advantage-card h5{
    font-size:22px;
    font-weight:700;
    margin-bottom:8px;
}

.advantage-card p{
    font-size:16px;
    line-height:1.7;
}
}

@media(max-width:991px){

    .advantage-image{

        margin-bottom:40px;

    }

}

.adv-mini-stats{

    display:flex;

    gap:18px;

    margin-top:25px;

    flex-wrap:wrap;

}

.mini-stat{

    flex:1;

    min-width:120px;

    background:white;

    border-radius:18px;

    padding:20px;

    text-align:center;

    box-shadow:0 10px 25px rgba(0,0,0,.05);

    transition:.3s;

}

.mini-stat:hover{

    transform:translateY(-5px);

}

.mini-stat h3{

    margin:0;

    color:#0d6efd;

    font-size:30px;

    font-weight:800;

}

.mini-stat span{

    color:#6b7280;

}

        /* ════════════════════════════════════════════════════════════════
           Responsive
           ════════════════════════════════════════════════════════════════ */
        @media (max-width: 991px) {
            body { padding-top: 80px; }
            .hero-title { font-size: 2.2rem; }
            .hero-visual-wrap { margin-top: 40px; min-height: 260px; }
            .hfc-1, .hfc-2 { display: none; }
            .section-pad { padding: 70px 0; }
            .stat-counter { font-size: 2rem; }
            .stat-divider { display: none; }
            .zigzag-icon-panel { aspect-ratio: 2.4/1; font-size: 2rem; margin-bottom: 4px; }
            .zigzag-card { padding: 24px; }
            .zigzag-title { font-size: 1.4rem; }
            .navbar-sikarema .nav-link { margin-left: 16px; }
            .btn-masuk-sistem { margin-left: 0; margin-top: 10px; }
            .cta-heading { font-size: 1.6rem; }
            .navbar-logo-img { height: 56px; margin: -10px 0; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-sikarema" id="mainNavbar">
    <div class="container h-100">
<a class="navbar-brand-wrap" href="{{ url('/') }}">
    <img src="{{ asset('images/logo-dashboard-SIKAREMA.png') }}"
         alt="Logo SIKAREMA"
         class="navbar-logo-img">
</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                <li class="nav-item"><a class="nav-link" href="#alur">Alur Sistem</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                <li class="nav-item">
                    <a class="btn-masuk-sistem btn-ripple" href="{{ route('login') }}">
                        Masuk ke Sistem <i class="bi bi-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="site-footer" id="kontak">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-brand-wrap">
                    @if(file_exists(public_path('images/SIKAREMA.png')))
                        <img src="{{ asset('images/SIKAREMA.png') }}" alt="Logo SIKAREMA" class="footer-logo-img">
                    @elseif(file_exists(public_path('images/SIKAREMA.png')))
                        <img src="{{ asset('images/logo-sikarema.png') }}" alt="Logo SIKAREMA" class="footer-logo-img">
                    @else
                        <div class="navbar-logo-icon">S</div>
                        <div>
                            <p class="footer-brand-name">SIKAREMA</p>
                            <div class="footer-brand-tag">Klaim Reward Prestasi Mahasiswa</div>
                        </div>
                    @endif
                </div>
                <p class="footer-desc">
                    Sistem informasi pengajuan prestasi dan klaim reward mahasiswa yang
                    cepat, transparan, dan terintegrasi dalam satu platform.
                </p>
                <div class="footer-social">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-envelope"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <div class="footer-col-title">Tentang</div>
                <ul class="footer-links">
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#fitur">Fitur</a></li>
                    <li><a href="#alur">Alur Sistem</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-6">
                <div class="footer-col-title">Menu</div>
                <ul class="footer-links">
                    <li><a href="{{ route('login') }}">Masuk ke Sistem</a></li>
                    <li><a href="#">Panduan Pengguna</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat &amp; Ketentuan</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <div class="footer-col-title">Kontak</div>
                <div class="footer-contact-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Universitas Anda<br>Alamat Kampus, Kota</span>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    <span>info@sikarema.ac.id</span>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-whatsapp"></i>
                    <span>0812-3456-7890</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; {{ date('Y') }} SIKAREMA &mdash; Sistem Klaim Reward Prestasi Mahasiswa. All rights reserved.
        </div>
    </div>
</footer>

<a href="#beranda" class="back-to-top" id="backToTop">
    <i class="bi bi-arrow-up"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // ── Navbar scroll state ──────────────────────────────────────────────
    const navbar = document.getElementById('mainNavbar');
    const backToTop = document.getElementById('backToTop');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 30) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        if (window.scrollY > 500) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    });

    // ── Scroll reveal via IntersectionObserver ───────────────────────────
    const revealEls = document.querySelectorAll('.reveal, .reveal-zoom');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    revealEls.forEach(el => revealObserver.observe(el));

    // ── Counter animation ─────────────────────────────────────────────────
    const counters = document.querySelectorAll('.stat-counter');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.dataset.count, 10);
                const suffix = el.dataset.suffix || '';
                const duration = 1600;
                const startTime = performance.now();

                function tick(now) {
                    const progress = Math.min((now - startTime) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    const value = Math.floor(eased * target);
                    el.innerHTML = value.toLocaleString('id-ID') + '<span class="suffix">' + suffix + '</span>';
                    if (progress < 1) requestAnimationFrame(tick);
                }
                requestAnimationFrame(tick);
                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.4 });

    counters.forEach(el => counterObserver.observe(el));

    // ── Button ripple effect ──────────────────────────────────────────────
    document.querySelectorAll('.btn-ripple, .btn-hero-primary, .btn-cta').forEach(btn => {
        btn.classList.add('btn-ripple');
        btn.addEventListener('click', function (e) {
            const rect = this.getBoundingClientRect();
            const circle = document.createElement('span');
            const size = Math.max(rect.width, rect.height);
            circle.classList.add('ripple-circle');
            circle.style.width = circle.style.height = size + 'px';
            circle.style.left = (e.clientX - rect.left - size / 2) + 'px';
            circle.style.top = (e.clientY - rect.top - size / 2) + 'px';
            this.appendChild(circle);
            setTimeout(() => circle.remove(), 650);
        });
    });

    // ── Active nav link on scroll ───────────────────────────────────────
    const sections = document.querySelectorAll('main section[id]');
    const navLinks = document.querySelectorAll('.navbar-sikarema .nav-link');

    window.addEventListener('scroll', function () {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 120;
            if (window.scrollY >= sectionTop) {
                current = section.getAttribute('id');
            }
        });
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('active');
            }
        });
    });
</script>

</body>
</html>