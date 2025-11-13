<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="hero p-4 p-md-5 mb-4">
  <div class="row align-items-center g-4">
    <div class="col-md-8">
      <h1 class="fw-bold mb-2"><?= esc($biodata['nama'] ?? 'Nama') ?></h1>
      <p class="lead mb-3"><?= esc($biodata['headline'] ?? '') ?></p>
      <div class="d-flex flex-wrap gap-2">
        <?php if(!empty($biodata['email'])): ?>
          <a class="btn btn-light btn-sm" href="mailto:<?= esc($biodata['email']) ?>">Email</a>
        <?php endif; ?>
        <?php if(!empty($biodata['linkedin'])): ?>
          <a class="btn btn-outline-light btn-sm" target="_blank" href="<?= esc($biodata['linkedin']) ?>">LinkedIn</a>
        <?php endif; ?>
        <?php if(!empty($biodata['github'])): ?>
          <a class="btn btn-outline-light btn-sm" target="_blank" href="<?= esc($biodata['github']) ?>">GitHub</a>
        <?php endif; ?>
        <?php if(!empty($biodata['website'])): ?>
          <a class="btn btn-outline-light btn-sm" target="_blank" href="<?= esc($biodata['website']) ?>">Website</a>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-md-4 text-md-end text-center">
      <img class="avatar" src="<?= esc($biodata['foto'] ?? 'https://via.placeholder.com/140') ?>" alt="Foto Profil">
    </div>
  </div>
</section>

<div class="row g-4">
  <div class="col-lg-8">
    <div class="card card-hover">
      <div class="card-body">
        <h5 class="card-title">Tentang Saya</h5>
        <p class="card-text mb-1"><strong>Lokasi:</strong> <?= esc($biodata['alamat'] ?? '-') ?></p>
        <p class="card-text"><?= nl2br(esc($biodata['ringkas'] ?? '')) ?></p>
      </div>
    </div>

    <div class="card card-hover mt-4">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title mb-0">Pengalaman Terbaru</h5>
          <a class="small" href="/pengalaman">Lihat semua</a>
        </div>
        <hr>
        <?php foreach (array_slice($pengalaman,0,3) as $p): ?>
          <div class="mb-3">
            <div class="d-flex justify-content-between">
              <strong><?= esc($p['posisi']) ?> — <?= esc($p['instansi']) ?></strong>
              <span class="text-muted small">
                <?= esc($p['mulai']) ?> – <?= $p['selesai'] ?: 'Sekarang' ?>
              </span>
            </div>
            <div class="text-muted small"><?= esc($p['tipe']) ?> • <?= esc($p['lokasi']) ?></div>
            <div><?= nl2br(esc($p['deskripsi'])) ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="card card-hover mt-4">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title mb-0">Portofolio Pilihan</h5>
          <a class="small" href="/portofolio">Lihat semua</a>
        </div>
        <hr>
        <div class="row g-3">
          <?php foreach (array_slice($portofolio,0,3) as $pf): ?>
            <div class="col-md-4">
              <div class="card h-100">
                <?php if(!empty($pf['thumbnail'])): ?>
                  <img class="card-img-top" src="<?= esc($pf['thumbnail']) ?>" alt="">
                <?php endif; ?>
                <div class="card-body">
                  <h6 class="card-title mb-1"><?= esc($pf['judul']) ?></h6>
                  <div class="text-muted small mb-2"><?= esc($pf['peran']) ?> • <?= esc($pf['tahun']) ?></div>
                  <p class="small mb-2"><?= esc($pf['ringkas']) ?></p>
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
            <div class="col-12 text-muted small">Belum ada portofolio.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card card-hover">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title mb-0">Keahlian</h5>
          <a class="small" href="/keahlian">Detail</a>
        </div>
        <hr>
        <?php foreach ($keahlian as $k): ?>
          <div class="mb-2">
            <div class="d-flex justify-content-between">
              <span class="badge bg-light text-dark badge-skill"><?= esc($k['nama']) ?></span>
              <small class="text-muted"><?= esc($k['level']) ?> • <?= (int)$k['persen'] ?>%</small>
            </div>
            <div class="progress" style="height:8px;">
              <div class="progress-bar" role="progressbar" style="width: <?= (int)$k['persen'] ?>%;"></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="card card-hover mt-4">
      <div class="card-body">
        <h5 class="card-title">Pendidikan Singkat</h5>
        <hr>
        <?php foreach (array_slice($pendidikan,0,3) as $ed): ?>
          <div class="mb-2">
            <strong><?= esc($ed['institusi']) ?></strong>
            <div class="small text-muted"><?= esc($ed['jenjang']) ?> • <?= esc($ed['program']) ?> (<?= esc($ed['tahun_mulai']) ?>–<?= esc($ed['tahun_selesai']) ?>)</div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="card card-hover mt-4">
      <div class="card-body">
        <h5 class="card-title">Kontak</h5>
        <p class="mb-1"><strong>Email:</strong> <?= esc($biodata['email'] ?? '-') ?></p>
        <p class="mb-1"><strong>Telepon:</strong> <?= esc($biodata['phone'] ?? '-') ?></p>
        <p class="mb-0"><strong>Alamat:</strong> <?= esc($biodata['alamat'] ?? '-') ?></p>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
