<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
}
else{
    $id = '';
}
include_once 'Database.php';
$obj = new Database();
$result  = $obj->select("reciepts", "*", null, "Id = $id");
$res = $result->fetch();
$mname = $res['mname'];
$movies = $obj->select("movie", "*",null,"mname LIKE '%$mname%';");
$mov = $movies->fetch(); $seat = $mov['seats'] + $res['No_of_Seats']; ;

?>

<?php
if(isset($_POST['cancel'])){
    $re = $res['ID'];
    $sea = intval($seat);
   
        $obj->update("DELETE FROM reciepts where ID = $id");
        $obj->update("UPDATE movie SET seats =$sea WHERE mname = '$mname'");
        header("Location:interface.php");
       
}

    
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- My Style -->
    <link rel="stylesheet" href="../css/invoice_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="logo">
            <span class="text">BookFace</span>
            
        </div>

    </div>
    <div class="main-content">
        <div class="invoice-container">
            <div class="top">
                <div class="top-left">
                    <h1 class="main">Invoice</h1>
                    <span class="code"><?php echo $res['ID'];?></span>
                </div>
                <div class="top-right">
                    <div class="date">Movie Time: <?php echo $mov['time'];?></div>
                    
                </div>
            </div>
            <div class="bill-box">
                <div class="left">
                    <div class="text-m">Bill To:</div>
                    <div class="title"><?php echo $res['Name'];?></div>
                    <div class="addr">Email: <?php echo $res['Email'];?></div>
                    Contact: <?php echo $res['Contact_No'];?></div>
                </div>
                
            <div class="table-bill">
                <table class="table-service">
                    <thead>
                
                        <th  class="quantity">Movie Name</th>
                        <th> Number of Seats</th>
                        <th class="cost">Price </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $res['mname'];?></td>
                            <td> <?php echo $res['No_of_Seats'];?></td>
                            <td class="cost"><?php echo $mov['price'];?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="total">
                            <td class="name">Total</td>
                            <td colspan="2" class="number"><?php echo $res['No_of_Seats']*$mov['price'];?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="actions">
                <form action = "invoice.php?id=<?php echo $res['ID'];?>" method = "post">
                <button class="btn btn-main left " name = "cancel" >Cancel Booking?</button></form>
            </div>
            <div class="note">
                <p>Thank You for working with us!</p>
            </div>
        </div>
    </div>
</body>
<?php

?>
</html>