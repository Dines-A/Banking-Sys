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
    <title>User Account Details!</title>
</head>
<?php
     $conn = mysqli_connect("localhost" , "root" , "" , "banking-system");
     if(!$conn){
         echo "<script>alert(".mysqli_error($conn).");</script>";
         header("refresh : 5 ; url = FromUser.php");
     }
     $id = $_GET['id'];
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
        <?php
        $sql = mysqli_query($conn , "SELECT * FROM customer WHERE id = '$id'");
        $res = mysqli_fetch_assoc($sql);
        echo "<div class='col border border-primary border-3 ms-2 me-2 my-5 text-center bg-info rowcol'>
              <i class='fas fa-user-tie fa-6x my-2 '></i>";
        echo "<p>".$res['Name']."</p>";
        echo "<p>".$res['email']."</p>";
        echo "<p>".$res['amount']."</p>";

        $sql = mysqli_query($conn , "SELECT * FROM transaction WHERE FromAcc = '{$res['Name']}'");
        echo "<table style = 'width:50%;'>
        <tr>
            <th>Sent To</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>";
        if(mysqli_num_rows($sql) == 0)
            echo "<td>No Transaction Yet</td>";
        while($row = mysqli_fetch_assoc($sql)){
            echo "<tr> 
            <td>".$row['ToAcc']."</td>
            <td>". $row['TransAmount']."</td>
            <td>".$row['Status']."<br>";
        }
        echo "</table>
        <br>
        <table>";
        $sql = mysqli_query($conn , "SELECT * FROM transaction WHERE ToAcc = '{$res['Name']}'");
        echo "<table style = 'width:50%;'>
        <tr>
            <th>Received From</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>";
        if(mysqli_num_rows($sql) == 0)
            echo "<td>No Transaction Yet</td>";
        while($row = mysqli_fetch_assoc($sql)){
            echo "<tr> 
            <td>".$row['FromAcc']."</td>
            <td>". $row['TransAmount']."</td>
            <td>".$row['Status']."<br>";
        }
        echo "</table>
        </div>";
        ?>
</div>
</div>
</body>
<script src="bootstrap.min.js"></script>
</html>