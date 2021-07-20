<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Dinesh-A" content="Author">
    
    <!-- index.css  -->
    <link rel="stylesheet" href="FromUser.css">
    <!-- bootstrap.css -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- jquery js -->
    <script src="bootstrap.bundle.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+SC:wght@500&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a21faf7147.js" crossorigin="anonymous"></script>
    <title>Enter money to pay-₹!</title>
</head>
<?php
    session_start();
    $_SESSION['to_id'] = $_GET['id'];
    $conn = mysqli_connect("localhost" , "root" , "" , "banking-system");
    if(!$conn)
        echo "<script>alert(".mysqli_error($conn).");</script>"; 
?>
<body>
<div class="main">
    <div class="container-fluid bg">
        <nav class="navbar navbar-expand-sm  ">

            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#Mynavbar" 
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fa-bars fa-2x text-black-100"></i></span>
              </button>
        
           <div class="collapse navbar-collapse  " id="Mynavbar">
        
               <ul class="navbar-nav ms-auto text-center">
        
                   <li class="navb-item home">
                       <a href="index.html" class=" nav-link active"  active>home</a>
                   </li>
        
                   <li class="navb-item User">
                       <a href="FromUser.php" class=" nav-link " >User's</a>
                   </li>
                   <li class="navb-item Account">
                       <a href="FromUser.php" class=" nav-link " >User's Account Details</a>
                   </li>
               </ul>
        
           </div>
        </nav>       

</div>
<div class="userlist  mt-5">
    <div class="container">
      <div class="row mt-5 ">
              <div class="col border border-primary border-3 ms-2 me-2  text-center bg-info rowcol">
               <i class="fas fa-user-tie fa-10x my-5 "></i>
              <?php
                    $sql = "SELECT * FROM customer WHERE id = '{$_SESSION['from_id']}'";
                    $res = mysqli_query($conn , $sql);
                    $row = mysqli_fetch_assoc($res);
                    echo "<p>".$row['Name'];
                    $bal = $row['amount'];
                    $sql = "SELECT * FROM customer WHERE id = '{$_SESSION['to_id']}'";
                    $res = mysqli_query($conn , $sql);
                    $row = mysqli_fetch_assoc($res);
                    echo "<br>To<br>".$row['Name'];
                    
                    echo "<br><br><label>Available Balance : ".$bal."</label>" ;
              ?>
              <br>
              <br>
            <form action = "sendmoney.php" method = "POST">
                <input type= "number" name = "amount" placeholder = "Enter the Amount..."></input>
                <br><br>
                <input type = "submit" name  = "submit">
                <br><br>
            </form>
          </div>
          </div>

</div>
</div>
</body>
<script src="bootstrap.min.js"></script>
</html>