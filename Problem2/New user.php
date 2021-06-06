<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
body {
  background-color: lightblue;
}

h2 {
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
</style>
</head>
<body>  

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
  
  $len = sizeof($users);

// define variables and set to empty values
$errors= array('username'=> '', 'password'=>'','email'=>'');
$username = $password =$email= "";

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

  if(empty($_POST['email'])){
      $errors['email'] = 'An email is required';
    } else{
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email must be a valid email address';
      }
    }

  if(!array_filter($errors)){
    for($i=0;$i<$len;$i++){
      if($users[$i]['username']==$username){
        $errors['username']='Username already exists.';
      }
    }  
  }

  if(!array_filter($errors)){
    // escape sql chars
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      // create sql
      $sql = "INSERT INTO users(username,password,email) VALUES('$username','$password','$email')";

      // save to db and check
      if(mysqli_query($conn, $sql)){
        // success
        header('Location: Registration.php');
      } else {
        echo 'query error: '. mysqli_error($conn);
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


<h2>Create your profile here<br>After creating login using your credentials</h2>
<p><span class="error">* required field</span></p>
<div align="center">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $errors['username'];?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $errors['password'];?></span>
  <br><br>
  Email: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $errors['email'];?></span>
  <br><br>
  <input type="submit" class="form-submit-button" name="submit" value="Submit">  
</form>
</div>
</body>
</html>  
      

