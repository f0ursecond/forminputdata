<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['mapel'])) 
         {
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
            $Insert = "INSERT INTO tb_mapel(mapel) values(?)";
            $stmt = $conn->prepare($Insert);
            $stmt->execute();
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("s",$mapel);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
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