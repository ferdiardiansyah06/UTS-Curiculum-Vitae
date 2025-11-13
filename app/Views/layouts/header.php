<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($biodata['nama']) ? esc($biodata['nama']) . ' - CV' : 'CV' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8fafc;
        }
        .hero {
            background: linear-gradient(135deg, #0f172a, #1e40af);
            color: #fff;
            padding: 80px 0;
        }
        .card-skills {
            border-left: 4px solid #0ea5a4;
        }
        .section-title {
            display: inline-block;
            border-bottom: 3px solid #0ea5a4;
            padding-bottom: 6px;
        }
        footer {
            background: #0b1220;
            color: #fff;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="<?= base_url('/') ?>">MyCV</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-lin
