<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="TOP INFO – Solution informatique de confiance à Brazzaville : réseaux, maintenance, développement web, logiciel, sécurité et téléphonie IP.">
  <title>TOP INFO – Solution Informatique</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo-topinfo.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --blue-deep:   #0A1F6E;
      --blue-mid:    #1A3FA8;
      --blue-bright: #2563EB;
      --blue-light:  #60A5FA;
      --accent:      #F59E0B;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body { font-family: 'Inter', sans-serif; background: #f8faff; color: #1e293b; }
    h1, h2, h3, h4 { font-family: 'Space Grotesk', sans-serif; }

    /* ── NAV ── */
    nav {
      position: sticky; top: 0; z-index: 100;
      background: rgba(255,255,255,0.96);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid #e0eaff;
      padding: .75rem 2rem;
      display: flex; align-items: center; justify-content: space-between;
    }
    .nav-logo { display: flex; align-items: center; gap: .6rem; text-decoration: none; }
    .nav-logo-icon {
      width: 38px; height: 38px; border-radius: 12px;
      background: linear-gradient(135deg, #2563EB, #0A1F6E);
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-weight: 900; font-size: .85rem; font-family: 'Space Grotesk', sans-serif;
    }
    .nav-logo span { font-size: 1.1rem; font-weight: 800; color: #0A1F6E; }
    .nav-links { display: flex; gap: 2rem; list-style: none; }
    .nav-links a { text-decoration: none; font-size: .88rem; font-weight: 500; color: #64748b; transition: color .2s; }
    .nav-links a:hover, .nav-links a.active { color: #2563EB; font-weight: 600; }
    .nav-cta {
      background: linear-gradient(135deg, #2563EB, #0A1F6E);
      color: #fff; padding: .6rem 1.4rem;
      border-radius: 12px; font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; font-size: .82rem;
      text-decoration: none; transition: opacity .2s;
    }
    .nav-cta:hover { opacity: .88; }
    .nav-burger { display: none; background: none; border: none; cursor: pointer; padding: .4rem; }
    .nav-burger span { display: block; width: 22px; height: 2px; background: #0A1F6E; margin: 4px 0; border-radius: 2px; transition: all .3s; }

    /* ── HERO ── */
    .hero { position: relative; overflow: hidden; min-height: 560px; background: var(--blue-deep); }
    .slide { position: absolute; inset: 0; opacity: 0; transition: opacity .9s ease; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 2rem; }
    .slide.active { opacity: 1; }
    .slide-bg { position: absolute; inset: 0; background-size: cover; background-position: center; }
    .slide-bg::after { content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, rgba(10,31,110,0.82) 0%, rgba(37,99,235,0.60) 100%); }
    .hero-content { position: relative; z-index: 2; max-width: 700px; }
    .hero-tag { display: inline-block; color: #93C5FD; font-weight: 600; letter-spacing: .15em; text-transform: uppercase; font-size: .75rem; margin-bottom: .75rem; }
    .hero-title { color: #fff; font-size: clamp(2.2rem, 6vw, 4.5rem); font-weight: 900; line-height: 1.05; margin-bottom: 1rem; }
    .hero-sub { color: #BFDBFE; font-size: 1.1rem; font-weight: 400; margin-bottom: 2rem; }
    .hero-btns { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
    .btn-primary { display: inline-block; padding: .85rem 2rem; background: linear-gradient(135deg, #2563EB, #1A3FA8); color: #fff; border-radius: 14px; text-decoration: none; font-family: 'Space Grotesk', sans-serif; font-weight: 700; font-size: .9rem; box-shadow: 0 8px 30px rgba(37,99,235,.5); transition: transform .2s, opacity .2s; border: none; cursor: pointer; }
    .btn-primary:hover { transform: translateY(-2px); opacity: .92; }
    .btn-outline { display: inline-block; padding: .85rem 2rem; border: 2px solid rgba(255,255,255,.5); color: #fff; border-radius: 14px; text-decoration: none; font-family: 'Space Grotesk', sans-serif; font-weight: 700; font-size: .9rem; transition: background .2s, border-color .2s; }
    .btn-outline:hover { background: rgba(255,255,255,.1); border-color: #fff; }
    .slide-dots { position: absolute; bottom: 90px; left: 50%; transform: translateX(-50%); display: flex; gap: .5rem; z-index: 10; }
    .dot { width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,.4); border: none; cursor: pointer; transition: all .3s; }
    .dot.active { background: #fff; transform: scale(1.3); }
    .wave-bottom { position: absolute; bottom: -2px; left: 0; width: 100%; z-index: 3; line-height: 0; }
    .wave-bottom svg { display: block; width: 100%; height: 80px; }

    /* ── INFO CARDS ── */
    .info-bar { padding: 0 2rem 3rem; }
    .info-cards { max-width: 1000px; margin: -2rem auto 0; display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; position: relative; z-index: 10; }
    .info-card { background: #fff; border-radius: 20px; padding: 1.8rem 1.5rem; border: 1px solid #e0eaff; box-shadow: 0 8px 30px rgba(37,99,235,.08); transition: transform .3s, box-shadow .3s; }
    .info-card:hover { transform: translateY(-5px); box-shadow: 0 20px 50px rgba(37,99,235,.15); }
    .info-card-icon { width: 50px; height: 50px; border-radius: 14px; background: #EFF6FF; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; font-size: 1.3rem; }
    .info-card h4 { font-size: 1rem; font-weight: 700; color: #0A1F6E; margin-bottom: .4rem; }
    .info-card p { font-size: .82rem; color: #94a3b8; margin-bottom: .5rem; }
    .info-card a, .info-highlight { color: #2563EB; font-weight: 600; font-size: .9rem; text-decoration: none; display: block; line-height: 1.6; }
    .info-card a:hover { text-decoration: underline; }

    /* ── SECTIONS COMMUNES ── */
    section { padding: 5rem 2rem; }
    .container { max-width: 1140px; margin: 0 auto; }
    .section-heading { text-align: center; margin-bottom: 3.5rem; }
    .section-heading h2 { font-size: clamp(1.8rem, 4vw, 2.6rem); font-weight: 800; color: #0A1F6E; }
    .section-heading p { color: #64748b; margin-top: .5rem; max-width: 520px; margin-inline: auto; font-size: .95rem; }
    .bar { width: 54px; height: 4px; background: linear-gradient(90deg,#2563EB,#60A5FA); border-radius: 4px; margin: .75rem auto 0; }
    .label { display: inline-block; color: #2563EB; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; font-size: .72rem; margin-bottom: .4rem; }

    /* ── À PROPOS ── */
    #apropos { background: #f8faff; }
    .apropos-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
    .apropos-img-wrap { position: relative; }
    .apropos-img-wrap img { width: 100%; border-radius: 24px; height: 340px; object-fit: contain; box-shadow: 0 40px 80px rgba(37,99,235,.18); background: #fff; padding: 2rem; }
    .apropos-badge { position: absolute; bottom: -1.5rem; left: -1.5rem; background: #2563EB; color: #fff; padding: 1rem 1.4rem; border-radius: 18px; box-shadow: 0 10px 30px rgba(37,99,235,.4); text-align: center; }
    .apropos-badge .num { font-size: 1.6rem; font-weight: 900; font-family: 'Space Grotesk', sans-serif; }
    .apropos-badge .lbl { font-size: .7rem; opacity: .85; }
    .apropos-text h2 { font-size: 2rem; font-weight: 800; color: #0A1F6E; line-height: 1.25; margin-bottom: 1rem; }
    .apropos-text p { color: #64748b; line-height: 1.75; margin-bottom: 1.5rem; }
    .stats { display: grid; grid-template-columns: repeat(3,1fr); gap: 1rem; margin-top: 1.5rem; }
    .stat { text-align: center; background: #f0f5ff; border-radius: 14px; padding: 1rem; }
    .stat .num { font-size: 1.6rem; font-weight: 900; color: #2563EB; font-family: 'Space Grotesk', sans-serif; }
    .stat .lbl { font-size: .72rem; color: #94a3b8; margin-top: .2rem; }

    /* ── SERVICES ── */
    .services-bg { background: linear-gradient(180deg, #f0f5ff 0%, #f8faff 100%); }
    .services-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; padding: 0 2rem; max-width: 1140px; margin: 0 auto; }
    .service-card { background: #fff; border-radius: 20px; border: 1px solid #dbeafe; padding: 2rem 1.5rem; text-align: center; transition: all .3s; }
    .service-card:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(37,99,235,.14); border-color: #93C5FD; }
    .s-icon { width: 60px; height: 60px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.6rem; }
    .service-card h3 { font-size: 1rem; font-weight: 700; color: #0A1F6E; margin-bottom: .5rem; }
    .service-card p { font-size: .83rem; color: #64748b; line-height: 1.6; }
    .s-icon img { width: 100%; height: 100%; object-fit: contain; filter: invert(1); }

    /* ── PROJETS ── */
    #projets { background: #fff; }
    .projets-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; padding: 0 2rem; max-width: 1140px; margin: 0 auto; }
    .projet-card { background: #fff; border-radius: 20px; overflow: hidden; border: 1px solid #dbeafe; transition: all .35s; }
    .projet-card:hover { transform: translateY(-6px); box-shadow: 0 24px 60px rgba(37,99,235,.18); }
    .projet-card img { width: 100%; height: 200px; object-fit: cover; }
    .projet-card-img-placeholder { width: 100%; height: 200px; background: linear-gradient(135deg, #dbeafe, #eff6ff); display: flex; align-items: center; justify-content: center; }
    .projet-card-img-placeholder svg { width: 60px; height: 60px; color: #93c5fd; }
    .projet-card-body { padding: 1.3rem; }
    .projet-tag { font-size: .7rem; font-weight: 700; color: #2563EB; text-transform: uppercase; letter-spacing: .08em; }
    .projet-card h3 { font-size: 1rem; font-weight: 800; color: #1e40af; margin: .4rem 0; }
    .projet-card p { font-size: .82rem; color: #64748b; line-height: 1.6; margin-bottom: 1rem; }
    .btn-link { color: #2563EB; font-weight: 700; font-size: .83rem; text-decoration: none; }
    .btn-link:hover { text-decoration: underline; }

    /* ── PARTENAIRES ── */
    .partners-bg { background: #fff; }
    .marquee-wrapper { overflow: hidden; border-top: 1px solid #e0eaff; border-bottom: 1px solid #e0eaff; padding: 1.5rem 0; }
    .marquee-track { display: flex; gap: 2.5rem; width: max-content; animation: marquee 30s linear infinite; align-items: center; }
    .marquee-track:hover { animation-play-state: paused; }
    @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }
    .partner-item { background: #f8faff; border-radius: 14px; border: 1px solid #e0eaff; width: 130px; height: 70px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: .5rem; transition: box-shadow .3s; }
    .partner-item:hover { box-shadow: 0 6px 20px rgba(37,99,235,.12); }
    .partner-item img { max-width: 100%; max-height: 48px; object-fit: contain; filter: grayscale(40%); transition: filter .3s; }
    .partner-item:hover img { filter: grayscale(0%); }
    .partner-item span { font-weight: 700; color: #1A3FA8; font-size: .82rem; text-align: center; }

    /* ── PRODUITS ── */
    .produits-bg { background: linear-gradient(180deg, #f0f5ff 0%, #f8faff 100%); }
    .produits-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; padding: 0 2rem; max-width: 1140px; margin: 0 auto; }
    .product-card { background: #fff; border-radius: 22px; border: 1px solid #dbeafe; overflow: hidden; transition: all .35s; }
    .product-card:hover { transform: translateY(-8px); box-shadow: 0 28px 70px rgba(37,99,235,.18); }
    .product-img { position: relative; height: 200px; background: #EFF6FF; overflow: hidden; display: flex; align-items: center; justify-content: center; }
    .product-img img { width: 100%; height: 100%; object-fit: cover; }
    .product-img svg { width: 60px; height: 60px; color: #93c5fd; }
    .product-body { padding: 1.3rem; }
    .product-body h3 { font-size: .95rem; font-weight: 800; color: #0A1F6E; margin-bottom: .4rem; }
    .product-body p { font-size: .8rem; color: #64748b; line-height: 1.6; }

    /* ── GALERIE ── */
    #galerie { background: linear-gradient(180deg, #f0f5ff 0%, #f8faff 100%); }
    .galerie-grid { display: grid; grid-template-columns: repeat(5,1fr); gap: .75rem; padding: 0 2rem; max-width: 1140px; margin: 0 auto; }
    .galerie-item { position: relative; aspect-ratio: 1; border-radius: 14px; overflow: hidden; cursor: pointer; border: 1px solid #dbeafe; }
    .galerie-item img { width: 100%; height: 100%; object-fit: cover; transition: transform .35s; }
    .galerie-item:hover img { transform: scale(1.08); }
    .galerie-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(10,31,110,0.82) 0%, transparent 55%); opacity: 0; transition: opacity .3s; display: flex; flex-direction: column; justify-content: flex-end; padding: .75rem; }
    .galerie-item:hover .galerie-overlay { opacity: 1; }
    .galerie-overlay h4 { color: #fff; font-size: .78rem; font-weight: 700; margin: 0; line-height: 1.3; }
    .galerie-overlay p { color: #bfdbfe; font-size: .68rem; margin: .2rem 0 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    /* lightbox */
    .lb-backdrop { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.88); z-index: 1000; align-items: center; justify-content: center; padding: 1.5rem; }
    .lb-backdrop.open { display: flex; }
    .lb-box { max-width: 860px; width: 100%; background: #fff; border-radius: 20px; overflow: hidden; position: relative; box-shadow: 0 40px 100px rgba(0,0,0,.5); }
    .lb-img { width: 100%; max-height: 72vh; object-fit: contain; background: #0a1020; display: block; }
    .lb-info { padding: 1.2rem 1.5rem; }
    .lb-info h3 { font-size: 1rem; font-weight: 800; color: #0A1F6E; margin: 0 0 .3rem; }
    .lb-info p { font-size: .85rem; color: #64748b; margin: 0; line-height: 1.6; }
    .lb-close { position: absolute; top: .8rem; right: .8rem; background: rgba(255,255,255,.15); border: none; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #fff; font-size: 1.1rem; transition: background .2s; z-index: 10; }
    .lb-close:hover { background: rgba(255,255,255,.3); }
    @media (max-width: 768px) { .galerie-grid { grid-template-columns: repeat(2,1fr); padding: 0; } }
    @media (max-width: 1024px) and (min-width: 769px) { .galerie-grid { grid-template-columns: repeat(3,1fr); } }

    /* ── ACTUALITÉS ── */
    #actualities { background: #fff; }
    .actu-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; padding: 0 2rem; max-width: 1140px; margin: 0 auto; }
    .actu-card { background: #fff; border-radius: 20px; overflow: hidden; border: 1px solid #e0eaff; transition: all .35s; }
    .actu-card:hover { transform: translateY(-6px); box-shadow: 0 24px 60px rgba(37,99,235,.14); }
    .actu-card img { width: 100%; height: 180px; object-fit: cover; }
    .actu-card-img-placeholder { width: 100%; height: 180px; background: linear-gradient(135deg, #dbeafe, #eff6ff); display: flex; align-items: center; justify-content: center; }
    .actu-card-body { padding: 1.3rem; }
    .actu-date { font-size: .72rem; font-weight: 700; color: #2563EB; margin-bottom: .4rem; display: block; }
    .actu-card h3 { font-size: .95rem; font-weight: 800; color: #0A1F6E; margin-bottom: .4rem; line-height: 1.4; }
    .actu-card p { font-size: .82rem; color: #64748b; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }

    /* ── FOOTER ── */
    footer { background: #0A1F6E; color: #c7d6f7; padding: 4rem 2rem 2rem; }
    .footer-grid { max-width: 1140px; margin: 0 auto; display: grid; grid-template-columns: 1.5fr 1fr 1fr 1fr; gap: 2.5rem; }
    .footer-brand p { font-size: .85rem; color: #93b4e0; margin-top: .8rem; line-height: 1.7; }
    footer h4 { color: #fff; font-size: .8rem; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; margin-bottom: 1rem; }
    footer ul { list-style: none; }
    footer ul li { margin-bottom: .5rem; }
    footer ul li a { color: #93b4e0; text-decoration: none; font-size: .85rem; transition: color .2s; }
    footer ul li a:hover { color: #fff; }
    footer ul li span { color: #93b4e0; font-size: .85rem; }
    .footer-bottom { max-width: 1140px; margin: 2.5rem auto 0; padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,.1); text-align: center; font-size: .78rem; color: #6b8bb5; }

    /* ── SCROLL REVEAL ── */
    .reveal { opacity: 0; transform: translateY(28px); transition: opacity .6s, transform .6s; }
    .reveal.visible { opacity: 1; transform: none; }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
      .info-cards, .services-grid, .projets-grid, .produits-grid, .actu-grid { grid-template-columns: 1fr; }
      .apropos-grid { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr 1fr; }
      .services-grid, .projets-grid, .produits-grid, .actu-grid { padding: 0; }
      .nav-links { display: none; }
      .nav-burger { display: block; }
    }
    @media (max-width: 1024px) and (min-width: 769px) {
      .services-grid, .projets-grid, .produits-grid, .actu-grid { grid-template-columns: repeat(2,1fr); }
    }

    /* ── MOBILE NAV ── */
    .mobile-nav { display: none; flex-direction: column; gap: .5rem; position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border-bottom: 1px solid #e0eaff; padding: 1rem 2rem; z-index: 99; box-shadow: 0 10px 30px rgba(0,0,0,.08); }
    .mobile-nav.open { display: flex; }
    .mobile-nav a { text-decoration: none; font-size: .9rem; font-weight: 500; color: #64748b; padding: .5rem 0; border-bottom: 1px solid #f1f5f9; }
    .mobile-nav a:hover { color: #2563EB; }
  </style>
</head>
<body>

{{-- ══════════ NAV ══════════ --}}
<nav style="position:relative">
  <a href="#" class="nav-logo">
    <img src="{{ asset('images/logo-topinfo.png') }}" alt="TOP INFO" style="height:48px;width:auto;object-fit:contain;">
  </a>
  <ul class="nav-links">
    <li><a href="#accueil" class="active">Accueil</a></li>
    <li><a href="#apropos">À Propos</a></li>
    <li><a href="#services">Services</a></li>
    @if($projects->count())
    <li><a href="#projets">Projets</a></li>
    @endif
    @if($partenaires->count())
    <li><a href="#partenaires">Partenaires</a></li>
    @endif
    @if($produits->count())
    <li><a href="#produits">Produits</a></li>
    @endif
    @if($galeries->count())
    <li><a href="#galerie">Galerie</a></li>
    @endif
    @if($actualities->count())
    <li><a href="#actualities">Actualités</a></li>
    @endif
  </ul>
  @if(Route::has('login'))
    @auth
      <a href="{{ url('/dashboard') }}" class="nav-cta">⚙ Dashboard</a>
    @else
      <a href="{{ route('login') }}" class="nav-cta">Connexion</a>
    @endauth
  @endif
  <button class="nav-burger" id="burger" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
  <div class="mobile-nav" id="mobile-nav">
    <a href="#accueil">Accueil</a>
    <a href="#apropos">À Propos</a>
    <a href="#services">Services</a>
    @if($projects->count())<a href="#projets">Projets</a>@endif
    @if($partenaires->count())<a href="#partenaires">Partenaires</a>@endif
    @if($produits->count())<a href="#produits">Produits</a>@endif
    @if($galeries->count())<a href="#galerie">Galerie</a>@endif
    @if($actualities->count())<a href="#actualities">Actualités</a>@endif
    @if(Route::has('login'))
      @auth
        <a href="{{ url('/dashboard') }}">Dashboard</a>
      @else
        <a href="{{ route('login') }}">Connexion</a>
      @endauth
    @endif
  </div>
</nav>

{{-- ══════════ HERO SLIDER ══════════ --}}
<section class="hero" id="accueil">
  <div id="hero-container">
    <div class="slide active" id="slide-0">
      <div class="slide-bg" style="background-image: url('{{ asset('images/bureau.jpg') }}')"></div>
      <div class="hero-content">
        <span class="hero-tag">Solutions Informatiques</span>
        <h1 class="hero-title">Votre partenaire<br>technologique</h1>
        <p class="hero-sub">Infrastructure réseau, maintenance, développement et sécurité pour votre entreprise.</p>
        <div class="hero-btns">
          <a href="#services" class="btn-primary">Nos services →</a>
          <a href="#contact" class="btn-outline">Nous contacter</a>
        </div>
      </div>
    </div>
    <div class="slide" id="slide-1">
      <div class="slide-bg" style="background-image: url('{{ asset('images/bureau.jpg') }}'); background-position: center 30%;"></div>
      <div class="hero-content">
        <span class="hero-tag">Expertise Réseau</span>
        <h1 class="hero-title">Réseaux &amp;<br>Infrastructures</h1>
        <p class="hero-sub">Conception, déploiement et administration de réseaux performants et sécurisés.</p>
        <div class="hero-btns">
          <a href="#projets" class="btn-primary">Nos projets →</a>
          <a href="#apropos" class="btn-outline">En savoir plus</a>
        </div>
      </div>
    </div>
    <div class="slide" id="slide-2">
      <div class="slide-bg" style="background-image: url('{{ asset('images/bureau.jpg') }}'); background-position: center 70%;"></div>
      <div class="hero-content">
        <span class="hero-tag">Développement Web</span>
        <h1 class="hero-title">Sites &amp; Applications<br>sur mesure</h1>
        <p class="hero-sub">Des solutions digitales modernes adaptées à vos besoins professionnels.</p>
        <div class="hero-btns">
          <a href="#produits" class="btn-primary">Nos produits →</a>
          <a href="#contact" class="btn-outline">Devis gratuit</a>
        </div>
      </div>
    </div>
  </div>
  <div class="slide-dots" id="slide-dots">
    <button class="dot active" id="dot-0" onclick="goSlide(0)"></button>
    <button class="dot" id="dot-1" onclick="goSlide(1)"></button>
    <button class="dot" id="dot-2" onclick="goSlide(2)"></button>
  </div>
  <div class="wave-bottom">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,40 C240,80 480,0 720,40 C960,80 1200,0 1440,40 L1440,80 L0,80 Z" fill="#f8faff"/>
    </svg>
  </div>
</section>

{{-- ══════════ INFO CARDS ══════════ --}}
<div class="info-bar" id="contact">
  <div class="info-cards">
    <div class="info-card reveal">
      <div class="info-card-icon">📞</div>
      <h4>Appelez-nous</h4>
      <p>Disponibles pour vous</p>
      <a href="tel:+242061062323">Brazzaville: +242 06 106 23 23</a>
      <a href="tel:+242064313506">Pointe-Noire: +242 06 105 23 23</a>
    </div>
    <div class="info-card reveal">
      <div class="info-card-icon">🕐</div>
      <h4>Horaires</h4>
      <p>Fermé les dimanches</p>
      <span class="info-highlight">Lundi à Vendredi</span>
      <span class="info-highlight">8H00 – 16H00</span>
    </div>
    <div class="info-card reveal">
      <div class="info-card-icon">📍</div>
      <h4>Localisation</h4>
      <p>Brazzaville, République du Congo</p>
      <span class="info-highlight">Brazzaville: 57, Avenue des 3 martyrs, rond-point Koulounda<br> Pointe-Noire: Mpita, Derrière la BRALICO</span>
    </div>
  </div>
</div>

{{-- ══════════ À PROPOS ══════════ --}}
<section id="apropos">
  <div class="container">
    <div class="apropos-grid">
      <div class="apropos-img-wrap reveal">
        <img src="{{ asset('images/logo-topinfo.png') }}" alt="À propos TOP INFO"/>
        
      </div>
      <div class="apropos-text reveal">
        <span class="label">Qui sommes-nous</span>
        <h2>Une expertise au service de votre entreprise</h2>
        <p>TOP INFO est une entreprise de solutions informatiques basée à Brazzaville. Nous accompagnons les professionnels et organisations avec des solutions complètes : infrastructures réseau, maintenance, développement web & logiciel, sécurité et téléphonie IP.</p>
        <a href="#services" class="btn-primary" style="display:inline-block;margin-top:.5rem">Nos services →</a>
        <div class="stats">
          <div class="stat"><div class="num">+10</div><div class="lbl">Années d'expérience</div></div>
          <div class="stat"><div class="num">+50</div><div class="lbl">Clients satisfaits</div></div>
          <div class="stat"><div class="num">100%</div><div class="lbl">Satisfaction</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ══════════ SERVICES ══════════ --}}
@php
  $sColors = [
    ['bg'=>'#DBEAFE','color'=>'#1D4ED8'],
    ['bg'=>'#E0E7FF','color'=>'#4338CA'],
    ['bg'=>'#D1FAE5','color'=>'#065F46'],
    ['bg'=>'#FEF3C7','color'=>'#92400E'],
    ['bg'=>'#FCE7F3','color'=>'#9D174D'],
    ['bg'=>'#E0F2FE','color'=>'#0369A1'],
  ];
  $sIcons = ['🌐','🔧','💻','📦','🔒','📞'];
  $defaultServices = [
    ['name'=>'Systèmes réseaux','description'=>'Conception, déploiement et administration de réseaux informatiques performants et sécurisés.'],
    ['name'=>'Maintenance','description'=>'Maintenance préventive et corrective de votre parc informatique pour une continuité optimale.'],
    ['name'=>'Développement web','description'=>'Sites vitrines, applications web et plateformes sur mesure, modernes et responsives.'],
    ['name'=>'Logiciel','description'=>'Solutions logicielles adaptées à vos processus métier pour gagner en efficacité.'],
    ['name'=>'Sécurité & contrôle','description'=>"Vidéosurveillance, contrôle d'accès et cybersécurité pour protéger vos actifs."],
    ['name'=>'Téléphonie IP','description'=>'Solutions de communication unifiée et téléphonie IP pour connecter vos équipes.'],
  ];
  $displayServices = $services->count() ? $services : collect($defaultServices);
@endphp
<section id="services" class="services-bg">
  <div class="container">
    <div class="section-heading reveal">
      <span class="label">Ce que nous faisons</span>
      <h2>Nos Services</h2>
      <div class="bar"></div>
      <p>Des solutions complètes et adaptées à vos besoins informatiques</p>
    </div>
  </div>
  <div class="services-grid">
    @foreach($displayServices as $i => $service)
    @php
      $c = $sColors[$i % count($sColors)];
      $ico = $sIcons[$i % count($sIcons)];
      $name = is_object($service) ? $service->name : $service['name'];
      $desc = is_object($service) ? $service->description : $service['description'];
      $iconUrl = is_object($service) ? ($service->icon_url ?? null) : null;
    @endphp
    <div class="service-card reveal">
      <div class="s-icon" style="background:{{ $c['bg'] }};color:{{ $c['color'] }}">
        @if($iconUrl)
          <img src="{{ $iconUrl }}" alt="{{ $name }}">
        @else
          {{ $ico }}
        @endif
      </div>
      <h3>{{ $name }}</h3>
      <p>{{ $desc }}</p>
    </div>
    @endforeach
  </div>
</section>

{{-- ══════════ PROJETS ══════════ --}}
@if($projects->count())
<section id="projets">
  <div class="container">
    <div class="section-heading reveal">
      <span class="label">Nos réalisations</span>
      <h2>Nos Projets</h2>
      <div class="bar"></div>
      <p>Découvrez quelques réalisations dont nous sommes fiers</p>
    </div>
  </div>
  <div class="projets-grid">
    @foreach($projects as $project)
    <div class="projet-card reveal">
      @if($project->image_url)
        <img src="{{ $project->image_url }}" alt="{{ $project->name }}">
      @else
        <div class="projet-card-img-placeholder">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909"/></svg>
        </div>
      @endif
      <div class="projet-card-body">
        @if($project->service)
          <span class="projet-tag">{{ $project->service->name }}</span>
        @endif
        <h3>{{ $project->name }}</h3>
        <p>{{ Str::limit($project->description, 100) }}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endif

{{-- ══════════ PARTENAIRES ══════════ --}}
@if($partenaires->count())
<section id="partenaires" class="partners-bg" style="padding-bottom:3rem">
  <div class="container">
    <div class="section-heading reveal">
      <span class="label">Ils nous font confiance</span>
      <h2>Nos Partenaires</h2>
      <div class="bar"></div>
    </div>
  </div>
  <div class="marquee-wrapper">
    <div class="marquee-track">
      @foreach($partenaires as $p)
      <div class="partner-item" title="{{ $p->name }}">
        @if($p->logo_url)
          <img src="{{ $p->logo_url }}" alt="{{ $p->name }}">
        @else
          <span>{{ $p->name }}</span>
        @endif
      </div>
      @endforeach
      
    </div>
  </div>
</section>
@endif

{{-- ══════════ PRODUITS ══════════ --}}
@if($produits->count())
<section id="produits" class="produits-bg">
  <div class="container">
    <div class="section-heading reveal">
      <span class="label">Notre catalogue</span>
      <h2>Nos Produits</h2>
      <div class="bar"></div>
      <p>Équipements et solutions prêtes à déployer pour votre entreprise</p>
    </div>
  </div>
  <div class="produits-grid">
    @foreach($produits as $produit)
    <div class="product-card reveal">
      <div class="product-img">
        @if($produit->image_url)
          <img src="{{ $produit->image_url }}" alt="{{ $produit->name }}">
        @else
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
        @endif
      </div>
      <div class="product-body">
        <h3>{{ $produit->name }}</h3>
        <p>{{ Str::limit($produit->description, 110) }}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endif

{{-- ══════════ GALERIE ══════════ --}}
@if($galeries->count())
<section id="galerie">
  <div class="container">
    <div class="section-heading reveal">
      <span class="label">Notre galerie</span>
      <h2>Photos</h2>
      <div class="bar"></div>
      <p>Quelques moments et réalisations en images</p>
    </div>
  </div>
  <div class="galerie-grid">
    @foreach($galeries as $g)
    <div class="galerie-item reveal"
         onclick="openLightbox('{{ $g->image_url }}', '{{ addslashes($g->title) }}', '{{ addslashes($g->description ?? '') }}')">
      <img src="{{ $g->image_url }}" alt="{{ $g->title }}" loading="lazy">
      <div class="galerie-overlay">
        <h4>{{ $g->title }}</h4>
        @if($g->description)
          <p>{{ $g->description }}</p>
        @endif
      </div>
    </div>
    @endforeach
  </div>
</section>

{{-- Lightbox --}}
<div class="lb-backdrop" id="lb-backdrop" onclick="closeLightbox(event)">
  <div class="lb-box">
    <button class="lb-close" onclick="document.getElementById('lb-backdrop').classList.remove('open')">✕</button>
    <img id="lb-img" class="lb-img" src="" alt="">
    <div class="lb-info">
      <h3 id="lb-title"></h3>
      <p id="lb-desc"></p>
    </div>
  </div>
</div>
@endif

{{-- ══════════ ACTUALITÉS ══════════ --}}
@if($actualities->count())
<section id="actualities">
  <div class="container">
    <div class="section-heading reveal">
      <span class="label">Blog</span>
      <h2>Actualités</h2>
      <div class="bar"></div>
      <p>Les dernières nouvelles de TOP INFO et du monde IT</p>
    </div>
  </div>
  <div class="actu-grid">
    @foreach($actualities as $actu)
    <div class="actu-card reveal">
      @if($actu->image_url)
        <img src="{{ $actu->image_url }}" alt="{{ $actu->title }}">
      @else
        <div class="actu-card-img-placeholder">
          <svg style="width:50px;height:50px;color:#93c5fd" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5"/></svg>
        </div>
      @endif
      <div class="actu-card-body">
        @if($actu->publication_date)
          <span class="actu-date">{{ \Carbon\Carbon::parse($actu->publication_date)->format('d M Y') }}</span>
        @endif
        <h3>{{ $actu->title }}</h3>
        <p>{{ Str::limit($actu->description ?? $actu->content ?? '', 100) }}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endif

{{-- ══════════ FOOTER ══════════ --}}
<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <div style="background:rgba(255,255,255,0.12);border-radius:10px;padding:8px 14px;display:inline-block;backdrop-filter:blur(4px);">
        <img src="{{ asset('images/logo-topinfo.png') }}" alt="TOP INFO" style="height:48px;width:auto;object-fit:contain;display:block;">
      </div>
      <p>Solution informatique de confiance pour les professionnels et organisations au Congo-Brazzaville.</p>
    </div>
    <div>
      <h4>Navigation</h4>
      <ul>
        <li><a href="#accueil">Accueil</a></li>
        <li><a href="#apropos">À Propos</a></li>
        <li><a href="#services">Services</a></li>
        @if($projects->count())<li><a href="#projets">Projets</a></li>@endif
        @if($produits->count())<li><a href="#produits">Produits</a></li>@endif
        @if($actualities->count())<li><a href="#actualities">Actualités</a></li>@endif
      </ul>
    </div>
    <div>
      <h4>Services</h4>
      <ul>
        @foreach($displayServices->take(5) as $service)
        <li><span>{{ is_object($service) ? $service->name : $service['name'] }}</span></li>
        @endforeach
      </ul>
    </div>
    <div>
      <h4>Contact</h4>
      <ul>
        <li><span>📍 Brazzaville, Congo</span></li>
        <li><span>📞 +242 06 869 00 09</span></li>
        <li><span>📞 06 431 35 06</span></li>
        <li><span>🕐 Lun–Ven 8H00–16H00</span></li>
        <li><span>🕐 Samedi 9H00–12H00</span></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">© {{ date('Y') }} TOP INFO. Tous droits réservés.</div>
</footer>

<script>
  // ── SLIDER ──
  let currentSlide = 0;
  const totalSlides = 3;
  function goSlide(n) {
    document.querySelector('.slide.active')?.classList.remove('active');
    document.querySelector('.dot.active')?.classList.remove('active');
    currentSlide = n;
    document.getElementById('slide-' + n)?.classList.add('active');
    document.getElementById('dot-' + n)?.classList.add('active');
  }
  setInterval(() => goSlide((currentSlide + 1) % totalSlides), 5000);

  // ── SCROLL REVEAL ──
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); }});
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

  // ── MOBILE NAV ──
  document.getElementById('burger')?.addEventListener('click', () => {
    document.getElementById('mobile-nav')?.classList.toggle('open');
  });

  // ── LIGHTBOX ──
  function openLightbox(src, title, desc) {
    document.getElementById('lb-img').src = src;
    document.getElementById('lb-title').textContent = title;
    document.getElementById('lb-desc').textContent = desc;
    document.getElementById('lb-backdrop').classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function closeLightbox(e) {
    if (e.target === document.getElementById('lb-backdrop')) {
      document.getElementById('lb-backdrop').classList.remove('open');
      document.body.style.overflow = '';
    }
  }
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      document.getElementById('lb-backdrop')?.classList.remove('open');
      document.body.style.overflow = '';
    }
  });
</script>
</body>
</html>
