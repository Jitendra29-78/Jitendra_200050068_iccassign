<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
body {
  background-color: lightblue;
}

h1 {
  color: black;
  text-align: center;
}

p {
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

<h1>Applying for interns</h1>
  <p>If You are a New user click on new user and create your profile<br>
    Otherwise login using your credentials</p>  

<?php

  //connect to database
  $conn=mysqli_connect('localhost', 'Jitendra' , 'Sankar@34' , 'jobs' );
  //check connection
  if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
  }

  $sql = 'SELECT * FROM users';

  //make query and get result 
  $result = mysqli_query($conn, $sql);

  //fetch the resulting rows as an arrays
  $users= mysqli_fetch_all($result, MYSQLI_ASSOC);

  //free result from memory
  mysqli_free_result($result);

  //close connection
    mysqli_close($conn);

  $len = sizeof($users);


// define variables and set to empty values
$errors= array('username'=> '', 'password'=>'');
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $errors['username'] = "Username is required";
  } else {
    $username = test_input($_POST["username"]); 
    if(!preg_match('~^[\p{L}\p{N}\s]+$~uD', $username)){
      $errors['username']= 'Username must be letters,numbers and spaces only';
    }

    }

  if (empty($_POST["password"])) {
    $errors['password'] = "password is required";
  } else {
    $password = test_input($_POST["password"]); 
    }

  if(!array_filter($errors)){
    $errors['username']="Username is invalid";
    for($i=0;$i<$len;$i++){
      if($users[$i]['username']==$username){
        $errors['username']='';
        if($users[$i]['password']==$password){
          session_start();
          $_SESSION['username'] = $_POST['username'];
          header('Location: Intern.php');
        } else {
           $errors['password']="Incorrect password";
          }
        }
      }
    }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Login using your username and password</h1>
<p><span class="error">* required field</span></p>
<div align="center">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $errors['username'];?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $errors['password'];?></span>
  <br><br>
  <input type="submit" class="form-submit-button" name="submit" value="Login"> 
  <br>
  <input type="button" class="button" onclick="window.location.href='New user.php'" value="New user"> 
 
</form>
</div>
</body>
</html>
