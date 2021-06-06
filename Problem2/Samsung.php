<!DOCTYPE html>
<html>
<head>
<title>Samsung Intern</title>
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

  $sql = 'SELECT * FROM users';

  //make query and get result 
  $result = mysqli_query($conn, $sql);

  //fetch the resulting rows as an arrays
  $users= mysqli_fetch_all($result, MYSQLI_ASSOC);

  //free result from memory
  mysqli_free_result($result);

  //close connection
  //mysqli_close($conn);

  $len = sizeof($users);

  for($i=0;$i<$len;$i++){
      if($users[$i]['username']==$username){
        if($users[$i]['Samsung']){
          header('Location: Already applied.php');
        } else{
          header('Location: Samsung2.php');
        }
      }
    }  

  ?>
</body>
</html>