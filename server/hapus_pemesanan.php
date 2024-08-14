<?php
include '../connect.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM bookings WHERE id = '$id'";
    $query = mysqli_query($connect, $sql);

    if ($query) {
?>
        <script>
            alert('Booking berhasil dibatalkan')
            window.location.href = '../reservasi/'
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Booking gagal dibatalkan')
            window.location.href = '../reservasi/'
        </script>
<?php
    }
} else {
    header('location: ../index.php');
}
