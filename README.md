# Bandung Travel - Wisata Bandung (VSGA - JWD 2024)

### ⚠️ NOTE: Proyek ini masih dalam tahap pengembangan.

## 📃 Deskripsi
**Bandung Travel** adalah aplikasi pemesanan paket wisata di Bandung. Aplikasi ini memungkinkan pengguna untuk memilih dan memesan berbagai paket wisata dengan layanan yang dapat disesuaikan seperti penginapan, transportasi, dan konsumsi.

## 🌐 Fitur
- **Pemilihan Paket Wisata:** Pengguna dapat memilih berbagai paket wisata yang tersedia.
- **Pemesanan Layanan Tambahan:** Pengguna dapat memilih layanan tambahan seperti penginapan, transportasi, dan konsumsi.
- **Kalkulasi Harga Dinamis:** Harga total akan otomatis dihitung berdasarkan pilihan layanan dan jumlah peserta.
- **Manajemen Diskon:** Diskon otomatis diterapkan jika syarat tertentu terpenuhi.

## 🛠️ Instalasi

1. Clone repositori ini ke lokal Anda:
    ```bash
    git clone https://github.com/MrFatra/bandungtravel.git
    ```

2. Pindah ke direktori proyek:
    ```bash
    cd bandungtravel
    ```

3. Setup database:
    - Buat database MySQL dengan nama `db_pariwisata`.
    - Import file SQL yang berada di folder `database` ke database MySQL Anda.

4. Sesuaikan konfigurasi database di file `connect.php`:
    ```php
    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'db_pariwisata';

    $connect = mysqli_connect($host, $user, $password, $database);
    
    if (!$connect) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    ?>
    ```

5. Jalankan proyek menggunakan XAMPP atau server lokal lainnya, dan akses melalui browser:
    ```
    http://localhost/bandungtravel
    ```

## 📖 Penggunaan
1. Pilih paket wisata yang tersedia di halaman utama.
2. Isi detail pemesan, tanggal, durasi perjalanan, dan jumlah peserta.
3. Pilih layanan tambahan yang diinginkan.
4. Klik tombol **Booking** untuk melakukan pemesanan.

## ⚙️ Teknologi yang Digunakan
- **PHP**: Backend processing.
- **MySQL**: Database untuk menyimpan informasi pengguna dan pemesanan.
- **Tailwind CSS & DaisyUI**: Styling UI.
- **JavaScript**: Untuk interaksi pengguna dan kalkulasi dinamis.
