<?php
$insert = false;
if(isset($_POST["name"])){
    //set connection variables
    $server ="localhost";
    $username = "root";
    $password = "";
    $database = "trip";

    //Create a connection
    $con = mysqli_connect($server, $username, $password,$database);

    //Check for connection success
    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
   // echo"Success connecting to the db";
/*
   $name=$_POST['name'];
   $age=$_POST['age'];
   $gender=$_POST['gender'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $desc=$_POST['desc'];

   */
  //Collect post variables

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $desc = isset($_POST['desc']) ? $_POST['desc'] : '';


    $sql = "INSERT INTO `trip`(`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone','$desc',current_timestamp()); ";

   // echo $sql;

   //Execute Query

    if($con->query($sql)==true){
      //  echo "Successfully inserted";
      //Flag for successful Insertion
      $insert = true;
    }else{
        echo "ERROR: $sql <br> $con->error ";
    }
    //close db connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img class="th" src="th.jpg" alt="US trip">
    <div class="container">
        <h1>Welcome to US Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
            if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip.</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
    
</body>
</html>