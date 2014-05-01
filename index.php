
<?php include "functions.php"; ?>

<!--Index page - Simple design with an opening paragraph & initial search bar
//includes the main navigation which can link to any page but without the search in the top right
//The href when 'Weather Tracker' in the top left is clicked.-->

<!DOCTYPE html>
<html lang="en">

<!--Pagehead unique to the index.html as it has a different stylesheet, therefore linked in directly instead of .php include as the other pages-->
<head>
  <title>Weather Tracker</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="Weather Report Application" >
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="196x196" href="/icon.png">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
  <script src="js.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">


</head>

<body>
  <!--Nav bar is similar to all other pages, without the search option. Not done as .php include as 'Class="active" required for CSS-->

  <div class="site-wrapper">
    <div class="site-wrapper-inner">
      <div class="cover-container">      
        <div class="inner">

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
                  <li class="active"><a href="index.php">Home</a></li>
                  <li ><a href="main.php">Single Location</a></li>
                  <li><a href="route.php">Route Planner</a></li>                 
                  <li ><a href="notam.php">NOTAM Map</a></li> 
                  <li ><a href="About.php">About</a></li>   
                </ul>
              </div>
            </div>
          </div>        
        </div>

        <!--Front page Image-->

        <div class="col-xs-4 placeholder">
          <img src="images/sunny_day.png" class="img-responsive">
        </div>

        <!--Front page text, simple welcome message & the initial search bar (wide bar to draw attention)-->
        <div class="inner cover">
          <div id="msg">
            <h1 class="cover-heading">Welcome</h1>
            <p> Official aviation weather reports (TAFS' and METARs) are limited, meaning many airfields are left without any local weather reports.Weather Tracker aims to provide local weather information for all airfields/aerodromes in Kent, UK. </p>
            <p>Begin your search by searching in the bar below</p>
          </div>
          <form >
            <input type="text" id="location" name="name" class="form-control" placeholder="Search..." >             
            <span class="glyphicon glyphicon-search"></span>   
          </form> 
        </div>
      </div>
    </div>
  </div>
</body>
</html>

