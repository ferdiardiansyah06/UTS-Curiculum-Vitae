<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tidak Ditemukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-red-500 mb-4">404</h1>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Data Tidak Ditemukan</h2>
        <p class="text-gray-600 mb-8">Biodata belum tersedia di database. Silakan insert data terlebih dahulu.</p>
        
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 max-w-md mx-auto">
            <p class="text-yellow-800 text-sm">
                <strong>Cara mengisi data:</strong><br>
                1. Buka MySQL/phpMyAdmin<br>
                2. Pilih database <code>cv_database</code><br>
                3. Jalankan script SQL yang sudah disediakan
            </p>
        </div>
        
        <a href="/" class="inline-block px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
            Kembali ke Home
        </a>
    </div>
</body>
</html>