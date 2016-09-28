<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge>
     <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
        <link href="css/template.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/pageafter1.css" rel="stylesheet">
        <title>Project List</title>
    <!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
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
           </ul>
          </div><!--/.nav-collapse -->
        </div>
     </div>
     <div class="container">
        <br><br><br><br><br><h2>Your Session has been Timed Out!</h2>
        <h4>Kindly login again after redirecting.</h4>
        <h4>You will be redirected automatically in about 5 Seconds..</h4>
        <h4>If not, click <a href='logout.php'>here</a></h4>
       
     </div>

<?php 
	header( "refresh:5;url=logout.php" ); 
 ?>


<script type="text/javascript">
    function prepareNightMode(){
      if(document.getElementById("nightMode").checked){
        document.body.style.backgroundColor = "gray";
      }else{
        document.body.style.backgroundColor = "white"; 
      }
    }
    window.onload = function(){
      setInterval(prepareNightMode,50);
    }
    </script>

<footer>
      <div class="container" id="bottom">
        <p style="display:inline-block;">&copy;Scheduling Animation Tool</p>
        <p style="display:inline-block; float:right;"><input type="checkbox" id="nightMode">NightMode</p>
      </div>
    </footer>
 </body>
 </html>