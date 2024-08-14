<?php
include '../connect.php';
session_start();

if (!isset($_SESSION['user_id'])) header('location: ../login.php');

$sql = "SELECT name, discount from packages WHERE id=$_GET[id]";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en" class="bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pariwisata Bandung</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        * {
            font-family: Inter, sans-serif;
        }

        html,
        * {
            color: #414141;
        }

        .foreground {
            color: #414141;
        }
    </style>
</head>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const layananCheckbox = document.querySelectorAll('input[name="layanan[]"]')
        const durasiField = document.querySelector('#durasi')
        const pesertaField = document.querySelector('#peserta')
        const diskonField = document.querySelector('#diskon')
        const hargaField = document.querySelector('#harga')
        const totalField = document.querySelector('#total')
        const bookingButton = document.querySelector('#booking');


        const calculatePrice = () => {
            let discount = 0
            let sum = 0
            let price = 0
            let checkedCount = 0;

            layananCheckbox.forEach((element) => {
                if (element.checked) {
                    checkedCount++;

                    switch (element.value) {
                        case 'p':
                            price = 1000000;
                            break;
                        case 't':
                            price = 1200000;
                            break;
                        case 'k':
                            price = 500000;
                            break;
                        default:
                            break;
                    }
                    sum += parseInt(price)
                }
            })

            // if (layananCheckbox.length === layananCheckbox.filter((checkbox) => checkbox.checked).length && layananCheckbox.length > 0) {
            //     document.querySelector('#booking').disabled = false
            // } else {
            //     document.querySelector('#booking').disabled = true
            // }
            
            bookingButton.disabled = checkedCount === 0;

            let total = sum * parseInt(durasiField.value) * parseInt(pesertaField.value)
            if (total > 1000000) {
                discount = parseInt(diskonField.getAttribute('data-discount'))
                total = total - (total * discount / 100)
            }
            hargaField.value = `Rp. ${sum.toLocaleString()}`
            totalField.value = `Rp. ${total.toLocaleString()}`
            diskonField.value = discount
        }

        layananCheckbox.forEach(element => {
            element.addEventListener('change', calculatePrice)
        })

        durasiField.addEventListener('change', calculatePrice)
        pesertaField.addEventListener('change', calculatePrice)

        calculatePrice()
    })
</script>

<body class="ysabeau-infant-reg my-5">
    <p class="text-center font-bold text-4xl mb-10">Pemesanan Paket Wisata</p>
    <form action="../server/pemesanan_act.php" method="POST">
        <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
        <div class="max-w-4xl mx-auto p-5 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium mb-2">Nama Pemesan:</label>
                    <input required type="text" name="nama" class="input input-bordered border-gray-700 w-full bg-white" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Nomor Telepon:</label>
                    <input required type="text" name="telepon" class="input input-bordered border-gray-700 w-full bg-white" />
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Paket Wisata:</label>
                <input required type="text" name="paket" value="<?= $data['name'] ?>" readonly class="input input-bordered border-gray-700 w-full bg-white" />
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Tanggal Pesan:</label>
                <input required type="date" name="tanggal" class="input input-bordered border-gray-700 w-full bg-white" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium mb-2">Durasi Pelaksanaan Perjalanan:</label>
                    <div class="flex items-center gap-2">
                        <input required id="durasi" type="number" name="durasi" value="1" class="input input-bordered border-gray-700 w-full bg-white" />
                        <span class="font-bold">Hari</span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Jumlah Peserta:</label>
                    <div class="flex items-center gap-2">
                        <input required id="peserta" type="number" name="peserta" value="1" class="input input-bordered border-gray-700 w-full bg-white" />
                        <span class="font-bold">Orang</span>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Pelayanan Paket Perjalanan:</label>
                <div class="flex flex-wrap gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer flex gap-2 items-center">
                            <input type="checkbox" name="layanan[]" class="checkbox border-gray-700" value="p" />
                            <span class="text-sm font-semibold">Penginapan (Rp. 1.000.000)</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer flex gap-2 items-center">
                            <input type="checkbox" name="layanan[]" class="checkbox border-gray-700" value="t" />
                            <span class="text-sm font-semibold">Transportasi (Rp. 1.200.000)</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer flex gap-2 items-center">
                            <input type="checkbox" name="layanan[]" class="checkbox border-gray-700" value="k" />
                            <span class="text-sm font-semibold">Konsumsi (Rp. 500.000)</span>
                        </label>
                    </div>
                </div>
            </div>


            <div>
                <label class="block text-sm font-medium mb-2">Diskon:</label>
                <div class="flex items-center gap-2">
                    <input id="diskon" type="number" name="diskon" value="0" class="input input-bordered border-gray-700 bg-white" data-discount="<?= $data['discount'] ?>" readonly />
                    <span class="font-bold">%</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium mb-2">Harga:</label>
                    <input id="harga" type="text" class="input input-bordered border-gray-700 w-full bg-white" readonly />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Jumlah Tagihan:</label>
                    <input id="total" type="text" class="input input-bordered border-gray-700 w-full bg-white" readonly />
                </div>
            </div>

            <div class="flex justify-center space-x-4 mt-10">
                <button id="booking" name="submit" class="btn btn-ghost hover:bg-green-700 bg-green-500 text-white px-10">Booking</button>
                <button class="btn btn-ghost hover:bg-red-700 bg-red-500 text-white px-10">Batal</button>
            </div>
        </div>
    </form>
</body>

</html>