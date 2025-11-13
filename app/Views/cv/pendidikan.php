<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h2 class="mb-3">Riwayat Pendidikan</h2>
<?php foreach ($pendidikan as $ed): ?>
  <div class="card mb-3 card-hover">
    <div class="card-body">
      <h5 class="mb-1"><?= esc($ed['institusi']) ?></h5>
      <div class="text-muted small mb-2"><?= esc($ed['jenjang']) ?> • <?= esc($ed['program']) ?> (<?= esc($ed['tahun_mulai']) ?>–<?= esc($ed['tahun_selesai']) ?>)</div>
      <p class="mb-0"><?= nl2br(esc($ed['deskripsi'])) ?></p>
    </div>
  </div>
<?php endforeach; ?>
<?= $this->endSection() ?>
