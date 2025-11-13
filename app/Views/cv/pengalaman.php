<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h2 class="mb-3">Riwayat Pengalaman</h2>
<?php foreach ($pengalaman as $p): ?>
  <div class="card mb-3 card-hover">
    <div class="card-body">
      <div class="d-flex justify-content-between flex-wrap">
        <h5 class="mb-1"><?= esc($p['posisi']) ?> — <?= esc($p['instansi']) ?></h5>
        <div class="text-muted small"><?= esc($p['mulai']) ?> – <?= $p['selesai'] ?: 'Sekarang' ?></div>
      </div>
      <div class="text-muted small mb-2"><?= esc($p['tipe']) ?> • <?= esc($p['lokasi']) ?></div>
      <p class="mb-0"><?= nl2br(esc($p['deskripsi'])) ?></p>
    </div>
  </div>
<?php endforeach; ?>
<?= $this->endSection() ?>
