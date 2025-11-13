<?php
function getSkillIcon($name){
  $key = strtolower(preg_replace('/[^a-z0-9]+/i', '', (string)$name));

  $aliases = [
    'javascripts'  => 'javascript',
    'javascript'   => 'javascript',
    'javacript'    => 'javascript',
    'javascriptes' => 'javascript',
    'javasript'    => 'javascript',
    'js'           => 'javascript',
    'ecmascript'   => 'javascript',
    'html' => 'html5',
    'css'  => 'css',
    'react'       => 'react',
    'reactjs'     => 'react',
    'vuedotjs'    => 'vuedotjs',
    'vue'         => 'vuedotjs',
    'vuejs'       => 'vuedotjs',
    'tailwindcss' => 'tailwindcss',
    'typescript'  => 'typescript',
    'node'        => 'nodedotjs',
    'nodejs'      => 'nodedotjs',
    'php'         => 'php',
    'python'      => 'python',
    'codeigniter' => 'codeigniter',
    'mysql'       => 'mysql',
    'postgresql'  => 'postgresql',
    'mongodb'     => 'mongodb',
    'git'         => 'git',
    'java'        => 'openjdk',
  ];

  $brandColor = [
    'javascript'  => 'F7DF1E',
    'html5'       => 'E34F26',
    'css'        => '1572B6',
    'react'       => '61DAFB',
    'vuedotjs'    => '41B883',
    'tailwindcss' => '38BDF8',
    'typescript'  => '3178C6',
    'nodedotjs'   => '5FA04E',
    'php'         => '777BB4',
    'python'      => '3776AB',
    'codeigniter' => 'EE4623',
    'mysql'       => '4479A1',
    'postgresql'  => '4169E1',
    'mongodb'     => '47A248',
    'git'         => 'F05032',
    'openjdk'     => '000000',
  ];

  $slug = $aliases[$key] ?? null;

  if ($slug) {
    $color = $brandColor[$slug] ?? '4B5563';
    $url   = "https://cdn.simpleicons.org/{$slug}/{$color}";
    $safeUrl  = function_exists('esc') ? esc($url)   : $url;
    $safeName = function_exists('esc') ? esc($name) : $name;

    return '<img class="skill-img" src="'.$safeUrl
         .'" alt="'.$safeName.' logo" loading="lazy" referrerpolicy="no-referrer" />';
  }

  return '<svg class="skill-img" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10" fill="#9CA3AF"/></svg>';
}

