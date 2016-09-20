<?php
session_start();
if(!isset($_SESSION['username']))
    {
      session_destroy();
      header("Location: error.php");
    }
require 'connect.php';
$id = $_GET['id'];
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
        <!--<link href="MDB-Free/css/mdb.min.css" rel="stylesheet">-->
        <title>Animating Symbols</title>

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
          
      <script>
          $(document).ready(function() {
            $("#datepickerTo").datepicker();
          });
      </script>

      <script>
          $(document).ready(function() {
            $("#datepickerFrom").datepicker();
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

    <!-- 2nd ROW -->
  <div class="container">
    <h3>Filters</h3>
    <hr class="hrRow" id="lineHr2"></hr>
    <div class="row" id="row2">
      <div class="col-md-6">
        <h4>From Date:</h4>
        <p><a class="btn btn-default" title="Select here" role="button"><input id="datepickerFrom" title="Click here"></input></a></p>
      </div>
      <div class="col-md-6">
        <h4>To Date:</h4>
        <p><a class="btn btn-default" title="Select here" role="button"><input id="datepickerTo" title="Click here"></input></a></p>
      </div>
        <!--<div class="col-md-4">
          <h4>View:</h4>
          <div class="btn-group">
          <button type="button" class="btn btn-default">Action</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="#">This Week</a></li>
            <li><a href="#">This Month</a></li>
            <li><a href="#">This Year</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
        </div>-->
    </div>
  </div>

    <div class="container">
      <hr class="hrRow" id="lineHr3"></hr>
      <h3>Map with our complete Route System:</h3>
    <!--Play button-->
      <a class="btn btn-default btn-sm play" alt="Play" title="Play">
      <i class="fa fa-play fa-lg" aria-hidden="true"></i></a>
    <!--Pause button-->
      <a class="btn btn-default btn-sm pause" alt="Pause" title="Pause" style="display:none;">
      <i class="fa fa-pause fa-lg" aria-hidden="true"></i></a>
    <!--Reset and Stop button-->
      <a class="btn btn-default btn-sm reset" alt="Restart" title="Restart">
      <i class="fa fa-repeat fa-lg" aria-hidden="true"></i></a>
      <div style="border: 1px solid black; background-color: black; padding: 5px;">
      <div id="slider"></div>
      </div>

<!--<button type="button" class="play">Play</button>
      <input type="button" value="updateBar()" onclick="updateBar()" />
      <input type="button" value="hide()" onclick="hide()" />-->

    </div>
    <div class="container" id="map"></div>

    <footer>
      <div class="container" id="bottom">
        <p style="display:inline-block;">&copy;Scheduling Animation Tool</p>
        <p style="display:inline-block; float:right;"><input type="checkbox" id="nightMode">NightMode</p>
      </div>
    </footer>

    <?php
    $result = mysqli_query($bd,"SELECT * FROM ship WHERE id=".$id);
    $locations = array();
    while($row = mysqli_fetch_array($result)) {
        array_push($locations, $row);
    }
    $nrows = mysqli_num_rows($result);
?>


    <script>

//Initialization Of Data From DB
    var nrows = <?php echo json_encode($nrows,JSON_NUMERIC_CHECK);?>;
    var locMatrix = <?php echo json_encode($locations,JSON_NUMERIC_CHECK);?>;
    

      var line;
      var line1;
      var lineArray = [];
      var lineArray1 = [];
      var DrivePath = [];
      // This example adds an animated symbol to a polyline.

      function initMap() {

        var intervalForAnimation;
        var count = 0;
        var n = 2;
        // var DrivePath = [
        //   new google.maps.LatLng(37.772323, -122.214897),
        //   new google.maps.LatLng(21.291982, -157.821856),
        //   new google.maps.LatLng(-18.142599, 178.431),
        //   new google.maps.LatLng(-27.46758, 153.027892),
        //   new google.maps.LatLng(12.97918167,   77.6449),
        // ];
        for(var i=0;i<=nrows-1;i++)
        {
        console.log(DrivePath[i]);
        DrivePath.push(new google.maps.LatLng(locMatrix[i][0], locMatrix[i][1]),
                  new google.maps.LatLng(17.8674, 66.543),
                  new google.maps.LatLng(locMatrix[i][2], locMatrix[i][3]));
      }
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

        // Create the polyline and add the symbol to it via the 'icons' property.
        /*line = new google.maps.Polyline({
          path: [{lat: -33.918861, lng: 18.423300}, {lat: -35.842160, lng: 18.863525}, {lat: -39.170387, lng: 35.189209}, {lat: -26.331494, lng: 54.228516}, {lat: 0.462885, lng: 61.083984}, {lat: 19.075984, lng: 72.877656}],
          icons: [
            {
              icon: symbolShape,
              offset: '0%'
            }
          ],
          strokeColor: '#0000FF ',
          strokeOpacity: 0,
          map: map
        });*/

        //Our Secondary polyline for reseting purpose
        /*var line1 = new google.maps.Polyline({
          path: [{lat: -33.918861, lng: 18.423300}, {lat: -35.842160, lng: 18.863525}, {lat: -39.170387, lng: 35.189209}, {lat: -26.331494, lng: 54.228516}, {lat: 0.462885, lng: 61.083984}, {lat: 19.075984, lng: 72.877656}],
          icons: [
            {
              icon: symbolSource,
              offset: '0%'
            }, {
              icon: symbolDestination,
              offset: '100%'
            }
          ],
          strokeColor: '#0000FF ',
          strokeOpacity: 0.8,
          map: map
        });*/

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

            console.log(lineArray.length);
            console.log(lineArray1.length);

          //Map boundaries
          var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < line.getPath().getLength(); i++) {
              bounds.extend(line.getPath().getAt(i));
            }
          map.fitBounds(bounds);


        function playing() {
              intervalForAnimation = window.setInterval(function() {
                  $("#map").after(animateCircle(count));
                  count = (count+1) % 200;
              }, 20);
          }

          $(".play").click(function() {
              playing();
              $(this).hide();
              $(".pause").show();
          });


          $(".pause").click(function() {
              clearInterval(intervalForAnimation);
              $(this).hide();
              $(".play").show();              
          });

          $(".reset").click(function(){
              count = 0;
            for(var i = 0; i < lineArray1.length; i++){
              line11 = lineArray1[i];
              line11.setMap(map);
            }
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
          };    
      }

        function clearTheLines(){
            for(var i = 0; i < lineArray1.length; i++){
              line11 = lineArray1[i];
              line11.setMap(null);
            }
        }

      //Layering part

      var citymap = {
        chicago: {
          center: {lat: 17.8674, lng: 66.543},
          population: 3714856
        }
      };
        // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
        for (var city in citymap) {
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: citymap[city].center,
            radius: Math.sqrt(citymap[city].population) * 100
          });
        } 
      // Remove custom styles.
      // map.data.setStyle({});  
      //....layering part finished....//   

      //....Marker section....//
        var marker=new google.maps.Marker({
          position:{lat: 17.8674, lng: 66.543},
          });

        marker.setMap(map);

        var infowindow = new google.maps.InfoWindow({
          content:"Hello World!"
          });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
          });
      //....Marker section complete...//
    }   
    
    </script>
    <!--<script type="text/javascript">
           var pb,map;

          function start() {
            myLatlng = new google.maps.LatLng(-25.363882,131.044922);
            var myOptions = {
                zoom: 4,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              }
            map = new google.maps.Map(document.getElementById("map"), myOptions);
            pb = new progressBar();
            map.controls[google.maps.ControlPosition.RIGHT].push(pb.getDiv());
            pb.start(200);
          };

          function updateBar() {
            pb.updateBar(Math.ceil(Math.random()*10));
          };

          function hide() {
            pb.hide();
          };
    </script>-->
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