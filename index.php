<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['namasiswa']) && isset($_POST['nis']) &&
        isset($_POST['kelas'])) {
        
        $namasiswa = $_POST['namasiswa'];
        $nis = $_POST['nis'];
        $kelas = $_POST['kelas'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "dbsekolah_alifzulfanur";
 
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT nis FROM tb_siswa WHERE nis = ? LIMIT 1";
            $Insert = "INSERT INTO tb_siswa(namasiswa, nis, kelas) values(?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("i", $nis);
            $stmt->execute();
            $stmt->bind_result($resultNis);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sis",$namasiswa, $nis, $kelas);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                    header("Location: tampil.php");
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this nis.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>