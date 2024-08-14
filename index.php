<?php
include 'connect.php';
$hasLoggedIn = false;
session_start();
if (isset($_SESSION['user_id'])) {
    $hasLoggedIn = true;
}
$sql = "SELECT * FROM packages";
$query = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pariwisata Bandung</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

    * {
        font-family: Inter, sans-serif;
    }

    html {
        color: #414141;
        background: white !important;
    }

    .foreground {
        color: #414141;
    }
</style>

<body class="bg-gray-100">
    <!-- Hero -->
    <div class="relative grid grid-cols-2 bg-slate-950">
        <div class="h-full">
            <img src="https://images.unsplash.com/photo-1535222848455-143cd6d890fa?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-full mb-4 opacity-40" alt="Beautiful view of Bandung">
        </div>
        <div class="grid grid-cols-2">
            <img src="https://images.unsplash.com/photo-1549473889-14f410d83298?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-full object-cover opacity-40" alt="Bandung landscape 1">
            <img src="https://images.unsplash.com/photo-1601352209716-978486b0da4b?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-full object-cover opacity-40" alt="Bandung landscape 2">
            <img src="https://images.unsplash.com/photo-1564901236182-daaec707fbf3?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-full object-cover opacity-40" alt="Bandung landscape 3">
            <img src="https://images.unsplash.com/photo-1611261510936-c43c4caf65b4?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-full object-cover opacity-40" alt="Bandung landscape 4">
        </div>

        <!-- Teks hero -->
        <div class="absolute inset-0 flex left-10 top-40 ">
            <h1 class="text-white text-5xl font-bold">Destinasi Wisata Bandung</h1>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="bg-slate-800 sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-5">
            <div class="flex justify-between items-center w-full">
                <a href="" class="flex-1 text-white font-bold text-xl">Destinasi Wisata Bandung</a>
                <ul class="flex flex-1 items-center justify-center space-x-10 text-white">
                    <li>
                        <a href="index.html" class="font-semibold text-zinc-300 hover:text-zinc-500">Beranda</a>
                    </li>
                    <li>
                        <a href="about.html" class="font-semibold text-zinc-300 hover:text-zinc-500">Paket Wisata</a>
                    </li>
                    <li>
                        <a href="reservasi/" class="font-semibold text-zinc-300 hover:text-zinc-500">Wisata Saya</a>
                    </li>
                </ul>
                <?php
                if ($hasLoggedIn) {
                ?>
                    <div class="flex gap-x-4 flex-1 justify-end">
                        <div class="dropdown dropdown-hover dropdown-bottom dropdown-end">
                            <p class="font-medium"><?= $_SESSION['username'] ?></p>
                            <ul tabindex="0" class="dropdown-content menu bg-white border-2 border-gray-300 rounded z-[1] w-52 p-2 shadow text-slate-600">
                                <form action="server/logout.php" method="post">
                                    <li class="hover:bg-red-500 rounded hover:text-white"><button type="submit" name="logout" onclick="return confirm('Apakah anda yakin?')">Logout</button></li>
                                </form>
                            </ul>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="flex gap-x-4 flex-1 justify-end">
                        <a href="daftar.php" class="border border-white rounded-lg text-white font-bold py-2 px-4">Daftar</a>
                        <a href="login.php" class="bg-slate-500 hover:bg-slate-700 rounded-lg text-white font-bold py-2 px-4">Masuk</a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="flex">
        <div class="grid grid-cols-2 gap-5 py-10 px-5">
            <!-- CARD  -->
            <?php
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <a href="reservasi/pemesanan.php?id=<?= $data['id'] ?>">
                    <div class="card foreground w-auto shadow-xl">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1601352209716-978486b0da4b?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Shoes" />
                        </figure>
                        <div class="p-5">
                            <!-- konversi  -->
                            <p><?= $data['created_at'] ?></p>
                            <p class="card-title"><?= $data['name'] ?></p>
                            <p class="mt-5"><?= $data['description'] ?></p>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
        <!-- iframe youtube -->
        <div class="flex flex-col mr-5">
            <div class="flex items-center gap-5">
                <label class="input input-bordered flex items-center gap-2 bg-white border-gray-700 my-10 flex-1">
                    <input type="text" class="grow" placeholder="Search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
                <button class="btn bg-slate-800 px-10 text-white">Cari</button>
            </div>
            <iframe width="100%" height="250" src="https://www.youtube.com/embed/" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div>

</body>

</html>