<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/15138f295d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
       
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');
            </style>
              <title>Checkout Page</title>
</head>
<body>
<div class="text_center">
           <h1> Checkout Page</h1>
</div>
<nav>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" href="./index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="storepage.php">Store</a>
      </li>
            
    </ul>
  </nav>

<?php 
// Connecting mysqli_connect file with the current file 
require("mysqli_connect.php");
// getting id from previous page and setting in a variable
$bookid = $_GET['id'];

//   Setting Cookie  
setcookie('bookid', $bookid, time()+ (86400*7));
// this cookie will be saved from the current time to upto 7 days from its creation with bookid as its name. 

echo $_COOKIE['bookid'];

?>
<!-- getting order -->
<div class="main2">
<h2> Get you Order </h2>
</div>
<?php

 //displaying details of the fetched book
 $q= "Select * from bookinventory where bookid= $bookid";
 $r= mysqli_query($dbc,$q);
 $rowscheck= mysqli_num_rows($r);
if($rowscheck>0)
{
    while($row=mysqli_fetch_assoc($r)){
      $bookid = $row['bookid'];
      $bookname = $row['name'];
      $bookauthor = $row['author'];
      $price = $row['price'];
      echo "Book ID : $bookid";
      echo "Book : $bookname";
      echo "Author : $bookauthor";
      echo "Price : CAD $price";
    }
}

?>
<!-- Creating form -->
<form action="checkout.php" method="POST">
    <label for="FirstName"> First Name </label>
    <input type="text" id="FirstName" name="FirstName" value=""><br>

    <label for="Lastname"> Last Name </label>
    <input type="text" id="Lastname" name="FirstName" value=""><br>

    <input type="submit" value ="Submit">
</form>


<?php
// checking the form for blank entry
if($_SERVER['REQUEST_METHOD']=='POST'){
    if (empty($_POST['FirstName']) or ($_POST['Lastname'])){
        echo "Must enter all Details";
    }
    else{
        // inserting data and upating quantity value in the table 
        // storing values from form into variables 
        $FirstName = $_POST['FirstName'];
        $Lastname = $_POST['Lastname'];

        // Inserting Data into db table
        $insert = "Insert into bookinventory(FirstName,Lastname,Item_purchased) values ($FirstName,$Lastname,$bookid);";
        $r1= mysqli_query($dbc,$insert);

        //Updating the Quantity of book in db
        $update = "Update bookinventory set quantity=quantity-1 where bookid='$bookid';";
        $r2= mysqli_query($dbc,$update);
    }
}

?>

</body>
</html>

