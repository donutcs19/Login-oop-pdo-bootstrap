<?php include_once('bootstrap/header.php')?>
<?php include_once('bootstrap/nav.php')?>


<div class="container">
<h3 class="my-3">Register Page</h3>
<?php
include_once("config/conn.php");
include_once("class/UserReg.php");
include_once("class/Utils.php");

$connectDB = new Database();
$db = $connectDB->getConnection();
$user = new UserRegister($db);
$alert = new Bootstrap();


if (isset($_POST['signup'])){
    $user->setName($_POST['name']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setConfirmPassword($_POST['confirm_password']);

    if(!$user->validatePassword()){
        $alert->display("Password not match","danger");
        $alert->swal_alert("Password not match","error");
        
        // echo "<div class='alert alert-danger' role='alert'>Pass not match</div>";
        
    }

    if(!$user->checkPasswordLength()){
        $alert->display("Password must be at least 6 characters.","danger");
        $alert->swal_alert("Password must be at least 6 characters.","error");
;        // echo "<div class='alert alert-danger' role='alert'>Pass not up 6 char</div>";
    }

    if($user->checkEmail()){
        $alert->display("Email already exist","danger");
        $alert->swal_alert("Email already exist","error");
        // echo "<div class='alert alert-danger' role='alert'>Email already exist</div>"; 
    }

    if ($user->createUser()){
        $alert->display("create user complete <a href='signin.php'>click to sign-in</a>","success");
        $alert->swal_alert("Create user complete","success");
        // echo "<div class='alert alert-success' role='alert'>create user complete <a href='signin.php'>click to sign-in</a></div>";
        
    }else{
        $alert->display("Failed to create user","danger");
        
        // echo "<div class='alert alert-danger' role='alert'>Failed to create user</div>"; 
    }
    
}
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
<div class="mb-3 ">
        <label for="name address" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" aria-describedby="name" placeholder="Enter your name">
    </div>
    <div class="mb-3 ">
        <label for="email address" class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" aria-describedby="email" placeholder="Enter your email">
    </div>
    <div class="mb-3 ">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" aria-describedby="password" placeholder="Enter your password">
    </div>
    <div class="mb-3 ">
        <label for="confirm password" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" aria-describedby="confirm password" placeholder="Enter your confirm password">
    </div>
    
    <button type="submit" name="signup" class="btn btn-primary">sign-up</button>
    <a href="index.php" class="btn btn-secondary">Home</a>
    <p>Already have an account? go to <a href="signin.php">Signin</a> Page</p>
</form>
</div>


<?php include_once('bootstrap/footer.php')?>
