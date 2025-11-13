<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h2 class="mb-3">Portofolio</h2>
<div class="row g-3">
<?php foreach ($portofolio as $pf): ?>
  <div class="col-md-4">
    <div class="card h-100 card-hover">
      <?php if(!empty($pf['thumbnail'])): ?>
      <img class="card-img-top" src="<?= esc($pf['thumbnail']) ?>" alt="">
      <?php endif; ?>
      <div class="card-body">
        <h6 class="card-title mb-1"><?= esc($pf['judul']) ?></h6>
        <div class="text-muted small mb-2"><?= esc($pf['peran']) ?> • <?= esc($pf['tahun']) ?></div>
        <p class="small mb-2"><?= esc($pf['ringkas']) ?></p>
        <div class="small text-muted mb-3">Stacks: <?= esc($pf['stacks']) ?></div>
        <div class="d-flex gap-2">
          <?php if(!empty($pf['link_demo'])): ?>
          <a class="btn btn-sm btn-primary" target="_blank" href="<?= esc($pf['link_demo']) ?>">Demo</a>
          <?php endif; ?>
          <?php if(!empty($pf['link_repo'])): ?>
          <a class="btn btn-sm btn-outline-secondary" target="_blank" href="<?= esc($pf['link_repo']) ?>">Repo</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php if(empty($portofolio)): ?>
  <div class="col-12 text-muted">Belum ada portofolio.</div>
<?php endif; ?>
</div>
<?= $this->endSection() ?>
