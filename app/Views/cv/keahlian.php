<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h2 class="mb-3">Keahlian</h2>
<div class="row g-3">
<?php foreach ($keahlian as $k): ?>
  <div class="col-md-6">
    <div class="card card-hover h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h6 class="mb-1"><?= esc($k['nama']) ?></h6>
          <small class="text-muted"><?= esc($k['level']) ?> • <?= (int)$k['persen'] ?>%</small>
        </div>
        <div class="progress" style="height:10px;">
          <div class="progress-bar" style="width:<?= (int)$k['persen'] ?>%"></div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?= $this->endSection() ?>
