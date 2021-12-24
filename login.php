<!DOCTYPE html>
<html>
<head>
<title>Document</title>
<style>
.message {color: #FF0000;}
</style>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
 
<?php
// define variables and set to empty values
$Message = $ErrorUname = $ErrorPass = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $username = check_input($_POST["username"]);
    
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
      $ErrorUname = "Space and special characters not allowed but you can use underscore(_)."; 
    }
    else{
        $fusername=$username;
    }
 
    $fpassword = check_input($_POST["password"]);

    $userid = check_input($_POST["userid"]);

 
  if ($ErrorUname!=""){
    $Message = "Login failed! Errors found";
  }
  else{
  include('connect.php');
 
  $query=mysqli_query($conn,"select * from `tb_user` where userid='$userid' && username='$fusername' && password='$fpassword'");
  $num_rows=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
 
  if ($num_rows>0){
      $Message = "Login Successful!";
      header("Location: index.html");
  }
  else{
    $Message = "Login Failed! User not found";
  }
 
  }
}
 
function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
 
 <h1>LOGIN </h1>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-md-7 px-5 py-5">
                <div class="anjay">
                    <table>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="id-container">

                                        <input type="number" placeholder="Masukan Userid" name="userid" required
                                            oninvalid="this.setCustomValidity('Userid harus diisi')"
                                            oninput="setCustomValidity('')">

                                    </div>

                                    <input type="text" name="username" id="username" placeholder="Masukan Username"
                                        required oninvalid="this.setCustomValidity('Username harus diisi')"
                                        oninput="setCustomValidity('')">

                                    <input type="password" name="password" id="pass" placeholder="Masukan Password" required
                                        oninvalid="this.setCustomValidity('Password harus diisi')"
                                        oninput="setCustomValidity('')">


                                    <input type="submit" name="submit" id="submit" value="Login">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
 
</body>
</html>