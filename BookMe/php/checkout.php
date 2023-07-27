<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="../css/checkoutstyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<?php
include_once 'Database.php';
session_start();
if (isset($_GET['mid'])) {
	$mid = $_GET['mid'];
} else {
	$mid = '';
}
if (isset($_GET['id'])){
    $id = $_GET['id'];
}
else{
    $id = '';
}
if (isset($_POST['submit'])) {
    
        $own = $_POST['owner'];
        $cvv = $_POST['cvv'];
        $cnum = $_POST['cnum'];
        $date = $_POST['calendar'];
       
        $obj = new Database();
        $array = ['owner' => $own, 'cvv' => $cvv, 'cnum' => $cnum, 'date' => $date];
        $obj->insert("payment", $array);
        header("Location:Invoice.php?id=$id");
    
}

?>

<body>
    <form action="checkout.php?mid=<?php echo $mid;?>&id=<?php echo $id;?>"method="post">
    <div class="container mb-3" >
        <h1>Confirm Your Payment
           </h1>
        <div class="first-row mb-3">
            <div class="owner ">
                <h3>Owner</h3>
                <div class="input-field">
                    <input type="text" name="owner" required>
                </div>
            </div>
            <div class="cvv mb-3">
                <h3>CVV</h3>
                <div class="input-field mb-3">
                    <input type="password" name="cvv" required >
                </div>
            </div>
        </div>
        <div class="second-row mb-3">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="number" name="cnum" required>
                </div>
            </div>
        </div>
        <div class="third-row mb-3">
            <h3>Card Number</h3>
            <div class="selection">
                <div class="input-field input">
                    <input type="date" name="calendar" id="calendar" required>
                </div>
                <div class="cards">
                

                
                    <img src="images/vi.png" alt="">
                </div>
            </div>    
        </div class= "mb-3 btn">
        <input type="submit" name="submit" value="Submit" class="btn">
    </div>
    </form>
</body>
</html>