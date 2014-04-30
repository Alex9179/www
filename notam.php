
<?php include "functions.php"; ?>
<!--notam page - Displays all notams for the set map area
//check boxes allow for different interpretations of the map
//Uses php include for pagehead as all but the index.html use the same pagehead-->

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "pagehead.php"; ?>
</head>
<body>
<!--Nav bar is the same to all other pages
// Not done as .php include as 'Class="active" required for CSS
//Includes search bar-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Weather Tracker <span class="glyphicon glyphicon-cloud"></span></a>
    </div>

    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li ><a href="index.php">Home</a></li>
        <li ><a href="main.php">Single Location</a></li>
        <li ><a href="route.php">Route Planner</a></li>           
        <li class="active"><a href="notam.php">NOTAM Map</a></li>                
        <li ><a href="About.php">About</a></li>     

      </ul>
      <form class="navbar-form navbar-right" >
        <input type="text" id="location" name="search"  class="form-control locationSearch" placeholder="Search..." >  
        <span class="glyphicon glyphicon-search"></span>        
      </form>
    </div>
  </div>
</div>


<div class="container-fluid">


  <!--Head of the page displaying the result information & graphical interface-->
  <div class="container">


    <div class="col-xs-12">
      <h3>NOTAM's</h3>
      <!--Inlcude the NOTAM map
      //outsourced and held in a different .php folder to minimise clutter -->
      <?php include "map.php"; ?>

    </div>     

  </div>

  <footer>
    <p> &copy; 2014Created by Alexander McLean  All data provided by the Met Office (http://www.metoffice.gov.uk/) </p>
  </footer>
</div>
</body>
</html>
