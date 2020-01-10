 <?php
    $server = "localhost";
    $user = "root";
    $password ="";
    $dbName = "myshop";
    $db = new mysqli($server, $user, $password, $dbName);
  $sql2 = "SELECT * from users";
$result2 = $db->query($sql2)->fetch_all();
$check=true;
    /*====================Register==========================*/
    if (isset($_POST['logup'])){
        $username = ($_POST['nameLogup']);
        $useraccount = ($_POST['accountLogup']);
        $password = ($_POST['passLogup']);
        if (!$username || !$useraccount || !$password) {
            echo "Please input all information";
            exit;
        }
        for($i = 0; $i < count($result2); $i++) { 
            if($username==$result2[$i][1] && $useraccount==$result2[$i][2] && $password==$result2[$i][3]){
                $check=true;
                echo "Account exit! Log in!";
                exit;
            }
            else{
                $check=false;
            }
        }
        if ($check==false) {
            $role="user";
            $sql2 = "INSERT into users values(null,'".$username."','".$useraccount."','".$password."','".$role."')";
            $db->query($sql2);
            echo "Log up successful!";
            exit;
        }
    } 
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style type="text/css">
 body{
      background-image: url(https://godidigo.com/blog/wp-content/uploads/2019/06/cau-rong-da-nang-lung-linh-ve-dem.jpg);
    }
    .line{
        width: 500px;
        justify-content: space-between;
        align-items: center;
        margin-left: 450px;
        text-align: center;
        background:rgba(40,57,101,.9);
        color: white;
        padding: 20px;
        margin-top: 40px;
        border-style: solid;
        border-color: black;
        border-radius: 10px;
    }
     h1{
        text-align: center;
        color: white;
    }
    input {
        width: 250px;
        height: 35px;
        border: auto;
        border-radius: 10px;
        margin-left: 30px;
     }
    button{
        width: 400px;
    }
    img{
        width: 35px;
     }
    a{
        color: white;
     }
  </style>
</head>
<body>

 <form action="" method="post">
    <div class="line">
       <h1>SIGN UP</h1>
       <img src="01.png">
        <label> NAME</label>
        <input type="text" name="nameLogup" placeholder="name"><br><br>
        <label> USERNAME </label>
        <input type="text" name="accountLogup"placeholder="Username"><br><br>
        <img src="02.png">
        <label> PASSWORD </label>
        <input type="text" name="passLogup" placeholder="Password"><br><br>
        <button name="logup" class="btn btn-primary btn-lg btn-block">SIGN UP</button><br>
    </div>
  </form>
</body>
</html>