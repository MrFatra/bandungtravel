<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

    * {
        font-family: Inter, sans-serif;
    }
</style>

<body class="bg-white">
    <div class="h-screen flex">
        <div class="">
            <img src="https://images.unsplash.com/photo-1535222848455-143cd6d890fa?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full h-full">
        </div>
        <form class="mx-5 flex flex-1 flex-col justify-center" action="server/login_act.php<?php if (isset($_GET['callback_url'])) echo "?callback_url=$_GET[callback_url]" ?>" method="POST">
            <h2 class="text-4xl font-bold">Login</h2>
            <p class="text-gray-500 text-sm font-medium mb-6 mt-1">Silahkan isi form dibawah ini untuk melanjutkan.</p>
            <div class="mb-4 w-full">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nim">Username</label>
                <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="username" />
            </div>
            <div class="mb-4 w-full">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nim">Password</label>
                <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" />
            </div>
            <button class="w-full bg-slate-950 hover:bg-slate-800 text-white font-bold py-[0.6rem] px-4 rounded-md" type="submit" name="submit">Masuk</button>
            <p class="text-gray-500 text-sm font-medium mb-6 mt-3">Belum memiliki akun? <a href="daftar.php" class="font-bold text-blue-400">Daftar</a></p>
        </form>
    </div>
</body>

</html>