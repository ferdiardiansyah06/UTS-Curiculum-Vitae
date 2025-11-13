<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'CV'); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero {
      background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
      color:#fff; border-radius: 18px;
    }
    .avatar {
      width: 140px; height: 140px; object-fit: cover; border-radius: 100%;
      box-shadow: 0 10px 25px rgba(0,0,0,.2);
      border: 4px solid rgba(255,255,255,.7);
    }
    .badge-skill { font-weight: 600; }
    .card-hover:hover { transform: translateY(-4px); transition:.3s; box-shadow: 0 1rem 2rem rgba(0,0,0,.08); }
    .nav-link.active { font-weight: 700; }
    footer { color:#6c757d; }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">MyCV</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="nav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/pendidikan">Pendidikan</a></li>
        <li class="nav-item"><a class="nav-link" href="/pengalaman">Pengalaman</a></li>
        <li class="nav-item"><a class="nav-link" href="/keahlian">Keahlian</a></li>
        <li class="nav-item"><a class="nav-link" href="/portofolio">Portofolio</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="container my-4">
  <?= $this->renderSection('content') ?>
</main>

<footer class="container py-4 border-top">
  <div class="d-flex justify-content-between small">
    <span>&copy; <?= date('Y') ?> MyCV</span>
    <span>Built with CodeIgniter 4 + Bootstrap 5</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const links = document.querySelectorAll('.nav-link');
  links.forEach(a => { if (a.getAttribute('href') === window.location.pathname) a.classList.add('active'); });
</script>
</body>
</html>
