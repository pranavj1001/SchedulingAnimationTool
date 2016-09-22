<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge>
     <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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

<?php 
	echo "<br><br><br><br><br><p>Your session has been timed out. Kindly login again after redirecting";
	header( "refresh:5;url=logout.php" ); 
echo "<br>You will be redirected automatically in about 5 secs. ";
echo "<br>If not, click <a href='logout.php'>here</a>.</p>";
 ?>
<footer>
      <div class="container" id="bottom">
        <p style="display:inline-block;">&copy;Scheduling Animation Tool</p>
        <p style="display:inline-block; float:right;"><input type="checkbox" id="nightMode">NightMode</p>
      </div>
    </footer>
 </body>
 </html>