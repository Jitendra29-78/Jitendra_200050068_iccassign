<!DOCTYPE html>
<html>
<head>
<title>Applied Interns</title>
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
  <?php
  session_start();
  $username = $_SESSION['username'];
  //connect to database
  $conn=mysqli_connect('localhost', 'Jitendra' , 'Sankar@34' , 'jobs' );
  //check connection
  if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
  }
  // make sql
    $sql = "SELECT * FROM users WHERE username=('$username')";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $details = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
    $a=$details['Samsung'];
    $b=$details['Microsoft'];
    $c=$details['Google'];
    $d=$details['Apple'];
    if(!$a and !$b and !$c and !$d){
      echo "<h2>You have not applied to any Interns</h2>";
    } else{
      echo "<h2>The Interns you have applied are:</h2>";
    }
    if($a){
      echo "<h1>Samsung</h1>";
    }
    if($b){
      echo "<h1>Microsoft</h1>";
    }
    if($c){
      echo "<h1>Google</h1>";
    }
    if($d){
      echo "<h1>Apple</h1>";
    }
    echo '<br>';

?>
<div align="center">
<input type="button" class='button' onclick="window.location.href='Intern.php'" value="Go to Home">
</div>
</body>
</html>
