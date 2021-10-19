<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Basic banking System</title>

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <style>
      
      .container
      {
        padding-top: 50px;
        text-align: center;
        background-size: cover;
      }

      .button 
      {
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

      .button:hover
      {
        color: #8bb5f5;
      }

  </style>

</head>

<body>

<?php
    require 'config.php';
    $query = "SELECT * FROM transactions_2";
    $result = mysqli_query($conn,$query);
?>

<section id="container">
    
  <div class="topnav">
        <h3 style="color: rgb(0, 0, 0); font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; ">The Precedence Bank</h3 >
        
        <div class="topnav-right" style="padding-top: 15px;">

          <a href = "home_page.php" style="color: rgb(0, 0, 0)">Home</a>
        </div>
      </div>
    </section>

    <div class="container divStyle">
        <h2 style="color: rgb(0, 0, 0); padding-bottom: 30px;">Transfer Money</h2>
        <br>

            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table roundedCorners tabletext table-sm table-condensed table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Serial No.</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Email ID</th>
                                <th scope="col">Account Type</th>           
                                <th scope="col">Current Bank Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                    while($rows=mysqli_fetch_array($result)){
                ?>
                    <tr >
                        <td><?php echo $rows['serial no.'] ?></td>
                        <td><?php echo $rows['id']?></td>
                        <td><?php echo $rows['customer name']?></td>
                        <td><?php echo $rows['email id']?></td>
                        <td><?php echo $rows['account type']?></td>
                        <td><?php echo $rows['amount']?></td>
                        <td><a href="transfer_money.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="button">Transfer</button></a></td>
                    </tr>
                <?php
                    }
                ?>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            </div>

</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<footer id="footer" class="coloured-section">    
    <p class="copyright">© Copyright 2021 The Precedence Bank. All Rights Reversed.</p>
</footer>
</html>