
<?php include "functions.php"; ?>
<!--About page - Simple information page linking to other outward sources.-->

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
          <li ><a href="notam.php">NOTAM Map</a></li>                  
          <li class="active"><a href="About.php">About</a></li>  

        </ul>
        <form class="navbar-form navbar-right" >
          <input type="text" id="location" name="search"  class="form-control locationSearch" placeholder="Search..." >  
          <span class="glyphicon glyphicon-search"></span>        
        </form>
      </div>
    </div>
  </div>


  <div class="container-fluid">




    <!--Container which holds the main parts of the page
    //Various col-xs settings to allow each section to be evenly spaced out and adjust to window size-->
    <div class="container">
      <h1 class="page-header">About</h1> 
      <div class="row placeholders">
       <div class="col-xs-12 placeholder">
        <p> Official aviation weather reports (TAFS' and METARs) are limited, meaning many airfields are left without any local weather reports.Weather Tracker aims to provide local weather information for all airfields/aerodromes in Kent, UK. </p>
        <p>The site was created as a project by Alex McLean, a student of The University of Brighton. The intent of the project is to create local weather reports for pilots who wish to fly Kents most remote locations, as such, all information is only advisory and an estimation. Please follow the links below to view official avation reports. </p>
      </div>
      <div class="col-xs-6 placeholder">
        <h3>NOTAM's</h3>
        <a href"http://notaminfo.com/">http://notaminfo.com/</a>
      </div>
      <div class="col-xs-6 placeholder">
        <h3> METARs and TAFs</h3>
        <a href"http://www.metoffice.gov.uk/aviation/ga">http://www.metoffice.gov.uk/aviation/ga</a>
      </div>   
    </div>




    <footer>
      <p> &copy; 2014Created by Alexander McLean  All data provided by the Met Office (http://www.metoffice.gov.uk/) </p>
    </footer>
  </div>
</body>
</html>
