<?php
include '../connect.php';
session_start();

if (isset($_POST['submit'])) {
    $callback_url = isset($_GET['callback_url']);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, full_name, username, password FROM users WHERE username='$username'";
    $query = mysqli_query($connect, $sql);

    if ($query->num_rows == 1) {
        $data = $query->fetch_assoc();
        if (password_verify($password, $data['password'])) {
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['full_name'] = $data['full_name'];
?>
            <script>
                alert('Selamat Datang!')
            </script>
            <?php
            if ($callback_url) {
                header("Location: $callback_url");
            } else {
                header("Location: ../index.php");
            }
        } else {
            ?>
            <script>
                alert('Username/password salah')
                window.location = '../login.php'
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('Username/password salah')
            window.location = '../login.php'
        </script>
<?php
    }
} else {
    header('location: ../index.php');
}
