<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tampil.css">
</head>
<body>
    <h1>Data Siswa</h1>

    <table>
        <tr>
            <th>No</th>
            <th>Namasiswa</th>
            <th>Nis</th>
            <th>Kelas</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        include "connect.php";

        $no=1;
        $ambildata = mysqli_query($conn,"select * from tb_siswa");
        while($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[namasiswa]</td>
            <td>$tampil[nis]</td>
            <td>$tampil[kelas]</td>
            <td><a href='?kode=$tampil[namasiswa]'> Hapus </a></td>
            <td><a href='update.php?kode=$tampil[namasiswa]'> Ubah </a></td>
        <tr>";
        $no++;
    }
    ?>
    </table>
    <?php
    include "connect.php";

    if(isset($_GET['kode'])){
    mysqli_query($conn,"delete  from tb_siswa where namasiswa='$_GET[kode]'");
    
    echo "Data berhasil dihapus";
    echo "<meta http-equiv=refresh content=2;URL='tampil.php'>";

    }
    ?>
</body>
</html>