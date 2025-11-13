<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CV Interaktif</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/lucide-static@latest/font/lucide.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    body{font-family:'Inter',sans-serif;background-color:#f8fafc}
    ::-webkit-scrollbar{width:8px}
    ::-webkit-scrollbar-track{background:#e2e8f0}
    ::-webkit-scrollbar-thumb{background:#94a3b8;border-radius:4px}
    ::-webkit-scrollbar-thumb:hover{background:#64748b}
    .page-section{display:none;animation:fadeIn .5s ease-out}
    .page-section.active{display:block}
    @keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
    .timeline-item::before{content:'';position:absolute;left:-33px;top:0;width:16px;height:16px;border-radius:50%;border:3px solid #38bdf8;background:#f8fafc;z-index:10}
    .filter-btn.active{background-color:#0284c7;color:white;font-weight:600}
  </style>
</head>
<body class="text-slate-700">
  <!-- ====== SIDEBAR + CONTENT (SALIN PERSIS DARI HTML KAMU) ====== -->
  <!-- ... (SELURUH MARKUP HTML KAMU YANG PANJANG ITU TETAP SAMA) ... -->
  <!-- Saya sengaja tidak menempel ulang penuh biar tidak memenuhi layar.
       Cukup salin markup HTML kamu ke sini tanpa perubahan. -->

  <!-- ========== SCRIPT ========== -->
  <script>
    // Base URL CI4
    const BASE_URL = '<?= base_url() ?>';
    // Data dari controller
    const mockData = <?= $mockJson ?? 'null' ?>;
  </script>

  <script>
    // ====== SELURUH FUNGSI RENDER & NAVIGASI DARI KODE KAMU (TANPA UBAH) ======
    // renderBiodata, renderPendidikan, renderPengalaman, renderKeahlian, renderPortofolio, renderStats,
    // navigateTo, initNavigation, initExperienceFilters
    // (Tempel persis fungsi-fungsinya di sini dari file kamu)

    // ---- TITIK MASUK APLIKASI ----
    document.addEventListener('DOMContentLoaded', () => {
      if (!mockData) {
        console.error('Data kosong: mockData tidak dikirim dari controller.');
        return;
      }

      renderBiodata(mockData.biodata);
      renderStats(mockData);
      renderPendidikan(mockData.pendidikan);
      renderPengalaman(mockData.pengalaman, 'Semua');
      renderKeahlian(mockData.keahlian);
      renderPortofolio(mockData.portofolio);

      initNavigation();
      initExperienceFilters();
      navigateTo('home');

      if (window.lucide && typeof lucide.createIcons === 'function') {
        lucide.createIcons();
      }
    });
  </script>
</body>
</html>
