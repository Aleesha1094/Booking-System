<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=">
  <title>Responsive Contact Us Page</title>
  <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body style="background-color:black; color: silver;">
  
  <section>
    
    <div class="section-header"  >
      <div class="container">
        <h2 >Contact Us:</h2>
      </div>
    </div>
    
    <div class="container">
      <div class="row">
        
        
        <div class="contact-form container">
          <form action="contactus.php" method="post" id="contact-form" class="form-group">
           
            <div class="form-group" style="margin-top: 50px;">
                <label for="exampleInputEmail1">Your Name</label>
                <input type="text" class="form-control bg-dark" style="color: white;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name" required name="Name">
          </div>
          <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control bg-dark" style="color: white;"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required name="Email">
                <small id="emailHelp" class="form-text text-muted" style="color: silver;">We'll never share your email with anyone else.</small>
          </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea class="form-control bg-dark"style="color: white;" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your Message Here" required name="description"></textarea>
          </div>
            
            <div class="input-box">
            <button type="submit" class="btn bg-dark" name="submit" style="color: silver;">Submit</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </section>
 <!-- Footer -->
<footer class="text-center text-lg-start text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

   
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-home me-3 text-secondary"></i>Address
          </h6>
          <p>
          4671 Sugar Camp Road,<br/> Owatonna, Minnesota, <br/>55060
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        
          <h6 class="text-uppercase fw-bold mb-4">
          <i class="fas fa-phone"></i>
          Phone
          </h6>
          <p>561-456-2321</p>
          
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
          <i class="fas fa-envelope"></i>
            Email
          </h6>
          <p>BookMe@email.com</p>
         
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
       
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
</footer>
<!-- Footer -->
</body>
</html>

<?php
  if(isset($_POST['submit'])){
  submit();
  }
function submit()
{
  $name = $_POST['Name'];
    $email = $_POST['Email'] ;
    $description = $_POST['description'];
  include_once 'Database.php';
    $obj = new Database();
    $array = ['Name'=>$name, 'Email'=>$email, 'Description'=>$description];
    $obj->insert("contact",$array);
  echo "<script type='text/javascript'>alert('Message Sent');</script>";
}
    
?> 