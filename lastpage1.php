<?php
session_start();
if(!isset($_SESSION['username']))
    {
      session_destroy();
      header("Location: error.php");
    }
require 'connect.php';
$id = $_GET['id'];
$s_date = $_GET['s_date'];
$e_date = $_GET['e_date'];
?>



<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet"></link>
        <link href="css/AnimatingSymbols.css" rel="stylesheet"></link>
        <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
        <!--<link href="MDB-Free/css/mdb.min.css" rel="stylesheet">-->
        <title>Animating Symbols</title>

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
          
      <script>
          $(document).ready(function() {
            $("#datepickerTo").datepicker({ dateFormat: "yy-mm-dd" });
          });
      </script>

      <script>
          $(document).ready(function() {
            $("#datepickerFrom").datepicker({ dateFormat: "yy-mm-dd" });
          });
      </script>

      <script>
        $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
          });
      </script>

      <!-- Start and End dates -->
      <?php
        $result = mysqli_query($bd,"SELECT start_date FROM project WHERE id=".$id);
        $locations = array();
        while($row = mysqli_fetch_array($result)) {
         array_push($locations, $row);
           $start_date=strtotime($locations[0][0]);
         }
         $result = mysqli_query($bd,"SELECT end_date FROM project WHERE id=".$id);
        $locations = array();
        while($row = mysqli_fetch_array($result)) {
         array_push($locations, $row);
           $end_date=strtotime($locations[0][0]);
         }
     ?>

      <script>

      var start_value = <?php echo json_encode($start_date,JSON_NUMERIC_CHECK); ?>;
      var end_value = <?php echo json_encode($end_date,JSON_NUMERIC_CHECK); ?>;

      // console.log(start_value);
      // console.log(end_value);

        $(function() {
        $("#slider").slider({
          max: 200,
          min: 0,
          change: function(event, ui) {
          for(var i = 0;i < lineArray.length; i++){
          console.log("ui.value=" + ui.value);
          line111 = lineArray[i];
          var icons = line111.get('icons');
          icons[0].offset = (ui.value / 2) + '%';
          line111.set('icons', icons);
          }
          }
          });
        });
      </script>



  </head> 

  <body data-spy="scroll" data-target=".navbar" data-offset="50">

     <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#" style="font-size: 25px;">S.A.T.</a>
          </div>
         <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav navbar-right">
             <li><a href="pageafterlogin.php">Home</a></li>
             <li><a href="http://techithon.in">Contact</a></li>
             <li><a href="logout.php">Logout</a></li>
           </ul>
          </div><!--/.nav-collapse -->
        </div>
     </div>

   <div class="container">
    <div class="headingAndDescription">
      <?php
    $result = mysqli_query($bd,"SELECT model_reference FROM project WHERE id=".$id);
    $locations = array();
    while($row = mysqli_fetch_array($result)) {
        array_push($locations, $row);
        echo "<h2>" . $locations[0][0] . "</h2>";
    }
    ?>
    </div>
   </div>           



  <!-- 1st ROW -->
    <div class="container">
     <h3>Project Details</h3>
     <hr class="hrRow" id="lineHr1"></hr>
     <div class="row" id="row1">
      <div class="col-md-3">
        <h4>Project Number:</h4>
        <?php
        $result = mysqli_query($bd,"SELECT id FROM project WHERE id=".$id);
        $locations = array();
        while($row = mysqli_fetch_array($result)) {
         array_push($locations, $row);
           echo "<p>" . $locations[0][0] . "</p>";
         }
     ?>
      </div>
      <div class="col-md-3">
        <h4>From Date:</h4>
        <p>
        <?php
        $result = mysqli_query($bd,"SELECT start_date FROM project WHERE id=".$id);
        $locations = array();
        while($row = mysqli_fetch_array($result)) {
         array_push($locations, $row);
           echo "<p>" . $locations[0][0] . "</p>";
           $start_date=strtotime($locations[0][0]);
         }
     ?>
      </div>
      <div class="col-md-3">
        <h4>To Date:</h4>
              <?php
        $result = mysqli_query($bd,"SELECT end_date FROM project WHERE id=".$id);
        $locations = array();
        while($row = mysqli_fetch_array($result)) {
         array_push($locations, $row);
           echo "<p>" . $locations[0][0] . "</p>";
           $end_date=strtotime($locations[0][0]);
         }
     ?>
      </div>
      <div class="col-md-3">
       <h4>Duration:</h4>
