<?php 
include_once('bootstrap/header.php');
include_once('bootstrap/nav.php');
include_once('class/Utils.php');

?>

<div class="container">
    <?php
    if(!isset($_SESSION['userid'])){
        header("Location: signin.php");
    }

include_once("config/conn.php");
include_once("class/UserLogin.php");
    $connectDB = new Database();
    $db = $connectDB->getConnection();

    $user = new UserLogin($db);
    $alert = new Bootstrap();

    if(isset($_SESSION['userid'])){
        $alert->swal_welcome("Welcome cute admin ");
        $userid = $_SESSION['userid'];
        $userData = $user->userData($userid);
    }

    ?>
<h1 class="display-4">Welcome User, <?php echo $userData['name'];?></h1>
<p>Your Email: <?php echo $userData['email'];?></p>
</div>


<?php include_once('bootstrap/footer.php')?>