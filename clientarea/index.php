<?php


    if(isset($_POST['logSubBtn'])){
        
        
        $servername = "localhost";
        $username = "aksintma_test01";
        $password = "aksintmart_test01";
        $dbname = "aksintma_intendData";
        $cookie_value;
        $SUBEMAIL=$_POST['email'];
        $SUBPASS=$_POST['pass'];
        
        $index=0;
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "SELECT APPID, Email, Password FROM Applicant";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               if($row['Email']==$SUBEMAIL && $row['Password']==$SUBPASS){
                   
                    $index=1;
                    $cookie_value= $row['APPID'];
               }
            
           
            }
            
            if($index==1){
                
                $cookie_name = "user";
                
                setcookie($cookie_name, $cookie_value);
                 echo '<script>window.location.href="home.php";</script>';
                
            }else{
                
                 echo '<script>alert("INVALID LOGIN DETAILS. PLEASE TRY AGAIN WTH CORRECT LOGIN DETAILS. THANKYOU");</script>';
                
            }
        } else {
           echo '<script>alert("INVALID LOGIN DETAILS. PLEASE TRY AGAIN WTH CORRECT LOGIN DETAILS. THANKYOU");</script>';
        }
        $conn->close();
                
            }    


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Account Login | AIM - Akhlas International Mart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html"> Akhlas International Mart</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			               
			                <div class="social">
	                           <img src="images/Logo.png" alt="AIM" style="width:120px; height:auto;" >
	                            <div class="division">
	                                <hr class="left">
	                                <span> Sign In </span>
	                                <hr class="right">
	                            </div>
	                        </div>
			               <form method="POST" action="">
			                     <input class="form-control" type="text" placeholder="E-mail address" name="email" required>
			                <input class="form-control" type="password" placeholder="Password" name="pass" required>
			                <div class="action">
			                   <input type="submit" class="btn btn-primary signup" name="logSubBtn" value="LOGIN">
			                </div> 
			               </form>               
			            </div>
			        </div>

			      
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>