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
              <title>BookStore Collection</title>
</head>
<body>
<div class="text_center">
           <h1> The Collection</h1>
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
require ("mysqli_connect.php");

$query= "Select * from bookinventory";
$result= mysqli_query($dbc,$query);
$rows= mysqli_num_rows($result);
if($rows>0)
    while($r=mysqli_fetch_assoc($result)){
      $bookid = $r['bookid'];
      $bookname = $r['name'];
      // Creating a link that takes to checkout page 
      echo "<a href='checkout.php?id=$bookid'>  $bookname </a>";
    } 

?>

</body>
</html>
    