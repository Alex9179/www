	<title>Test Page</title>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<style>
		#location-label {
			display: block;
			font-weight: bold;
			margin-bottom: 1em;
		}
		#location-icon {
			float: left;
			height: 32px;
			width: 32px;
		}
		#location-description {
			margin: 0;
			padding: 0;
		}
	</style>

	<form class="navbar-form navbar-right">
          <input type="text" id="location" name="search"  class="form-control" placeholder="Search..." >  
          <span class="glyphicon glyphicon-search"></span>        
        </form>
	<script>
		$(function() {
			var locations = [
			{
				value: "Bicknor Farm",
				label: "Bicknor Farm",
				id: 310106,

			},
			{
				value: "Challock",
				label: "Challock",
				id: 355089,
			},
			{
				value: "Clipgate",
				label: "Clipgate",
				id: 352469,
			}
			];

			function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#tags" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  });

			$( "#location" ).autocomplete({
				minLength: 0,
				source: locations,
				focus: function( event, ui ) {
					$( "#location" ).val( ui.item.label );
					return false;
				},
				select: function( event, ui ) {
					$( "#location" ).val( ui.item.label );
					$( "#location-id" ).val( ui.item.value );
					$( "#location-description" ).html( ui.item.id );

					return false;
				}
			})
			.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li>" )
				.append( "<a>" + item.label + "</a>" )
				.appendTo( ul );
			};
		});
	</script>
</head>
<body>

	<div id="location-label">Select a Location:</div>
	<input id="location" placeholder="Search">
	<p id="location-description"></p>








	<?php 

	$data = file_get_contents("http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json/354083?res=3hourly&key=b5bcbd2f-c9f1-45b4-a367-6fa8cbd39c3e");
// echo $data;
	$decoded = json_decode($data);
// echo json_encode($decoded);
// echo $decoded->SiteRep->DV->type;

	$today = $decoded->SiteRep->DV->Location->Period[0]->Rep[0];
	?>

	<h1>Test</h1>
	<h2>All 5 days</h2>

	<?php
//Returns all 5 days

	foreach ($decoded->SiteRep->DV->Location->Period as $index => $day) {
		?>

		<table>
			<thead>
				<tr>
					<th>W.Direction</th>
					<th>Feels like</th>
					<th>Gusts</th>
					<th>Humidity</th>
					<th>Precip.</th>
					<th>W.Speed</th>
					<th>Temperature</th>
					<th>Visibilty</th>
					<th>Weather</th>
					<th>U.V. Index</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($day->Rep as $index => $Timeslot) { ?>

				<tr>

					<td><?php echo $Timeslot->D; ?></td>
					<td><?php echo $Timeslot->F . "C"; ?></td>
					<td><?php echo $Timeslot->G . "Mph"; ?></td>
					<td><?php echo $Timeslot->H ."%"; ?></td>
					<td><?php echo $Timeslot->Pp; ?></td>
					<td><?php echo $Timeslot->S . "Mph"; ?></td>
					<td><?php echo $Timeslot->T ."C"; ?></td>
					<td><?php echo Visibility ($Timeslot->V); ?></td>
					<td><?php echo Weathertype ($Timeslot->W); ?></td>
					<td><?php echo $Timeslot->U; ?></td>
					<td><?php echo $Timeslot->{'$'}/60 . ":00"; ?></td>
				</tr>
				<?php } ?>


			</tbody>
		</table>
		<?php } ?>

		<h2>First Day</h2>
		<table>
			<thead>
				<tr>
					<th>W.Direction</th>
					<th>Feels like</th>
					<th>Gusts</th>
					<th>Humidity</th>
					<th>Precip.</th>
					<th>W.Speed</th>
					<th>Temperature</th>
					<th>Visibilty</th>
					<th>Weather</th>
					<th>U.V. Index</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
				<?php

