


//The array of each location and it's unique if used for the json api
$(document).ready(function() {
  var locations = [
  {
    value: "Bicknor Farm", 
    label: "Bicknor Farm",  
    no: 310106,
  },
  {
    value: "Challock", 
    label: "Challock",     
    no: 354330,
  },
  {
    value: "Clipgate",
    label: "Clipgate",
    no: 352469,
  },
  {
    value: "Coldharbour Farm",
    label: "Coldharbour Farm",      
    no: 351385,
  },
  {
    value: "Eastchurch",    
    label: "Eastchurch",  
    no: 353466,
  },
  {
    value: "Farthing Corner",   
    label: "Farthing Corner",  
    no: 350872,
  },
  {
    value: "Frintstead", 
    label: "Frintstead",     
    no: 350638,
  },
  {
    value: "Hamilton Farm",   
    label: "Hamilton Farm",   
    no: 324150,
  },
  {
    value: "Headcorn",  
    label: "Headcorn",    
    no: 351989,
  },
  {
    value: "Lydd",    
    label: "Lydd",  
    no: 352468,
  },
  {
    value: "Maypole",   
    label: "Maypole",  
    no: 351856,
  },
  {
    value: "Monks Field",  
    label: "Monks Field",   
    no: 350406,
  },
  {
    value: "Old Hay",   
    label: "Old Hay",   
    no: 352938,
  },
  {
    value: "Pent Farm",  
    label: "Pent Farm",   
    no: 310071,
  },
  {
    value: "Rochester",   
    label: "Rochester",  
    no: 353225,
  },
  {
    value: "Romney Street",   
    label: "Romney Street",  
    no: 350571,
  },
  {
    value: "Shadoxhurst",  
    label: "Shadoxhurst",    
    no: 350406,
  },
  {
    value: "Stoneacre Farm",
    label: "Stoneacre Farm",  
    no: 353225,
  },
  {
    value: "Woodchurch",   
    label: "Woodchurch",  
    no: 354083,
  }

  //{
    //value: "Potential New Location",   
    //label: "",  
    //no: ######,
  //}

  ];

//Search script - autocompletes the search bar using the array, and appends both the name & location id back to the url to be used 
//by the php to fetch the required data on the location.

$( "#location" ).autocomplete({
  minLength: 1,
  source: locations,
  focus: function( event, ui ) {
    $( "#location" ).val( ui.item.label );
    return false;
  },
  select: function( event, ui ) {      
   window.location.href = "main.php?name="+ ui.item.label+"&location=" + ui.item.no;
   return false;
 }
})
.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
  return $( "<li>" )
  .append( "<a>" + item.label + "</a>" )
  .appendTo( ul );

};


//Retrieves the value of first location drop-down and fetches the information via the json api.
$("#location1").change(function(){

  $.ajax({
    type:"get",
    url: "http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json/" + $('#location1').val() + "?res=3hourly&key=b5bcbd2f-c9f1-45b4-a367-6fa8cbd39c3e",
    success:function(result) {


      var data = result.SiteRep.DV.Location.Period[0].Rep[0];
      var wtype1 = null;
      var vtype1 = null;

//Depending on the W result, print the weather type
if(data['W'] ==0){
  wtype1 = 'Clear Night';
}else if( data['W'] ==1){
  wtype1 = 'Sunny Day';
}else if( data['W'] ==2){
  wtype1 = 'Partly Cloudy';
}else if( data['W'] ==3){
  wtype1 = 'Partly Cloudy';
}else if( data['W'] ==5){
  wtype1 = 'Mist';
}else if( data['W'] ==6){
  wtype1 = 'Fog';
}else if( data['W'] ==7){
  wtype1 = 'Cloudy';
}else if( data['W'] ==8){
  wtype1 = 'Overcast';
}else if( data['W'] ==9){
  wtype1 = 'Light Rain Shower';
}else if( data['W'] ==10){
  wtype1 = 'Light Rain Shower';
}else if( data['W'] ==11){
  wtype1 = 'Drizzle';
}else if( data['W'] ==12){
  wtype1 = 'Light Rain';
}else if( data['W'] ==13){
  wtype1 = 'Heavy Rain Shower';
}else if( data['W'] ==14){
  wtype1 = 'Heavy Rain Shower';
}else if( data['W'] ==15){
  wtype1 = 'Heavy Rain';
}else if( data['W'] ==16){
  wtype1 = 'Sleet Shower';
}else if( data['W'] ==17){
  wtype1 = 'Sleet Shower';
}else if( data['W'] ==18){
  wtype1 = 'Sleet';
}else if( data['W'] ==19){
  wtype1 = 'Hail Shower';
}else if( data['W'] ==20){
  wtype1 = 'Hail Shower';
}else if( data['W'] ==21){
  wtype1 = 'Hail';
}else if( data['W'] ==22){
  wtype1 = 'Light Snow Shower';
}else if( data['W'] ==23){
  wtype1 = 'Light Snow Shower';
}else if( data['W'] ==24){
  wtype1 = 'Light Snow';
}else if( data['W'] ==25){
  wtype1 = 'Heavy Snow Shower';
}else if( data['W'] ==26){
  wtype1 = 'Heavy Snow Shower';
}else if( data['W'] ==27){
  wtype1 = 'Heavy Snow';
}else if( data['W'] ==28){
  wtype1 = 'Thunder Shower (Night)';
}else if( data['W'] ==29){
  wtype1 = 'Thunder Shower (Day)';
}else if( data['W'] ==30){
  wtype1 = 'Thunder';
}


  if(data['V'] == 'UN'){     
   vtype1 = 'Unknown';
 }else if(data['V'] == 'VP'){    
   vtype1 = 'Very Poor';
 }else if(data['V'] == 'PO'){     
   vtype1 = 'Poor';
 }else if(data['V'] == 'MO'){     
   vtype1 = 'Moderate';
 }else if(data['V'] == 'GO'){     
   vtype1 = 'Good';
 }else if(data['V'] == 'VG'){     
   vtype1 = 'Very Good';
 }else if(data['V'] == 'EX'){     
   vtype1 = 'Excellent';    
 } 

//Print each result in it's correct <td> & check to see if a comparison is needed.

$('#11').html(data['D']);
$('#12').html(data['F'] + "c");
$('#13').html(data['F'] + "mph");
$('#14').html(data['H'] + "%");
$('#15').html(data['Pp'] + "%");
$('#16').html(data['S'] + "mph");
$('#17').html(data['T'] + "c");
$('#18').html(vtype1);
$('#19').html(wtype1);
$('#20').html(data['U']);
$('#21').html(data['$']/60 + ":00");
comparison();



}
});
});


//Retrieves the value of second location drop-down and fetches the information via the json api.
$("#location2").change(function(){

  $.ajax({
    type:"get",
    url: "http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json/" + $('#location2').val() + "?res=3hourly&key=b5bcbd2f-c9f1-45b4-a367-6fa8cbd39c3e",
    success:function(result) {

      var data = result.SiteRep.DV.Location.Period[0].Rep[0];
      var wtype = null;
      var vtype2 = null;


//Depending on the W result, print the weather type
if(data['W'] ==0){
  wtype = 'Clear Night';
}else if( data['W'] ==1){
  wtype = 'Sunny Day';
}else if( data['W'] ==2){
  wtype = 'Partly Cloudy';
}else if( data['W'] ==3){
  wtype = 'Partly Cloudy';
}else if( data['W'] ==5){
  wtype = 'Mist';
}else if( data['W'] ==6){
  wtype = 'Fog';
}else if( data['W'] ==7){
  wtype = 'Cloudy';
}else if( data['W'] ==8){
  wtype = 'Overcast';
}else if( data['W'] ==9){
  wtype = 'Light Rain Shower';
}else if( data['W'] ==10){
  wtype = 'Light Rain Shower';
}else if( data['W'] ==11){
  wtype = 'Drizzle';
}else if( data['W'] ==12){
  wtype = 'Light Rain';
}else if( data['W'] ==13){
  wtype = 'Heavy Rain Shower';
}else if( data['W'] ==14){
  wtype = 'Heavy Rain Shower';
}else if( data['W'] ==15){
  wtype = 'Heavy Rain';
}else if( data['W'] ==16){
  wtype = 'Sleet Shower';
}else if( data['W'] ==17){
  wtype = 'Sleet Shower';
}else if( data['W'] ==18){
  wtype = 'Sleet';
}else if( data['W'] ==19){
  wtype = 'Hail Shower';
}else if( data['W'] ==20){
  wtype = 'Hail Shower';
}else if( data['W'] ==21){
  wtype = 'Hail';
}else if( data['W'] ==22){
  wtype = 'Light Snow Shower';
}else if( data['W'] ==23){
  wtype = 'Light Snow Shower';
}else if( data['W'] ==24){
  wtype = 'Light Snow';
}else if( data['W'] ==25){
  wtype = 'Heavy Snow Shower';
}else if( data['W'] ==26){
  wtype = 'Heavy Snow Shower';
}else if( data['W'] ==27){
  wtype = 'Heavy Snow';
}else if( data['W'] ==28){
  wtype = 'Thunder Shower (Night)';
}else if( data['W'] ==29){
  wtype = 'Thunder Shower (Day)';
}else if( data['W'] ==30){
  wtype = 'Thunder';
}

if(data['V'] == 'UN'){     
   vtype2 = 'Unknown';
 }else if(data['V'] == 'VP'){    
   vtype2 = 'Very Poor';
 }else if(data['V'] == 'PO'){     
   vtype2 = 'Poor';
 }else if(data['V'] == 'MO'){     
   vtype2 = 'Moderate';
 }else if(data['V'] == 'GO'){     
   vtype2 = 'Good';
 }else if(data['V'] == 'VG'){     
   vtype2 = 'Very Good';
 }else if(data['V'] == 'EX'){     
   vtype2 = 'Excellent';    
 } 

//Print each result in it's correct <td> & check to see if a comparison is needed.
$('#101').html(data['D']);
$('#102').html(data['F'] + "c");
$('#103').html(data['F'] + "mph");
$('#104').html(data['H'] + "%");
$('#105').html(data['Pp']+ "%");
$('#106').html(data['S'] + "mph");
$('#107').html(data['T'] + "c");
$('#108').html(vtype2);
$('#109').html(wtype);
$('#110').html(data['U']);
$('#111').html(data['$']/60 + ":00");
comparison();


}


});
});

});

//Compare both locations in the route section
function comparison () {

//Collect all of the variables from both locations
var L1 = $('#12').text();
var L2 = $('#102').text();  
var L3 = $('#13').text();
var L4 = $('#103').text(); 
var L5 = $('#14').text();
var L6 = $('#104').text(); 
var L7 = $('#16').text();
var L8 = $('#106').text(); 
var L9 = $('#17').text();
var L10 = $('#107').text();

//If both locations have information, then run the calculations on both and populate the center column (with a dash if no calculation).
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
  $('#c7').html((res5) + "c");
  $('#c8').html("-"); 
  $('#c9').html("-"); 
  $('#c10').html("-");
  $('#c11').html("-");  
} 

}