<?php

      $interval = $end_date - $start_date;
      echo "<p>" . $interval/3600 . "</p>";
     ?>
      </div>
     </div>
    </div>
   </div>
<script type="text/javascript">
	
	function printfun()
	{
		var s_date = $("#datepickerFrom").datepicker({ dateFormat: "yy-mm-dd" }).val();
		var e_date = $("#datepickerTo").datepicker({ dateFormat: "yy-mm-dd" }).val();	
		var id = <?php echo json_encode($id,JSON_NUMERIC_CHECK);?>;
		console.log(s_date);
		console.log(e_date);
		console.log(id);
		window.location.href = "lastpage1.php?id="+id+"&s_date="+s_date+"&e_date="+e_date;
		//window.location.replace("lastpage1.php?id="+id+"&s_date="+s_date+"&e_date="+e_date);
	}

</script>
    <!-- 2nd ROW -->
  <div class="container" id="form">
  
    <h3>Filters</h3>
    <hr class="hrRow" id="lineHr2"></hr>
    <div class="row" id="row2">
    <form class="form-signin" method="post" action="newlog.php">
      <div class="col-md-4">
        <h4 class="form-signin-heading">From Date:</h4>
        <p><a class="btn btn-default" title="Select here" role="button"><input type="text" class="form-control" id="datepickerFrom" title="Click here"></input></a></p>
      </div>
      <div class="col-md-4">
        <h4>To Date:</h4>
        <p><a class="btn btn-default" title="Select here" role="button"><input type="text" class="form-control" id="datepickerTo" title="Click here"></input></a></p>
      </div>
      <div class="col-md-4 submit">
        <p><a class="btn btn-default" role="button" onclick="printfun()">Submit</a></p>
      </div>
      </form>
    </div>
  </div>

    <div class="container">
      <hr class="hrRow" id="lineHr3"></hr>
      <h3>Map with our complete Route System:</h3>
    <!--Play button-->
    <div class="control">
      <a class="btn btn-default btn-sm play control" alt="Play" title="Play">
      <i class="fa fa-play fa-lg" aria-hidden="true"></i></a>
    </div>
    <!--Pause button-->
    <div class="control">
      <a class="btn btn-default btn-sm pause control" alt="Pause" title="Pause" style="display:none;">
      <i class="fa fa-pause fa-lg" aria-hidden="true"></i></a>
    </div>
    <!--Reset and Stop button-->
    <div class="control">
      <a class="btn btn-default btn-sm reset control" alt="Restart" title="Restart">
      <i class="fa fa-repeat fa-lg" aria-hidden="true"></i></a>
    </div>
    <!--Fast Forward and Reach End button-->
    <div class="control">
      <a class="btn btn-default btn-sm end control" alt="Reach End" title="Reach End">
      <i class="fa fa-fast-forward fa-lg" aria-hidden="true"></i></a>
    </div>    

      <div style= "padding: 5px;">
      <div id="slider"></div>
      </div>
    </div>
    <div class="container" id="map"></div>

    <footer>
      <div class="container" id="bottom">
        <p style="display:inline-block;">&copy;Scheduling Animation Tool</p>
        <p style="display:inline-block; float:right;"><input type="checkbox" id="nightMode">NightMode</p>
      </div>
    </footer>

    <?php
    $sqlqry = "SELECT * FROM ship WHERE id=" . $id . " AND start_date BETWEEN '" . $s_date . "' AND '" . $e_date . "'";
    $result = mysqli_query($bd, $sqlqry);
    $locations = array();
    $counter=0;
    while($row = mysqli_fetch_array($result)) {
        array_push($locations, $row);
    }
    $nrows = mysqli_num_rows($result);