//Returns first day.
				foreach ($decoded->SiteRep->DV->Location->Period[0]->Rep as $key => $Timeslot) {
					echo "<tr>";

					?>
					<td><?php echo $Timeslot->D; ?></td>
					<td><?php echo $Timeslot->F . "C"; ?></td>
					<td><?php echo $Timeslot->G . "Mph"; ?></td>
					<td><?php echo $Timeslot->H ."%"; ?></td>
					<td><?php echo $Timeslot->Pp; ?></td>
					<td><?php echo $Timeslot->S . "Mph"; ?></td>
					<td><?php echo $Timeslot->T ."C"; ?></td>
					<td><?php echo Visibility ($Timeslot->V); ?></td>
					<td><?php echo Weathertype ($Timeslot->W); ?></td>
					<td><?php echo $Timeslot->U; ?></td>
					<td><?php echo $Timeslot->{'$'}/60 . ":00"; ?></td>

					<?php

					echo "</tr>";
				}

				?>
			</tbody>
		</table>

		<?php 
		function Weathertype($W)
		{
			if($W==0){
				return "Clear Night";
			}else if( $W==1){
				return "Sunny Day"; 
			}else if( $W==2){
				return "Partly Cloudy"; 	
			}else if( $W==3){
				return "Partly Cloudy"; 
			}else if( $W==5){
				return "Mist"; 
			}else if( $W==6){
				return "Fog"; 
			}else if( $W==7){
				return "Cloudy"; 
			}else if( $W==8){
				return "Overcast"; 
			}else if( $W==9){
				return "Light Rain Shower"; 
			}else if( $W==10){
				return "Light Rain Shower"; 
			}else if( $W==11){
				return "Drizzle"; 
			}else if( $W==12){
				return "Light Rain"; 
			}else if( $W==13){
				return "Heavy Rain Shower"; 
			}else if( $W==14){
				return "Heavy Rain Shower"; 
			}else if( $W==15){
				return "Heavy Rain"; 
			}else if( $W==16){
				return "Sleet Shower"; 
			}else if( $W==17){
				return "Sleet Shower"; 
			}else if( $W==18){
				return "Sleet"; 
			}else if( $W==19){
				return "Hail Shower"; 
			}else if( $W==20){
				return "Hail Shower"; 
			}else if( $W==21){
				return "Hail"; 
			}else if( $W==22){
				return "Light Snow Shower"; 
			}else if( $W==23){
				return "Light Snow Shower"; 
			}else if( $W==24){
				return "Light Snow"; 
			}else if( $W==25){
				return "Heavy Snow Shower"; 
			}else if( $W==26){
				return "Heavy Snow Shower"; 
			}else if( $W==27){
				return "Heavy Snow"; 
			}else if( $W==28){
				return "Thunder Shower (Night)"; 
			}else if( $W==29){
				return "Thunder Shower (Day)"; 
			}else if( $W==30){
				return "Thunder"; 
			}
		}

		function Visibility($V)
		{
			if($V=="UN"){
				return "Unknown";
			}else if($V=="VP"){
				return "Very Poor";
			}else if($V=="PO"){
				return "Poor";
			}else if($V=="MO"){
				return "Moderate";
			}else if($V=="GO"){
				return "Good";
			}else if($V=="VG"){
				return "Very Good";
			}else if($V=="EX"){
				return "Excellent";
			}
		}

		?>



		<div class="panel-group" id="accordion">



			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#$index">
							Collapsible Group Item #1
						</a>
					</h4>
				</div>
				<div id="$index" class="panel-collapse collapse in">
					<div class="panel-body">

					</div>
				</div>
			</div>


		</div>



		<?php 
  //function Location($search)
		{
			if($search=="Bicknor Farm"){
				echo 310106;
			}else if( $search=="Challock"){
				echo 355089; 
			}else if( $search=="Clipgate"){
				echo 352469;   
			}else if( $search=="Coldharbour Farm"){
				echo 351385; 
			}else if( $search=="Eastchurch"){
				echo 355081; 
			}else if( $search=="Farthing Corner"){
				echo 350872; 
			}else if( $search=="Frintstead"){
				echo 350638; 
			}else if( $search=="Hamilton Farm"){
				echo 324150; 
			}else if( $search=="Headcorn"){
				echo 99182; 
			}else if( $search=="Lydd"){
				echo 352468; 
			}else if( $search=="Maypole"){
				echo 351856; 
			}else if( $search=="Monks Field"){
				echo 350406; 
			}else if( $search=="Old Hay"){
				echo 352938; 
			}else if( $search=="Pent Farm"){
				echo 310071; 
			}else if( $search=="Rochester"){
				echo 353225; 
			}else if( $search=="Romney Street"){
				echo 355123; 
			}else if( $search=="Shadoxhurst"){
				echo 350406; 
			}else if( $search=="Stoneacre Farm"){
				echo 353225; 
			}else if( $search=="Woodchurch"){
				echo 354083; 
			}
		}

		?>

