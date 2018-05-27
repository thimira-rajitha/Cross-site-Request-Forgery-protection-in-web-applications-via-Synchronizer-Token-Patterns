<?php 
    //start a session - users browser
    session_start();

    //setting a cookie
    $sessionID = session_id(); //storing session id

    setcookie("session_id",$sessionID,time()+3600,"/","localhost",false,true); //cookie terminates after 1 hour - HTTP only flag
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SL CyberScorpion</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <script type="text/javascript" src="config.js"> </script>

</head>

<body>
    <div class="container">
        <div class="top">
            <h1 id="title" class="hidden"><span id="logo">SL <span>CyberScorpion</span></span></h1>
        </div>
        <div class="login-box animated fadeInUp">
            <div class="box-header">
                <h2>Log In</h2>
            </div>
            
             <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
                <form class="form-horizontal" method="POST" action="server.php" >
                    <input name="user_name" type="text" placeholder="Enter User Name" class="form-control input-md">
                   

                    <input name="user_pswd" type="password" placeholder="Enter your password" class="form-control input-md">

                    <div class="spacing"><input type="hidden" id="csToken" name="CSR"/></div>
                    <input type="submit" name="sbmt" value="Log In" class="btn btn-info btn-sm pull-right">
                </form>
            </div>
            
        </div>

          <?php 
        //if cookie is ok, request to the server and get CSRF token & store it inside hidden HTML DOM input tag ~ id=csToken
       if(isset($_COOKIE['session_id']))
            { 
                echo '<script> var token = loadDOC("POST","server.php","csToken");  </script>'; 
                   
                    
            }
    ?>


    </div>
</body>

</html>