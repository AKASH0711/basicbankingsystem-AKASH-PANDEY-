<!-- 

Name: AKASH PANDEY
Internship: Web Development
Task: Basic Banking System
Batch: APRIL 2021 

-->


<?php
    //connecting to db
    session_start();
    require_once('connection.php');

    //PHP script to take data out of db
    $sql = "SELECT * FROM `cadence bank`.`cadenceuser`";
    $result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/CSS/styles.css">
    <script>
        function show_cadenceuser(){
            document.getElementsByClassName('table-container')[0].style.display = 'block';
            document.getElementById('view-customer').style.display = 'none';
            document.getElementsByClassName('error-msg')[0].style.display = 'none';
        }
    </script>
     <!-- Bootstrap CSS linked -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Jquery and Js Linked -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="public/css/footer.css">
</head>
<body style="background-image: url(public/css/bg-image/car1.jpg);background-position:center; background-size:cover;">
<div class="header-container">

</div>
<script>
    $('.header-container').load('includes/header.html');
</script>
    
    </div >
        <button id="view-customer" type="toggle" onclick="show_cadenceuser()" style="margin: 11% 39%;">View Customers</button>
        <?php 
            if(isset($_SESSION['message'])){
                ?>
                <div class="message error-msg">
                    <?php echo $_SESSION['message']; ?>
                </div>
                <?php
                unset($_SESSION['message']);
                unset($_SESSION['message-css']);
            }
        ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>Account Number</th>
                        <th>Email</th>
                        <!-- <th>Contact Number</th> -->
                        <th>Location</th>
                        <th>Current Balance</th>
                        <th>Operation</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $i = 1;
                        while($row = $result->fetch_assoc()){
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['account_num']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <!--  -->
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['current_balance']; ?></td>
                            <!-- Link to send customer_id to the transaction page -->
                            <td><a href="transaction.php?c_id=<?php echo $row['customer_id']; ?>" target="_blank">Tranfer money</a></td>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
            
            
            </table>
        </div>
    </div>
    
</body>
</html>