<?php


     
      
        $servername = "localhost";
        $username = "aksintma_test01";
        $password = "aksintmart_test01";
        $dbname = "aksintma_intendData";
        
        
        $firstname=$_POST['fname'];
      $middlename=$_POST['mname'];
      $lastname=$_POST['lname'];
      $email=$_POST['mail'];
      $phone=$_POST['phn'];
      $mobile=$_POST['mbl'];
      $birthdate=$_POST['dob'];
      $CNIC=$_POST['cnic'];
      $gender=$_POST['gen'];
      $City=$_POST['city'];
      $Province=$_POST['province'];
      $Country=$_POST['country'];
      $address1=$_POST['add1'];
      $address2=$_POST['add2'];
      $education=$_POST['edu'];
      $university=$_POST['uni'];
      $jobtitle=$_POST['jobt'];
      $jobdescription=$_POST['jobd'];
      $jobstarting=$_POST['jobyear'];
      $Business=$_POST['business'];
      $Businessname=$_POST['businessname'];
      $Businessyear=$_POST['businessyear'];
      $plan=$_POST['package'];
      $paymentmethod=$_POST['payment'];
      
                function random($length, $chars = '')
{
	if (!$chars) {
		$chars = implode(range('a','f'));
		$chars .= implode(range('0','9'));
	}
	$shuffled = str_shuffle($chars);
	return substr($shuffled, 0, $length);
}
function serialkey()
{
	return random(4).'-'.random(4).'@'.random(4);
}

 $newpassword=serialkey();
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO Applicant (FirstName, MiddleName, LastName, Email, Phone, Mobile, DOB, CNIC, Gender, City, Province, Country, Address1, Address2, Education, University, JobTitle, JobDescription, JobYear,Business, BuinessName, BusinessYear, Package, PaymentMehtod, PaymentOK, ProfilePicture, Password)
        VALUES ('$firstname', '$middlename', '$lastname', '$email', '$phone', '$mobile', '$birthdate', '$CNIC', '$gender', '$City', '$Province','$Country', '$address1', '$address2', '$education', '$university', '$jobtitle', '$jobdescription', '$jobstarting', '$Business' , '$Businessname', '$Businessyear', '$plan', '$paymentmethod', 'no', '', '$newpassword')";
        
        if ($conn->query($sql) === TRUE) {
            
            
             // set your e-mail address first, where you'll receive the notifications
$yourEmailAddress = $email;

$emailSubject = "Account information by AKHLAS INTERNATIONAL MART";
$remoteIpAddress = $_SERVER['REMOTE_ADDR'];
$emailContent = "YOUR ACCOUNT HAS BEEN SUCCESSFULY CREATED\n\n\n SUBMIT YOUR PAYMENT THROUGH THE PAYMENT METHOD YOU SELECT FOR THE PAYMENT. CONFIRM YOUR PAYMENT BY ASKING THE ADMINS @ AIM. \n\n\n Your email is: .$email. \n\n Your new password is  ".$newpassword;

// send the message
mail($yourEmailAddress, $emailSubject, $emailContent);
            echo '<script>alert("YOUR ACCOUNT HAS BEEN SUCCESSFULLY CREATED. CHECK YOUR EMAIL FOR LOGIN DETAILS. THANKYOU");</script>';
            echo '<script>window.location.href="clientarea/index.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
              



?>