$NAV_BRAND_NAME = 'CV';
$current_page = $_GET['page'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($biodata['nama_lengkap']) ?> - Curriculum Vitae</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#8b5cf6',
                        accent: '#06b6d4',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .skill-logo{
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg,#eff6ff 0%,#f5f3ff 100%);
            border: 1px solid rgba(59,130,246,.25);
            box-shadow: 0 6px 18px rgba(0,0,0,.06);
            transition: transform .35s cubic-bezier(.2,.8,.2,1), box-shadow .35s;
        }
        
        .skill-img{
            width: 30px;
            height: 30px;
            object-fit: contain;
            display: block;
        }

        .skill-logo:hover{
            transform: translateY(-4px) scale(1.06) rotate(-1.5deg);
            box-shadow: 0 16px 38px rgba(59,130,246,.25);
        }

        .reveal{ 
            opacity: 0; 
            transform: translateY(18px) scale(.98); 
        }
        
        .reveal.show{ 
            opacity: 1; 
            transform: translateY(0) scale(1); 
            transition: all .6s ease; 
        }

        .skills-card{
            transition: transform .35s cubic-bezier(.2,.8,.2,1), box-shadow .35s;
        }
        
        .skills-card:hover{
            transform: translateY(-6px);
            box-shadow: 0 24px 40px -10px rgba(0,0,0,.12);
        }

        .skill-label{
            margin-top: .35rem;
            font-size: .72rem;
            color: #334155;
            font-weight: 600;
            letter-spacing: .2px;
            text-align: center;
            white-space: nowrap;
        }

        .skills-row{
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            row-gap: 16px;
            align-items: center;
        }

        .skill-cell{
            flex: 0 0 auto;
        }

        @media (min-width:768px){
            .skill-logo{ width: 60px; height: 60px; }
            .skill-img{ width: 34px; height: 34px; }
            .skill-label{ font-size: .78rem; }
        }

        .page-transition {
            animation: fadeInUp 0.5s ease-out;
        }

        .timeline-item {
            opacity: 0;
            transform: translateX(-20px);
            animation: slideInLeft 0.6s ease-out forwards;
        }

        .timeline-item:nth-child(even) {
            transform: translateX(20px);
            animation: slideInRight 0.6s ease-out forwards;
        }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .stagger-item {
            opacity: 0;
            transform: translateY(20px);
        }

        .stagger-item.show {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .section-header {
            position: relative;
            display: inline-block;
            padding-bottom: 1rem;
        }

        .section-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            border-radius: 2px;
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 bg-white/90 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="?page=home" class="text-2xl font-bold gradient-text"><?= esc($NAV_BRAND_NAME) ?></a>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="?page=home" class="nav-link text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium <?= $current_page === 'home' ? 'active' : '' ?>">Home</a>
                    <a href="?page=pendidikan" class="nav-link text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium <?= $current_page === 'pendidikan' ? 'active' : '' ?>">Pendidikan</a>
                    <a href="?page=pengalaman" class="nav-link text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium <?= $current_page === 'pengalaman' ? 'active' : '' ?>">Pengalaman</a>
                    <a href="?page=keahlian" class="nav-link text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium <?= $current_page === 'keahlian' ? 'active' : '' ?>">Keahlian</a>
                    <a href="?page=portofolio" class="nav-link text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium <?= $current_page === 'portofolio' ? 'active' : '' ?>">Portofolio</a>
                </div>
                <button id="mobile-menu-button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-primary focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="?page=home" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50">Home</a>
                <a href="?page=pendidikan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50">Pendidikan</a>
                <a href="?page=pengalaman" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50">Pengalaman</a>
                <a href="?page=keahlian" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50">Keahlian</a>
                <a href="?page=portofolio" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50">Portofolio</a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="page-transition">
        <?php if ($current_page === 'home'): ?>
            <!-- Hero Section -->
            <section class="pt-24 pb-16 px-4 bg-gradient-to-br from-blue-50 via-purple-50 to-cyan-50 min-h-screen flex items-center">
                <div class="max-w-7xl mx-auto w-full">
                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <div class="animate-fade-in-up">
                            <div class="mb-6">
                                <span class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-4">
                                    Curriculum Vitae
                                </span>
                                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-4">
                                    <?= esc($biodata['nama_lengkap']) ?>
                                    <?php if (!empty($biodata['gelar'])): ?>
                                        <span class="text-3xl md:text-4xl text-gray-600 block mt-2"><?= esc($biodata['gelar']) ?></span>
                                    <?php endif; ?>
                                </h1>
                            </div>
                            
                            <p class="text-xl text-gray-700 mb-8 leading-relaxed">
                                <?= esc($biodata['tentang_saya']) ?>
                            </p>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                                <?php if (!empty($biodata['telepon'])): ?>
                                <div class="flex items-center text-gray-700 bg-white p-4 rounded-lg shadow-sm">
                                    <svg class="w-5 h-5 mr-3 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span class="text-sm"><?= esc($biodata['telepon']) ?></span>
                                </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($biodata['email'])): ?>
                                <div class="flex items-center text-gray-700 bg-white p-4 rounded-lg shadow-sm">
                                    <svg class="w-5 h-5 mr-3 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm"><?= esc($biodata['email']) ?></span>
                                </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($biodata['alamat'])): ?>
                                <div class="flex items-center text-gray-700 bg-white p-4 rounded-lg shadow-sm sm:col-span-2">
                                    <svg class="w-5 h-5 mr-3 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    <span class="text-sm"><?= esc($biodata['alamat']) ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="flex flex-wrap gap-4">
                                <?php if (!empty($biodata['email'])): ?>
                                <a href="mailto:<?= esc($biodata['email']) ?>" class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-lg hover:bg-blue-600 transition shadow-md">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Hubungi Saya
                                </a>
                                <?php endif; ?>
                                
                                <a href="?page=portofolio" class="inline-flex items-center px-6 py-3 bg-white text-primary border-2 border-primary rounded-lg hover:bg-primary hover:text-white transition shadow-md">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Lihat Portofolio
                                </a>
                            </div>
                            
                            <?php if (!empty($biodata['linkedin']) || !empty($biodata['github']) || !empty($biodata['website'])): ?>
                            <div class="flex gap-4 mt-6">
                                <?php if (!empty($biodata['linkedin'])): ?>
                                <a href="<?= esc($biodata['linkedin']) ?>" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition shadow-md text-gray-700">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                </a>
                                <?php endif; ?>
                                
                                <?php if (!empty($biodata['github'])): ?>
                                <a href="<?= esc($biodata['github']) ?>" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-gray-800 hover:text-white transition shadow-md text-gray-700">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                </a>
                                <?php endif; ?>
                                
                                <?php if (!empty($biodata['website'])): ?>
                                <a href="<?= esc($biodata['website']) ?>" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-accent hover:text-white transition shadow-md text-gray-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                    </svg>
                                </a>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="animate-fade-in-up flex justify-center md:justify-end">
                            <div class="relative">
                                <?php
                                // jika $biodata mungkin null, guard dulu
                                $fotoProfil = trim($biodata['foto_profil'] ?? '');

                                if ($fotoProfil !== '' && filter_var($fotoProfil, FILTER_VALIDATE_URL)) {
                                    $fotoUrl = $fotoProfil;
                                } else {
                                    $fotoProfil = ltrim($fotoProfil, '/');
                                    $fotoProfil = str_replace('\\', '/', $fotoProfil);

                                    if (str_starts_with($fotoProfil, 'public/')) {
                                        $fotoProfil = substr($fotoProfil, 7);
                                    }

                                    if ($fotoProfil === '') {
                                        $fotoProfil = 'profile.jpg';
                                    }

                                    // Pastikan berada dalam direktori uploads
                                    if (! str_starts_with($fotoProfil, 'uploads/')) {
                                        $fotoProfil = 'uploads/' . $fotoProfil;
                                    }

                                    // Jika file tidak ditemukan, fallback ke default
                                    if (! is_file(FCPATH . $fotoProfil)) {
                                        $fotoProfil = 'uploads/profile.jpg';
                                    }

                                    $fotoUrl = base_url($fotoProfil);
                                }
                                ?>
                                <img src="<?= esc($fotoUrl) ?>" alt="Foto Profil" class="rounded-3xl shadow-2xl border-4 border-white/60 w-56 h-56 md:w-72 md:h-72 object-cover">
                            </div>
                        </div>
                    </div>
                
                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16">
                        <div class="bg-white rounded-xl p-6 shadow-lg text-center card-hover">
                            <div class="text-3xl font-bold text-primary mb-2"><?= count($pendidikan) ?></div>
                            <div class="text-gray-600 text-sm">Riwayat Pendidikan</div>
                        </div>
                        <div class="bg-white rounded-xl p-6 shadow-lg text-center card-hover">
                            <div class="text-3xl font-bold text-secondary mb-2"><?= count($pengalaman) ?></div>
                            <div class="text-gray-600 text-sm">Pengalaman</div>
                        </div>
                        <div class="bg-white rounded-xl p-6 shadow-lg text-center card-hover">
                            <div class="text-3xl font-bold text-accent mb-2"><?= count($keahlian) ?></div>
                            <div class="text-gray-600 text-sm">Kategori Keahlian</div>
                        </div>
                        <div class="bg-white rounded-xl p-6 shadow-lg text-center card-hover">
                            <div class="text-3xl font-bold text-orange-500 mb-2"><?= count($portofolio) ?></div>
                            <div class="text-gray-600 text-sm">Proyek Portofolio</div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ($current_page === 'pendidikan'): ?>
            <!-- Pendidikan Page -->
            <section class="pt-24 pb-16 px-4 min-h-screen">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-16">
                        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-4 section-header">
                            Riwayat <span class="gradient-text">Pendidikan</span>
                        </h1>
                        <p class="text-xl text-gray-600 mt-8">Perjalanan akademis dan pencapaian pendidikan formal</p>
                    </div>
                    
                    <div class="relative">
                        <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-primary via-secondary to-accent rounded-full"></div>
                        
                        <?php foreach ($pendidikan as $index => $edu): ?>
                        <div class="relative mb-12 timeline-item <?= $index % 2 == 0 ? 'md:text-right' : 'md:text-left' ?>" style="animation-delay: <?= $index * 0.2 ?>s">
                            <div class="md:w-1/2 <?= $index % 2 == 0 ? 'md:ml-auto md:pl-12' : 'md:pr-12' ?>">
                                <div class="bg-white rounded-xl p-8 shadow-xl card-hover border border-gray-100">
                                    <div class="hidden md:block absolute top-8 left-1/2 transform -translate-x-1/2 w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                        </svg>
                                    </div>
                                    
                                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-full text-sm font-semibold mb-4 shadow-md">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <?= esc($edu['tahun_mulai']) ?> - <?= $edu['tahun_selesai'] ? esc($edu['tahun_selesai']) : 'Sekarang' ?>
                                    </div>
                                    
                                    <h3 class="text-2xl font-bold text-gray-900 mb-3"><?= esc($edu['jenjang']) ?></h3>
                                    <h4 class="text-xl font-semibold text-primary mb-3"><?= esc($edu['institusi']) ?></h4>
                                    
                                    <?php if (!empty($edu['jurusan'])): ?>
                                    <div class="flex items-center <?= $index % 2 == 0 ? 'md:justify-end' : 'md:justify-start' ?> mb-3">
                                        <div class="inline-flex items-center px-4 py-2 bg-purple-50 text-secondary rounded-lg">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                            <span class="font-medium"><?= esc($edu['jurusan']) ?></span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($edu['ipk'])): ?>
                                    <div class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg shadow-sm mb-4">
                                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                        </svg>
                                        <span class="text-gray-600 text-sm font-medium mr-2">IPK:</span>
                                        <span class="text-green-600 font-bold text-xl"><?= number_format($edu['ipk'], 2) ?></span>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($edu['deskripsi'])): ?>
                                    <div class="mt-4 pt-4 border-t border-gray-100">
                                        <p class="text-gray-700 leading-relaxed"><?= esc($edu['deskripsi']) ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($current_page === 'pengalaman'): ?>
            <!-- Pengalaman Page -->
            <section class="pt-24 pb-16 px-4 min-h-screen bg-gray-50">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-16">
                        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-4 section-header">
                            Pengalaman <span class="gradient-text">Profesional</span>
                        </h1>
                        <p class="text-xl text-gray-600 mt-8">Perjalanan karir dan kontribusi di berbagai perusahaan</p>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        <?php foreach ($pengalaman as $index => $exp): ?>
                        <article class="bg-white rounded-xl p-8 shadow-xl card-hover border border-gray-100 stagger-item" style="animation-delay: <?= $index * 0.15 ?>s">
                            <header class="mb-6">
                                <div class="flex items-start justify-between mb-4">
                                    <span class="inline-flex items-center px-4 py-2 text-xs font-semibold rounded-full shadow-sm <?php 
                                        echo $exp['jenis_pengalaman'] === 'pekerjaan' ? 'bg-blue-100 text-primary' : 
                                            ($exp['jenis_pengalaman'] === 'magang' ? 'bg-cyan-100 text-accent' : 
                                            ($exp['jenis_pengalaman'] === 'organisasi' ? 'bg-purple-100 text-secondary' : 'bg-gray-100 text-gray-600'));
                                    ?>">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                                        </svg>
                                        <?= ucfirst(esc($exp['jenis_pengalaman'])) ?>
                                    </span>
                                    
                                    <?php if ($exp['sedang_berlangsung']): ?>
                                    <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                        Aktif
                                    </span>
                                    <?php endif; ?>
                                </div>
                                
                                <h3 class="text-2xl font-bold text-gray-900 mb-2"><?= esc($exp['judul']) ?></h3>
                                <p class="text-lg font-semibold text-primary mb-4"><?= esc($exp['perusahaan_organisasi']) ?></p>
                            </header>
                            
                            <div class="flex flex-wrap items-center gap-4 text-gray-600 text-sm mb-6 pb-6 border-b border-gray-100">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="font-medium"><?= esc($exp['tahun_mulai']) ?> - <?= $exp['sedang_berlangsung'] ? 'Sekarang' : esc($exp['tahun_selesai']) ?></span>
                                </div>
                                
                                <?php if (!empty($exp['lokasi'])): ?>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span><?= esc($exp['lokasi']) ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php if (!empty($exp['deskripsi'])): ?>
                            <div class="text-gray-700 leading-relaxed">
                                <p><?= nl2br(esc($exp['deskripsi'])) ?></p>
                            </div>
                            <?php endif; ?>
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($current_page == 'keahlian'): ?>
            <!-- Keahlian Page -->
            <section class="pt-24 pb-16 px-4 min-h-screen">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-16">
                        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-4 section-header">
                            <span class="gradient-text">Keahlian</span> & Kompetensi
                        </h1>
                        <p class="text-xl text-gray-600 mt-8">Keterampilan teknis dan non-teknis yang dikuasai</p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Back End Category -->
                        <div class="bg-white rounded-xl p-8 shadow-xl skills-card border border-gray-100 stagger-item" style="animation-delay: 0.2s">
                            <div class="flex items-center mb-6">
                                <div class="w-3 h-12 bg-gradient-to-b from-primary via-secondary to-accent rounded-full mr-4"></div>
                                <h3 class="text-2xl font-bold text-gray-900">Back End</h3>
                            </div>

                            <div class="skills-row">
                                <?php
                                $backend_skills = [
                                    'Node.js',
                                    'PHP',
                                    'Python',
                                    'CodeIgniter'
                                ];
                                foreach ($backend_skills as $skill):
                                ?>
                                    <div class="skill-cell flex flex-col items-center">
                                        <div class="skill-logo" title="<?= esc($skill) ?>">
                                            <?= getSkillIcon($skill) ?>
                                        </div>
                                        <span class="skill-label"><?= esc($skill) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Database Category -->
                        <div class="bg-white rounded-xl p-8 shadow-xl skills-card border border-gray-100 stagger-item" style="animation-delay: 0.4s">
                            <div class="flex items-center mb-6">
                                <div class="w-3 h-12 bg-gradient-to-b from-primary via-secondary to-accent rounded-full mr-4"></div>
                                <h3 class="text-2xl font-bold text-gray-900">Database</h3>
                            </div>

                            <div class="skills-row">
                                <?php
                                $database_skills = [
                                    'MySQL',
                                    'PostgreSQL',
                                    'MongoDB'
                                ];
                                foreach ($database_skills as $skill):
                                ?>
                                    <div class="skill-cell flex flex-col items-center">
                                        <div class="skill-logo" title="<?= esc($skill) ?>">
                                            <?= getSkillIcon($skill) ?>
                                        </div>
                                        <span class="skill-label"><?= esc($skill) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- DevOps Category -->
                        <div class="bg-white rounded-xl p-8 shadow-xl skills-card border border-gray-100 stagger-item" style="animation-delay: 0.6s">
                            <div class="flex items-center mb-6">
                                <div class="w-3 h-12 bg-gradient-to-b from-primary via-secondary to-accent rounded-full mr-4"></div>
                                <h3 class="text-2xl font-bold text-gray-900">DevOps</h3>
                            </div>

                            <div class="skills-row">
                                <?php
                                $devops_skills = [
                                    'Git'
                                ];
                                foreach ($devops_skills as $skill):
                                ?>
                                    <div class="skill-cell flex flex-col items-center">
                                        <div class="skill-logo" title="<?= esc($skill) ?>">
                                            <?= getSkillIcon($skill) ?>
                                        </div>
                                        <span class="skill-label"><?= esc($skill) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Front End Category -->
                        <div class="bg-white rounded-xl p-8 shadow-xl skills-card border border-gray-100 stagger-item" style="animation-delay: 0.8s">
                            <div class="flex items-center mb-6">
                                <div class="w-3 h-12 bg-gradient-to-b from-primary via-secondary to-accent rounded-full mr-4"></div>
                                <h3 class="text-2xl font-bold text-gray-900">Front End</h3>
                            </div>

                            <div class="skills-row">
                                <?php
                                $frontend_skills = [
                                    'React.js',
                                    'Tailwind CSS',
                                    'HTML',
                                    'CSS',
                                    'JavaScript'
                                ];
                                foreach ($frontend_skills as $skill):
                                ?>
                                    <div class="skill-cell flex flex-col items-center">
                                        <div class="skill-logo" title="<?= esc($skill) ?>">
                                            <?= getSkillIcon($skill) ?>
                                        </div>
                                        <span class="skill-label"><?= esc($skill) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ($current_page === 'portofolio'): ?>
 <!-- Portofolio Page -->
