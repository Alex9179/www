
<?php include "functions.php"; ?>
<!--Route page - Displays the results from two seperate locations and compares them to display different weather in the route.
//graphics showing current weather of location & tables with detailed weathr information for the next 5 days below
//Uses php include for pagehead as all but the index.html use the same pagehead-->

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "pagehead.php"; ?>
</head>



<body>

  <!--Page header and navigation-->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Weather Wings <span class="glyphicon glyphicon-cloud"></span></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li ><a href="index.php">Home</a></li>
          <li ><a href="main.php">Single Location</a></li>
          <li class="active"><a href="route.php">Route Planner</a></li>            
          <li ><a href="notam.php">NOTAM Map</a></li>
          <li ><a href="About.php">About</a></li>    
        </ul>
        <form class="navbar-form navbar-right" >
          <input type="text" id="location" name="search"  class="form-control locationSearch" placeholder="Search..." >  
          <span class="glyphicon glyphicon-search"></span>        
        </form>
      </div>
    </div>
  </div>

  <!--Main page container-->
  <div class="container-fluid">

    <div class="container">
      <h1 class="page-header">Route Planner</h1> 
      <p>Check the weather at both the start and end of your journey by entering each location below.</p>
      <p style="color:red;">All weather estimations for each location. <span class="glyphicon glyphicon-warning-sign"></p>

      <div class="row placeholders">

        <!--First location drop-down options with the id linked to javascript function-->
        <div class="col-xs-6 placeholder">
          <h2>First Location</h2>
          <form action="" >
            <select id="location1">
              <option value="">Select Location</option>
              <option value="310106">Bicknor Farm</option>
              <option value="354330">Challock</option>
              <option value="352469">Clipgate</option>
              <option value="351385">Coldharbour Farm</option>
              <option value="353466">Eastchurch</option>
              <option value="350872">Farthing Corner</option>
              <option value="350638">Frintstead</option>
              <option value="324150">Hamilton Farm</option>
              <option value="351989">Headcorn</option>
              <option value="352468">Lydd</option>
              <option value="351856">Maypole</option>
              <option value="350406">Monks Field</option>
              <option value="352938">Old Hay</option>
              <option value="310071">Pent Farm</option>
              <option value="353225">Rochester</option>
              <option value="350571">Romney Street</option>
              <option value="350406">Shadoxhurst</option>
              <option value="353225">Stoneacre Farm</option>
              <option value="354083">Woodchurch</option>
            </select>
          </form>
        </div>

        <!--Second location drop-down options with the id linked to javascript function-->
        <div class="col-xs-6 placeholder">
          <h2>Second Location</h2>
          <form action="" >
            <select id="location2">
              <option value="">Select Location</option>
              <option value="310106">Bicknor Farm</option>
              <option value="354330">Challock</option>
              <option value="352469">Clipgate</option>
              <option value="351385">Coldharbour Farm</option>
              <option value="353466">Eastchurch</option>
              <option value="350872">Farthing Corner</option>
              <option value="350638">Frintstead</option>
              <option value="324150">Hamilton Farm</option>
              <option value="351989">Headcorn</option>
              <option value="352468">Lydd</option>
              <option value="351856">Maypole</option>
              <option value="350406">Monks Field</option>
              <option value="352938">Old Hay</option>
              <option value="310071">Pent Farm</option>
              <option value="353225">Rochester</option>
              <option value="350571">Romney Street</option>
              <option value="350406">Shadoxhurst</option>
              <option value="353225">Stoneacre Farm</option>
              <option value="354083">Woodchurch</option>
            </select>
          </form>
        </div>   
      </div>

      <!--Results table - four columns with headers, first location results, comparisons 
      //(calculated and populated onces both locations have been selected) and second location results-->


      <div class="col-xs-12 placeholder">
        <table class="table table-striped">

          <thead>
            <tr>
              <th></th>
              <th>First Location</th>
              <th><small>Comparison</small></th>
              <th>Second Location</th>              
            </tr>
          </thead>

          <tbody>
           <tr>
            <th>Time</th>
            <td id="21"></td>
            <td id="c11"></td>
            <td id="111"></td>
          </tr>
          <tr>
            <th>Weather</th>
            <td id="19"></td>
            <td id="c9"></td>
            <td id="109"></td>
          </tr>
          <tr>
            <th>W.Direction</th>
            <td id="11"></td>
            <td id="c1"></td>
            <td id="101"></td>
          </tr>
          <tr>
            <th>W.Speed</th>
            <td id="16"></td>
            <td id="c6"></td>
            <td id="106"></td>
          </tr>
          <tr>
            <th>Gusts</th>
            <td id="13"></td>
            <td id="c3"></td>
            <td id="103"></td>
          </tr>
          <tr>
            <th>Visibility</th>
            <td id="18"></td>
            <td id="c8"></td>
            <td id="108"></td>
          </tr>
          <tr>
            <th>Humidity</th>
            <td id="14"></td>
            <td id="c4"></td>
            <td id="104"></td>
          </tr>
          <tr>
            <th>Precip.</th>
            <td id="15"></td>
            <td id="c5"></td>
            <td id="105"></td>
          </tr>              
          <tr>
            <th>Temperature</th>
            <td id="17"></td>
            <td id="c7"></td>
            <td id="107"></td>
          </tr>
          <tr>
            <th>Feels Like</th>
            <td id="12"></td>
            <td id="c2"></td>
            <td id="102"></td>
          </tr>             
          <tr>
            <th>U.V. Index</th>
            <td id="20"></td>
            <td id="c10"></td>
            <td id="110"></td>
          </tr>
        </tbody>

      </table>
    </div>


    <footer>
      <p> &copy; 2014Created by Alexander McLean  All data provided by the Met Office (http://www.metoffice.gov.uk/) </p>
    </footer>
  </div>
</body>
</html>
