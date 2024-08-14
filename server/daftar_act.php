<?php
include '../connect.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $telepon = $_POST['telepon'];
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, email, full_name, phone_number) VALUES ('$username', '$password', '$email', '$nama', '$telepon')";
    $query = mysqli_query($connect, $sql);

    if ($query) {
?>
        <script>
            alert('Silahkan login');
            window.location.href = '../login.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Daftar akun gagal.');
            window.location.href = '../index.php';
        </script>
<?php
    }
} else {
    header('location: ../index.php');
}
