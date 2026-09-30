<?php $status = $_GET["status"] ?? ""; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Junior Tone Shop | Gibson Les Paul Junior Specialists</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Permanent+Marker&family=Special+Elite&display=swap" rel="stylesheet">
  <style>
    :root { --black: #000; --red: #E4002B; --paper: #F2F2EE; --pink: #FF2E93; --white: #fff; }
    html { scroll-behavior: smooth; scroll-padding-top: 70px; }
    body {
      font-family: "Special Elite", "Courier New", monospace; color: var(--black); line-height: 1.7;
      background-color: var(--paper);
      background-image: radial-gradient(rgba(0,0,0,.13) 1px, transparent 1.3px);
      background-size: 6px 6px;
    }
    h1, h2, h3, h4, .navbar-brand { font-family: "Anton", Impact, sans-serif; text-transform: uppercase; letter-spacing: .02em; font-weight: 400; }
    .marker { font-family: "Permanent Marker", cursive; }

    /* Nav */
    .navbar { background: var(--black); border-bottom: 5px solid var(--red); }
    .navbar-brand { color: var(--white); font-size: 1.7rem; }
    .navbar-brand span { background: var(--red); padding: 0 .4rem; display: inline-block; transform: rotate(-3deg); margin-right: .3rem; }
    .navbar .nav-link { color: var(--white); font-family: "Anton", sans-serif; text-transform: uppercase; letter-spacing: .05em; font-size: 1.05rem; }
    .navbar .nav-link:hover, .navbar .nav-link:focus { color: var(--red); }

    /* Buttons */
    .btn-punk { background: var(--red); color: var(--white); border: 3px solid var(--black); border-radius: 0; font-family: "Anton", sans-serif; text-transform: uppercase; letter-spacing: .05em; box-shadow: 5px 5px 0 var(--black); }
    .btn-punk:hover { background: var(--black); color: var(--white); }
    .btn-punk:active { box-shadow: 1px 1px 0 var(--black); transform: translate(4px, 4px); }
    .btn-ink { background: var(--white); color: var(--black); border: 3px solid var(--black); border-radius: 0; font-family: "Anton", sans-serif; text-transform: uppercase; letter-spacing: .05em; box-shadow: 5px 5px 0 var(--black); }
    .btn-ink:hover { background: var(--black); color: var(--white); }
    a:focus-visible, button:focus-visible, .form-control:focus { outline: 4px solid var(--pink); outline-offset: 2px; box-shadow: none; }

    /* Home */
    #home { padding: 4rem 0 5rem; overflow: hidden; }
    .ransom { font-size: clamp(3rem, 9vw, 6.5rem); line-height: 1.05; margin-bottom: 1.5rem; }
    .ransom span { display: inline-block; padding: 0 .3rem; margin: 0 .1rem .3rem 0; }
    .r1 { background: var(--black); color: var(--white); transform: rotate(-3deg); }
    .r2 { background: var(--red); color: var(--white); transform: rotate(2deg); }
    .r3 { background: var(--white); border: 4px solid var(--black); transform: rotate(-1.5deg); }
    .r4 { background: var(--black); color: var(--red); transform: rotate(3deg); }
    .intro { background: var(--white); border: 3px solid var(--black); padding: 1rem 1.2rem; max-width: 34rem; box-shadow: 6px 6px 0 var(--red); }
    .guitar-wrap { position: relative; max-width: 420px; margin: 0 auto; transform: rotate(9deg); }
    .guitar { width: 100%; height: auto; filter: drop-shadow(8px 8px 0 #000); }
    .sticker { position: absolute; top: 12%; right: -4%; width: 118px; height: 118px; border-radius: 50%; background: var(--pink); border: 4px solid var(--black); display: flex; align-items: center; justify-content: center; text-align: center; font-family: "Anton", sans-serif; text-transform: uppercase; font-size: 1.35rem; line-height: 1.1; transform: rotate(-14deg); }

    /* Zigzag dividers */
    .zig { height: 22px; background: linear-gradient(135deg, var(--black) 25%, transparent 25%) -22px 0, linear-gradient(225deg, var(--black) 25%, transparent 25%) -22px 0; background-size: 44px 22px; }
    .zig.flip { transform: scaleY(-1); }

    section.block { padding: 4.5rem 0; }
    .section-title { font-size: clamp(2.6rem, 6vw, 4.2rem); display: inline-block; background: var(--black); color: var(--white); padding: 0 .8rem; transform: rotate(-1.5deg); margin-bottom: 2rem; }

    /* Services */
    #services { background: var(--black); color: var(--white); }
    #services .section-title { background: var(--red); }
    .service { border: 3px solid var(--white); padding: 1.3rem; height: 100%; }
    .service i { font-size: 2rem; color: var(--red); }
    .service h3 { font-size: 1.6rem; }
    .service p { margin-bottom: 0; }

    /* Products */
    .product { position: relative; background: var(--white); border: 4px solid var(--black); box-shadow: 8px 8px 0 var(--black); height: 100%; transition: transform .15s; }
    .col-lg-3:nth-child(odd) .product { transform: rotate(-1.5deg); }
    .col-lg-3:nth-child(even) .product { transform: rotate(1.5deg); }
    .product:hover { transform: rotate(0); }
    .product::before { content: ""; position: absolute; top: -14px; left: 50%; width: 80px; height: 26px; background: rgba(255,214,0,.85); transform: translateX(-50%) rotate(-4deg); z-index: 2; }
    .swatch { height: 150px; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; color: var(--white); border-bottom: 4px solid var(--black); }
    .product-img { display: block; width: 100%; height: 220px; object-fit: cover; border-bottom: 4px solid var(--black); background: var(--white); }
    .s1 { background: #E9B000; } .s2 { background: var(--red); } .s3 { background: var(--black); } .s4 { background: var(--pink); }
    .product h3 { font-size: 1.4rem; }
    .price { font-family: "Permanent Marker", cursive; font-size: 1.5rem; color: var(--red); }

    /* About */
    #about { background: var(--red); }
    #about .section-title { background: var(--black); }
    .about-card { background: var(--paper); border: 4px solid var(--black); padding: 2rem; box-shadow: 10px 10px 0 var(--black); transform: rotate(1deg); }

    /* Contact */
    .form-label { font-family: "Anton", sans-serif; text-transform: uppercase; letter-spacing: .05em; font-size: 1.1rem; }
    .form-control { border: 3px solid var(--black); border-radius: 0; background: var(--white); font-family: "Special Elite", monospace; }
    .alert { border: 3px solid var(--black); border-radius: 0; }
    footer { background: var(--black); color: var(--white); padding: 1.5rem 0; border-top: 5px solid var(--red); }

    /* Music player */
    body { padding-bottom: 76px; }
    .player { position: fixed; left: 0; right: 0; bottom: 0; z-index: 1030; background: var(--black); color: var(--white); border-top: 5px solid var(--red); padding: .6rem 0; }
    .player .track { font-family: "Permanent Marker", cursive; font-size: 1.05rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .player .btn-play { background: var(--red); color: var(--white); border: 3px solid var(--white); border-radius: 0; width: 46px; height: 46px; line-height: 1; font-size: 1.4rem; }
    .player .btn-play:hover { background: var(--white); color: var(--black); }
    .player .btn-skip { background: none; border: 0; color: var(--white); font-size: 1.5rem; }
    .player .btn-skip:hover { color: var(--red); }
    .player button:focus-visible, .player input:focus-visible { outline: 4px solid var(--pink); outline-offset: 2px; }
    .player input[type=range] { accent-color: var(--red); }

    @media (prefers-reduced-motion: reduce) { html { scroll-behavior: auto; } .product { transition: none; } }
    @media (max-width: 575px) { .sticker { width: 90px; height: 90px; font-size: 1.05rem; } }
  </style>
</head>
<body>

<!-- 1. Top bar / navigation -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#home"><span>Junior</span>Tone Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- 2. Home -->
<header id="home">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-7">
        <h1 class="ransom">
          <span class="r1">One</span><span class="r2">pickup.</span><br>
          <span class="r3">Zero</span><span class="r4">chill.</span>
        </h1>
        <div class="intro mb-4">
          Junior Tone Shop sells the Gibson Les Paul Junior, the no-frills single P-90 guitar loved by punk, blues, and rock players. We sell the guitar, the parts, and the setup work that makes it play right.
        </div>
        <a href="#products" class="btn btn-punk btn-lg me-2 mb-2">Shop guitars</a>
        <a href="#contact" class="btn btn-ink btn-lg mb-2">Ask a question</a>
      </div>
      <div class="col-lg-5">
        <div class="guitar-wrap">
          <img class="guitar" src="images/les paul jr.png" alt="Gibson Les Paul Junior guitar">
          <div class="sticker">P-90<br>only</div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="zig flip" style="background-color: var(--red);"></div>

<!-- 3. Services -->
<section id="services" class="block">
  <div class="container">
    <h2 class="section-title">Services</h2>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3"><div class="service"><i class="bi bi-sliders"></i><h3 class="mt-2">Pro setup</h3><p>Action, neck relief, and intonation adjusted to how you play.</p></div></div>
      <div class="col-md-6 col-lg-3"><div class="service"><i class="bi bi-music-note-beamed"></i><h3 class="mt-2">P-90 swaps</h3><p>Vintage or modern P-90 pickups, installed and tested.</p></div></div>
      <div class="col-md-6 col-lg-3"><div class="service"><i class="bi bi-tools"></i><h3 class="mt-2">Fret and nut care</h3><p>Fret polishing, leveling, and nut replacement to kill the buzz.</p></div></div>
      <div class="col-md-6 col-lg-3"><div class="service"><i class="bi bi-chat-dots"></i><h3 class="mt-2">Tone advice</h3><p>Not sure which finish, strings, or amp to get? Ask us.</p></div></div>
    </div>
  </div>
</section>

<div class="zig" style="background-color: var(--paper);"></div>

<!-- 4. Products -->
<section id="products" class="block">
  <div class="container">
    <h2 class="section-title">Products</h2>
    <div class="row g-5">
      <div class="col-sm-6 col-lg-3"><div class="product">
        <img class="product-img" src="images/tv yellow.jpg" alt="Les Paul Junior in TV Yellow">
        <div class="p-3"><h3>Les Paul Junior, TV Yellow</h3><p class="mb-2">Mahogany body, single P-90 pickup, wraparound bridge.</p><span class="price">₱68,000</span></div>
      </div></div>
      <div class="col-sm-6 col-lg-3"><div class="product">
        <img class="product-img" src="images/cherry red.png" alt="Les Paul Junior in Cherry">
        <div class="p-3"><h3>Les Paul Junior, Cherry</h3><p class="mb-2">The classic red finish with the same simple, loud tone.</p><span class="price">₱68,000</span></div>
      </div></div>
      <div class="col-sm-6 col-lg-3"><div class="product">
        <img class="product-img" src="images/p90.png" alt="P-90 soapbar pickup">
        <div class="p-3"><h3>P-90 Soapbar Pickup</h3><p class="mb-2">Replacement pickup with a gritty, growling midrange.</p><span class="price">₱5,900</span></div>
      </div></div>
      <div class="col-sm-6 col-lg-3"><div class="product">
        <img class="product-img" src="images/guitar bag.png" alt="Gig bag and strap">
        <div class="p-3"><h3>Gig Bag and Strap</h3><p class="mb-2">Padded bag and leather strap sized for a Les Paul.</p><span class="price">₱3,200</span></div>
      </div></div>
    </div>
  </div>
</section>

<!-- 5. About Us -->
<section id="about" class="block">
  <div class="container">
    <h2 class="section-title">About us</h2>
    <div class="row"><div class="col-lg-8">
      <div class="about-card">
        <p>Hi, I'm <strong>Drian</strong>, the owner of Junior Tone Shop. I'm a student in the Philippines, and I built this shop around the guitar I think proves that simple is better: the Gibson Les Paul Junior.</p>
        <p>One pickup, two knobs, no extras. The sound and the feel do all the work. Players here have a hard time finding genuine parts and honest setup advice, so that's what this shop is for.</p>
        <p class="mb-0 marker fs-4">Get a guitar that sounds great and plays right.</p>
      </div>
    </div></div>
  </div>
</section>

<div class="zig flip" style="background-color: var(--red);"></div>

<!-- 6. Contact Us -->
<section id="contact" class="block" style="background: var(--black); color: var(--white);">
  <div class="container">
    <h2 class="section-title" style="background: var(--red);">Contact us</h2>
    <div class="row"><div class="col-lg-7">

      <?php if ($status === "success"): ?>
        <div class="alert alert-success" role="alert">Message sent. We'll reply to your email soon.</div>
      <?php elseif ($status === "invalid"): ?>
        <div class="alert alert-warning" role="alert">Please fill in every field and use a valid email address.</div>
      <?php elseif ($status === "error"): ?>
        <div class="alert alert-danger" role="alert">Your message could not be saved. Check that the database is running, then try again.</div>
      <?php endif; ?>

      <form action="contact.php" method="post" novalidate>
        <div class="mb-3"><label for="full_name" class="form-label">Full name</label>
          <input type="text" class="form-control" id="full_name" name="full_name" maxlength="100" required></div>
        <div class="mb-3"><label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" maxlength="150" required></div>
        <div class="mb-3"><label for="subject" class="form-label">Subject</label>
          <input type="text" class="form-control" id="subject" name="subject" maxlength="150" required></div>
        <div class="mb-4"><label for="message" class="form-label">Message</label>
          <textarea class="form-control" id="message" name="message" rows="5" required></textarea></div>
        <button type="submit" class="btn btn-punk btn-lg">Send message</button>
      </form>
    </div></div>
  </div>
</section>

<footer><div class="container text-center">&copy; <?= date("Y") ?> Junior Tone Shop. Philippines. Play it loud.</div></footer>

<!-- Music player -->
<div class="player" role="region" aria-label="Music player">
  <div class="container d-flex align-items-center gap-2 gap-sm-3">
    <button class="btn-skip" id="prev" aria-label="Previous track"><i class="bi bi-skip-backward-fill"></i></button>
    <button class="btn-play" id="play" aria-label="Play"><i class="bi bi-play-fill"></i></button>
    <button class="btn-skip" id="next" aria-label="Next track"><i class="bi bi-skip-forward-fill"></i></button>
    <div class="track flex-grow-1" id="title" aria-live="polite">Press play</div>
    <i class="bi bi-volume-up-fill d-none d-sm-inline"></i>
    <input type="range" id="vol" min="0" max="1" step="0.05" value="0.6" class="d-none d-sm-inline" style="width:90px" aria-label="Volume">
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const tracks = [
    { title: "Basket Case", src: "audio/Basket Case [MP3 · 320kbps].m4a" },
    { title: "When I Come Around", src: "audio/When I Come Around [MP3 · 320kbps].m4a" },
    { title: "She", src: "audio/She [MP3 · 320kbps].m4a" },
    { title: "Welcome to Paradise", src: "audio/Welcome to Paradise [MP3 · 320kbps].m4a" },
    { title: "American Idiot", src: "audio/American Idiot [MP3 · 320kbps].m4a" },
    { title: "Wake Me up When September Ends", src: "audio/Wake Me up When September Ends [MP3 · 320kbps].m4a" },
    { title: "Holiday/Boulevard Of Broken Dreams", src: "audio/Holiday _ Boulevard of Broken Dreams [MP3 · 320kbps].m4a" },
    { title: "Last Night on Earth", src: "audio/Last Night on Earth [MP3 · 320kbps].m4a" },
    { title: "21 Guns", src: "audio/21 Guns [MP3 · 320kbps].m4a" }
  ];

  const audio = new Audio();
  const playBtn = document.getElementById("play");
  const titleEl = document.getElementById("title");
  let i = 0;

  // Restore position after the contact form reloads the page
  try {
    const saved = JSON.parse(sessionStorage.getItem("player") || "null");
    if (saved && saved.i < tracks.length) { i = saved.i; audio.currentTime = saved.t; }
  } catch (e) {}

  function load(n, play) {
    i = (n + tracks.length) % tracks.length;
    audio.src = tracks[i].src;
    titleEl.textContent = tracks[i].title;
    if (play) audio.play().catch(() => {});
  }

  function setIcon() {
    playBtn.innerHTML = audio.paused ? '<i class="bi bi-play-fill"></i>' : '<i class="bi bi-pause-fill"></i>';
    playBtn.setAttribute("aria-label", audio.paused ? "Play" : "Pause");
  }

  const resumeTime = audio.currentTime;
  load(i, false);
  audio.addEventListener("loadedmetadata", function once() {
    if (resumeTime) audio.currentTime = resumeTime;
    audio.removeEventListener("loadedmetadata", once);
  });

  playBtn.onclick = () => {
    if (audio.paused) {
      audio.play().catch(err => {
        titleEl.textContent = "Can't play " + tracks[i].src;
        console.error(err);
      });
    } else {
      audio.pause();
    }
  };
  audio.addEventListener("error", () => {
    titleEl.textContent = "File not found: " + tracks[i].src;
  });
  document.getElementById("next").onclick = () => load(i + 1, true);
  document.getElementById("prev").onclick = () => load(i - 1, true);
  document.getElementById("vol").oninput = e => audio.volume = e.target.value;
  audio.volume = 0.6;

  audio.addEventListener("play", setIcon);
  audio.addEventListener("pause", setIcon);
  audio.addEventListener("ended", () => load(i + 1, true));
  window.addEventListener("beforeunload", () => {
    try { sessionStorage.setItem("player", JSON.stringify({ i, t: audio.currentTime })); } catch (e) {}
  });
</script>
</body>
</html>