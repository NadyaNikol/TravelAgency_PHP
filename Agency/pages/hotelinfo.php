<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Travels</title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="row">
      <div class="col-md-12">
      
      <?php

      include_once('functions.php');
       $link=connect();
       $hotelid=$_GET['hotel']; 

        $imag=mysqli_query($link, 'SELECT * FROM images WHERE hotelid='.$hotelid); 
        $hot=mysqli_query($link, 'SELECT * FROM hotels WHERE id='.$hotelid); 

        $fh=mysqli_fetch_array($hot);

        echo "<h1>".$fh[1]."</h1>";

       for ($c=0; $c < $fh[stars]; $c++)
          {
              echo  '<img src="../images/star.jpg" alt="image" style="width:50px;">';
          }
       ?> 

      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">

            <?php

            
            $f=mysqli_fetch_array($imag);

           echo '<div class="carousel-item active">';
           echo  '<img class="d-block w-100" src="../images/'.$f[2].'" alt="image">';
           echo '</div>';

           while( $f=mysqli_fetch_array($imag))
            {
               echo '<div class="carousel-item">';
               echo  '<img class="d-block w-100" src="../images/'.$f[2].'" alt="image">';
               echo '</div>';
            }

          mysqli_free_result($imag);
          mysqli_free_result($hot);
           ?>  

            </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
  </div>
</div> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<style type="text/css">
body {
    margin:5% 10%;
  }
</style>
