<?php
include "connect.php";
$sql=mysqli_query($conn,"select * from tb_siswa where namasiswa='$_GET[kode]'");
$data=mysqli_fetch_array($sql);

?>



<h3> Ubah Data Siswa </h3>

<style>
   @import url("https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible&family=Sarabun:wght@600&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible&family=Poppins:wght@300&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Mohave:wght@300&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Manrope:wght@800&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Delius&display");

    h3 {
        font-family: poppins;
    }

    body {
        background-color: #b1f2ec;
        text-align: center;

    }

    ::placeholder {
        color: gray;
    }

    input[type="text"] {
        font-family: poppins;
        margin-top: 20px;
        width: 200px;
        height: 40px;

        color: black;
        border-radius: 50px;
        border: none;
    }

    input[type="number"] {
        font-family: poppins;
        margin-top: 20px;
        border-radius: 50px;

        width: 200px;
        border: none;

        height: 40px;
    }

    input[type="submit"] {
        font-family: poppins;
        margin-top: 20px;
        border-radius: 50px;
        width: 100px;
        height: 40px;
        border: hidden;
        margin-left: 45px;
        
    }

    select {
        font-family: poppins;
        margin-top: 20px;
        border-radius: 50px;
        text-align: center;
        width: 200px;
        border: none;
        text-align: center;
        height: 40px;
    }

    table {
        margin: auto;
    }


    input {
        text-align: center;
    }

</style>


<form action="" method="post">
<table>
    <tr>
        
        <td> <input type="text" name="namasiswa"
        required
                        oninvalid="this.setCustomValidity('Nama harus diisi')" oninput="setCustomValidity('')"
        value="<?php echo $data['namasiswa']; ?>"> </td>
    </tr>
    <tr>
        
        <td> <input type="number" name="nis"
        required
                        oninvalid="this.setCustomValidity('Nis harus diisi')" oninput="setCustomValidity('')"
        value="<?php echo $data['nis']; ?>"> </td>
    </tr>
    <td>
                <select name="kelas"
                required
                        oninvalid="this.setCustomValidity('Kelas harus dipilih')" oninput="setCustomValidity('')"
                value="<?php echo $data['kelas']; ?>>
                    <option selected hidden value="">Pilih kelas</option>
                    <option value="X RPL">X RPL</option>
                    <option value="X AKL 1">X AKL 1</option>
                    <option value="X AKL 2">X AKL 2</option>
                    <option value="X AKL 3">X AKL 3</option>
                    <option value="X OTKP 1">X OTKP 1</option>
                    <option value="X OTKP 2">X OTKP 2</option>
                    <option value="X OTKP 3">X OTKP 3</option>
                    <option value="X BDP 1">X BDP 1</option>
                    <option value="X BDP 2">X BDP 2</option>
                    <option value="X BDP 3">X BDP 3</option>
                    <option value="XI RPL">XI RPL</option>
                    <option value="XI AKL 1">XI AKL 1</option>

                </select>
            </td>
    
    <tr>
        
        <td><input type="submit" name="submit" value="Ubah"> </td>
    </tr>
</table>

</form>

<?php
include "connect.php";

if(isset($_POST['submit'])){
mysqli_query($conn, "update tb_siswa set kelas='$_POST[kelas]',namasiswa = '$_POST[namasiswa]',nis = '$_POST[nis]' where namasiswa= '$_GET[kode]'");

echo "Data siswa telah diubah";
echo "<meta http-equiv=refresh content=1;URL='tampil.php'>";

}

?>
