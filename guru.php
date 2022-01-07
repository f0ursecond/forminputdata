<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['namaguru']) && isset($_POST['nip']) &&
        isset($_POST['mapel'])) {
        
        $namaguru = $_POST['namaguru'];
        $nip = $_POST['nip'];
        $mapel = $_POST['mapel'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "dbsekolah_alifzulfanur";
 
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT nip FROM tb_guru WHERE nip = ? LIMIT 1";
            $Insert = "INSERT INTO tb_guru(namaguru, nip, mapel) values(?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("i", $nip);
            $stmt->execute();
            $stmt->bind_result($resultNip);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sis",$namaguru, $nip, $mapel);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                   
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Nip ini sudah di pakai ";
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