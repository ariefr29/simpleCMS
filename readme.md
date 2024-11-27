CMS Sederhana
=============

CMS (Content Management System) Sederhana, simpel menggunakan PHP native.

CMS ini terdiri dari dua bagian utama:

1.  **Public Area:** Tampilan depan untuk publik.
2.  **Admin Area:** Bagian belakang, untuk admin mengelola konten (tambah, edit atau hapus postingan), hanya dapat diakses dengan login.


Instalasi
---------

### Membuat Database

1.  Buat database serta tabel `user` dan `post`:
    
    ```sql    
    CREATE DATABASE my_database;
    USE my_database;

    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        featured_image VARCHAR(255) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    ```

    Ubah `my_database` dengan nama database yang di inginkan.
    
2.  Buat user admin dan password pada database yang baru dibuat tadi:
    
    ```sql
    INSERT INTO users (username, password) VALUES
    ('admin', 'hash_password');
    ```
    
    Ganti `hash_password` dengan text yang sudah di hash.
    

### Pengaturan Awal

1.  **Konfigurasi Database**
    
    pada file `includes/config.php` sesuaikan dengan database yang ada:
    
    ```php
    // pengaturan Database
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'my_database');
    define('DB_USER', 'root');
    define('DB_PASS', ''); 
    ```
    
2.  **Pengaturan Umum**
    
    Masih di file `includes/config.php`. Terdapat part2 code untuk mengatur nama situs, dsb. Silahkan sesuaikan saja.. 
    
    ```php
    // pengaturan umum
    $base_url = 'http://localhost/cmsBuatan/simpleCMS/'; 
    # code
    
    // pengaturan homepage
    # code
    
    
    // pengaturan post
    # code
    ```