<?php 
    require_once('connection.php');
    session_start();
    
    if(!isset($_SESSION['transaction_successfull'])){
        if($_SESSION['reciept-working']==0){}
        $_SESSION['message'] = 'No transaction has been processed!';
        $_SESSION['message-css'] = 'error-msg';
        header('Location: user.php');
        exit;
    }
    $success_msg = $_SESSION['success_msg'];
    $sender_account_num = $_SESSION['sender_account_num'];
    $recipient_account_num = $_SESSION['recipient_account_num'];
    $amount = $_SESSION['amount'];
    $transaction_id = $_SESSION['transaction_id'];
    $timestamp = $_SESSION['transaction_time'];

    //taking out sender and reciever details
    $sql = "SELECT * FROM cadenceuser WHERE `account_num` = $sender_account_num";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $sender_name = $row['name'];
    
    $sql = "SELECT * FROM cadenceuser WHERE `account_num` = $recipient_account_num";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $recipient_name = $row['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciept</title>
    <link rel="stylesheet" href="public/CSS/styles.css">
    <link rel="stylesheet" href="public/css/index.css">
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

   <!-- NAVBAR CONTAINER CODE START -->
   <div class="header-container">

</div>
<script>
    $('.header-container').load('includes/header.html');
</script>
<!-- NAVBAR CONTAINER CODE END  -->

    <div class="main mt-5">
        <div class="reciept-holder">
            <div class="reciept print-only">
                <u>Transaction Reciept</u> </br>
                Transaction successful </br></br>

                Sender's name: <?php echo $sender_name; ?></br>
                Sender's A/C No: <?php echo $sender_account_num; ?></br>
                Recipient's name: <?php echo $recipient_name; ?></br>
                Recipient's A/C No: <?php echo $recipient_account_num; ?></br>
                Via: BBS Bank</br>
                Amount: <?php echo $amount; ?>;</br>
                TID: <?php echo $transaction_id; ?></br>
                Transaction time: <?php echo $timestamp; ?></br>
            </div>
            <div class="button-container no-print">
                <button onclick="window.print()" class="button">Print</button>
            </div>
            <div class="button-container no-print">
                <a href="index.html"><button onclick="<?php $_SESSION['reciept-working']=0; ?>" class="button">Back to homepage</button></a>
            </div>

        </div>
    </div>
    
</body>

</html>

<?php session_destroy(); ?>