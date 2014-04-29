
<?php include "functions.php"; ?>
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
        <a class="navbar-brand" href="index.php">Weather Tracker <span class="glyphicon glyphicon-cloud"></span></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li ><a href="index.php">Home</a></li>
          <li class="active"><a href="main.php">Single Location</a></li>
          <li><a href="route.php">Route Planner</a></li>         
          <li ><a href="notam.php">NOTAM Map</a></li>
          <li ><a href="About.php">About</a></li>   
        </ul>
        <form class="navbar-form navbar-right" >
          <input type="text" id="location" name="search"  class="form-control" placeholder="Search..." >  
          <span class="glyphicon glyphicon-search"></span>        
        </form>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <!--If the the location is already set, GET it and request information, otherwise, set to the preset location-->
    <?php 
    $data;
    if(isset($_GET['location'])) {
      $data = file_get_contents("http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json/" . $_GET['location'] . "?res=3hourly&key=b5bcbd2f-c9f1-45b4-a367-6fa8cbd39c3e");
    }
    else {
      $URL="http://localhost/main.php?name=Headcorn&location=351989";
      echo ("<script>window.location.href='$URL'</script>");
    }  

    //Decode the json file and break down to the required times & locations within the files to be easily called
    $decoded = json_decode($data);
    $today = $decoded->SiteRep->DV->Location->Period[0]->Rep[0];
    $place = $decoded->SiteRep->DV->Location->name;
    ?>

    <!--Head of the page displaying graphical representation, graphics loaded depending on the json results.-->
    <div class="row">        
      <div class="container">
        <h1 class="page-header">Your Search Results <small><?php echo $_GET['name']; ?></small></h1> 
        <p> Closest Report: <?php echo $place ?></p>
        <p style="color:red;">ALL WEATHER ESTIMATIONS ( < 3KM ACCURACY ) <span class="glyphicon glyphicon-warning-sign"></p>
        <h2>Summary</h2>

        <div class="row placeholders">

          <div class="col-xs-3 placeholder">
            <img src=<?php echo Visgraph ($today->V); ?> class="img-responsive" alt="Visibility thumbnail">
            <h4>Visibility</h4>
            <span class="text-muted"><?php echo Visibility ($today->V); ?></span>
          </div>

          <div class="col-xs-3 placeholder">
            <img src=<?php echo Weathergraph ($today->W); ?> class="img-responsive" alt="weather thumbnail">
            <h4>Weather</h4>
            <span class="text-muted"><?php echo Weathertype ($today->W); ?></span>
          </div> 

          <div class="col-xs-3 placeholder">
            <img src=<?php echo Windgraph ($today->D); ?> class="img-responsive" alt="wind thumbnail">
            <h4>Wind</h4>
            <span class="text-muted"><?php echo $today->S . "Mph"; ?>  <?php echo $today->D; ?></span>
          </div>   

          <div class="col-xs-3 placeholder">
            <img src=<?php echo Tempgraph ($today->T); ?> class="img-responsive" alt="weather thumbnail">
            <h4>Temperature</h4>
            <span class="text-muted"><?php echo $today->T . "c"; ?></span>
          </div> 
        </div>

        <!--Start of accordion which shows all 5 days data, with the first day open.-->

        <div class="panel-group" id="accordion">
          <?php
        //Returns all 5 days in accordion, creating a new panel and populating for each day.
          foreach ($decoded->SiteRep->DV->Location->Period as $index => $day) {
            ?>

            <div class="panel panel-default">
              <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $index; ?>">
                <h4 class="panel-title">
                  Today + <?php echo $index; ?>
                </a>
              </h4>
            </div>

            <?php if($index == 0) { ?>
            <div id="<?php echo $index; ?>" class="panel-collapse collapse in">
              <!--If the index == 0 (first day in the array) create the panel open-->
              <?php } else { ?>
              <!--Otherwise create the panel closed.-->
              <div id="<?php echo $index; ?>" class="panel-collapse collapse">
                <?php } ?>

                <div class="panel-body">
                  <table class="table table-striped">

                    <thead>
                      <tr>
                        <th>Time</th>
                        <th>Weather</th>
                        <th>W.Speed</th>
                        <th>W.Direction</th>
                        <th>Gusts</th>
                        <th>Visibility</th>                                                
                        <th>Humidity</th>
                        <th>Precip.</th>                       
                        <th>Temperature</th> 
                        <th>Feels like</th>                    
                        <th>U.V. Index</th>                        
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($day->Rep as $index => $Timeslot) { ?>
                      <tr>
                        <td><?php echo $Timeslot->{'$'}/60 . ":00"; ?></td>
                        <?php echo Weathertype ($Timeslot->W); ?>
                        <td><?php echo $Timeslot->S . "mph"; ?></td>    
                        <td><?php echo $Timeslot->D; ?></td>
                        <td><?php echo $Timeslot->G . "mph"; ?></td>
                        <?php echo Visibility ($Timeslot->V); ?> 
                        <td><?php echo $Timeslot->H ."%"; ?></td>
                        <td><?php echo $Timeslot->Pp . "%"; ?></td>    
                        <td><?php echo $Timeslot->T ."c"; ?></td>            
                        <td><?php echo $Timeslot->F . "c"; ?></td>
                        <td><?php echo $Timeslot->U; ?></td>                        
                      </tr>
                      <?php } ?>
                    </tbody>

                  </table>

                </div> <!--End of panel-->
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <p> &copy; 2014Created by Alexander McLean - All data provided by the Met Office (http://www.metoffice.gov.uk/) </p>
    </footer>
  </body>
  </html>