function Weathertype(wtype)
         {
            if(wtype ==0){
                wtyp = 'Clear Night';
            }else if( wtype ==1){
                wtyp = 'Sunny Day';
            }else if( wtype ==2){
                wtyp = 'Partly Cloudy';
            }else if( wtype ==3){
                wtyp = 'Partly Cloudy';
            }else if( wtype ==5){
                wtyp = 'Mist';
            }else if( wtype ==6){
                wtyp = 'Fog';
            }else if( wtype ==7){
                wtyp = 'Cloudy';
            }else if( wtype ==8){
                wtyp = 'Overcast';
            }else if( wtype ==9){
                wtyp = 'Light Rain Shower';
            }else if( wtype ==10){
                wtyp = 'Light Rain Shower';
            }else if( wtype ==11){
                wtyp = 'Drizzle';
            }else if( wtype ==12){
                wtyp = 'Light Rain';
            }else if( wtype ==13){
                wtyp = 'Heavy Rain Shower';
            }else if( wtype ==14){
                wtyp = 'Heavy Rain Shower';
            }else if( wtype ==15){
                wtyp = 'Heavy Rain';
            }else if( wtype ==16){
                wtyp = 'Sleet Shower';
            }else if( wtype ==17){
                wtyp = 'Sleet Shower';
            }else if( wtype ==18){
                wtyp = 'Sleet';
            }else if( wtype ==19){
                wtyp = 'Hail Shower';
            }else if( wtype ==20){
                wtyp = 'Hail Shower';
            }else if( wtype ==21){
                wtyp = 'Hail';
            }else if( wtype ==22){
                wtyp = 'Light Snow Shower';
            }else if( wtype ==23){
                wtyp = 'Light Snow Shower';
            }else if( wtype ==24){
                wtyp = 'Light Snow';
            }else if( wtype ==25){
                wtyp = 'Heavy Snow Shower';
            }else if( wtype ==26){
                wtyp = 'Heavy Snow Shower';
            }else if( wtype ==27){
                wtyp = 'Heavy Snow';
            }else if( wtype ==28){
                wtyp = 'Thunder Shower (Night)';
            }else if( wtype ==29){
                wtyp = 'Thunder Shower (Day)';
            }else if( wtype ==30){
                wtyp = 'Thunder';
            }
        }


        //'Feels Like' Comparison
var L1 = $('#12').text();
var L2 = $('#102').text();    
if ((L1 != 0) && (L2 != 0)){
  var res1 = parseInt(L2) - parseInt(L1);
  $('#c1').html((res1) + "c");
} else {
    $('#c1').html("");
}

//'Gusts' Comparison
var L3 = $('#13').text();
var L4 = $('#103').text();    
if ((L3 != 0) && (L4 != 0)){
  var res2 = parseInt(L4) - parseInt(L3);
  $('#c2').html((res2) + "mph");
} else {
    $('#c2').html("");
}

