<?php 
    session_start();
    $conn = mysqli_connect("localhost" , "root" , "" , "banking-system");
    if(!$conn)
        echo "<script>alert(".mysqli_error($conn).");</script>"; 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['submit'])){
            $amount = $_POST['amount'];

            $sql= "SELECT *FROM customer WHERE id = {$_SESSION['from_id']}";
            $res= mysqli_query($conn , $sql);
            $row = mysqli_fetch_assoc($res);
            $from = mysqli_query($conn , "SELECT Name FROM customer WHERE id = '{$_SESSION['from_id']}'" );
                $to = mysqli_query($conn , "SELECT Name FROM customer WHERE id = '{$_SESSION['to_id']}'" );
                $from = mysqli_fetch_assoc($from);
                $to = mysqli_fetch_assoc($to);
                $from = $from['Name'];
                $to = $to['Name'];

            if($row['amount'] >= $amount){
                $sql = "UPDATE customer SET amount = amount - '$amount' WHERE id = '{$_SESSION['from_id']}'";
                
                if(mysqli_query($conn , $sql)){
                    echo "Money Debited From Your Account....<br><br>";
                    sleep(2);
                    $sql = "UPDATE customer SET amount = amount + '$amount' WHERE id = '{$_SESSION['to_id']}'";
                    if(mysqli_query($conn , $sql)){

                        $sql = "INSERT INTO transaction VALUES('' , '$from' , '$to' , '$amount' , 'Success')";
                        if(mysqli_query($conn , $sql)){
                            echo "Amount Transferred Successfully....<br><br>";
                            echo "Wait for few seconds you are redirecting.....";
                        }
                    }
                }else{
                    echo "Unable to debit money from your account , Try again later....<br>";
                    $sql = "INSERT INTO transaction VALUES('' , '$from' , '$to' , '$amount' , 'Failed')";
                    mysqli_query($conn , $sql);
                }
            }else{
                echo "Enter the amount within your available balance...";
                $sql = "INSERT INTO transaction VALUES('' , '$from' , '$to' , '$amount' , 'Failed')";
                mysqli_query($conn , $sql);
            }

        }
    }
    
    header( "refresh:5;url=FromUser.php" );
?>