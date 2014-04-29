 <!--The PHP function which converts the numerical weather type into the correct english-->
 <?php 

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
     return 'images/partly_cloudy_day.png';
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



function Weathertype($W)
{
  switch($W){
    case 0:
    return '<td>Clear Night</td>';
    break;
    case 1:
    return '<td>Sunny Day</td>';
    break;
    case 2:
    return '<td>Partly Cloudy</td>';
    break;
    case 3:
    return '<td>Partly Cloudy</td>';
    break;
    case 5:
    return '<td class="warning">Mist</td>';
    break;
    case 6:
    return '<td class="warning">Fog</td>';
    break;
    case 7:
    return '<td>Cloudy</td>';
    break;
    case 8:
    return '<td class="warning">Overcast</td>';
    break;
    case 9:
    return '<td class="warning">Light Rain Shower</td>';
    break;
    case 10:
    return '<td class="warning">Light Rain Shower</td>';
    break;
    case 11:
    return '<td class="warning">Drizzle</td>';
    break;
    case 12:
    return '<td class="warning">Light Rain</td>';
    break;
    case 13:
    return '<td class="warning">Heavy Rain Shower</td>';
    break;
    case 14:
    return '<td class="warning">Heavy Rain Shower</td>';
    break;
    case 15:
    return '<td class="danger">Heavy Rain  <span class="glyphicon glyphicon-warning-sign"></span></td>';
    break;
    case 16:
    return '<td class="warning">Sleet Shower</td>';
    break;
    case 17:
    return '<td class="warning">Sleet Shower</td>';
    break;
    case 18:
    return '<td class="danger">Sleet</td>';
    break;
    case 19:
    return '<td class="warning">Hail Shower</td>';
    break;
    case 20:
    return '<td class="warning">Hail Shower</td>';
    break;
    case 21:
    return '<td class="danger  <span class="glyphicon glyphicon-warning-sign"></span>">Hail</td>';
    break;
    case 22:
    return '<td class="warning">Light Snow Shower</td>';
    break;
    case 23:
    return '<td class="warning">Light Snow Shower</td>';
    break;
    case 24:
    return '<td class="warning">Light Snow</td>';
    break;
    case 25:
    return '<td class="danger  <span class="glyphicon glyphicon-warning-sign"></span>">Heavy Snow Shower</td>';
    break;
    case 26:
    return '<td class="danger  <span class="glyphicon glyphicon-warning-sign"></span>">Heavy Snow Shower</td>';
    break;
    case 27:
    return '<td class="danger  <span class="glyphicon glyphicon-warning-sign"></span>">Heavy Snow</td>';
    break;
    case 28:
    return '<td class="danger  <span class="glyphicon glyphicon-warning-sign"></span>">Thunder Shower (Night)</td>';
    break;
    case 29:
    return '<td class="danger  <span class="glyphicon glyphicon-warning-sign"></span>">Thunder Shower (Day)</td>';
    break;
    case 30:
    return '<td class="danger  <span class="glyphicon glyphicon-warning-sign"></span>">Thunder</td>';
    break;
    default:
    return '<td> Unknown </td>';

}
}


//Similiar function to to weather, instead for visibilty
function Visibility($V)
{
  switch($V){    
    case "UN":
    return '<td class="warning" data-toggle="tooltip" data-placement="right" title="Distance Unknown"> Unknown </td>';
    break;
    case "VP":
    return '<td class="danger" data-toggle="tooltip" data-placement="right" title=">1km">Very Poor</td>';
    break;
    case "PO":
    return '<td class="warning" data-toggle="tooltip" data-placement="right" title="1-4km">Poor</td>';
    break;
    case "MO":
    return '<td data-toggle="tooltip" data-placement="right" title="4-10km">Moderate</td>';
    break;
    case "GO":
    return '<td data-toggle="tooltip" data-placement="right" title="10-20km">Good</td>';
    break;
    case "VG":
    return '<td data-toggle="tooltip" data-placement="right" title="20-40km">Very Good</td>';
    break;
    case "EX":
    return '<td data-toggle="tooltip" data-placement="right" title="40km+">Excellent</td>';
    break;
} 
}

    //Similiar function to to weather, instead for visibilty
function Visgraph($V)
{
  switch($V){ 
    case "UN":
    return 'images/overcast.png';
    break;
    case "VP":
    return 'images/fog.png';
    break;
    case "PO":
    return 'images/cloudy.png';
    break;
    case "MO":
    return 'images/partly_cloudy_day.png';
    break;
    case "GO":
    return 'images/partly_cloudy_day.png';
    break;
    case "VG":
    return 'images/sunny_day.png';
    break;
    case "EX":
    return 'images/sunny_day.png';
    break;
}
}

function Tempgraph($T)
{
  if($T <= 10){
    return 'images/1.png';
}else if($T >=11 && $T <=20){
    return 'images/2.png';
}else if($T >=21 && $T <=25){
    return 'images/3.png';
}else if($T >=26 && $T <=30){
    return 'images/4.png';
}else if($T >= 15){
    return 'images/5.png';
}
}

function Windgraph($D)
{
  if($D == "N" ){
    return 'images/wind_north.png';
}else if($D == "E"){
    return 'images/wind_east.png';
}else if($D == "S"){
    return 'images/wind_south.png';
}else if($D == "W"){
    return 'images/wind_west.png';
}else if($D == "NNE" || $D == "NE" || $D == "ENE"){
    return 'images/wind_north_east.png';
}else if($D == "SSE" || $D == "SE" || $D == "ESE"){
    return 'images/wind_south_east.png';
}else if($D == "NNW" || $D == "NW" || $D == "WNW"){
    return 'images/wind_north_west.png';
}else if($D == "SSW" || $D == "SW" || $D == "WSW"){
    return 'images/wind_north_west.png';
}
}



?>
