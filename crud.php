<?php
include('conn.php');

//Masukkan rekod baru
if (isset($_POST['name']) && isset($_POST['item']) && isset($_POST['harga'])) {
    $nama = $_POST['name'];
    $item = $_POST['item'];
    $harga = $_POST['harga'];

    $query = mysqli_query($con, "INSERT INTO rekod VALUES (NULL, '$nama', '$item', '$harga')");
    if ($query) {
        echo '<script>alert("Berjaya Masukkan Data");</script>';
        echo '<script>window.location="crud.php";</script>';
    } else {
        echo '<script>alert("Gagal Masukkan Data: \'' . mysqli_error($con) . '\'");</script>';
        echo '<script>window.location="crud.php";</script>';
    }
}

//Kemaskini rekod sedia ada
if (isset($_POST['namebaru']) && isset($_POST['itembaru']) && isset($_POST['hargabaru']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $namabaru = $_POST['namebaru'];
    $itembaru = $_POST['itembaru'];
    $hargabaru = $_POST['hargabaru'];

    $queryupdate = mysqli_query($con, "UPDATE rekod SET nama='$namabaru', item='$itembaru', harga='$hargabaru' WHERE id='$id'");
    if ($queryupdate) {
        echo '<script>alert("Berjaya Kemaskini Data");</script>';
        echo '<script>window.location="crud.php";</script>';
    } else {
        echo '<script>alert("Gagal Kemaskini Data: \'' . mysqli_error($con) . '\'");</script>';
        echo '<script>window.location="crud.php";</script>';
    }
}

//Padam rekod
if (isset($_POST['iddelete'])){
    $iddelete = $_POST['iddelete'];
    $querydelete = mysqli_query($con, "DELETE FROM rekod WHERE id='$iddelete'");
    if ($querydelete) {
        echo '<script>alert("Berjaya Padam Data");</script>';
        echo '<script>window.location="crud.php";</script>';
    } else {
        echo '<script>alert("Gagal Padam Data: \'' . mysqli_error($con) . '\'");</script>';
        echo '<script>window.location="crud.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>

<body>
    <form action="" method="post">
        <h1>CRUD ringkas by Amirul</h1>
        <h2>Daftar Rekod Baru (Create)</h2>
        Nama: <input type="text" name="name" id=""><br><br>
        Item: <input type="text" name="item"> <br><br>
        Harga: <input type="text" name="harga"><br>
        <input type="submit" value="Daftar">
    </form>
    <br>
    <h2>Rekod yang telah dimasukkan (Read)</h2>
    <?php
    $querybaca = mysqli_query($con, "SELECT * FROM rekod ORDER BY id DESC");
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Item</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($data = mysqli_fetch_array($querybaca)) {
            ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['item']; ?></td>
                    <td>RM <?php echo $data['harga']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <h2>Kemaskini Rekod sedia ada (Update)</h2>
    <form action="" method="POST">
        ID: <input type="number" name="id" id=""><br><br>
        Nama: <input type="text" name="namebaru" id=""><br><br>
        Item: <input type="text" name="itembaru"> <br><br>
        Harga: <input type="text" name="hargabaru"><br>
        <input type="submit" value="Kemaskini">
    </form>
    <br>
    <h2>Padam rekod (Delete)</h2>
    <form action="" method="post">
        ID: <input type="number" name="iddelete" id=""><br>
        <input type="submit" value="Padam">
    </form>
</body>

</html>