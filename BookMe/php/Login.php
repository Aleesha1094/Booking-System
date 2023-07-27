
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="../css/signinstyle.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
<body style="background-color: black;">
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <!--<img src="images/frontImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="Login.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name="email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password"required>
              </div>
             
              <div class="button input-box">
                <input type="submit" value="Sumbit"  name="submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label  id="signup" for="flip" >Sigup now</label></div>
            </div>
            <div class="alert alert-danger" role="alert" id="alert">
                  Account does'nt Exists, Signup Now
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="Login.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" name="user" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name="Email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="Password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sumbit" id="signup" name="signup">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
           
      </form>
      
    </div>
    </div>
    <div class="alert alert-success" role="alert" id="insert">
                 Account Created!! Login Now
            </div>
            <div class="alert alert-danger" role="alert" id="exist">
                 User Already Exists !! Try to Login Again
            </div>
    
  </div>

    </div>
    
</body>
<script>
    $("#alert").hide();
    $("#insert").hide();
    $("#exist").hide();
</script>

</html><?php

include_once 'Database.php';
if ((isset($_POST['submit'])) ){
  signin();
}

if (isset($_POST['signup'])) {
  signup();
}



    

    ?>
    
    <?php
    function signin(){
       $email = $_POST['email'];
    $password = $_POST['password'];
    $valid = false;



    $obj = new Database();
    $result = $obj->select("login", "*");
    foreach ($result as $row) {
        if (($row['password'] == $password) && ($row['email'] == $email)) {
            $valid = true;
           echo "<script>window.location.href = 'interface.php';</script>";

          break;



        }
    }
    if ($valid == false) { ?>
                <html><script> $("#alert").show(); 
                $("#signup").click(function(){
                    $("#alert").hide();
                });
            </script></html>
                
        
   <?php }
   

    }?>
   <?php function signup()
    {

        
            $user = $_POST['user'];
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            $obj1 = new Database();
            $valid = false;
            $array = ['username' => $user, 'email' => $Email, 'password' => $Password];
            $res = $obj1->select("login", "*");
            foreach ($res as $row) {
                if (($row['email'] == $Email)) {
                    $valid = true ?>
                
                <html>
                    <script>
                         $("#exist").show();
                       
                    </script>
                </html>

           <?php }
            }
            if ($valid == false) {
                $obj1->insert("login", $array); ?>
          
                    
                
            <html>
    
                <script>
                    $("#insert").show();
                </script>
            </html>
           <?php }


        }

    


    ?>