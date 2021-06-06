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

<h1>"Comments"</h1>
<?php

	//connect to database
  $conn=mysqli_connect('localhost', 'Jitendra' , 'Sankar@34' , 'comments' );
  //check connection
  if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
  }

  $sql = 'SELECT * FROM comment';

  //make query and get result 
  $result = mysqli_query($conn, $sql);

  //fetch the resulting rows as an arrays
  $comment= mysqli_fetch_all($result, MYSQLI_ASSOC);

  //free result from memory
  mysqli_free_result($result);

  $len = sizeof($comment);

  for($i=0;$i<$len;$i++){
    echo 'Name: ';
    echo $comment[$i]['name'];
    echo '<br>';
    echo 'Commented on: ';
    echo $comment[$i]['time'];
    echo '<br>';
    echo 'Comment: ';
    echo $comment[$i]['comments'];
    echo '<br>';echo '<br>';

  }

?>

  <h>;
  <h1>Add Comment:</h1>

<?php
  // define variables and set to empty values
$errors= array('name'=> '', 'comment'=>'');
$name = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $errors['name'] = "Name is required";
  } else {
    $name = test_input($_POST["name"]); 
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
      $errors['name']= 'Name must be letters and spaces only';
    }
    }

  if (empty($_POST["comment"])) {
    $errors['comment'] = "Add a comment";
  } else {
    $comment = test_input($_POST["comment"]); 
    }

  if(!array_filter($errors)){
    // escape sql chars
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $comment = mysqli_real_escape_string($conn, $_POST['comment']);

      // create sql
      $sql = "INSERT INTO comment(name,comments) VALUES('$name','$comment')";

      // save to db and check
      if(mysqli_query($conn, $sql)){
        // success
        header('Location: Add comment.php');
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
<div align="center">
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $errors['name'];?></span>
  <br><br>
  Comment: <textarea name="comment" rows='5' cols='75'> <?php echo $comment;?></textarea>
  <span class="error">* <?php echo $errors['comment'];?></span>
  <br><br>
  <input type="submit" class='form-submit-button' name="submit" value="Submit">  
</form>
</div>
</body>
</html>  
