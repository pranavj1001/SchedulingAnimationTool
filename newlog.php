<?php
        //Start session
        session_start();
        if(isset($_SESSION['username']))
    {
      session_destroy();
      header("Location: error.php");
    }
     
        //Include database connection details
        require_once('connect.php');
     
        //Array to store validation errors
        $errmsg_arr = array();
     
        //Validation error flag
        $errflag = false;
     
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_real_escape_string($str);
        }
        //Sanitize the POST values
        $email = $_POST['email'];
        $password = $_POST['password'];
     
        //Input Validations
        if($email == '') {
            $errmsg_arr[] = 'email missing';
            $errflag = true;
        }
        if($password == '') {
            $errmsg_arr[] = 'Password missing';
            $errflag = true;
        }
     
        //If there are input validations, redirect back to the login form
        if($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location: index.php");
            exit();
        }
     
        //Create query
        $qry="SELECT email,password FROM login_table WHERE email='$email' AND password='$password'";
        $result=mysqli_query($bd,$qry);
        $num_row = mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        if( $num_row ==1 )
         {
            $_SESSION['username']=$row['email'];
            if ($email == "Administrator") {
                header("Location: pageafterlogin.php");
            	exit;   
            }
            else
            {
            	header("Location: lastpage.php");
            	exit;
            }
        }
        else
        {
            header("Location: logout.php");
        }
?>