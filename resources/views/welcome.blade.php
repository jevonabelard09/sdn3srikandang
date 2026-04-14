    <!DOCTYPE html>
    <html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Negeri 3 Srikandang â€“ Jepara</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
    /* =============================================
    CSS VARIABLES & RESET
    ============================================= */
    :root {
    --navy:       #0A1F4B;
    --navy-light: #153070;
    --navy-dark:  #060f26;
    --gold:       #5E7AC4;
    --gold-light: #8FA6E6;
    --white:      #FFFFFF;
    --bg:         #F4F7FC;
    --text:       #2c3e50;
    --text-light: #6c7a8d;
    --shadow:     0 8px 32px rgba(10,31,75,.10);
    --shadow-md:  0 16px 48px rgba(10,31,75,.14);
    --radius:     16px;
    --radius-sm:  10px;
    --ease:       0.35s cubic-bezier(.4,0,.2,1);
    }
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
    html{scroll-behavior:smooth}
    body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--text);line-height:1.7;overflow-x:hidden;text-rendering:optimizeLegibility;-webkit-font-smoothing:antialiased}
    img{max-width:100%;display:block}
    a{text-decoration:none;color:inherit}
    ul{list-style:none}
    button{cursor:pointer;border:none;background:none;font-family:inherit}
    h1,h2,h3,h4{font-family:'Playfair Display',serif;line-height:1.2}

    /* =============================================
    UTILITIES
    ============================================= */
    .container{max-width:1200px;margin:0 auto;padding:0 24px}
    .sec{padding:90px 0}
    .sec-alt{background:var(--white)}
    .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:center}
    .grid-3{display:grid;grid-template-columns:repeat(3,1fr);gap:28px}
    .grid-4{display:grid;grid-template-columns:repeat(4,1fr);gap:24px}
    .center{text-align:center}
    .center .desc{margin:0 auto}
    .center .label{justify-content:center}

    .label{font-size:.78rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);display:inline-flex;align-items:center;gap:8px;margin-bottom:12px}
    .label::before{content:'';width:28px;height:2px;background:var(--gold)}
    .sec-title{font-size:clamp(1.8rem,3vw,2.8rem);color:var(--navy);margin-bottom:1rem}
    .desc{color:var(--text-light);max-width:580px;font-size:1.05rem}

    .btn{display:inline-flex;align-items:center;gap:8px;padding:13px 28px;border-radius:50px;font-weight:600;font-size:.95rem;transition:var(--ease)}
    .btn-gold{background:var(--gold);color:var(--navy);box-shadow:0 4px 16px rgba(94,122,196,.35)}
    .btn-gold:hover{background:var(--gold-light);transform:translateY(-2px);box-shadow:0 8px 24px rgba(94,122,196,.4)}
    .btn-outline{border:2px solid var(--white);color:var(--white)}
    .btn-outline:hover{background:var(--white);color:var(--navy)}
    .btn-navy{background:var(--navy);color:var(--white);box-shadow:0 4px 16px rgba(10,31,75,.25)}
    .btn-navy:hover{background:var(--navy-light);transform:translateY(-2px)}
    a:focus-visible,button:focus-visible,input:focus-visible,select:focus-visible,textarea:focus-visible{outline:3px solid rgba(94,122,196,.35);outline-offset:2px}

    /* reveal */
    .rv{opacity:0;transform:translateY(28px);transition:opacity .7s ease,transform .7s ease}
    .rv.on{opacity:1;transform:none}
    .d1{transition-delay:.1s}.d2{transition-delay:.2s}.d3{transition-delay:.3s}.d4{transition-delay:.4s}

    /* =============================================
    NAVBAR
    ============================================= */
    #nav{position:fixed;top:0;left:0;right:0;z-index:1000;transition:var(--ease);background:linear-gradient(to bottom,rgba(6,15,38,.58),rgba(6,15,38,0));backdrop-filter:blur(2px)}
    .ni{display:flex;align-items:center;justify-content:space-between;padding:18px 40px;transition:var(--ease)}
    #nav.sc .ni{background:var(--navy);padding:12px 40px;box-shadow:0 4px 24px rgba(10,31,75,.18);border-bottom:1px solid rgba(255,255,255,.06)}

    .logo{display:flex;align-items:center;gap:12px}
    .logo-ico{width:46px;height:46px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-size:1rem;font-weight:800;color:var(--navy);flex-shrink:0}
    .logo-txt .sn{font-family:'Playfair Display',serif;font-weight:700;font-size:1rem;color:var(--white)}
    .logo-txt .ss{font-size:.72rem;color:rgba(255,255,255,.7)}

    .nav-links{display:flex;align-items:center;gap:8px}
    .nl{color:rgba(255,255,255,.85);font-size:.9rem;font-weight:500;padding:8px 16px;border-radius:8px;transition:var(--ease);position:relative}
    .nl:hover,.nl.act{color:var(--gold)}
    .nl::after{content:'';position:absolute;bottom:4px;left:16px;right:16px;height:2px;background:var(--gold);border-radius:2px;transform:scaleX(0);transition:var(--ease)}
    .nl:hover::after,.nl.act::after{transform:scaleX(1)}
    .nl-cta{margin-left:8px}

    .hbg{display:none;flex-direction:column;gap:5px;padding:8px}
    .hbg span{display:block;width:24px;height:2px;background:var(--white);border-radius:2px;transition:var(--ease)}
    .hbg.op span:nth-child(1){transform:translateY(7px) rotate(45deg)}
    .hbg.op span:nth-child(2){opacity:0}
    .hbg.op span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}

    /* =============================================
    HERO
    ============================================= */
    #hero{min-height:100vh;position:relative;overflow:hidden;display:flex;align-items:center;background:linear-gradient(135deg,var(--navy-dark) 0%,var(--navy) 50%,var(--navy-light) 100%)}
    .h-pat{position:absolute;inset:0;opacity:.06;background-image:radial-gradient(circle at 25px 25px,white 2px,transparent 0),radial-gradient(circle at 75px 75px,white 2px,transparent 0);background-size:100px 100px}
    .h-blob{position:absolute;border-radius:50%;background:var(--gold);opacity:.07;filter:blur(80px)}
    .h-blob-1{width:500px;height:500px;top:-150px;right:-100px}
    .h-blob-2{width:300px;height:300px;bottom:-50px;left:100px}
    .h-con{position:relative;z-index:2}
    .h-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(94,122,196,.15);border:1px solid rgba(94,122,196,.3);border-radius:50px;padding:8px 18px;margin-bottom:24px;color:var(--gold);font-size:.82rem;font-weight:600;letter-spacing:.05em}
    .h-badge span{width:6px;height:6px;background:var(--gold);border-radius:50%;animation:pulse 2s infinite}
    @keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(1.5)}}
    .h-title{font-size:clamp(2.4rem,5.5vw,4.2rem);color:var(--white);margin-bottom:16px;line-height:1.1}
    .h-title span{color:var(--gold)}
    .h-sub{font-size:clamp(1rem,1.8vw,1.2rem);color:rgba(255,255,255,.75);margin-bottom:36px;max-width:520px}
    .h-btns{display:flex;gap:16px;flex-wrap:wrap}
    .h-stats{display:flex;gap:40px;margin-top:56px;padding-top:36px;border-top:1px solid rgba(255,255,255,.1)}
    .st-n{font-family:'Playfair Display',serif;font-size:2.2rem;font-weight:700;color:var(--gold);line-height:1}
    .st-l{font-size:.82rem;color:rgba(255,255,255,.6);margin-top:4px}

    /* hero image side */
    .h-img-side{position:relative;z-index:2;display:flex;justify-content:center;align-items:center}
    .h-frame{width:400px;height:500px;position:relative}
    .h-frame::before{content:'';position:absolute;inset:-14px;border:2px solid rgba(94,122,196,.3);border-radius:24px;z-index:-1}
    .h-frame::after{content:'';position:absolute;inset:-28px;border:1px solid rgba(94,122,196,.15);border-radius:32px;z-index:-1}
    .h-school-img{width:100%;height:100%;border-radius:20px;background:linear-gradient(160deg,rgba(255,255,255,.06),rgba(94,122,196,.1));border:1px solid rgba(255,255,255,.1);display:flex;flex-direction:column;align-items:center;justify-content:center;color:rgba(255,255,255,.35);gap:12px;font-size:.9rem}
    .h-school-img .big-icon{font-size:4rem;opacity:.4}
    .fc{position:absolute;background:var(--white);border-radius:var(--radius-sm);padding:14px 20px;box-shadow:var(--shadow-md)}
    .fc.f1{bottom:60px;left:-50px}
    .fc.f2{top:60px;right:-40px}
    .fc .ct{font-size:.78rem;color:var(--text-light);margin-bottom:4px}
    .fc .cv{font-family:'Playfair Display',serif;font-size:1.3rem;color:var(--navy);font-weight:700}
    .stars{color:var(--gold);font-size:.95rem;letter-spacing:2px}

    /* =============================================
    MARQUEE
    ============================================= */
    .mq{background:var(--gold);padding:14px 0;overflow:hidden}
    .mq-t{display:flex;gap:48px;white-space:nowrap;animation:mq 35s linear infinite}
    .mq-t span{color:var(--navy);font-weight:700;font-size:.85rem;letter-spacing:.05em;display:flex;align-items:center;gap:12px}
    .mq-t span::before{content:'Ã¢Ëœâ€¦';font-size:.7rem}
    @keyframes mq{from{transform:translateX(0)}to{transform:translateX(-50%)}}

    /* =============================================
    ABOUT
    ============================================= */
    .ab-imgs{position:relative}
    .ab-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
    .ab-img{border-radius:var(--radius-sm);overflow:hidden;background:var(--bg);aspect-ratio:1}
    .ab-img.tall{grid-row:span 2;aspect-ratio:auto}
    .ph{width:100%;height:100%;min-height:160px;display:flex;flex-direction:column;align-items:center;justify-content:center;font-size:2rem;gap:6px;color:var(--text-light)}
    .ph small{font-size:.75rem}
    .ab-badge{position:absolute;bottom:-16px;right:-16px;background:var(--navy);color:var(--white);padding:20px 24px;border-radius:var(--radius-sm);text-align:center;box-shadow:var(--shadow-md);z-index:1}
    .ab-badge .yr{font-family:'Playfair Display',serif;font-size:2.6rem;font-weight:800;color:var(--gold);line-height:1}
    .ab-badge .yl{font-size:.76rem;opacity:.7;margin-top:4px}
    .ab-feats{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:28px}
    .ab-feat{display:flex;gap:12px;align-items:flex-start;padding:16px;background:var(--bg);border-radius:var(--radius-sm);transition:var(--ease)}
    .ab-feat:hover{background:#e5edf7;transform:translateY(-2px)}
    .fi{width:40px;height:40px;background:rgba(94,122,196,.15);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0}
    .ft h4{font-size:.88rem;color:var(--navy);font-family:'Plus Jakarta Sans',sans-serif;font-weight:600;margin-bottom:2px}
    .ft p{font-size:.78rem;color:var(--text-light)}

    /* =============================================
    VISION MISSION
    ============================================= */
    #vm{background:linear-gradient(135deg,var(--navy) 0%,var(--navy-light) 100%);position:relative;overflow:hidden}
    #vm::before{content:'';position:absolute;inset:0;opacity:.04;background-image:radial-gradient(circle,white 1px,transparent 1px);background-size:40px 40px}
    .vm-c{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:var(--radius);padding:36px;position:relative;overflow:hidden;transition:var(--ease)}
    .vm-c:hover{background:rgba(255,255,255,.1);transform:translateY(-4px)}
    .vm-c::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gold)}
    .vm-ico{width:54px;height:54px;background:rgba(94,122,196,.15);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:18px}
    .vm-c h3{color:var(--gold);font-size:1.4rem;margin-bottom:14px}
    .vm-c p{color:rgba(255,255,255,.82);line-height:1.85}
    .mis-li li{color:rgba(255,255,255,.8);padding:8px 0;display:flex;gap:10px;border-bottom:1px solid rgba(255,255,255,.07)}
    .mis-li li:last-child{border:none}
    .mis-li li::before{content:'Ã¢Å“Â¦';color:var(--gold);font-size:.65rem;margin-top:5px;flex-shrink:0}

    /* =============================================
    PROGRAMS
    ============================================= */
    .pc{background:var(--white);border:1px solid #e3ebf7;border-radius:var(--radius);padding:32px;box-shadow:var(--shadow);transition:var(--ease);position:relative;overflow:hidden}
    .pc::after{content:'';position:absolute;bottom:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--navy),var(--gold));transform:scaleX(0);transform-origin:left;transition:var(--ease)}
    .pc:hover{transform:translateY(-8px);box-shadow:var(--shadow-md)}
    .pc:hover::after{transform:scaleX(1)}
    .pi{width:62px;height:62px;background:linear-gradient(135deg,var(--navy),var(--navy-light));border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:1.8rem;margin-bottom:18px}
    .pc h3{font-size:1.1rem;color:var(--navy);margin-bottom:10px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700}
    .pc p{color:var(--text-light);font-size:.9rem}
    .ptag{display:inline-block;margin-top:14px;padding:4px 12px;background:rgba(94,122,196,.1);color:var(--gold);border-radius:50px;font-size:.75rem;font-weight:600}

    /* =============================================
    NEWS
    ============================================= */
    .news-grid{display:grid;grid-template-columns:2fr 1fr 1fr;gap:24px}
    .nc{background:var(--white);border:1px solid #e3ebf7;border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow);transition:var(--ease)
    .nc:hover{transform:translateY(-6px);box-shadow:var(--shadow-md)}
    .ni2{overflow:hidden;background:var(--bg)}
    .nb{padding:22px}
    .nm{display:flex;gap:12px;margin-bottom:10px}
    .ncat{background:rgba(10,31,75,.08);color:var(--navy);padding:3px 10px;border-radius:50px;font-size:.72rem;font-weight:600}
    .ndate{font-size:.78rem;color:var(--text-light)}
    .nb h3{font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;color:var(--navy);margin-bottom:8px;font-size:1rem}
    .nc.feat .nb h3{font-family:'Playfair Display',serif;font-size:1.3rem}
    .nb p{color:var(--text-light);font-size:.88rem}
    .nrm{display:inline-flex;align-items:center;gap:6px;margin-top:14px;color:var(--gold);font-weight:600;font-size:.85rem;transition:var(--ease)}
    .nrm:hover{gap:10px}

    /* =============================================
    GALLERY PREVIEW
    ============================================= */
    .gal-grid{display:grid;grid-template-columns:repeat(4,1fr);grid-template-rows:200px 200px;gap:12px}
    .gi{border-radius:var(--radius-sm);overflow:hidden;position:relative;cursor:pointer}
    .gi:first-child{grid-row:span 2}
    .gi .ph{height:100%;transition:var(--ease)}
    .gi:nth-child(1) .ph{background:linear-gradient(135deg,#c8d8f0,#dce6f5)}
    .gi:nth-child(2) .ph{background:linear-gradient(135deg,#c8e0d4,#d8f0e8)}
    .gi:nth-child(3) .ph{background:linear-gradient(135deg,#e0d4c8,#f0e8d8)}
    .gi:nth-child(4) .ph{background:linear-gradient(135deg,#f0e0c8,#fcecd8)}
    .gi:nth-child(5) .ph{background:linear-gradient(135deg,#d4c8e0,#e8d8f0)}
    .gi:nth-child(6) .ph{background:linear-gradient(135deg,#c8dce0,#d8f0ee)}
    .gi:nth-child(7) .ph{background:linear-gradient(135deg,#e0e8c8,#f0f4d8)}
    .gov{position:absolute;inset:0;background:linear-gradient(to top,rgba(10,31,75,.85) 0%,transparent 60%);opacity:0;transition:var(--ease);display:flex;align-items:flex-end;padding:14px}
    .gi:hover .gov{opacity:1}
    .gi:hover .ph{transform:scale(1.06)}
    .gov span{color:var(--white);font-size:.82rem;font-weight:600}

    /* =============================================
    FOOTER
    ============================================= */
    #footer{background:var(--navy-dark);color:rgba(255,255,255,.75)}
    .ft-top{padding:70px 0 48px}
    .ft-grid{display:grid;grid-template-columns:2fr 1fr 1fr 1.5fr;gap:48px}
    .ft-brand p{font-size:.88rem;line-height:1.8;margin-top:14px}
    .ft-soc{display:flex;gap:10px;margin-top:18px}
    .sb{width:38px;height:38px;border-radius:10px;background:rgba(255,255,255,.07);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,.6);font-size:.85rem;font-weight:700;transition:var(--ease)}
    .sb:hover{background:var(--gold);color:var(--navy)}
    .fc2 h4{font-family:'Plus Jakarta Sans',sans-serif;font-size:.88rem;font-weight:700;color:var(--white);margin-bottom:16px;padding-bottom:10px;border-bottom:1px solid rgba(255,255,255,.08)}
    .fl li{margin-bottom:9px}
    .fl a{font-size:.86rem;transition:var(--ease);display:flex;align-items:center;gap:6px}
    .fl a:hover{color:var(--gold);padding-left:4px}
    .fl a::before{content:'Ã¢â‚¬Âº';color:var(--gold)}
    .fci{display:flex;gap:12px;margin-bottom:12px;font-size:.86rem}
    .fci .ic{font-size:1rem;flex-shrink:0;margin-top:2px}
    .ft-bot{border-top:1px solid rgba(255,255,255,.07);padding:20px 0;font-size:.8rem;display:flex;justify-content:space-between;align-items:center}

    /* =============================================
    BACK TO TOP
    ============================================= */
    #btt{position:fixed;bottom:28px;right:28px;width:44px;height:44px;background:var(--gold);color:var(--navy);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.2rem;font-weight:700;box-shadow:0 4px 16px rgba(94,122,196,.4);opacity:0;pointer-events:none;transition:var(--ease);z-index:999}
    #btt.show{opacity:1;pointer-events:all}
    #btt:hover{transform:translateY(-4px)}

    /* =============================================
    INNER PAGES
    ============================================= */
    .page-hdr{background:linear-gradient(135deg,var(--navy-dark),var(--navy));padding:140px 0 70px;text-align:center;position:relative;overflow:hidden;display:none}
    .page-hdr::before{content:'';position:absolute;inset:0;opacity:.05;background-image:radial-gradient(circle,white 1px,transparent 1px);background-size:50px 50px}
    .page-hdr.active{display:block}
    .page-hdr h1{color:var(--white);font-size:clamp(2rem,4vw,3rem);margin-bottom:12px;position:relative;z-index:2}
    .bc{display:flex;justify-content:center;gap:8px;font-size:.84rem;color:rgba(255,255,255,.5);position:relative;z-index:2}
    .bc .sep{color:var(--gold)}
    .bc .cur{color:var(--gold)}

    /* Profile page */
    .info-card{background:var(--white);border:1px solid #e3ebf7;border-radius:var(--radius);padding:32px;box-shadow:var(--shadow)}
    .itbl{width:100%;border-collapse:collapse}
    .itbl tr{border-bottom:1px solid var(--bg)}
    .itbl tr:last-child{border:none}
    .itbl td{padding:11px 8px;font-size:.9rem}
    .itbl td:first-child{color:var(--text-light);width:42%}
    .itbl td:last-child{color:var(--navy);font-weight:600}
    .principal{background:linear-gradient(135deg,var(--navy),var(--navy-light));border-radius:var(--radius);padding:28px;text-align:center;color:var(--white)}
    .p-av{width:80px;height:80px;border-radius:50%;background:rgba(94,122,196,.2);border:3px solid var(--gold);margin:0 auto 12px;display:flex;align-items:center;justify-content:center;font-size:2rem}
    .principal h3{color:var(--gold);margin-bottom:4px;font-size:1.05rem}
    .principal p{font-size:.82rem;opacity:.7}

    /* Org chart */
    .org{text-align:center;padding:16px 0}
    .on{display:inline-block;padding:12px 22px;background:var(--navy);color:var(--white);border-radius:var(--radius-sm);font-size:.85rem;font-weight:600;min-width:150px}
    .on.gold{background:var(--gold);color:var(--navy)}
    .on.lite{background:var(--bg);color:var(--navy);border:1px solid #dce6f5}
    .or{display:flex;justify-content:center;gap:16px;margin-top:14px;flex-wrap:wrap}
    .ol{width:2px;height:28px;background:var(--gold);margin:0 auto}

    /* Academic */
    .ac{background:var(--white);border:1px solid #e3ebf7;border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow);transition:var(--ease)}
    .ac:hover{transform:translateY(-6px);box-shadow:var(--shadow-md)}
    .ach{background:linear-gradient(135deg,var(--navy),var(--navy-light));padding:22px;display:flex;align-items:center;gap:14px}
    .ach .ico{font-size:1.8rem}
    .ach h3{color:var(--white);font-size:1.05rem}
    .ach p{color:rgba(255,255,255,.65);font-size:.8rem}
    .acb{padding:22px}
    .stag{display:inline-block;padding:5px 12px;margin:4px;background:var(--bg);color:var(--navy);border-radius:50px;font-size:.78rem;font-weight:500;border:1px solid #dce6f5;transition:var(--ease)}
    .stag:hover{background:var(--navy);color:var(--white)}
    .sched-wrap{overflow-x:auto;-webkit-overflow-scrolling:touch}
    .sched{width:100%;min-width:640px;border-collapse:collapse}
    .sched th{background:var(--navy);color:var(--white);padding:12px 16px;font-size:.84rem;font-weight:600;text-align:left}
    .sched th:first-child{border-radius:10px 0 0 0}
    .sched th:last-child{border-radius:0 10px 0 0}
    .sched td{padding:11px 16px;border-bottom:1px solid var(--bg);font-size:.88rem}
    .sched tr:last-child td{border:none}
    .sched tr:hover td{background:var(--bg)}

    /* News page */
    .nb-layout{display:grid;grid-template-columns:2fr 1fr;gap:36px}
    .flt{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:28px}
    .fbt{padding:8px 20px;border-radius:50px;font-size:.86rem;font-weight:600;background:var(--white);color:var(--text);box-shadow:var(--shadow);transition:var(--ease);border:2px solid transparent}
    .fbt:hover,.fbt.act{background:var(--navy);color:var(--white)}
    .ngrid{display:grid;grid-template-columns:1fr 1fr;gap:22px}
    .sbwid{display:flex;flex-direction:column;gap:14px}
    .sbi{display:flex;gap:12px;background:var(--white);border-radius:var(--radius-sm);padding:14px;box-shadow:var(--shadow);transition:var(--ease)}
    .sbi:hover{transform:translateY(-2px)}
    .sbico{width:70px;height:70px;border-radius:10px;background:var(--bg);display:flex;align-items:center;justify-content:center;font-size:1.6rem;flex-shrink:0}
    .sbtxt h4{font-size:.83rem;color:var(--navy);font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;margin-bottom:4px;line-height:1.4}
    .sbtxt span{font-size:.74rem;color:var(--text-light)}

    /* Gallery page */
    .gp-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
    .gp-item{aspect-ratio:4/3;border-radius:var(--radius-sm);overflow:hidden;position:relative;cursor:pointer}
    .gp-item .ph{height:100%;transition:var(--ease)}
    .gp-item:hover .ph{transform:scale(1.08)}
    .gp-item:hover .gov{opacity:1}

    /* Contact */
    .ct-grid{display:grid;grid-template-columns:1fr 1.5fr;gap:36px}
    .ct-info{background:linear-gradient(160deg,var(--navy),var(--navy-light));border-radius:var(--radius);padding:38px;color:var(--white)}
    .ct-info h3{color:var(--gold);font-size:1.35rem;margin-bottom:8px}
    .ct-info>p{opacity:.75;font-size:.88rem;margin-bottom:28px}
    .cti{display:flex;gap:14px;margin-bottom:22px}
    .ctico{width:46px;height:46px;background:rgba(94,122,196,.15);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0}
    .ctitxt h4{font-size:.8rem;opacity:.6;margin-bottom:4px}
    .ctitxt p{font-weight:600;font-size:.92rem}
    .ct-form{background:var(--white);border:1px solid #e3ebf7;border-radius:var(--radius);padding:38px;box-shadow:var(--shadow)}
    .fg{margin-bottom:18px}
    .fr{display:grid;grid-template-columns:1fr 1fr;gap:14px}
    .fg label{display:block;font-size:.85rem;font-weight:600;color:var(--navy);margin-bottom:6px}
    .fg input,.fg select,.fg textarea{width:100%;padding:11px 15px;border-radius:var(--radius-sm);border:1.5px solid #dce6f5;background:var(--bg);font-family:'Plus Jakarta Sans',sans-serif;font-size:.88rem;color:var(--text);transition:var(--ease)}
    .fg input:focus,.fg select:focus,.fg textarea:focus{outline:none;border-color:var(--navy);background:var(--white);box-shadow:0 0 0 4px rgba(10,31,75,.07)}
    .fg textarea{resize:vertical;min-height:110px}
    .map-ph{background:linear-gradient(135deg,#c8d8f0,#dce6f5);border-radius:var(--radius-sm);height:180px;margin-top:20px;display:flex;align-items:center;justify-content:center;color:var(--text-light);font-size:.88rem;gap:6px;flex-direction:column}

    /* FAQ */
    .faq-i{background:var(--bg);border-radius:var(--radius-sm);margin-bottom:10px;overflow:hidden}
    .faq-q{width:100%;padding:17px 22px;display:flex;justify-content:space-between;align-items:center;font-family:inherit;font-size:.93rem;font-weight:600;color:var(--navy);background:none;border:none;cursor:pointer;text-align:left;gap:12px}
    .faq-ico{font-size:1.2rem;transition:transform .3s;flex-shrink:0}
    .faq-a{max-height:0;overflow:hidden;transition:max-height .4s ease}
    .faq-a p{padding:0 22px 18px;color:var(--text-light);font-size:.9rem;line-height:1.8}

    /* Lightbox */
    #lb{position:fixed;inset:0;background:rgba(6,15,38,.95);z-index:9999;display:none;align-items:center;justify-content:center;flex-direction:column}
    #lb.open{display:flex}
    .lb-x{position:absolute;top:22px;right:26px;color:var(--white);font-size:2rem;cursor:pointer;opacity:.7;transition:var(--ease);background:none;border:none}
    .lb-x:hover{opacity:1;transform:rotate(90deg)}
    .lb-wrap{background:#1a2a4a;border-radius:var(--radius);width:600px;max-width:90vw;height:380px;display:flex;flex-direction:column;align-items:center;justify-content:center;font-size:3rem;gap:12px}
    .lb-wrap p{font-size:.88rem;color:rgba(255,255,255,.5)}
    #lb-cap{color:rgba(255,255,255,.7);margin-top:14px;font-size:.88rem}

    /* =============================================
    PAGE SECTIONS (shown/hidden)
    ============================================= */
    .page{display:none}
    .page.active{display:block;animation:pageIn .32s ease}
    @keyframes pageIn{from{opacity:.12;transform:translateY(8px)}to{opacity:1;transform:none}}

    /* =============================================
    RESPONSIVE
    ============================================= */
    @media(max-width:1024px){
    .grid-4{grid-template-columns:repeat(2,1fr)}
    .ft-grid{grid-template-columns:1fr 1fr;gap:28px}
    .news-grid{grid-template-columns:1fr 1fr}
    .news-grid .nc:first-child{grid-column:span 2}
    .gal-grid{grid-template-columns:repeat(3,1fr);grid-template-rows:auto}
    .gal-grid .gi:first-child{grid-row:span 1}
    .gp-grid{grid-template-columns:1fr 1fr}
    .nb-layout{grid-template-columns:1fr}
    .ct-grid{grid-template-columns:1fr}
    .fr{grid-template-columns:1fr}
    }
    @media(max-width:768px){
    .ni{padding:14px 20px}
    #nav.sc .ni{padding:10px 20px}
    .nav-links{display:none;position:fixed;inset:0 0 0 auto;width:min(300px,80vw);background:var(--navy);flex-direction:column;padding:100px 28px 28px;gap:4px;align-items:stretch;box-shadow:-8px 0 40px rgba(0,0,0,.3)}
    .nav-links.open{display:flex}
    .nl{padding:12px 16px;border-radius:10px;font-size:1rem}
    .nl-cta{margin-left:0}
    .hbg{display:flex}
    .grid-2{grid-template-columns:1fr}
    .grid-3{grid-template-columns:1fr}
    .grid-4{grid-template-columns:1fr 1fr}
    .h-stats{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
    .h-frame{display:none}
    .news-grid{grid-template-columns:1fr}
    .news-grid .nc:first-child{grid-column:span 1}
    .gal-grid{grid-template-columns:1fr 1fr;grid-template-rows:auto}
    .gal-grid .gi:first-child{grid-column:span 2}
    .ft-grid{grid-template-columns:1fr;gap:24px}
    .ft-bot{flex-direction:column;gap:6px;text-align:center}
    .ab-badge{position:static;margin-top:14px;display:inline-block}
    .ab-feats{grid-template-columns:1fr}
    .gp-grid{grid-template-columns:1fr 1fr}
    .ngrid{grid-template-columns:1fr}
    .sec{padding:60px 0}
    .sched{min-width:560px}
    }
    @media(max-width:480px){
    .grid-4{grid-template-columns:1fr}
    .gp-grid{grid-template-columns:1fr}
    }
    </style>
    </head>
    <body>

    <!-- ================================================
        NAVBAR
        ================================================ -->
    <nav id="nav">
    <div class="ni">
        <a class="logo" href="#" onclick="showPage('home')">
        <div class="logo-ico">SDN</div>
        <div class="logo-txt">
            <div class="sn">SD Negeri 3 Srikandang</div>
            <div class="ss">Jepara, Jawa Tengah</div>
        </div>
        </a>
        <ul class="nav-links" id="navLinks">
        <li><a class="nl act" href="#" onclick="showPage('home')">Beranda</a></li>
        <li><a class="nl" href="#" onclick="showPage('profil')">Profil</a></li>
        <li><a class="nl" href="#" onclick="showPage('akademik')">Akademik</a></li>
        <li><a class="nl" href="#" onclick="showPage('berita')">Berita</a></li>
        <li><a class="nl" href="#" onclick="showPage('galeri')">Galeri</a></li>
        <li><a class="nl nl-cta btn btn-gold" href="#" onclick="showPage('kontak')">Kontak</a></li>
        </ul>
        <button class="hbg" id="hbg" onclick="toggleMenu()"><span></span><span></span><span></span></button>
    </div>
    </nav>

    <!-- ================================================
        HOME PAGE
        ================================================ -->
    <div class="page active" id="page-home">

    <!-- HERO -->
    <section id="hero">
        <div class="h-pat"></div>
        <div class="h-blob h-blob-1"></div>
        <div class="h-blob h-blob-2"></div>
        <div class="container">
        <div class="grid-2">
            <div class="h-con">
            <div class="h-badge"><span></span>Selamat Datang di SDN 3 Srikandang</div>
            <h1 class="h-title">Sekolah <span>Unggul</span>,<br>Generasi Gemilang</h1>
            <p class="h-sub">Mendidik dengan hati, membangun karakter bangsa. SD Negeri 3 Srikandang hadir memberikan pendidikan berkualitas di Kabupaten Jepara.</p>
            <div class="h-btns">
                <a href="#" class="btn btn-gold" onclick="showPage('profil')">Profil Sekolah â†’</a>
                <a href="#" class="btn btn-outline" onclick="showPage('kontak')">Hubungi Kami</a>
            </div>
            <div class="h-stats">
                <div><div class="st-n" data-count="25" data-sfx="+">0</div><div class="st-l">Tahun Berdiri</div></div>
                <div><div class="st-n" data-count="312">0</div><div class="st-l">Siswa Aktif</div></div>
                <div><div class="st-n" data-count="18">0</div><div class="st-l">Tenaga Pengajar</div></div>
                <div><div class="st-n" data-count="12">0</div><div class="st-l">Ekstrakurikuler</div></div>
            </div>
            </div>
            <div class="h-img-side">
            <div class="h-frame">
                <div class="h-school-img">
                <div class="big-icon">ðŸ«</div>
                <span>SD Negeri 3 Srikandang</span>
                </div>
                <div class="fc f1"><div class="ct">Akreditasi</div><div class="cv">A</div><div class="stars">â˜…â˜…â˜…â˜…â˜…</div></div>
                <div class="fc f2"><div class="ct">Berdiri</div><div class="cv">1999</div></div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- MARQUEE -->
    <div class="mq">
        <div class="mq-t">
        <span>PPDB 2025/2026 Telah Dibuka</span><span>Kurikulum Merdeka Belajar</span>
        <span>Akreditasi A â€“ BAN-S/M</span><span>Pendaftaran Online Tersedia</span>
        <span>Program: Hafidz Â· Pramuka Â· Seni Budaya Â· Coding</span>
        <span>PPDB 2025/2026 Telah Dibuka</span><span>Kurikulum Merdeka Belajar</span>
        <span>Akreditasi A â€“ BAN-S/M</span><span>Pendaftaran Online Tersedia</span>
        <span>Program: Hafidz Â· Pramuka Â· Seni Budaya Â· Coding</span>
        </div>
    </div>

    <!-- ABOUT -->
    <section class="sec sec-alt">
        <div class="container">
        <div class="grid-2">
            <div class="ab-imgs rv">
            <div class="ab-grid">
                <div class="ab-img tall"><div class="ph" style="background:linear-gradient(135deg,#c8d8f0,#dce6f5)"><span style="font-size:2.5rem">ðŸ“š</span><small>Kegiatan Belajar</small></div></div>
                <div class="ab-img"><div class="ph" style="background:linear-gradient(135deg,#d4e8d0,#e4f4e0)"><span style="font-size:2rem">ðŸ«</span><small>Gedung</small></div></div>
                <div class="ab-img"><div class="ph" style="background:linear-gradient(135deg,#e8d8c8,#f4e8d8)"><span style="font-size:2rem">ðŸŽ¨</span><small>Seni</small></div></div>
            </div>
            <div class="ab-badge"><div class="yr">25+</div><div class="yl">Tahun Pengabdian</div></div>
            </div>
            <div class="rv d2">
            <span class="label">Tentang Kami</span>
            <h2 class="sec-title">Mengenal SDN 3 Srikandang</h2>
            <p class="desc" style="margin-bottom:20px">SD Negeri 3 Srikandang berlokasi di Desa Srikandang, Kecamatan Bangsri, Kabupaten Jepara. Berdiri sejak 1999, kami berkomitmen memberikan pendidikan berkualitas dengan pendekatan karakter dan nilai-nilai kebangsaan.</p>
            <p style="color:var(--text-light);margin-bottom:24px">Dengan tenaga pengajar berpengalaman dan fasilitas yang terus berkembang, kami hadir untuk mencetak generasi penerus bangsa yang cerdas, beriman, dan berakhlak mulia.</p>
            <div class="ab-feats">
                <div class="ab-feat"><div class="fi">ðŸ†</div><div class="ft"><h4>Akreditasi A</h4><p>Diakui oleh BAN-S/M</p></div></div>
                <div class="ab-feat"><div class="fi">ðŸ‘©â€ðŸ«</div><div class="ft"><h4>18 Guru Profesional</h4><p>Berpengalaman & berdedikasi</p></div></div>
                <div class="ab-feat"><div class="fi">ðŸ“±</div><div class="ft"><h4>Lab. Komputer</h4><p>30 unit PC + internet</p></div></div>
                <div class="ab-feat"><div class="fi">ðŸŒ¿</div><div class="ft"><h4>Adiwiyata</h4><p>Sekolah Ramah Lingkungan</p></div></div>
            </div>
            <a href="#" class="btn btn-navy" style="margin-top:24px" onclick="showPage('profil')">Selengkapnya â†’</a>
            </div>
        </div>
        </div>
    </section>

    <!-- VISION MISSION -->
    <section id="vm" class="sec">
        <div class="container">
        <div class="center rv" style="margin-bottom:44px">
            <span class="label">Arah & Tujuan</span>
            <h2 class="sec-title" style="color:var(--white)">Visi & Misi</h2>
        </div>
        <div class="grid-2">
            <div class="vm-c rv">
            <div class="vm-ico">Ã°Å¸Å½Â¯</div>
            <h3>Visi</h3>
            <p>"Terwujudnya peserta didik yang berakhlak mulia, cerdas, terampil, mandiri, dan berwawasan lingkungan berlandaskan iman dan taqwa."</p>
            </div>
            <div class="vm-c rv d2">
            <div class="vm-ico">Ã°Å¸Å¡â‚¬</div>
            <h3>Misi</h3>
            <ul class="mis-li">
                <li>Menyelenggarakan pendidikan agama dan pembinaan akhlak mulia</li>
                <li>Meningkatkan mutu pembelajaran berbasis Kurikulum Merdeka</li>
                <li>Mengembangkan potensi siswa melalui kegiatan akademik & non-akademik</li>
                <li>Membangun budaya sekolah yang demokratis, disiplin, dan berkarakter</li>
                <li>Menjalin kemitraan dengan orang tua, masyarakat, dan pemerintah</li>
            </ul>
            </div>
        </div>
        </div>
    </section>

    <!-- PROGRAMS -->
    <section class="sec" style="background:var(--bg)">
        <div class="container">
        <div class="center rv" style="margin-bottom:44px">
            <span class="label">Keunggulan Kami</span>
            <h2 class="sec-title">Program Unggulan</h2>
            <p class="desc">Berbagai program unggulan untuk mengembangkan potensi siswa secara holistik.</p>
        </div>
        <div class="grid-3">
            <div class="pc rv"><div class="pi">Ã°Å¸â€œâ€“</div><h3>Hafidz Qur'an</h3><p>Program tahfidz Al-Qur'an dengan metode menyenangkan, dibimbing ustadz/ustadzah berpengalaman.</p><span class="ptag">Unggulan</span></div>
            <div class="pc rv d1"><div class="pi">Ã°Å¸â€Â¬</div><h3>Sains & Teknologi</h3><p>Pembelajaran sains terapan dengan lab mini dan program coding dasar untuk kelas 4â€“6.</p><span class="ptag">Inovatif</span></div>
            <div class="pc rv d2"><div class="pi">Ã°Å¸Å½Â­</div><h3>Seni & Budaya</h3><p>Tari tradisional, musik angklung, dan seni lukis batik khas Jepara untuk melestarikan budaya.</p><span class="ptag">Kearifan Lokal</span></div>
            <div class="pc rv d1"><div class="pi">Ã¢Å¡Â½</div><h3>Olahraga Prestasi</h3><p>Latihan olahraga intensif: sepak bola, bulu tangkis, atletik, dan pencak silat.</p><span class="ptag">Prestasi</span></div>
            <div class="pc rv d2"><div class="pi">Ã°Å¸Å’Â±</div><h3>Adiwiyata</h3><p>Berkebun, daur ulang sampah, dan hemat energi untuk membentuk karakter peduli lingkungan.</p><span class="ptag">Go Green</span></div>
            <div class="pc rv d3"><div class="pi">Ã°Å¸Â¦Âº</div><h3>Pramuka</h3><p>Kegiatan kepramukaan membentuk karakter disiplin, tangguh, dan jiwa kepemimpinan sejak dini.</p><span class="ptag">Karakter</span></div>
        </div>
        </div>
    </section>

    <!-- NEWS -->
    <section class="sec sec-alt">
        <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:36px">
            <div class="rv"><span class="label">Informasi Terkini</span><h2 class="sec-title">Berita & Pengumuman</h2></div>
            <a href="#" class="btn btn-navy rv" onclick="showPage('berita')">Lihat Semua Ã¢â€ â€™</a>
        </div>
        <div class="news-grid">
            <div class="nc feat rv">
            <div class="ni2" style="aspect-ratio:16/9;background:linear-gradient(135deg,#c8d8f0,#dce6f5);display:flex;align-items:center;justify-content:center;font-size:3rem;min-height:220px">Ã°Å¸â€œÂ°</div>
            <div class="nb">
                <div class="nm"><span class="ncat">Pengumuman</span><span class="ndate">20 Januari 2025</span></div>
                <h3>PPDB Tahun Ajaran 2025/2026 Resmi Dibuka</h3>
                <p>SD Negeri 3 Srikandang membuka pendaftaran PPDB mulai 3 Februari 2025 secara online maupun langsung ke sekolah.</p>
                <a class="nrm" href="#">Baca selengkapnya Ã¢â€ â€™</a>
            </div>
            </div>
            <div class="nc rv d1">
            <div class="ni2" style="aspect-ratio:16/10;background:linear-gradient(135deg,#f8e8c0,#faf4d8);display:flex;align-items:center;justify-content:center;font-size:2.5rem;min-height:140px">Ã°Å¸Â¥â€¡</div>
            <div class="nb">
                <div class="nm"><span class="ncat">Prestasi</span><span class="ndate">15 Jan 2025</span></div>
                <h3>Juara 1 Olimpiade Matematika Tingkat Kabupaten</h3>
                <p>Dua siswa kelas 6 meraih juara pertama Olimpiade Matematika SD se-Kabupaten Jepara.</p>
                <a class="nrm" href="#">Baca Ã¢â€ â€™</a>
            </div>
            </div>
            <div class="nc rv d2">
            <div class="ni2" style="aspect-ratio:16/10;background:linear-gradient(135deg,#c8e0d4,#d8f0e8);display:flex;align-items:center;justify-content:center;font-size:2.5rem;min-height:140px">Ã°Å¸Å’Â¿</div>
            <div class="nb">
                <div class="nm"><span class="ncat">Kegiatan</span><span class="ndate">10 Jan 2025</span></div>
                <h3>Sekolah Raih Penghargaan Adiwiyata Kabupaten</h3>
                <p>Komitmen lingkungan hidup mendapat pengakuan resmi dari pemerintah Kabupaten Jepara.</p>
                <a class="nrm" href="#">Baca Ã¢â€ â€™</a>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- GALLERY PREVIEW -->
    <section class="sec" style="background:var(--bg)">
        <div class="container">
        <div class="center rv" style="margin-bottom:36px">
            <span class="label">Momen Berharga</span>
            <h2 class="sec-title">Galeri Foto</h2>
            <p class="desc">Abadikan setiap momen kebersamaan dan prestasi di SDN 3 Srikandang.</p>
        </div>
        <div class="gal-grid rv">
            <div class="gi"><div class="ph"><span style="font-size:2.5rem">Ã°Å¸ÂÂ«</span><small>Gedung Sekolah</small></div><div class="gov"><span>Gedung Sekolah</span></div></div>
            <div class="gi"><div class="ph"><span style="font-size:2rem">Ã°Å¸Å½â€°</span><small>Upacara</small></div><div class="gov"><span>Upacara Bendera</span></div></div>
            <div class="gi"><div class="ph"><span style="font-size:2rem">Ã°Å¸â€œÅ¡</span><small>Belajar</small></div><div class="gov"><span>Kegiatan Belajar</span></div></div>
            <div class="gi"><div class="ph"><span style="font-size:2rem">Ã¢Å¡Â½</span><small>Olahraga</small></div><div class="gov"><span>Olahraga</span></div></div>
            <div class="gi"><div class="ph"><span style="font-size:2rem">Ã°Å¸Å½Â¨</span><small>Seni</small></div><div class="gov"><span>Seni & Budaya</span></div></div>
            <div class="gi"><div class="ph"><span style="font-size:2rem">Ã°Å¸Å’Â±</span><small>Adiwiyata</small></div><div class="gov"><span>Adiwiyata</span></div></div>
            <div class="gi"><div class="ph"><span style="font-size:2rem">Ã°Å¸Ââ€ </span><small>Prestasi</small></div><div class="gov"><span>Prestasi Siswa</span></div></div>
        </div>
        <div class="center" style="margin-top:28px"><a href="#" class="btn btn-navy" onclick="showPage('galeri')">Lihat Semua Foto Ã¢â€ â€™</a></div>
        </div>
    </section>
    </div><!-- end page-home -->

    <!-- ================================================
        PROFIL PAGE
        ================================================ -->
    <div class="page" id="page-profil">
    <div class="page-hdr active">
        <div class="container"><h1>Profil Sekolah</h1>
        <div class="bc"><a href="#" onclick="showPage('home')">Beranda</a><span class="sep">Ã¢â‚¬Âº</span><span class="cur">Profil</span></div></div>
    </div>
    <section class="sec sec-alt">
        <div class="container">
        <div class="grid-2">
            <div class="rv">
            <span class="label">Data Sekolah</span>
            <h2 class="sec-title">Informasi Sekolah</h2>
            <div class="info-card">
                <table class="itbl">
                <tr><td>Nama Sekolah</td><td>SD Negeri 3 Srikandang</td></tr>
                <tr><td>NPSN</td><td>20318542</td></tr>
                <tr><td>Status</td><td>Negeri</td></tr>
                <tr><td>Akreditasi</td><td>A (Unggul)</td></tr>
                <tr><td>Tahun Berdiri</td><td>1999</td></tr>
                <tr><td>Kurikulum</td><td>Kurikulum Merdeka</td></tr>
                <tr><td>Desa</td><td>Srikandang</td></tr>
                <tr><td>Kecamatan</td><td>Bangsri</td></tr>
                <tr><td>Kabupaten</td><td>Jepara</td></tr>
                <tr><td>Provinsi</td><td>Jawa Tengah</td></tr>
                <tr><td>Kode Pos</td><td>59453</td></tr>
                <tr><td>Telepon</td><td>(0291) 123456</td></tr>
                <tr><td>Email</td><td>sdn3srikandang@gmail.com</td></tr>
                </table>
            </div>
            </div>
            <div class="rv d2">
            <div class="principal" style="margin-bottom:20px">
                <div class="p-av">Ã°Å¸â€˜Â¤</div>
                <h3>Budi Santoso, S.Pd., M.Pd.</h3>
                <p>Kepala Sekolah</p>
                <p style="margin-top:14px;font-size:.82rem;opacity:.75;line-height:1.8">"Bersama membangun pendidikan berkualitas untuk generasi emas Indonesia."</p>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
                <div style="border-radius:var(--radius-sm);overflow:hidden"><div class="ph" style="background:linear-gradient(135deg,#c8d8f0,#dce6f5);min-height:140px"><span style="font-size:2rem">Ã°Å¸ÂÂ«</span><small>Gedung Utama</small></div></div>
                <div style="border-radius:var(--radius-sm);overflow:hidden"><div class="ph" style="background:linear-gradient(135deg,#c8e0d4,#d8f0e8);min-height:140px"><span style="font-size:2rem">Ã°Å¸Å’Â³</span><small>Lingkungan</small></div></div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <section id="vm" class="sec">
        <div class="container">
        <div class="center rv" style="margin-bottom:40px"><span class="label">Arah & Tujuan</span><h2 class="sec-title" style="color:var(--white)">Visi & Misi</h2></div>
        <div class="grid-2">
            <div class="vm-c rv"><div class="vm-ico">Ã°Å¸Å½Â¯</div><h3>Visi</h3><p>"Terwujudnya peserta didik yang berakhlak mulia, cerdas, terampil, mandiri, dan berwawasan lingkungan berlandaskan iman dan taqwa."</p></div>
            <div class="vm-c rv d2"><div class="vm-ico">Ã°Å¸Å¡â‚¬</div><h3>Misi</h3><ul class="mis-li">
            <li>Menyelenggarakan pendidikan agama dan pembinaan akhlak mulia</li>
            <li>Meningkatkan mutu pembelajaran berbasis Kurikulum Merdeka</li>
            <li>Mengembangkan potensi akademik & non-akademik siswa</li>
            <li>Membangun budaya sekolah yang disiplin dan berkarakter</li>
            <li>Menciptakan lingkungan sekolah yang bersih dan kondusif</li>
            <li>Menjalin kemitraan dengan orang tua dan masyarakat</li>
            </ul></div>
        </div>
        </div>
    </section>

    <section class="sec sec-alt">
        <div class="container">
        <div class="center rv" style="margin-bottom:40px"><span class="label">Struktur Organisasi</span><h2 class="sec-title">Kepengurusan Sekolah</h2></div>
        <div class="org rv">
            <div class="on gold">Ã°Å¸Ââ€º Kepala Sekolah</div><div class="ol"></div>
            <div class="or"><div class="on">Wakil Kepala</div><div class="on">Komite Sekolah</div><div class="on">Tata Usaha</div></div>
            <div class="ol"></div>
            <div class="or"><div class="on lite">Koor. Kurikulum</div><div class="on lite">Koor. Kesiswaan</div><div class="on lite">Koor. Sarana</div><div class="on lite">Koor. Humas</div></div>
            <div class="ol"></div>
            <div class="or"><div class="on lite" style="min-width:110px">Guru Kelas I</div><div class="on lite" style="min-width:110px">Guru Kelas II</div><div class="on lite" style="min-width:110px">Guru Kelas III</div><div class="on lite" style="min-width:110px">Guru Kelas IV</div><div class="on lite" style="min-width:110px">Guru Kelas V</div><div class="on lite" style="min-width:110px">Guru Kelas VI</div></div>
        </div>
        </div>
    </section>

    <section class="sec" style="background:var(--bg)">
        <div class="container">
        <div class="center rv" style="margin-bottom:40px"><span class="label">Fasilitas</span><h2 class="sec-title">Sarana & Prasarana</h2></div>
        <div class="grid-4">
            <div class="pc rv"><div class="pi">Ã°Å¸ÂÂ«</div><h3>Ruang Kelas</h3><p>12 ruang kelas representatif</p><span class="ptag">12 Ruang</span></div>
            <div class="pc rv d1"><div class="pi">Ã°Å¸â€™Â»</div><h3>Lab. Komputer</h3><p>30 unit PC + internet broadband</p><span class="ptag">30 Unit</span></div>
            <div class="pc rv d2"><div class="pi">Ã°Å¸â€œÅ¡</div><h3>Perpustakaan</h3><p>5.000+ koleksi buku</p><span class="ptag">5000+ Buku</span></div>
            <div class="pc rv d3"><div class="pi">Ã°Å¸â€Â¬</div><h3>Lab. IPA</h3><p>Laboratorium sains lengkap</p><span class="ptag">Lengkap</span></div>
            <div class="pc rv"><div class="pi">Ã¢â€ºÂª</div><h3>Musholla</h3><p>Tempat ibadah yang bersih</p><span class="ptag">Nyaman</span></div>
            <div class="pc rv d1"><div class="pi">Ã°Å¸ÂÆ’</div><h3>Lapangan</h3><p>Multifungsi untuk olahraga</p><span class="ptag">Multifungsi</span></div>
            <div class="pc rv d2"><div class="pi">Ã°Å¸ÂÂ½</div><h3>Kantin Sehat</h3><p>Menu bergizi dan higienis</p><span class="ptag">Higienis</span></div>
            <div class="pc rv d3"><div class="pi">Ã°Å¸ÂÂ¥</div><h3>UKS</h3><p>Unit kesehatan sekolah</p><span class="ptag">Siaga</span></div>
        </div>
        </div>
    </section>
    </div>

    <!-- ================================================
        AKADEMIK PAGE
        ================================================ -->
    <div class="page" id="page-akademik">
    <div class="page-hdr active">
        <div class="container"><h1>Akademik</h1>
        <div class="bc"><a href="#" onclick="showPage('home')">Beranda</a><span class="sep">Ã¢â‚¬Âº</span><span class="cur">Akademik</span></div></div>
    </div>
    <section class="sec sec-alt">
        <div class="container">
        <div class="center rv" style="margin-bottom:40px"><span class="label">Kurikulum</span><h2 class="sec-title">Kurikulum Merdeka Belajar</h2></div>
        <div class="grid-3">
            <div class="ac rv"><div class="ach"><div class="ico">Ã°Å¸â€œËœ</div><div><h3>Kelas Rendah</h3><p>Kelas I â€“ III</p></div></div><div class="acb"><p style="font-size:.86rem;color:var(--text-light);margin-bottom:12px">Fokus pada literasi, numerasi, dan karakter dasar siswa.</p><div><span class="stag">Bahasa Indonesia</span><span class="stag">Matematika</span><span class="stag">Pendidikan Pancasila</span><span class="stag">PJOK</span><span class="stag">Pend. Agama</span><span class="stag">Seni Budaya</span></div></div></div>
            <div class="ac rv d1"><div class="ach"><div class="ico">Ã°Å¸â€œâ€”</div><div><h3>Kelas Menengah</h3><p>Kelas IV â€“ V</p></div></div><div class="acb"><p style="font-size:.86rem;color:var(--text-light);margin-bottom:12px">Penguatan literasi, numerasi, dan ilmu pengetahuan alam-sosial.</p><div><span class="stag">Bahasa Indonesia</span><span class="stag">Matematika</span><span class="stag">IPAS</span><span class="stag">Pend. Pancasila</span><span class="stag">Pend. Agama</span><span class="stag">PJOK</span><span class="stag">Bhs. Inggris</span><span class="stag">Seni Budaya</span></div></div></div>
            <div class="ac rv d2"><div class="ach"><div class="ico">Ã°Å¸â€œâ€¢</div><div><h3>Kelas Akhir</h3><p>Kelas VI</p></div></div><div class="acb"><p style="font-size:.86rem;color:var(--text-light);margin-bottom:12px">Persiapan ujian akhir dan pendalaman seluruh mata pelajaran.</p><div><span class="stag">Bahasa Indonesia</span><span class="stag">Matematika</span><span class="stag">IPAS</span><span class="stag">Pend. Pancasila</span><span class="stag">Pend. Agama</span><span class="stag">PJOK</span><span class="stag">Bhs. Inggris</span><span class="stag">Seni Budaya</span><span class="stag">Mulok</span></div></div></div>
        </div>
        </div>
    </section>
    <section class="sec" style="background:var(--bg)">
        <div class="container">
        <div class="center rv" style="margin-bottom:36px"><span class="label">Jadwal</span><h2 class="sec-title">Jadwal Belajar</h2></div>
        <div class="rv" style="background:var(--white);border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow)">
            <div class="sched-wrap"><table class="sched">
            <thead><tr><th>Hari</th><th>Jam Masuk</th><th>Istirahat</th><th>Jam Pulang</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td>Senin</td><td>07.00</td><td>09.30â€“10.00</td><td>13.00</td><td>Upacara Bendera</td></tr>
                <tr><td>Selasa</td><td>07.00</td><td>09.30â€“10.00</td><td>13.00</td><td>â€“</td></tr>
                <tr><td>Rabu</td><td>07.00</td><td>09.30â€“10.00</td><td>13.00</td><td>â€“</td></tr>
                <tr><td>Kamis</td><td>07.00</td><td>09.30â€“10.00</td><td>13.00</td><td>â€“</td></tr>
                <tr><td>Jumat</td><td>07.00</td><td>â€“</td><td>11.30</td><td>Jumat Sehat / Senam</td></tr>
                <tr><td>Sabtu</td><td>07.00</td><td>â€“</td><td>11.30</td><td>Ekstrakurikuler</td></tr>
            </tbody>
            </table></div>
        </div>
        </div>
    </section>
    <section class="sec sec-alt">
        <div class="container">
        <div class="center rv" style="margin-bottom:40px"><span class="label">Pengembangan Diri</span><h2 class="sec-title">Ekstrakurikuler</h2></div>
        <div class="grid-4">
            <div class="pc rv" style="text-align:center"><div class="pi" style="margin:0 auto 16px">Ã¢Å¡Â½</div><h3>Sepak Bola</h3><p>Sabtu 08.00â€“10.00</p><span class="ptag">Olahraga</span></div>
            <div class="pc rv d1" style="text-align:center"><div class="pi" style="margin:0 auto 16px">Ã°Å¸ÂÂ¸</div><h3>Bulu Tangkis</h3><p>Sabtu 08.00â€“10.00</p><span class="ptag">Olahraga</span></div>
            <div class="pc rv d2" style="text-align:center"><div class="pi" style="margin:0 auto 16px">Ã°Å¸Å½Â­</div><h3>Tari Tradisional</h3><p>Rabu 13.00â€“14.30</p><span class="ptag">Seni</span></div>
            <div class="pc rv d3" style="text-align:center"><div class="pi" style="margin:0 auto 16px">Ã°Å¸Å½Âµ</div><h3>Angklung</h3><p>Kamis 13.00â€“14.30</p><span class="ptag">Musik</span></div>
            <div class="pc rv" style="text-align:center"><div class="pi" style="margin:0 auto 16px">Ã°Å¸Â¦Âº</div><h3>Pramuka</h3><p>Sabtu 10.00â€“12.00</p><span class="ptag">Karakter</span></div>
            <div class="pc rv d1" style="text-align:center"><div class="pi" style="margin:0 auto 16px">Ã°Å¸â€œâ€“</div><h3>Tahfidz Qur'an</h3><p>Setiap Hari 06.30</p><span class="ptag">Agama</span></div>
            <div class="pc rv d2" style="text-align:center"><div class="pi" style="margin:0 auto 16px">Ã°Å¸Å½Â¨</div><h3>Melukis / Kaligrafi</h3><p>Jumat 13.00â€“14.30</p><span class="ptag">Seni</span></div>
            <div class="pc rv d3" style="text-align:center"><div class="pi" style="margin:0 auto 16px">Ã°Å¸â€™Â»</div><h3>Coding Dasar</h3><p>Rabu 13.00â€“14.30</p><span class="ptag">Teknologi</span></div>
        </div>
        </div>
    </section>
    <section id="vm" class="sec">
        <div class="container">
        <div class="center rv" style="margin-bottom:40px"><span class="label">Kebanggaan</span><h2 class="sec-title" style="color:var(--white)">Prestasi Siswa</h2></div>
        <div class="grid-3">
            <div class="vm-c rv"><div class="vm-ico">Ã°Å¸Â¥â€¡</div><h3>Olimpiade Matematika</h3><p>Juara 1 Tingkat Kabupaten Jepara â€“ 2024</p></div>
            <div class="vm-c rv d1"><div class="vm-ico">Ã°Å¸Ââ€ </div><h3>O2SN Atletik</h3><p>Juara 2 Lari 100m Tingkat Kabupaten â€“ 2024</p></div>
            <div class="vm-c rv d2"><div class="vm-ico">Ã°Å¸Å½Â¨</div><h3>FLS2N Tari</h3><p>Juara 1 Tari Tradisional Tingkat Kabupaten â€“ 2024</p></div>
            <div class="vm-c rv"><div class="vm-ico">Ã°Å¸â€œâ€“</div><h3>Hafidz Qur'an</h3><p>Juara 1 MTQ Hafidz 1 Juz Tingkat Kecamatan â€“ 2024</p></div>
            <div class="vm-c rv d1"><div class="vm-ico">Ã°Å¸â€Â¬</div><h3>KIR Lingkungan</h3><p>Juara 3 Karya Ilmiah Tingkat Kabupaten â€“ 2024</p></div>
            <div class="vm-c rv d2"><div class="vm-ico">Ã°Å¸Ââ€¦</div><h3>Jambore Pramuka</h3><p>Juara 1 Jambore Tingkat Kecamatan â€“ 2023</p></div>
        </div>
        </div>
    </section>
    </div>

    <!-- ================================================
        BERITA PAGE
        ================================================ -->
    <div class="page" id="page-berita">
    <div class="page-hdr active">
        <div class="container"><h1>Berita & Pengumuman</h1>
        <div class="bc"><a href="#" onclick="showPage('home')">Beranda</a><span class="sep">Ã¢â‚¬Âº</span><span class="cur">Berita</span></div></div>
    </div>
    <section class="sec" style="background:var(--bg)">
        <div class="container">
        <div class="nb-layout">
            <div>
            <div class="flt rv">
                <button class="fbt act" data-f="all">Semua</button>
                <button class="fbt" data-f="pengumuman">Pengumuman</button>
                <button class="fbt" data-f="prestasi">Prestasi</button>
                <button class="fbt" data-f="kegiatan">Kegiatan</button>
                <button class="fbt" data-f="ppdb">PPDB</button>
            </div>
            <div class="ngrid" id="news-items">
                <div class="nc rv" data-cat="ppdb"><div class="ni2" style="background:linear-gradient(135deg,#c8d8f0,#dce6f5);height:160px;display:flex;align-items:center;justify-content:center;font-size:2.5rem">Ã°Å¸â€œÂ</div><div class="nb"><div class="nm"><span class="ncat">PPDB</span><span class="ndate">20 Jan 2025</span></div><h3>PPDB 2025/2026 Resmi Dibuka</h3><p>Pendaftaran dibuka mulai 3 Februari secara online maupun langsung ke sekolah.</p><a class="nrm" href="#">Baca Ã¢â€ â€™</a></div></div>
                <div class="nc rv d1" data-cat="prestasi"><div class="ni2" style="background:linear-gradient(135deg,#f8e8c0,#faf4d8);height:160px;display:flex;align-items:center;justify-content:center;font-size:2.5rem">Ã°Å¸Â¥â€¡</div><div class="nb"><div class="nm"><span class="ncat">Prestasi</span><span class="ndate">15 Jan 2025</span></div><h3>Juara 1 Olimpiade Matematika Kabupaten</h3><p>Dua siswa kelas 6 meraih juara pertama tingkat kabupaten.</p><a class="nrm" href="#">Baca Ã¢â€ â€™</a></div></div>
                <div class="nc rv" data-cat="kegiatan"><div class="ni2" style="background:linear-gradient(135deg,#c8e0d4,#d8f0e8);height:160px;display:flex;align-items:center;justify-content:center;font-size:2.5rem">Ã°Å¸Å’Â¿</div><div class="nb"><div class="nm"><span class="ncat">Kegiatan</span><span class="ndate">10 Jan 2025</span></div><h3>Raih Penghargaan Adiwiyata 2024</h3><p>Komitmen lingkungan mendapat pengakuan resmi dari pemerintah.</p><a class="nrm" href="#">Baca Ã¢â€ â€™</a></div></div>
                <div class="nc rv d1" data-cat="pengumuman"><div class="ni2" style="background:linear-gradient(135deg,#d4c8e0,#e8d8f0);height:160px;display:flex;align-items:center;justify-content:center;font-size:2.5rem">Ã°Å¸â€œâ€¦</div><div class="nb"><div class="nm"><span class="ncat">Pengumuman</span><span class="ndate">5 Jan 2025</span></div><h3>Kalender Akademik Semester Genap 2024/2025</h3><p>Kalender resmi semester genap telah diterbitkan.</p><a class="nrm" href="#">Baca Ã¢â€ â€™</a></div></div>
                <div class="nc rv" data-cat="prestasi"><div class="ni2" style="background:linear-gradient(135deg,#f0d8e8,#fce8f4);height:160px;display:flex;align-items:center;justify-content:center;font-size:2.5rem">Ã°Å¸â€™Æ’</div><div class="nb"><div class="nm"><span class="ncat">Prestasi</span><span class="ndate">28 Des 2024</span></div><h3>Juara 1 FLS2N Tari Tradisional</h3><p>Tim tari meraih juara pertama lomba seni nasional tingkat kabupaten.</p><a class="nrm" href="#">Baca Ã¢â€ â€™</a></div></div>
                <div class="nc rv d1" data-cat="kegiatan"><div class="ni2" style="background:linear-gradient(135deg,#e0e8c8,#f0f4d8);height:160px;display:flex;align-items:center;justify-content:center;font-size:2.5rem">Ã°Å¸Å½â€ž</div><div class="nb"><div class="nm"><span class="ncat">Kegiatan</span><span class="ndate">20 Des 2024</span></div><h3>Pentas Seni & Perpisahan Semester Ganjil</h3><p>Momen berkesan dalam acara pentas seni akhir semester yang meriah.</p><a class="nrm" href="#">Baca Ã¢â€ â€™</a></div></div>
            </div>
            </div>
            <!-- Sidebar -->
            <div>
            <div class="rv" style="background:var(--white);border-radius:var(--radius);padding:22px;box-shadow:var(--shadow);margin-bottom:20px">
                <h4 style="color:var(--navy);font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;margin-bottom:14px">Cari Berita</h4>
                <div style="display:flex;gap:8px"><input type="text" placeholder="Kata kunci..." style="flex:1;padding:10px 14px;border:1.5px solid #dce6f5;border-radius:10px;font-family:inherit;font-size:.86rem"><button class="btn btn-navy" style="padding:10px 14px;border-radius:10px">Ã°Å¸â€Â</button></div>
            </div>
            <div class="rv" style="background:var(--white);border-radius:var(--radius);padding:22px;box-shadow:var(--shadow);margin-bottom:20px">
                <h4 style="color:var(--navy);font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;margin-bottom:14px">Kategori</h4>
                <ul style="list-style:none">
                <li style="padding:8px 0;border-bottom:1px solid var(--bg);display:flex;justify-content:space-between;font-size:.86rem"><a href="#" style="color:var(--text)">Pengumuman</a><span style="background:var(--navy);color:var(--white);border-radius:20px;padding:2px 8px;font-size:.7rem">4</span></li>
                <li style="padding:8px 0;border-bottom:1px solid var(--bg);display:flex;justify-content:space-between;font-size:.86rem"><a href="#" style="color:var(--text)">Prestasi</a><span style="background:var(--gold);color:var(--navy);border-radius:20px;padding:2px 8px;font-size:.7rem">8</span></li>
                <li style="padding:8px 0;border-bottom:1px solid var(--bg);display:flex;justify-content:space-between;font-size:.86rem"><a href="#" style="color:var(--text)">Kegiatan</a><span style="background:var(--navy);color:var(--white);border-radius:20px;padding:2px 8px;font-size:.7rem">12</span></li>
                <li style="padding:8px 0;display:flex;justify-content:space-between;font-size:.86rem"><a href="#" style="color:var(--text)">PPDB</a><span style="background:var(--navy);color:var(--white);border-radius:20px;padding:2px 8px;font-size:.7rem">2</span></li>
                </ul>
            </div>
            <div class="rv" style="background:var(--white);border-radius:var(--radius);padding:22px;box-shadow:var(--shadow)">
                <h4 style="color:var(--navy);font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;margin-bottom:14px">Berita Terbaru</h4>
                <div class="sbwid">
                <div class="sbi"><div class="sbico">Ã°Å¸â€œÂ</div><div class="sbtxt"><h4>PPDB 2025/2026 Dibuka</h4><span>20 Jan 2025</span></div></div>
                <div class="sbi"><div class="sbico">Ã°Å¸Â¥â€¡</div><div class="sbtxt"><h4>Juara Olimpiade Matematika</h4><span>15 Jan 2025</span></div></div>
                <div class="sbi"><div class="sbico">Ã°Å¸Å’Â¿</div><div class="sbtxt"><h4>Penghargaan Adiwiyata</h4><span>10 Jan 2025</span></div></div>
                <div class="sbi"><div class="sbico">Ã°Å¸â€™Æ’</div><div class="sbtxt"><h4>Juara FLS2N Tari</h4><span>28 Des 2024</span></div></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    </div>

    <!-- ================================================
        GALERI PAGE
        ================================================ -->
    <div class="page" id="page-galeri">
    <div class="page-hdr active">
        <div class="container"><h1>Galeri Foto</h1>
        <div class="bc"><a href="#" onclick="showPage('home')">Beranda</a><span class="sep">Ã¢â‚¬Âº</span><span class="cur">Galeri</span></div></div>
    </div>
    <section class="sec" style="background:var(--bg)">
        <div class="container">
        <div class="flt rv">
            <button class="fbt act" data-f="all">Semua</button>
            <button class="fbt" data-f="sekolah">Fasilitas</button>
            <button class="fbt" data-f="kegiatan">Kegiatan</button>
            <button class="fbt" data-f="prestasi">Prestasi</button>
            <button class="fbt" data-f="seni">Seni & Budaya</button>
            <button class="fbt" data-f="olahraga">Olahraga</button>
        </div>
        <div class="gp-grid" id="gal-items">
            <div class="gp-item rv" data-cat="sekolah"><div class="ph" style="background:linear-gradient(135deg,#c8d8f0,#dce6f5)"><span style="font-size:2rem">Ã°Å¸ÂÂ«</span><small>Gedung Sekolah</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Gedung Utama</span></div></div>
            <div class="gp-item rv d1" data-cat="sekolah"><div class="ph" style="background:linear-gradient(135deg,#d4e8d0,#e4f4e0)"><span style="font-size:2rem">Ã°Å¸Å’Â¿</span><small>Taman</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Taman Adiwiyata</span></div></div>
            <div class="gp-item rv d2" data-cat="kegiatan"><div class="ph" style="background:linear-gradient(135deg,#e8d8c8,#f4e8d8)"><span style="font-size:2rem">Ã°Å¸â€œÅ¡</span><small>Belajar</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Kegiatan Belajar</span></div></div>
            <div class="gp-item rv" data-cat="kegiatan"><div class="ph" style="background:linear-gradient(135deg,#d0c8e8,#e0d8f8)"><span style="font-size:2rem">Ã°Å¸â€™Â»</span><small>Lab. Komputer</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Lab. Komputer</span></div></div>
            <div class="gp-item rv d1" data-cat="prestasi"><div class="ph" style="background:linear-gradient(135deg,#f8e8c0,#faf4d8)"><span style="font-size:2rem">Ã°Å¸Â¥â€¡</span><small>Olimpiade</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Juara Olimpiade</span></div></div>
            <div class="gp-item rv d2" data-cat="prestasi"><div class="ph" style="background:linear-gradient(135deg,#c8e8e4,#d8f4f0)"><span style="font-size:2rem">Ã°Å¸Ââ€ </span><small>Adiwiyata</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Penghargaan Adiwiyata</span></div></div>
            <div class="gp-item rv" data-cat="seni"><div class="ph" style="background:linear-gradient(135deg,#f0d8e8,#fce8f4)"><span style="font-size:2rem">Ã°Å¸â€™Æ’</span><small>Tari Tradisional</small></div><div class="gov"><span>Ã°Å¸â€œÂ· FLS2N Tari</span></div></div>
            <div class="gp-item rv d1" data-cat="seni"><div class="ph" style="background:linear-gradient(135deg,#d8e8f0,#e8f4fc)"><span style="font-size:2rem">Ã°Å¸Å½Âµ</span><small>Angklung</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Penampilan Angklung</span></div></div>
            <div class="gp-item rv d2" data-cat="olahraga"><div class="ph" style="background:linear-gradient(135deg,#e8f0d8,#f4fcec)"><span style="font-size:2rem">Ã¢Å¡Â½</span><small>Sepak Bola</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Latihan Sepak Bola</span></div></div>
            <div class="gp-item rv" data-cat="olahraga"><div class="ph" style="background:linear-gradient(135deg,#f0e8d8,#fceedd)"><span style="font-size:2rem">Ã°Å¸ÂÂ¸</span><small>Bulu Tangkis</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Turnamen Badminton</span></div></div>
            <div class="gp-item rv d1" data-cat="kegiatan"><div class="ph" style="background:linear-gradient(135deg,#dce8c8,#ecf4e0)"><span style="font-size:2rem">Ã°Å¸Å¡Â©</span><small>Upacara</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Upacara Bendera</span></div></div>
            <div class="gp-item rv d2" data-cat="seni"><div class="ph" style="background:linear-gradient(135deg,#e4d0f0,#f0e0fc)"><span style="font-size:2rem">Ã°Å¸Å½Â¨</span><small>Melukis</small></div><div class="gov"><span>Ã°Å¸â€œÂ· Seni Lukis Batik</span></div></div>
        </div>
        </div>
    </section>
    </div>

    <!-- ================================================
        KONTAK PAGE
        ================================================ -->
    <div class="page" id="page-kontak">
    <div class="page-hdr active">
        <div class="container"><h1>Kontak Kami</h1>
        <div class="bc"><a href="#" onclick="showPage('home')">Beranda</a><span class="sep">Ã¢â‚¬Âº</span><span class="cur">Kontak</span></div></div>
    </div>
    <section class="sec" style="background:var(--bg)">
        <div class="container">
        <div class="ct-grid">
            <div class="ct-info rv">
            <h3>Informasi Kontak</h3>
            <p>Kami siap membantu Anda. Hubungi kami melalui berbagai saluran komunikasi berikut.</p>
            <div class="cti"><div class="ctico">Ã°Å¸â€œÂ</div><div class="ctitxt"><h4>Alamat</h4><p>Jl. Raya Srikandang No. 1, Bangsri, Jepara 59453</p></div></div>
            <div class="cti"><div class="ctico">Ã°Å¸â€œÅ¾</div><div class="ctitxt"><h4>Telepon</h4><p>(0291) 123456</p></div></div>
            <div class="cti"><div class="ctico">Ã°Å¸â€œÂ±</div><div class="ctitxt"><h4>WhatsApp</h4><p>+62 812-3456-7890</p></div></div>
            <div class="cti"><div class="ctico">Ã¢Å“â€°Ã¯Â¸Â</div><div class="ctitxt"><h4>Email</h4><p>sdn3srikandang@gmail.com</p></div></div>
            <div class="cti"><div class="ctico">Ã¢ÂÂ°</div><div class="ctitxt"><h4>Jam Kerja</h4><p>Senâ€“Jum: 07.00â€“14.00 WIB<br>Sabtu: 07.00â€“12.00 WIB</p></div></div>
            <div style="margin-top:24px;padding-top:20px;border-top:1px solid rgba(255,255,255,.1)">
                <p style="font-size:.8rem;opacity:.6;margin-bottom:10px">Media Sosial</p>
                <div style="display:flex;gap:10px">
                <a href="#" class="sb" style="background:rgba(255,255,255,.1)">f</a>
                <a href="#" class="sb" style="background:rgba(255,255,255,.1)">in</a>
                <a href="#" class="sb" style="background:rgba(255,255,255,.1)">Ã¢â€“Â¶</a>
                <a href="#" class="sb" style="background:rgba(255,255,255,.1)">W</a>
                </div>
            </div>
            </div>
            <div class="ct-form rv d2">
            <span class="label">Kirim Pesan</span>
            <h2 class="sec-title" style="font-size:1.8rem">Hubungi Kami</h2>
            <p style="color:var(--text-light);font-size:.88rem;margin-bottom:24px">Isi formulir berikut dan kami akan segera merespons pesan Anda.</p>
            <form id="cform">
                <div class="fr">
                <div class="fg"><label>Nama Lengkap *</label><input type="text" placeholder="Nama Anda" required></div>
                <div class="fg"><label>Email *</label><input type="email" placeholder="email@contoh.com" required></div>
                </div>
                <div class="fr">
                <div class="fg"><label>Telepon</label><input type="tel" placeholder="08xx-xxxx-xxxx"></div>
                <div class="fg"><label>Kategori</label><select><option value="">Pilih kategori...</option><option>Informasi PPDB</option><option>Akademik</option><option>Kerjasama</option><option>Saran / Keluhan</option><option>Lainnya</option></select></div>
                </div>
                <div class="fg"><label>Subjek *</label><input type="text" placeholder="Topik pesan Anda" required></div>
                <div class="fg"><label>Pesan *</label><textarea rows="5" placeholder="Tuliskan pesan Anda..." required></textarea></div>
                <button type="submit" id="csubmit" class="btn btn-navy" style="width:100%;justify-content:center;padding:14px">Kirim Pesan Ã¢â€ â€™</button>
            </form>
            <div class="map-ph">Ã°Å¸â€”ÂºÃ¯Â¸Â Peta Lokasi SDN 3 Srikandang<small>Jl. Raya Srikandang, Bangsri, Jepara</small></div>
            </div>
        </div>
        </div>
    </section>
    <section class="sec sec-alt">
        <div class="container">
        <div class="center rv" style="margin-bottom:40px"><span class="label">FAQ</span><h2 class="sec-title">Pertanyaan Umum</h2></div>
        <div style="max-width:760px;margin:0 auto">
            <div class="faq-i rv"><button class="faq-q">Bagaimana cara mendaftar PPDB?<span class="faq-ico">Ã¯Â¼â€¹</span></button><div class="faq-a"><p>Pendaftaran PPDB dapat dilakukan online melalui dinas pendidikan Jepara atau langsung ke sekolah (Seninâ€“Jumat 07.00â€“14.00). Persyaratan: fotokopi akta kelahiran, KK, KTP orang tua, dan pas foto.</p></div></div>
            <div class="faq-i rv d1"><button class="faq-q">Apakah menerima siswa luar wilayah?<span class="faq-ico">Ã¯Â¼â€¹</span></button><div class="faq-a"><p>Ya, dengan mempertimbangkan ketersediaan tempat dan jarak domisili. Prioritas diberikan pada calon siswa yang tinggal di sekitar sekolah.</p></div></div>
            <div class="faq-i rv d2"><button class="faq-q">Berapa biaya pendidikan di sini?<span class="faq-ico">Ã¯Â¼â€¹</span></button><div class="faq-a"><p>Sebagai sekolah negeri, kami tidak memungut SPP bulanan. Biaya operasional didanai dari BOS (Bantuan Operasional Sekolah).</p></div></div>
            <div class="faq-i rv"><button class="faq-q">Ekstrakurikuler apa saja yang tersedia?<span class="faq-ico">Ã¯Â¼â€¹</span></button><div class="faq-a"><p>Tersedia: Pramuka, Sepak Bola, Bulu Tangkis, Tari Tradisional, Angklung, Tahfidz Qur'an, Melukis/Kaligrafi, dan Coding Dasar.</p></div></div>
        </div>
        </div>
    </section>
    </div>

    <!-- ================================================
        FOOTER (shared)
        ================================================ -->
    <footer id="footer">
    <div class="ft-top"><div class="container"><div class="ft-grid">
        <div class="ft-brand">
        <a class="logo" href="#" onclick="showPage('home')">
            <div class="logo-ico">SDN</div>
            <div class="logo-txt"><div class="sn">SD Negeri 3 Srikandang</div><div class="ss">Jepara, Jawa Tengah</div></div>
        </a>
        <p>Mendidik dengan hati, membangun karakter bangsa. Sekolah dasar negeri unggulan di Kabupaten Jepara dengan akreditasi A.</p>
        <div class="ft-soc">
            <a href="#" class="sb">f</a><a href="#" class="sb">in</a><a href="#" class="sb">Ã¢â€“Â¶</a><a href="#" class="sb">W</a>
        </div>
        </div>
        <div class="fc2"><h4>Tautan Cepat</h4><ul class="fl">
        <li><a href="#" onclick="showPage('home')">Beranda</a></li>
        <li><a href="#" onclick="showPage('profil')">Profil Sekolah</a></li>
        <li><a href="#" onclick="showPage('akademik')">Akademik</a></li>
        <li><a href="#" onclick="showPage('berita')">Berita</a></li>
        <li><a href="#" onclick="showPage('galeri')">Galeri</a></li>
        <li><a href="#" onclick="showPage('kontak')">Kontak</a></li>
        </ul></div>
        <div class="fc2"><h4>Informasi</h4><ul class="fl">
        <li><a href="#">PPDB 2025/2026</a></li>
        <li><a href="#">Kalender Akademik</a></li>
        <li><a href="#">Ekstrakurikuler</a></li>
        <li><a href="#">Data Sekolah</a></li>
        <li><a href="#">Laporan Keuangan</a></li>
        </ul></div>
        <div class="fc2"><h4>Hubungi Kami</h4>
        <div class="fci"><span class="ic">Ã°Å¸â€œÂ</span><span>Jl. Raya Srikandang No. 1, Bangsri, Jepara 59453</span></div>
        <div class="fci"><span class="ic">Ã°Å¸â€œÅ¾</span><span>(0291) 123456</span></div>
        <div class="fci"><span class="ic">Ã¢Å“â€°Ã¯Â¸Â</span><span>sdn3srikandang@gmail.com</span></div>
        <div class="fci"><span class="ic">Ã¢ÂÂ°</span><span>Seninâ€“Sabtu: 07.00â€“14.00</span></div>
        </div>
    </div></div></div>
    <div class="container"><div class="ft-bot">
        <span>Â© 2025 SD Negeri 3 Srikandang. Hak Cipta Dilindungi.</span>
        <span>Dibuat dengan Ã¢ÂÂ¤Ã¯Â¸Â untuk pendidikan Indonesia</span>
    </div></div>
    </footer>

    <button id="btt" onclick="window.scrollTo({top:0,behavior:'smooth'})">Ã¢â€ â€˜</button>

    <!-- Lightbox -->
    <div id="lb">
    <button class="lb-x" onclick="closeLb()">Ã¢Å“â€¢</button>
    <div class="lb-wrap"><span id="lb-emo">Ã°Å¸â€œÂ¸</span><p id="lb-txt">Foto Galeri</p></div>
    <div id="lb-cap"></div>
    </div>

    <script>
    /* =============================================
    PAGE NAVIGATION
    ============================================= */
    function showPage(id) {
    // Hide all pages
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    // Show target
    document.getElementById('page-' + id).classList.add('active');
    // Update nav
    document.querySelectorAll('.nl').forEach(l => l.classList.remove('act'));
    const activeLink = document.querySelector(`.nl[onclick*="'${id}'"]`);
    if (activeLink) activeLink.classList.add('act');
    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
    // Close mobile menu
    document.getElementById('navLinks').classList.remove('open');
    document.getElementById('hbg').classList.remove('op');
    // Re-trigger scroll reveal for the new page
    setTimeout(triggerReveal, 100);
    return false;
    }


    document.querySelectorAll('a[onclick*="showPage"]').forEach(link => {
    link.addEventListener('click', e => e.preventDefault());
    });
    /* =============================================
    NAVBAR SCROLL
    ============================================= */
    window.addEventListener('scroll', () => {
    document.getElementById('nav').classList.toggle('sc', window.scrollY > 60);
    document.getElementById('btt').classList.toggle('show', window.scrollY > 400);
    });

    /* =============================================
    MOBILE MENU
    ============================================= */
    function toggleMenu() {
    const m = document.getElementById('navLinks');
    const h = document.getElementById('hbg');
    m.classList.toggle('open');
    h.classList.toggle('op');
    }

    /* =============================================
    SCROLL REVEAL
    ============================================= */
    function triggerReveal() {
    const els = document.querySelectorAll('.page.active .rv:not(.on)');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('on'); obs.unobserve(e.target); }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
    els.forEach(el => obs.observe(el));
    }
    triggerReveal();

    /* =============================================
    COUNTER ANIMATION
    ============================================= */
    function animateCounters() {
    document.querySelectorAll('[data-count]').forEach(el => {
        if (el.dataset.animated) return;
        const target = +el.dataset.count;
        const sfx = el.dataset.sfx || '';
        let n = 0;
        el.dataset.animated = '1';
        const t = setInterval(() => {
        n += Math.ceil(target / 60);
        if (n >= target) { n = target; clearInterval(t); }
        el.textContent = n + sfx;
        }, 25);
    });
    }
    const statsObs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) animateCounters(); });
    }, { threshold: 0.3 });
    document.querySelector('.h-stats') && statsObs.observe(document.querySelector('.h-stats'));

    /* =============================================
    NEWS FILTER
    ============================================= */
    document.addEventListener('click', e => {
    if (!e.target.classList.contains('fbt')) return;
    const container = e.target.closest('section, .page');
    container.querySelectorAll('.fbt').forEach(b => b.classList.remove('act'));
    e.target.classList.add('act');
    const f = e.target.dataset.f;
    const items = container.querySelectorAll('[data-cat]');
    items.forEach(item => {
        item.style.display = (f === 'all' || item.dataset.cat === f) ? '' : 'none';
    });
    });

    /* =============================================
    GALLERY LIGHTBOX
    ============================================= */
    document.addEventListener('click', e => {
    const item = e.target.closest('.gp-item, .gi');
    if (!item) return;
    const cap = item.querySelector('.gov span')?.textContent || '';
    const emo = item.querySelector('.ph span')?.textContent || 'Ã°Å¸â€œÂ¸';
    document.getElementById('lb-emo').textContent = emo;
    document.getElementById('lb-txt').textContent = item.querySelector('.ph small')?.textContent || 'Foto';
    document.getElementById('lb-cap').textContent = cap;
    document.getElementById('lb').classList.add('open');
    document.body.style.overflow = 'hidden';
    });
    function closeLb() {
    document.getElementById('lb').classList.remove('open');
    document.body.style.overflow = '';
    }
    document.getElementById('lb').addEventListener('click', e => { if (e.target.id === 'lb') closeLb(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLb(); });

    /* =============================================
    FAQ ACCORDION
    ============================================= */
    document.addEventListener('click', e => {
    const q = e.target.closest('.faq-q');
    if (!q) return;
    const item = q.closest('.faq-i');
    const a = item.querySelector('.faq-a');
    const ico = q.querySelector('.faq-ico');
    const isOpen = a.style.maxHeight && a.style.maxHeight !== '0px';
    document.querySelectorAll('.faq-a').forEach(x => x.style.maxHeight = '0px');
    document.querySelectorAll('.faq-ico').forEach(x => x.style.transform = '');
    if (!isOpen) { a.style.maxHeight = a.scrollHeight + 'px'; ico.style.transform = 'rotate(45deg)'; }
    });

    /* =============================================
    CONTACT FORM
    ============================================= */
    document.getElementById('cform')?.addEventListener('submit', e => {
    e.preventDefault();
    const btn = document.getElementById('csubmit');
    btn.textContent = 'Mengirim...';
    btn.disabled = true;
    setTimeout(() => {
        btn.textContent = 'Ã¢Å“â€œ Pesan Terkirim!';
        btn.style.background = '#2ecc71';
        e.target.reset();
        setTimeout(() => { btn.textContent = 'Kirim Pesan Ã¢â€ â€™'; btn.disabled = false; btn.style.background = ''; }, 3000);
    }, 1500);
    });

    /* Page fade in */
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.4s ease';
    requestAnimationFrame(() => { document.body.style.opacity = '1'; });
    </script>
    </body>
    </html>