?>
<?php
    $result = mysqli_query($bd,"SELECT * FROM mother_ship WHERE id=".$id);
    $m_ship = array();
    while($row = mysqli_fetch_array($result)) {
        array_push($m_ship, $row);
    }
    $m_ship_rows = mysqli_num_rows($result);
?>

    <script>

//Initialization Of Data From DB
    var nrows = <?php echo json_encode($nrows,JSON_NUMERIC_CHECK);?>;
    var locMatrix = <?php echo json_encode($locations,JSON_NUMERIC_CHECK);?>;
    var m_ship_rows = <?php echo json_encode($m_ship_rows,JSON_NUMERIC_CHECK);?>;
    var m_ship = <?php echo json_encode($m_ship,JSON_NUMERIC_CHECK);?>;

      var line;
      var line1;
      var lineArray = [];
      var lineArray1 = [];
      var DrivePath = [];
      var count = 0;
      var secondInningsVar = false;

      var interval;
      var intervalForAnimation;
      var intervalForSecondAnimation;
      var secondaryCount = 0;
      var timeForSecondLine = false;
      var Line12345;
      var Line112345;
      var secondaryCount = 0;
      var lineIsOn = false;

      // This example adds an animated symbol to a polyline.

      function initMap() {

        var intervalForAnimation;
        var check = 0;
        // var DrivePath = [
        //   new google.maps.LatLng(37.772323, -122.214897),
        //   new google.maps.LatLng(21.291982, -157.821856),
        //   new google.maps.LatLng(-18.142599, 178.431),
        //   new google.maps.LatLng(-27.46758, 153.027892),
        //   new google.maps.LatLng(12.97918167,   77.6449),
        // ];
        function insertValues(check){
          for(var i=0;i<=nrows-1;i++)
          {
            if(check == 0){
              DrivePath = [];
              DrivePath.push(new google.maps.LatLng(locMatrix[i][1], locMatrix[i][2]),
                        new google.maps.LatLng(17.8674, 66.543));
            }
            if(check == 1){
            DrivePath = [];  
              DrivePath.push(new google.maps.LatLng(17.8674, 66.543),
                        new google.maps.LatLng(locMatrix[i][3], locMatrix[i][4]));
            }
            console.log(DrivePath[i]);
          }
        } 


        insertValues(check);


        var Colors = [
        "#FF0000", 
        "#00FF00", 
        "#0000FF", 
        "#FFFFFF", 
        "#000000", 
        "#FFFF00", 
        "#00FFFF", 
        "#FF00FF"
        ];


        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 19.0760, lng: 72.8777},
          zoom: 5,
          styles: [
            {
              featureType: 'all',
              stylers: [
                { saturation: -80 }
              ]
            },{
              featureType: 'road.arterial',
              elementType: 'geometry',
              stylers: [
                { hue: '#00ffee' },
                { saturation: 50 }
              ]
            },{
              featureType: 'poi.business',
              elementType: 'labels',
              stylers: [
                { visibility: 'off' }
              ]
            }
          ]
        });

        // Define the symbol, using one of the predefined paths ('CIRCLE')
        // supplied by the Google Maps JavaScript API.
          var symbolSource = {
          path: 'M -2,-2 2,2 M 2,-2 -2,2',
          strokeColor: '#FF0000',
          strokeWeight: 4
        };

        var symbolShape = {
          path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
          strokeColor: '#0000FF',
          strokeOpacity: 1.0
        };

        var symbolDestination = {
          path: 'M -2,-2 2,2 M 2,-2 -2,2',
          strokeColor: '#292',
          strokeWeight: 4
        };

        var symbolMotherShip = {
          path: google.maps.SymbolPath.CIRCLE,
          strokeColor: '#0000FF',
          strokeOpacity: 1.0,
          center: {lat: 8.8674, lng: 90.543}
        };

        function fitThePaths(){
          for (var i = 0; i < DrivePath.length-1; i++) {
              var line = new google.maps.Polyline({
              path: [DrivePath[i], DrivePath[i+1]],
              icons: [
                {
                  icon: symbolShape,
                  offset: '0%'
                }
              ],
              strokeColor: Colors[i],
              strokeOpacity: 0.0,
              strokeWeight: 2,
              map: map
            });
             lineArray[i] = line;
            }

          for (var i = 0; i < DrivePath.length-1; i++) {
            line1 = new google.maps.Polyline({
              path: [DrivePath[i], DrivePath[i+1]],
              icons: [
                {
                  icon: symbolSource,
                  offset: '0%'
                }, {
                  icon: symbolDestination,
                  offset: '100%'
                }
              ],
              strokeColor: Colors[i],
              strokeOpacity: 1.0,
              strokeWeight: 2,
              map: map
            });
            lineArray1[i] = line1;
          }
        }

            fitThePaths();

            console.log(lineArray.length);
            console.log(lineArray1.length);

          //Map boundaries
          /*
          var bounds = new google.maps.LatLngBounds();
          for (var i = 0; i < line.getPath().getLength(); i++) {
            bounds.extend(line.getPath().getAt(i));
          }
          map.fitBounds(bounds);
          */


        function playing() {

              intervalForAnimation = window.setInterval(function() {
                  $("#map").after(animateCircle(count));
                  count = (count+0.2) % 200;
              }, 20);
              //secondLine Code.
              interval = window.setInterval(function(){
              if(!timeForSecondLine){
                if(count >= 50){
                   timeForSecondLine = true;
                   callTheSecondLine();
                   if(!lineIsOn){
                    setPathForSecondLine();
                   }
                }
              }
              }, 20);
          }

          $(".play").click(function() {
              //secondLine.
              timeForSecondLine = false;
              playing();
              marker.setMap(map);
              motherShipLayer.setMap(map);
              $(this).hide();
              $(".pause").show();
          });


          $(".pause").click(function() {
              clearInterval(intervalForAnimation);
              $(this).hide();
              $(".play").show();
              //secondLine Code.
              clearInterval(intervalForSecondAnimation);              
          });

          $(".reset").click(function(){
              count = 0;
              check = 0;
              insertValues(check);
              fitThePaths();
              //secondLine Code
              Line12345.setMap(null);
              secondLine();
              secondaryCount = 0;
              timeForSecondLine = false;
              Line112345.setMap(map);
              //-----------------//
              motherShipLayer.setMap(map);
            for(var i = 0; i < lineArray1.length; i++){
              line11 = lineArray1[i];
              line11.setMap(map);
            }
          });

          $(".end").click(function(){
            count = 200;
            secondaryCount = 200;
          });


      // Use the DOM setInterval() function to change the offset of the symbol
      // at fixed intervals.
      function animateCircle(count) {
        for(var i = 0; i < lineArray.length; i++){
          line10 = lineArray[i];
          var icons = line10.get('icons');
          icons[0].offset = (count / 2) + '%';
          line10.set('icons', icons);
          $("#slider").slider("value", count);
          }
          if (count >= 199){ 
            clearInterval(intervalForAnimation);
            clearTheLines();
            motherShipLayer.setMap(null);
              if(!secondInningsVar){
                for(var i = 0; i < lineArray1.length; i++){
                line1 = lineArray[i];
                line1.setMap(null);
              }
              secondInningsVar = true;
              secondInnings();
            }
          };    
      }

      function secondInnings(){
        check = 1;
        insertValues(check);
        fitThePaths();
        //map.fitBounds(bounds);
        count = 0;
        //motherShipLayer.setMap(map);
        for(var i = 0; i < lineArray1.length; i++){
          line11 = lineArray1[i];
          line11.setMap(map);
        }
        playing();
        marker.setMap(map);
        motherShipLayer.setMap(map);
      }

      function clearTheLines(){
            for(var i = 0; i < lineArray1.length; i++){
              line11 = lineArray1[i];
              line11.setMap(null);
            }
      }


      //Second Line

      function secondLine(){
      Line12345 = new google.maps.Polyline({
            //path to be set.
              path: [{lat: 17.283512740286877, lng: 68.983154296875}, {lat: 15.614571795073996, lng: 63.65478515625}],
              icons: [
                {
                  icon: symbolShape,
                  offset: '0%'
                }
              ],
              strokeColor: '#fff',
              strokeOpacity: 0.0,
              strokeWeight: 2,
              map: map
          });
      Line1234 = new google.maps.Polyline({
            //path to be set.
              path: [{lat: 19.758431643708196, lng: 68.13720703125}, {lat: m_ship[0][1], lng: m_ship[0][2]}],
              icons: [
                {
                  icon: symbolShape,
                  offset: '0%'
                }
              ],
              strokeColor: '#fff',
              strokeOpacity: 0.0,
              strokeWeight: 2,
              map: map
          });
    }

    secondLine();

    function callTheSecondLine(){
        clearInterval(interval);
        timeForSecondLine = true;
          intervalForSecondAnimation = window.setInterval(function() {
            animateCircle1(Line12345,Line1234);
            secondaryCount = (secondaryCount + 1) % 200;
          }, 20);
    }

    function setPathForSecondLine(){
              lineIsOn = true;
              Line112345 = new google.maps.Polyline({
              path: [{lat: 17.283512740286877, lng: 68.983154296875}, {lat: 15.614571795073996, lng: 63.65478515625}],
              icons: [
                {
                  icon: symbolSource,
                  offset: '0%'
                }, {
                  icon: symbolDestination,
                  offset: '100%'
                }
              ],
              strokeColor: '#fff',
              strokeOpacity: 1.0,
              strokeWeight: 2,
              map: map
        });
        Line11234 = new google.maps.Polyline({
              path: [{lat: 19.758431643708196, lng: 68.13720703125}, {lat: m_ship[0][1], lng: m_ship[0][2]}],
              icons: [
                {
                  icon: symbolSource,
                  offset: '0%'
                }, {
                  icon: symbolDestination,
                  offset: '100%'
                }
              ],
              strokeColor: '#ff0',
              strokeOpacity: 0.0,
              strokeWeight: 2,
              map: map
        });
    }

    function animateCircle1(Line12345,Line1234) {
            
            var icons = Line12345.get('icons');
            icons[0].offset = (secondaryCount / 2) + '%';
            Line12345.set('icons', icons);
            var icons1 = Line1234.get('icons');
            icons1[0].offset = (secondaryCount / 2) + '%';
            Line1234.set('icons', icons1);
            if(secondaryCount >= 199){
              clearInterval(intervalForSecondAnimation);
              Line112345.setMap(null);
              Line11234.setMap(null);
              lineIsOn = false;
            }
      }
   
    // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
          // Add the circle for this city to the map.
          var motherShipLayer = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            //map: map,
            center: {lat: m_ship[0][1], lng: m_ship[0][2]},
            radius: 500000
          });



      

      // Remove custom styles.
      // map.data.setStyle({});  
      //....layering part finished....//   

      //....Marker section....//
        var marker = new google.maps.Marker({
          position:{lat: m_ship[0][1], lng: m_ship[0][2]},
          icon: {
          path: google.maps.SymbolPath.CIRCLE,
          scale: 5 }
          });

        var infowindow = new google.maps.InfoWindow({
          content:"Mother Ship"
          });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
          });

    }
       

    </script>
   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYJY_vFKIl-VEdyoEd3hZI8Wv1JdNzTmI&callback=initMap"></script>
    <!--<script src="js/jquery.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
    </script>
    <script type="text/javascript">
    function prepareNightMode(){
      if(document.getElementById("nightMode").checked){
        document.body.style.backgroundColor = "gray";
        document.getElementById("lineHr1").style.borderColor = "black";
        document.getElementById("lineHr2").style.borderColor = "black";
        document.getElementById("lineHr3").style.borderColor = "black";
      }else{
        document.body.style.backgroundColor = "white";
        document.getElementById("lineHr1").style.borderColor = "gray";
        document.getElementById("lineHr2").style.borderColor = "gray";
        document.getElementById("lineHr3").style.borderColor = "gray"; 
      }
    }
    window.onload = function(){
      setInterval(prepareNightMode,50);
    }
    </script>
  </body>
</html>