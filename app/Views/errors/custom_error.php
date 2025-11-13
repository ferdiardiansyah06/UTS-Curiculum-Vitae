<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container text-center mt-5">
    <div class="alert alert-danger shadow-sm p-4">
      <h4 class="mb-3">⚠️ Terjadi Kesalahan</h4>
      <p><?= esc($message ?? 'Terjadi kesalahan yang tidak diketahui.') ?></p>
      <a href="<?= base_url('/') ?>" class="btn btn-primary mt-3">Kembali ke Halaman Utama</a>
    </div>
  </div>
</body>
</html>
