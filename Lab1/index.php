<!DOCTYPE HTML>  
<html>
<head>
<style>

</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="style1.css">
  
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr =  $contactErr = $licenseErr= $dobErr= $passwordErr= $confpasswordErr= $postalcodeErr= $uploadresumeErr= $uploadgovernidErr= $rolesErr="";
$name = $email = $gender = $contact= $licenseno =$dob= $password1= $confpassword= $postalcode= $uploadresume= $uploadgovernid= $roles="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";}
    
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";}
    }

  if (empty($_POST["contact"])) {
    $contactErr = "Contact is required";
  } 
  else {
    $contact = test_input($_POST["contact"]);
    if(!preg_match('/^[0-9]{10}+$/', $contact)) {
      $contactErr= "Enter valid contact no <br>";}
      
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

 
  if (empty($_POST["licenseno"])) {
    $licenseErr = "License No is required";
  } else {
    $licenseno = test_input($_POST["licenseno"]);
    $licenseip = strlen($licenseno);
    if($licenseip > 15){
      $licenseErr="Enter valid License no";
    }
  }
 

  if (empty($_POST["dob"])) {
    $dobErr = "Date of Birth is required";
  } else {
    $dob = test_input($_POST["dob"]);    
      
  }

  if (empty($_POST["password1"])) {
    $passwordErr = "Password is required";
  } else {
    $password1 = test_input($_POST["password1"]);
    if (strlen($_POST["password1"]) <= '8') {
      $passwordErr = "Your Password Must Contain At Least 8 Characters!";
  }
  elseif(!preg_match("#[0-9]+#",$password1)) {
      $passwordErr = "Your Password Must Contain At Least 1 Number!";
  }
  elseif(!preg_match("#[A-Z]+#",$password1)) {
      $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
  }
  elseif(!preg_match("#[a-z]+#",$password1)) {
      $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
  }
  }

  if (empty($_POST["confpassword"])) {
    $confpasswordErr = "Confirm password is required";
  } else {
    $confpassword = test_input($_POST["confpassword"]);
    if ($_POST["password1"] != $_POST["confpassword"]){
      $confpasswordErr = "Password must be same";
    }
  }


  if (empty($_POST["postalcode"])) 
  {
    $postalcodeErr = "Postal Code is required";
  } 
  else
  {
    $postalcode = test_input($_POST["postalcode"]);
    $postalip = strlen($postalcode);
    if(!preg_match('/[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]/', $postalcode)) 
    {
        $postalcodeErr="Should have ABC DEF format";
    }
    elseif($postalip > 7)
    {
      $postalcodeErr="Enter valid Postal Code";
    }
  }

  if (empty($_POST["uploadresume"])) {
    $uploadresumeErr = "Resume is required";
  } else {
    $uploadresume = test_input($_POST["uploadresume"]);
  }

  $file_extension = "";
  $allowed_image_extension = array(
    "png",
    "jpg",
    "jpeg");
  if (empty($_POST["uploadgovernid"])) {
    $uploadgovernidErr = "Government Id is required";
  } else {
    $uploadgovernid = test_input($_POST["uploadgovernid"]);
    if (!in_array($file_extension, $allowed_image_extension))
    {
      $uploadgovernidErr = "upload is not valid" ;
    }
  }

  if (empty($_POST["roles"])) {
    $rolesErr = "Roles is required";
  } else {
    $roles = test_input($_POST["roles"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<br>
<h2>Government of Canada Employment form</h2> <br><br>
<div class="container">
<p><span class="error">* Required field</span></p>
<form name ="myForm"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="validateForm()" method="post">  
<!-- One field start -->

<div class="row">
 
   <div class="col-25">
    <label for="fname">Name</label> <span class="error">* <?php echo $nameErr;?></span>
    </div>
  
    <div class="col-75">
    <input type="text"  name="name" pattern="[A-Za-z]{5,}" placeholder="Enter your first name" autofocus required >
         
    </div>

</div>
<!-- end -->
  
<!-- 2 field start -->
<div class="row">
    <div class="col-25">
    <label for="email">Email</label> <span class="error">* <?php echo $emailErr;?></span> 
    </div>
    <div class="col-75">
    <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter your Email address" required>
    
    </div>
</div>
<!-- end -->
  
<!-- 3 field start -->
<div class="row">
    <div class="col-25">
    <label for="contact">Contact No</label> <span class="error">* <?php echo $contactErr;?></span>
    </div>
    <div class="col-75" >
    <input type="tel"  name="contact"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter your Contact No" size="10" required>
     
    </div>
</div>
<!-- end -->

  <!-- 4 field start -->
<div class="row">
    <div class="col-25">
    <label for="gender">Gender</label><span class="error">* <?php echo $genderErr;?></span>
    </div>
    <div class="col-75">
    <input type="radio" name="gender" value="female">Female 
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other 
    
 </div>
</div>
<!-- end -->

<!-- 5 field start -->
<div class="row">
    <div class="col-25">
    <label for="licenseno">Driver License No.</label> <span class="error">* <?php echo $licenseErr;?></span>
    </div>
    <div class="col-75">
    <input type="text" name="licenseno"  pattern= "[A-Z]{1}[0-9]{4}-[0-9]{5}-[0-9]{5}" size="15" placeholder="Enter Driver's License Number">
   
 </div>
</div>
<!-- end -->

<!-- 6 field start -->
<div class="row">
    <div class="col-25">
    <label for="dob">Date of Birth</label><span class="error">* <?php echo $dobErr;?></span>
    </div>
    <div class="col-75">
    <input type="date" name="dob" placeholder="Enter your Date of Birth" max="2004-12-31" min="1970-01-02" >
    
 </div>
</div>
<!-- end -->

<!-- 7 field start -->
<div class="row">
    <div class="col-25">
    <label for="password1">Password </label><span class="error">* <?php echo $passwordErr;?></span>
    </div>
    <div class="col-75">
    <input type="password" name="password1"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your Password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" >
    
 </div>
</div>
<!-- end -->

<!-- 8 field start -->
<div class="row">
    <div class="col-25">
    <label for="confpassword">Confirm Password </label><span class="error">* <?php echo $confpasswordErr;?></span>
    </div>
    <div class="col-75">
    <input type="password" name="confpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm Your Password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" >
    
 </div>
</div>
<!-- end -->

<!-- 9 field start -->
<div class="row">
    <div class="col-25">
    <label for="postalcode">Postal Code</label> <span class="error">* <?php echo $postalcodeErr;?></span>
    </div>
    <div class="col-75">
    <input type="text" name="postalcode" placeholder="Enter your Postal Code" pattern= "[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" >
   
 </div>
</div>
<!-- end -->

<!-- 10 field start -->
<div class="row">
    <div class="col-25">
    <label for="uploadresume">Upload your Resume</label> <span class="error">* <?php echo $uploadresumeErr;?></span>
    </div>
    <div class="col-75">
    <input type="file" name="uploadresume" accept=".doc,.docx,application/msword">
   
 </div>
</div>
<!-- end -->

<!-- 11 field start -->
<div class="row">
    <div class="col-25">
    <label for="uploadgovernid">Upload your Government ID</label> <span class="error">* <?php echo $uploadgovernidErr;?></span>
    </div>
    <div class="col-75">
    <input type="file" name="uploadgovernid" id= file1 accept=".jpeg,.jpg,.png" >
   
 </div>
</div>
<!-- end --> 

<!-- 12 field start -->
<div class="row">
    <div class="col-25">
<label for="roles">Roles</label><span class="error">* <?php echo $rolesErr;?></span>
</div>
    <div class="col-75">
  <select required id="roles" name="roles">
  <option value="">Select an option</option>
    <option value="parttime">Part-time</option>
    <option value="fulltime">Full-time</option>
    <option value="seasonal">Seasonal</option>
  </select>
  
  </div>
</div>
  <br><br>
  
  <!-- 13 field start -->
  <div class="row">
    
    <input type="submit" name="submit" value="Submit">  

</div>
<!-- end -->
 </form>

</div>
</br>
<center>
<?php
echo "<h2>Your Input:</h2>";
echo "<font color=white size= 5> $name </font>";
echo "<br>";
echo "<font color=white size= 5>$email </font>";
echo "<br>";
echo "<font color=white size= 5>$contact </font>";
echo "<br>";
echo "<font color=white size= 5>$gender </font>";
echo "<br>";
echo "<font color=white size= 5>$licenseno </font>";
echo "<br>";
echo "<font color=white size= 5>$dob </font>";

echo "<font color=white size= 5>$postalcode </font>";
echo "<br>";

echo "<font color=white size= 5> $roles </font>";
echo "<br>";
?></center>
<script type= text/javascript src="javascript.js"></script>
</body>

</html>