<section class="pt-24 pb-16 px-4 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-4 section-header">
                <span class="gradient-text">Portofolio</span> & Proyek
            </h1>
            <p class="text-xl text-gray-600 mt-8">Project Yang Sudah Saya Buat</p>
        </div>
        
        <?php if (empty($portofolio)): ?>
        <div class="text-center py-20">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <p class="text-gray-500 text-lg">Belum ada portofolio yang ditampilkan</p>
            <a href="?page=home" class="inline-flex items-center mt-6 px-6 py-3 bg-primary text-white rounded-lg hover:bg-blue-600 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Home
            </a>
        </div>
        <?php else: ?>
        <div class="grid md:grid-cols-2 gap-8">
            <?php foreach ($portofolio as $index => $project): ?>
            <article class="bg-white rounded-xl shadow-xl overflow-hidden card-hover border border-gray-100 stagger-item" style="animation-delay: <?= $index * 0.15 ?>s">
                <div class="relative h-64 overflow-hidden bg-gradient-to-br from-blue-50 to-purple-50">
                    <img 
                    src="<?= base_url(esc($project['gambar'])) ?>" 
                    alt="<?= esc($project['judul']) ?>" 
                    onerror="this.onerror=null; this.src='/uploads/sampah.png';"
                    class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"/>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    
                    <?php if (!empty($project['tahun'])): ?>
                    <div class="absolute top-4 right-4">
                        <span class="inline-flex items-center px-4 py-2 bg-white/90 backdrop-blur-sm rounded-full text-sm font-semibold text-gray-800 shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <?= esc($project['tahun']) ?>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3"><?= esc($project['judul']) ?></h3>
                    
                    <?php if (!empty($project['deskripsi'])): ?>
                    <p class="text-gray-700 leading-relaxed mb-6"><?= esc($project['deskripsi']) ?></p>
                    <?php endif; ?>
                    
                    <?php if (!empty($project['teknologi'])): ?>
                    <div class="mb-6">
                        <p class="text-sm text-gray-600 font-semibold mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                            Teknologi yang Digunakan:
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach (explode(',', $project['teknologi']) as $tech): ?>
                            <span class="px-3 py-1 bg-gradient-to-r from-blue-50 to-purple-50 text-primary text-sm font-medium rounded-full border border-primary/20">
                                <?= esc(trim($tech)) ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="flex gap-4 pt-6 border-t border-gray-100">
                        <?php if (!empty($project['link_github'])): ?>
                        <a href="<?= esc($project['link_github']) ?>" 
                           target="_blank" 
                           class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition shadow-md">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            GitHub
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
</main>

        <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-4 text-center">
    <div class="max-w-5xl mx-auto flex flex-col items-center">
        
        <!-- Bagian Nama dan Deskripsi -->
        <div class="mb-6">
        <h3 class="text-2xl font-bold mb-2"><?= esc($biodata['nama_lengkap']) ?></h3>
        <p class="text-gray-400 max-w-xl mx-auto">
            Profesional yang berdedikasi dengan passion dalam pengembangan dan inovasi teknologi.
        </p>
        </div>

        <!-- Bagian Sosial Media -->
        <div class="flex justify-center gap-4 mb-8">
        <?php if (!empty($biodata['email'])): ?>
        <a href="mailto:<?= esc($biodata['email']) ?>" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </a>
        <?php endif; ?>

        <?php if (!empty($biodata['linkedin'])): ?>
        <a href="<?= esc($biodata['linkedin']) ?>" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
            </svg>
        </a>
        <?php endif; ?>

        <?php if (!empty($biodata['github'])): ?>
        <a href="<?= esc($biodata['github']) ?>" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
            </svg>
        </a>
        <?php endif; ?>

        <?php if (!empty($biodata['website'])): ?>
        <a href="<?= esc($biodata['website']) ?>" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-accent transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
            </svg>
        </a>
        <?php endif; ?>
        </div>

        <!-- Bagian Copyright -->
        <div class="border-t border-gray-800 pt-6 w-full">
        <p class="text-gray-400 text-sm">
            &copy; <?= date('Y') ?> <?= esc($biodata['nama_lengkap']) ?>. Built with <span class="text-primary font-semibold">CodeIgniter 4</span> & Tailwind CSS.
        </p>
        </div>
    </div>
    </footer>


    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
        
        // Stagger animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.stagger-item').forEach(el => {
            observer.observe(el);
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>