<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fungsi Agregat SQL</title>
    <style>
        code{
            font-size: 20px;
            margin: 10px;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
        }
        
        p{
            margin: 0;
            font-size: 25px;
        }
        
        table{
            font-size: 30px;
        }
    </style>
</head>

<body>
    <h2>Rekod yang telah dimasukkan</h2>
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
    </table><br><br>

    <h2>SUM - Jumlah keseluruhan</h2>
    <code>SELECT SUM(harga) FROM rekod</code>
    <?php
    $querysum = mysqli_query($con, "SELECT SUM(harga) AS jumlah FROM rekod");
    $getdatasum = mysqli_fetch_assoc($querysum);
    $sum = $getdatasum['jumlah'];
    ?>
    <p>Output: <?php echo $sum; ?></p><br><br>


    <h2>MIN - Nilai terkecil dalam rekod</h2>
    <code>SELECT MIN(harga) FROM rekod</code>
    <?php
    $querymin = mysqli_query($con, "SELECT MIN(harga) AS palingkecil FROM rekod");
    $getdatamin = mysqli_fetch_assoc($querymin);
    $min = $getdatamin['palingkecil'];
    ?>
    <p>Output: <?php echo $min; ?></p><br><br>


    <h2>MAX - Nilai terbesar dalam rekod</h2>
    <code>SELECT MAX(harga) FROM rekod</code>
    <?php
    $querymax = mysqli_query($con, "SELECT MAX(harga) AS palingbesar FROM rekod");
    $getdatamax = mysqli_fetch_assoc($querymax);
    $max = $getdatamax['palingbesar'];
    ?>
    <p>Output: <?php echo $max; ?></p><br><br>

    <h2>AVG - Nilai purata</h2>
    <code>SELECT AVG(harga) FROM rekod</code>
    <?php
    $queryavg = mysqli_query($con, "SELECT AVG(harga) AS purata FROM rekod");
    $getdataavg = mysqli_fetch_assoc($queryavg);
    $avg = $getdataavg['purata'];
    ?>
    <p>Output: <?php echo round($avg, 2); ?></p><br><br>

    <h2>COUNT - Bilangan rekod</h2>
    <code>SELECT COUNT(id) FROM rekod</code>
    <?php
    $querycount = mysqli_query($con, "SELECT COUNT(id) AS bilrekod FROM rekod");
    $getdatacount = mysqli_fetch_assoc($querycount);
    $count = $getdatacount['bilrekod'];
    ?>
    <p>Output: <?php echo $count; ?></p><br><br>
</body>

</html>