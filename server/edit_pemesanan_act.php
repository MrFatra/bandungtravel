<?php
include '../connect.php';
session_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $tanggal = $_POST['tanggal'];
    $durasi = $_POST['durasi'];
    $peserta = $_POST['peserta'];
    $layanan = isset($_POST['layanan']) ? $_POST['layanan'] : [];
    $user_id = $_SESSION['user_id'];
    $now = date("Y-m-d H:i:s");
    $diskon = $_POST['diskon'];

    $accommodation = in_array('p', $layanan) ? 1 : 0;
    $transportation = in_array('t', $layanan) ? 1 : 0;
    $consumption = in_array('k', $layanan) ? 1 : 0;

    $sub = 0;
    foreach ($layanan as $l) {
        switch ($l) {
            case 'p':
                $harga = 1000000;
                break;
            case 't':
                $harga = 1200000;
                break;
            case 'k':
                $harga = 500000;
                break;
            default:
                $harga = 0;
                break;
        }
        $sub += $harga;
    }

    $total_sebelum_diskon = $sub * $durasi * $peserta;

    $total = $total_sebelum_diskon - ($total_sebelum_diskon * $diskon / 100);

    $sql = "UPDATE bookings SET booked_by='$nama', phone='$telepon', booking_date='$tanggal', number_of_people='$peserta', accommodation='$accommodation', transportation='$transportation', consumption='$consumption', duration='$durasi', total_price='$total' WHERE id='$id'";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        echo "<script>alert('Booking berhasil diubah'); window.location.href = '../reservasi';</script>";
    } else {
        echo "<script>alert('Booking gagal diubah'); window.location.href = '../reservasi';</script>";
    }
} else {
    header('location: ../index.php');
}
