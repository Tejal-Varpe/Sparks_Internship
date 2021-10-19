<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from transactions_2 where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from transactions_2 where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo 'alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['amount']) 
    {
        
        echo '<script type="text/javascript">';
        echo 'alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance1 = $sql1['amount'] - $amount;
                $sql = "UPDATE transactions_2 set amount=$newbalance1 where id=$from";
                mysqli_query($conn,$sql);
                
                

                // adding amount to reciever's account
                $newbalance2 = $sql2['amount'] + $amount;
                $sql = "UPDATE transactions_2 set amount=$newbalance2 where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['customer name'];
                $receiver = $sql2['customer name'];
                $sql = "INSERT INTO transactions_2(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query = mysqli_query($conn, $sql);

               

                echo "<script> alert(`Successful Transaction!! 

    Rs. ₹${amount} is sent.

    FROM SENDER: ${sender} with Email id: ${sender}@gmail.com 
    TO RECEPIENT: ${receiver} with Email id: ${receiver}@gmail.com.`)               
                </script>";

                /*echo "<script> document.write(`SENDER: ${sender} Before Transaction Balance: Rs. ₹parseInt($newbalance1+$amount) Current Balance: Rs. ₹$newbalance1`)</script>";
                echo "<script> `RECEIVER: ${receiver} Before Transaction Balance: Rs. ₹parseInt($newbalance1-$amount) Current Balance: Rs. ₹$newbalance2</script>";*/
               
                $newbalance= 0;
                $amount =0;


        }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style type="text/css">
    	
	    button:hover{
            color: #8bb5f5;
		}
        body{
        background-image:url("1.png");
        font-family: Arial, Helvetica, sans-serif;
    }
    .logo-text, .nav-link1{
      color: white;
      padding-top: 15px;
    }
    .list-home{
      padding-left: 900px;
    }
    .nav-link1:hover{
      color: blue;
    }
    .container{
      padding-top: 30px;
      text-align: center;
      /* background-color: #8bb5f5; */
      background-size: cover;
      /* background-image:url("money.jpg"); */

    }

    button {
      background-color: #d35a55;
      border: none;
      color: white;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      border-radius: 5px;
    }

    

    body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: transparent;
}

.topnav a {
  float: left;
  color: #070707;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav h3 {
  float: left;
  text-align: center;
  padding: 12px 16px;
  text-decoration: none;
  font-size: 17px;
  padding-left: 100px;
}


.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #f56d6d;
  color: white;
}

.topnav-right {
  float: right;
}

#footer
  {
    margin-top: 70px;
	background-color: #b5c3eb;
	padding: 5%;
	padding-bottom: 3%;
	text-align: center;
	font-weight: bolder;
	font-family: "Roboto", cursive;
  }

  .copyright 
  {
	color: rgb(83, 79, 79);
	margin-bottom: 0;
  }

    </style>
</head>

<body>
 

<section id="container" background-image= "Back2.png" style="background-repeat: no-repeat; background-size: cover;">
    <div class="topnav">
        <!--<a class="active" href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>-->
        <h3 style="color: rgb(0, 0, 0); font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; ">The Precedence Bank</h3 >
        <div class="topnav-right" style="padding-top: 15px;">
          <a href="index1.php" style="color: rgb(0, 0, 0)">Home</a>
          <a href="transfer.php" style="color: rgb(0, 0, 0)">Customers List</a>
        </div>
      </div>
    </section>

	<div class="container">
        <h2 class="text-center pt-4">Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  transactions_2 where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" >
            <br><h3>Sender</h3><br>
        <div>
        <table class="table roundedCorners tabletext table-sm table-condensed table-bordered table-dark">
                <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email ID</th>
                    <th scope="col">Account Type</th>           
                    <th scope="col">Current Bank Balance</th>
                </tr>

                <tr>
                    <td><?php echo $rows['serial no.'] ?></td>
                    <td><?php echo $rows['id']?></td>
                    <td><?php echo $rows['customer name']?></td>
                    <td><?php echo $rows['email id']?></td>
                    <td><?php echo $rows['account type']?></td>
                    <td><?php echo $rows['amount']?></td>  
                </tr>
            </table>
        </div>
        <br><br><br>
        <h3>Receiver</h3><br>
        <select name="to" class="form-control" required >
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';

                $sid=$_GET['id'];
                $sql = "SELECT * FROM transactions_2 where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }

                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['customer name'] ;?> (ID: 
                    <?php echo $rows['id'] ;?>) (Balance: 
                    <?php echo $rows['amount'] ;?>) 
                </option>
            <?php 
                } 
            ?>
            
            <div>
            
        </select>
        <?php
                include 'config.php';

                $sid=$_GET['id'];
                $sql = "SELECT * FROM transactions_2 where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }

                while($rows = mysqli_fetch_assoc($result)) {
            ?>
        
        <table class="table roundedCorners tabletext table-sm table-condensed table-bordered table-dark">
        <br>
            <tr>
                <th scope="col">Customer Name</th>    
                <th scope="col">Customer ID</th>       
                <th scope="col">Current Bank Balance</th>
            </tr>

            <tr>
                <td><?php echo $rows['customer name']?></td>
                <td><?php echo $rows['id']?></td>
                <td><?php echo $rows['amount']?></td>  
            </tr>

        </table>
            
        <?php 
            } 
        ?>
        
        <br>
        <br>

        <h3>Amount</h3><br>
        <input type="number" class="form-control" name="amount" required>   
        <br><br>

        <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
        </div>
            
            <!--<span class="input-group-text">Rs. ₹ 
            <input type="number" class="form-control" placeholder="Enter Amount" name="amount" required>.00</span>
         
            <div class="text-center" >
                <a href=""><button class="w3-button w3-red w3-border w3-border-red w3-round-large" style="margin-top: 40px; margin-bottom: 10px;">Transfer</button></a>
            </div>-->
        </form>
    </div>
</body>

<!--Footer-->
<footer id="footer" class="coloured-section">    
    <p class="copyright">© Copyright 2021 The Precedence Bank. All Rights Reversed.</p>
</footer>

</html>