<?php
include '../connect.php';
session_start();
if (!isset($_SESSION['user_id'])) header('location: ../login.php?callback_url=reservasi/index.php');

$sql = mysqli_query($connect, "SELECT * FROM bookings WHERE user_id='$_SESSION[user_id]'");

if (!isset($_SESSION['user_id'])) {
    header('location: ../login.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>List Pesanan</title>
    </head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        * {
            font-family: Inter, sans-serif;
        }
    </style>

    <body class="bg-gray-100 p-5">
        <div class="container mx-auto">
            <p class="text-3xl font-bold mb-5 text-gray-800">List Pesanan Saya</p>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="table-auto min-w-full leading-normal">
                    <thead>
                        <tr class="bg-blue-500 text-white text-sm leading-normal">
                            <th class="px-5 py-3 text-left">NO</th>
                            <th class="border-l border-slate-200 px-5 py-3 text-left">Nama</th>
                            <th class="border-l border-slate-200 px-5 py-3 text-left">Nomor Telepon</th>
                            <th class="border-l border-slate-200 px-5 py-3 text-left">Jumlah Peserta</th>
                            <th class="border-l border-slate-200 px-5 py-3 text-left">Durasi (Hari)</th>
                            <th class="border-l border-slate-200 px-5 py-3 text-left">Akomodasi</th>
                            <th class="border-l border-slate-200 px-5 py-3 text-left">Transportasi</th>
                            <th class="border-l border-slate-200 px-5 py-3 text-left">Konsumsi</th>
                            <th class="border-l border-slate-200 px-5 py-3 text-left">Harga Total (Rupiah)</th>
                            <th class="border-l border-slate-200 px-5 py-3 text-left">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        <?php
                        $no = 1;
                        foreach ($sql as $row) {
                        ?>
                            <tr class="hover:bg-gray-100 border-b-2 border-slate-300">
                                <td class="px-5 py-4"><?= $no ?></td>
                                <td class="border-l-2 border-slate-300 px-5 py-4"><?= $row['booked_by'] ?></td>
                                <td class="border-l-2 border-slate-300 px-5 py-4"><?= $row['phone'] ?></td>
                                <td class="border-l-2 border-slate-300 px-5 py-4"><?= $row['number_of_people'] ?></td>
                                <td class="border-l-2 border-slate-300 px-5 py-4"><?= $row['duration'] ?></td>
                                <td class="border-l-2 border-slate-300 px-5 py-4"><?= $row['accommodation'] == 1 ? 'Ya' : 'Tidak' ?></td>
                                <td class="border-l-2 border-slate-300 px-5 py-4"><?= $row['transportation'] == 1 ? 'Ya' : 'Tidak' ?></td>
                                <td class="border-l-2 border-slate-300 px-5 py-4"><?= $row['consumption'] == 1 ? 'Ya' : 'Tidak' ?></td>
                                <td class="border-l-2 border-slate-300 px-5 py-4"><?= number_format($row['total_price'], 0, ',', '.') ?></td>
                                <td class="border-l-2 border-slate-300 px-5 py-4 ">
                                    <div class="flex space-x-2">
                                        <a href="edit_pemesanan.php?id=<?= $row['id'] ?>" class="bg-blue-500 text-white rounded-md px-4 py-2 text-xs font-semibold hover:bg-blue-600">Edit</a>
                                        <form action="../server/hapus_pemesanan.php" method="POST">
                                            <input type="hidden" value="<?= $row['id'] ?>" name="id">
                                            <button type="submit" name="delete" class="bg-red-500 text-white rounded-md px-4 py-2 text-xs font-semibold hover:bg-red-600" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>
<?php
}
