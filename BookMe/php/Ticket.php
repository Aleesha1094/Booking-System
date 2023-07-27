
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Booking</title>
	<link rel="stylesheet" href="../css/style.css">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700,900" rel="stylesheet">
</head>
<?php
include_once 'Database.php';

$obj = new Database();
session_start();
if (isset($_GET['mid'])) {
	$mid = $_GET['mid'];
} else {
	$mid = '';
}

	

	$obj = new Database();
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$seats = $_POST['seats'];
    $time = time();
    

    $resul = $obj->select("movie", "*", null, "mid = $mid");
$movie = $resul->fetch();
	$array = ['Name' => $name, 'Email' => $email, 'Contact_No' => $contact, 'No_of_Seats' => $seats , "mname" => $movie['mname'], "booking"=> $time];
	$obj->insert("reciepts",$array);
    $id = $obj->select('reciepts', "Id",null, "booking = $time");
    $ID = $id->fetch();
    $Id = $ID['Id'];
	$res2 = $obj->select("movie", "seats", null, "mid = $mid");
	$set = $res2->fetch();
	$seat = intval($set['seats']) - intval($seats);
    $booking = intval($seat);
	if(intval($seats)>$set['seats']){
		echo "<script> alert('Seats are not available');</script>";
	}
	else{
        $obj->update("update movie set seats = $booking where mid = $mid");
        header("location:checkout.php?mid=$mid&id=$Id");
    }
    }

   

$res = $obj->select("movie", "*", null, "mid = $mid");

		
   
?>
<body >


<div class="container">
    <div class="container-time">
        <?php 
            foreach ($res as $row) { ?>
                <h2 class="heading"><?php echo $row['mname']; ?></h2>
                <h3 class="heading-days">Book your Ticket now</h3>
                <h3 class="heading-days">Timings</h3>
                <p><?php echo $row['time'] . "<br>for<br>" . $row['duration']; ?></p>

                <h3 class="heading-days">Hurry up!!</h3>
                <p><?php echo "only " . $row['seats'] . " left"; ?></p>
            <?php } 
        ?>
        <hr>
        <h4 class="heading-phone">Call Us: (123) 45-45-456</h4>
    </div>
    <div class="container-form">
        <form action="Ticket.php?mid=<?php echo $mid;?>" method="post">
            <h2 class="heading heading-yellow">Reservation Online</h2>
            <div class="form-field">
                <p>Your Name</p>
                <input type="text" placeholder="Your Name" name="name" required>
            </div>
            <div class="form-field">
                <p>Your email</p>
                <input type="email" placeholder="Your email" name="email" required>
            </div>
            <div class="form-field">
                <p>Contact No</p>
                <input type="contact" name="contact" placeholder="Enter your phone#" required>

  </div>
  <div class="form-field">
    <p>How many People?</p>
    <input type="number" name="seats" placeholder="How many seats required" required>
  </div>
  <button class="btn" name=submit>Submit</button>
</form>
</div>
	</div>
</div>	
	
</body>
</html>