//'Humidity' Comparison
var L5 = $('#14').text();
var L6 = $('#104').text();    
if ((L5 != 0) && (L6 != 0)){
  var res3 = parseInt(L6) - parseInt(L5);
  $('#c3').html((res3) + "%");
} else {
    $('#c3').html("");
}


//'W.Speed' Comparison
var L7 = $('#16').text();
var L8 = $('#106').text();    
if ((L7 != 0) && (L8 != 0)){
  var res4 = parseInt(L8) - parseInt(L7);
  $('#c4').html((res4) + "mph");
} else {
    $('#c4').html("");
}


//'Temperature' Comparison
var L9 = $('#16').text();
var L10 = $('#106').text();    
if ((L9 != 0) && (L10 != 0)){
  var res5 = parseInt(L10) - parseInt(L9);
  $('#c5').html((res5) + "mph");
} else {
    $('#c5').html("");
}


 function comparison () {


//'Feels Like' Comparison
var L1 = $('#12').text();
var L2 = $('#102').text();  
var L3 = $('#13').text();
var L4 = $('#103').text(); 
var L5 = $('#14').text();
var L6 = $('#104').text(); 
var L7 = $('#16').text();
var L8 = $('#106').text(); 
var L9 = $('#16').text();
var L10 = $('#106').text();

if ((L1 != 0) && (L2 != 0)){
    $('#c1').html("-"); 
  var res1 = parseInt(L2) - parseInt(L1);
  $('#c2').html((res1) + "c");
  var res2 = parseInt(L4) - parseInt(L3);
  $('#c3').html((res2) + "mph");
  var res3 = parseInt(L6) - parseInt(L5);
  $('#c4').html((res3) + "%");
  $('#c5').html("-"); 
  var res4 = parseInt(L8) - parseInt(L7);
  $('#c6').html((res4) + "mph");
  var res5 = parseInt(L10) - parseInt(L9);
  $('#c7').html((res5) + "mph");
  $('#c8').html("-"); 
  $('#c9').html("-"); 
  $('#c10').html("-");
  $('#c11').html("-");  
} 

}

function Weathergraph($W)
 {
 switch($W){
 case 0:
    return 'images/clear_night.png';
    break;
 case 1: 
    return 'images/sunny_day.png';
    break;
  case 2:
    return 'images/partly_cloudy_night.png';
    break;
 case 3:
    return 'images/partly_cloud.png';
    break;
 case 5:
    return 'images/mist.png';
    break;
  case 6:
    return 'images/fog.png';
    break;
 case 7:
    return 'images/cloudy.png';
    break;
 case 8;
    return 'images/overcast.png';
    break;
  case 9:
    return 'images/light_rain.png';
    break;
  case 10:
    return 'images/light_rain.png';
    break;
 case 11:
    return 'images/drizzle.png';
    break;
  case 12:
    return 'images/light_rain.png';
    break;
  case 13:
    return 'images/heavy_rain_shower_night.png';
    break;
 case 14:
    return 'images/heavy_rain_shower.png';
    break;
  case 15:
    return 'images/heavy_rain.png';
    break;
  case 16:
    return 'images/sleet_shower_night.png';
    break;
  case 17:
    return 'images/sleet_shower.png';
    break;
  case 18:
    return 'images/sleet.png';
    break;
  case 19:
    return 'images/hail_shower_night.png';
    break;
  case 20:
    return 'images/hail_shower.png';
    break;
 case 21:
    return 'images/hail.png';
    break;
  case 22:
    return 'images/light_snow_shower_night.png';
    break;
  case 23:
    return 'images/light_snow_shower.png';
    break;
  case 24:
    return 'images/light_snow.png';
    break;
 case 25:
    return 'images/heavy_snow_shower_night.png';
    break;
  case 26:
    return 'images/heavy_snow_shower.png';
    break;
 case 27:
    return 'images/heavy_snow.png';
    break;
  case 28:
    return 'images/thunder_shower_night.png';
    break;
  case 29:
    return 'images/thunder_shower.png';
    break;
  case 30:
    return 'images/thunder.png';
    break;
  }
}
