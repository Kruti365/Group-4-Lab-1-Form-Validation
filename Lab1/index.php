<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<div class="container">
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<!-- One field start -->
<div class="row">
    <div class="col-25">
    <label for="fname">Name</label>
    </div>
    
    <div class="col-75">
    <input type="text" name="name">
        <span class="error">* <?php echo $nameErr;?></span> 
    </div>
</div>
<!-- end -->
  <br><br>
<!-- 2 field start -->
<div class="row">
    <div class="col-25">
    <label for="email">Email</label>
    </div>
    <div class="col-75">
    <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span> 
    </div>
</div>
<!-- end -->
 <!-- 3 field start -->
<div class="row">
    <div class="col-25">
    <label for="website">Website</label>
    </div>
    <div class="col-75">
    <input type="text" name="website">
    <span class="error"><?php echo $websiteErr;?></span>
    </div>
</div>
<!-- end -->
  <br><br>
<!-- 4 field start -->
<div class="row">
    <div class="col-25">
    <label for="comment">Comment</label>
    </div>
    <div class="col-75">
    <textarea name="comment" rows="5" cols="40"></textarea>

    </div>
</div>
<!-- end -->
  <br><br>

  <!-- 5 field start -->
<div class="row">
    <div class="col-25">
    <label for="gender">Gender</label>
    </div>
    <div class="col-75">
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span>
 </div>
</div>
<!-- end -->
  
  <br><br>
  <!-- 6 field start -->
  <div class="row">
    
    <input type="submit" name="submit" value="Submit">  

</div>
<!-- end -->
 </form>

</div>
</br>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>