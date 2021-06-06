<!DOCTYPE html>
<html>
<head>
<title>Samsung Intern</title>
<style>
body {
  background-color: lightblue;
}

h1 {
  color: black;
  text-align: center;
}

h2 {
  font-family: verdana;
  font-size: 20px;
  text-align: center;
}
.form-submit-button {
     background: #0066A2;
     color: white;
     border-style: outset;
     border-color: #0066A2;
     height: 40px;
     width: 100px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>
  <br><br><br><br>
  <h1>Read all the details of Intern properly</h1>
  <h2>Note: If you click on Go back button,Your application is not Considered</h2>
  <h2>For confirming your application,Click on the Submit button below</h2>
  <div align='center'>
  <input type="button" class='button' onclick="window.location.href='Intern.php'" value="Go back">
  </div>
  

<?php
  session_start();
  $username = $_SESSION['username'];
  //connect to database
  $conn=mysqli_connect('localhost', 'Jitendra' , 'Sankar@34' , 'jobs' );
  //check connection
  if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
  }


  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "UPDATE users SET Samsung=TRUE WHERE username=('$username')";

if ($conn->query($sql) === TRUE) {
  header('Location: Success.php');
} else {
  echo "Error updating record: " . $conn->error;
}
  }

$conn->close();
  
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div align="center">
  <input type="submit" class='form-submit-button' name="submit" value="Submit"> 
  </div> 
  
</form>
</body>
</html>


