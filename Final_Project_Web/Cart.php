<?php
	
	require_once"database.php";
	require_once "model/User.php";
	require_once "model/SportClothe.php";
	require_once "model/Shirt.php";
  	require_once "model/Dress.php";

  	 $sql1 = "SELECT * from clothe";
    $result1 = $db->query($sql1)->fetch_all(MYSQLI_ASSOC) ;

    $sql2 = "SELECT * from cart";
    $result2 = $db->query($sql2)->fetch_all(MYSQLI_ASSOC) ;

     function sum($result2){
        $sum=0;
        for($i = 0; $i < count($result2); $i++) {
            $sum+=$result2[0]['quantity'];
        }
        return $sum;
    }
    
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title></title>
    	
    	<link rel="stylesheet" type="text/css" href="style.css">
    	
      </head>
    <body>
    <div id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: white;">
    <form action="index.php" method="">
    <button style=" font-style: italic; color:lime;font-size: 14px; border: none; ">Quay lại trang chủ</button>
    </form>
<form action="" method="post">
<p style="color: black; font-weight: bold;text-align:center; font-size: 20px; margin-top: 50px;">MY SHOPPING CART</p>  
    <div class="line">
    <table id="tbl" class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Color</th>
            <th>Type</th>
            <th>Img</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Del</th>
        </tr>
    

<?php for($i = 0; $i < count($result2); $i++) { ?>
    <tr>
            <td><?php echo $result2[0]['id']; ?></td>
              <td><?php echo $result2[0]['name']; ?></td>
            <td><?php echo $result2[0]['price']; ?></td>
            <td><?php echo $result2[0]['color']; ?></td>
             <td><?php echo $result2[0]['type']; ?></td>
              <td><img  src="<?php echo $result2[0]['image'] ?>" style="width:20px ; height: 20px" alt="Image"></td>
            <td><button name="down" value="<?php echo $i;?>" style="width: 10px; height: 10px;"></button><?php echo $result2[0]['quantity']; ?><button name="up" value="<?php echo $i;?>" style="width: 10px; height: 10px;"></button></th>
            <td><button class="delete" name="id_cart" value="<?php echo $result2[0]['id'];?>">Delete</button></td>
        </tr>
    <?php } ?>
    </table>
    </div>
    <!-- <div class="pay">
    <h1>CỘNG GIỎ HÀNG</h1>
    <p>Tạm tính: <?php echo sum($result2);?></p>
    <p>Phí giao hàng: <?php echo (sum($result2)*0.01);?></p>
    <p>Tổng: <?php echo (sum($result1)+(sum($result2)*0.01));?></p>
    <form action = "thanhtoan.php" method="">
    <button style="text-align: center;" onclick="tb()">Thanh toán</button>
    </form>
    </div> -->

    </body>
</html>