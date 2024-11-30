<?php
// pengaturan Database
define('DB_HOST', 'localhost');
define('DB_NAME', 'my_database');
define('DB_USER', 'root');
define('DB_PASS', '');  // sesuaikan dengan password database


// pengaturan umum
$base_url = 'http://localhost/cmsBuatan/simpleCMS/'; // wajib memberikan akhiran slash "/" diakhir url
define('BASE_URL_SITE', $base_url . 'public/');  // URL situs
define('BASE_URL_ADMIN', $base_url . 'admin/');  // URL admin
define('BASE_URL_UPLOADS', $base_url . 'uploads/');  // URL direktori uploads
define('APP_NAME', 'NamaSitus');
define('APP_TAGLINE', 'Solusi untuk segala kehidupan Anda');

// pengaturan homepage
define('CTA_NAME', 'Info Lengkap');
define('CTA_LINK', '#about');
define('ABOUT_TEXT', '
    TEXT DISINI. dan seterusnya..  
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
    Dolorum odit eaque aliquid? Asperiores voluptatum odit esse laborum, unde eligendi voluptates, 
    sapiente exercitationem beatae blanditiis amet doloribus iure similique voluptatem impedit!
');
define('GMAPS_IFRAME', 'iframe alamat gmaps >> https://iframex.com/google/?lang=en');
define('ALAMAT_TEXT', 'Jl. Veteran Perang No.29, Ragnus, Kec. Kuring, Kota Sarung, Banten 52443');


// pengaturan post
define('WA_NUMBER', '628xxxxxx');
define('WA_TEXT', 'halo saya ingin konsultasi produk anda');
define('WA_LINK', 
    'https://web.whatsapp.com/send?phone=' 
    . WA_NUMBER 
    . '&text=' 
    . WA_TEXT 
);
define('WA_BTN_NAME', 'WhatsApp');
