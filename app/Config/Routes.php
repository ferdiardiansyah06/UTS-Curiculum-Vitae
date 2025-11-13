<?php
$routes->get('/', 'Home::index');  // root domain
$routes->get('cv', 'Home::index'); // akses localhost:8081/cv
$routes->get('/pendidikan', 'Cv::pendidikan');
$routes->get('/pengalaman', 'Cv::pengalaman');
$routes->get('/keahlian', 'Cv::keahlian');
$routes->get('/portofolio', 'Cv::portofolio');  // opsional