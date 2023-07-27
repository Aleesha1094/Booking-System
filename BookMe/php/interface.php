<?php
    include_once'Database.php';
session_start();
// // $_SESSION['user']="";

    $obj = new Database();
    
    if(isset($_POST['btn'])){
   
        if(isset($_POST['type'])){
        
            $filter = $_POST['type'];
              
                    $res = $obj->select("movie", "*", null, "filter LIKE '%$filter%' ");

        }
                else{
                  
                    $res = $obj->select("movie", "*");
                }
        
            }
        else{
            $res = $obj->select("movie", "*");

        }
        
$top = "seats = (select min(seats) from movie);";
$res1 = $obj->select("movie","url,mid",null, $top);

?>

<!DOCTYPE html>


<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/interface_styles.css">
    <!-- <link rel="stylesheet" href="Modal.css"> -->
    <!-- <script src="Modal.js"></script> -->
    <title>Movie booking</title>
    <style>
       


        
    </style>
</head>
<body>
    <section class="top-bar d-flex flex-column flex-lg-row">
    <div class="left-content">
           
           <ul class="navigation">
               <li><a href="interface.html">Home</a></li>
               <li><a class="active" href="#">Movies</a></li>
               <li><a href="searchmovie.html">Browse Movies</a></li>
               <li><a href="contactus.php">Contact Us</a></li>
           </ul>
       </div>
       <div class="right-content d-sm-none ">
           <img src="./images/filter.png" alt="" class="filter">
           <!-- <img src="./images/cart.png" alt="" class="cart"> -->
           <!-- <img src="./images/help.png" alt="" class="help"> -->
           <div class="profile-img-box">
               <img src="./images/profile.jpeg" alt="">
           </div>
           <img src="./images/menu.png" alt="" class="menu">
       </div>
       <button type="button " class="btn btn-primary btna navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-sidebar"  aria-expanded="false">Filters</button>
  <div class="collapse side" id="collapsable-sidebar">
  <div class="sidebaar sidebar d-none" style="background-color: rgba(0, 0, 0, 0.5); max-width: 210px; position: absolute; z-index: 10; color: whitesmoke;">

      <form action="interface.php" method="post">
        <div class="sidebar-groups">
          <h3 class="sg-title">Categories</h3>
          <input type="radio" id="adventure" name="type" value="adventure">
          <label for="adventure" class="radio">Adventure</label><br>
          <input type="radio" id="action" name="type" value="action">
          <label for="action" class="radio">Action</label><br>
          <input type="radio" id="animation" name="type" value="animation">
          <label for="animation" class="radio">Animation</label><br>
          <input type="radio" id="comedy" name="type" value="comedy">
          <label for="comedy" class="radio">Comedy</label><br>
          <input type="radio" id="science" name="type" value="science">
          <label for="science" class="radio">Fiction</label><br>
          <input type="radio" id="thriller" name="type" value="thriller">
          <label for="thriller" class="radio">Thriller</label><br>
          <input type="radio" id="history" name="type" value="history">
          <label for="history" class="radio">History</label><br>
          <input type="radio" id="documentary" name="type" value="documentary">
          <label for="documentary">Documentary</label><br>
          <input type="radio" id="fantasy" name="type" value="fantasy">
          <label for="fantasy" class="radio">Fantasy</label><br>
        </div>
        <div class="sidebar-groups">
          <button class="btn btn-l" name="btn" value="#">Apply Filters</button>
        </div>
      </form>
    </div>
  </div>

       
    </section>
    <section class="main-container d-flex justify-content-center">
        <div class="sidebar d-none d-xl-blockl" >
            
            <form action="interface.php" method="post" >
                <div class="sidebar-groups visible-">
                    <h3 class="sg-title">Categories</h3>
                   
                    <input type="radio" id="adventure" name="type" value="adventure">
                    <label for="adventure" class="radio">Adventure</label><br>
                    <input type="radio" id="action" name="type" value="action">
                    <label for="action" class="radio">Action</label><br>
                    <input type="radio" id="animation" name="type" value="animation">
                    <label for="animation" class="radio">Animation</label><br>
                    <input type="radio" id="comedy" name="type" value="comedy">
                    <label for="comedy" class="radio">Comedy</label><br>
                    <input type="radio" id="science" name="type" value="science">
                    <label for="science" class="radio">Fiction</label><br>
                    <input type="radio" id="thriller" name="type" value="thriller">
                    <label for="thriller" class="radio">Thriller</label><br>
                    <input type="radio" id="history" name="type" value="history">
                    <label for="history" class="radio">History</label><br>
                    <input type="radio" id="documentary" name="type" value="documentary">
                    <label for="documentary">Documentary</label><br>
                    <input type="radio" id="fantasy" name="type" value="fantasy">
                    <label for="fantasy" class="radio">Fantasy</label><br>
                
                </div>
        
                <div class="sidebar-groups">
                   <button class="btn-l btn" name = "btn" value = "#" >Apply Filters</button>
                </div>
            </form>
        </div>
       
        <div class="movies-container row">
        <?php
            foreach ($res1 as $row) { ?>
            <div class="upcoming-img-box ">
                <img src=<?php echo $row['url']; ?> alt="" height="300px" width="726px">
                <!-- <p class="upcoming-title">Upcoming Movie</p> -->
                <div class="buttons">
                    <a href="Ticket.php?mid=<?php echo $row['mid'];?>" class="btn">Book Now</a>
                    <!-- <a href="#" class="btn-alt btn">Play Trailer</a> -->
                </div>
            </div>
            <?php } ?>
            
            <div class="current-movies col-md-3 col-sm-6" >
                <?php  if ($res != null) {
                foreach ($res as $row) { ?>
                <div class="current-movie " style="width: 18rem;">
                    <div class="cm-img-box">
                       
                        <img src=<?php echo $row['url']; ?>alt="">
                        
                    </div>
                    <h3 class="movie-title "><?php echo $row['mname']; ?></h3>
                    <p class="screen-name " >Screen : <?php echo $row['screenname']; ?></p>
                    <div class="booking">
                        <h2 class="price"><?php echo $row['price'] . "Rs ";?></h2>
                        <a href="Ticket.php?mid=<?php echo $row['mid']?>" class="btn" name = "purchace" value = <?php echo $row['mid']?> class=""  >Buy Tickets</a>
                    </div>
                </div>
               <?php }
             
        }
        else{?>
        <h2 class="price">No movies of this Categories<br> Will be available soon!!!!</h2><?php }?>

            </div>
        </div>
    </section>
</body>
</html> 

<script>
    function openImage(imgSrc) {
        var img = new Image();
        img.src = imgSrc;
        var imgWindow = window.open("", "Image", "height=" + img.height + ",width=" + img.width);
        imgWindow.document.write("<img src='" + img.src + "' alt='Image'/>");
        imgWindow.document.close();
    }
</script>