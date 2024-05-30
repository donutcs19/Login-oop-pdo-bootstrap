
<?php include_once('bootstrap/header.php')?>
<?php include_once('bootstrap/nav.php')?>


<div class="container-md">
<h3 class="my-3">Login Page</h3>

<?php
include_once("config/conn.php");
include_once("class/UserLogin.php");
include_once("class/Utils.php");

$connectDB = new Database();
$db = $connectDB->getConnection();
$user = new UserLogin($db);
$alert = new Bootstrap();

if(isset($_POST['sign-in'])){
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);

    if($user->emailNotExists()){
        $alert->display("Email is not exists","danger");
        $alert->swal_alert("Email is not exists","error");

        
        
        // echo "<div class='alert alert-warning' role='alert'>Email is not exists</div>";
    }else{
        if($user->verifyPassword()){
            $alert->swal_welcome("Welcome Admin ^^ ");
            // echo "<div class='alert alert-success' role='alert'>Password access</div>";
        }else{
            $alert->display("Password is not exists","danger");
            $alert->swal_alert("Password is not exists","error");
            // echo "<div class='alert alert-warning' role='alert'>Password is not exists</div>";
        }
        // echo "<div class='alert alert-success' role='alert'>Email access</div>";
    }
}
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <div class="mb-3 ">
        <label for="email address" class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" aria-describedby="email" placeholder="Enter your email">
    </div>
    <div class="mb-3 ">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" aria-describedby="password" placeholder="Enter your password">
    </div>
    
    <button type="submit" name="sign-in" class="btn btn-primary">Sign-in</button>
    <a href="index.php" class="btn btn-secondary">Home</a>
    <p>Do not an account yet? go to <a href="signup.php">Signup</a> Page</p>
</form>
</div>


<?php include_once('bootstrap/footer.php')?>
