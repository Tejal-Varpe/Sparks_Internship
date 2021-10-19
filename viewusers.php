<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <style>

    .container
    {
      padding-top: 30px;
      text-align: center;
      background-size: cover;
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

        <h3 style="color: rgb(0, 0, 0); font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; ">The Precedence Bank</h3>
        <div class="topnav-right" style="padding-top: 15px;">
            <a href="home_page.php" style="color: rgb(0, 0, 0)">Home</a>
            <!--<a href="#" style=" color: #353258">Customers</a>-->
        </div>
    
    </div>
</section>

    <div class="container divStyle" style= "margin-bottom: auto;">
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table roundedCorners tabletext table-sm table-condensed table-bordered table-dark" style="border-collapse: separate; border-spacing: 0 10px;"> 
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
                    <tr>
                        <td><?php echo $rows['serial no.'] ?></td>
                        <td><?php echo $rows['id']?></td>
                        <td><?php echo $rows['customer name']?></td>
                        <td><?php echo $rows['email id']?></td>
                        <td><?php echo $rows['account type']?></td>
                        <td><?php echo $rows['amount']?></td>
                        <!--<td><a href="view.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="button">View</button></a></td>-->
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
               
</body>
<!--<footer id="footer" class="coloured-section">    
    <p class="copyright">© Copyright 2021 The Precedence Bank. All Rights Reversed.</p>
</footer>-->
</html>