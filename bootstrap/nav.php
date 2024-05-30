
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">LoginRegOOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
      </ul>
      
      <ul class="navbar-nav">
        <?php if(isset($_SESSION['userid'])) { ?>
          <li class="navbar-item">
          <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </li>
          <?php } else { ?>
            
            <li class="navbar-item">
          <a href="signin.php" class="btn btn-outline-primary">Sign In</a>
        </li>

        <li class="navbar-item">
          <a href="signup.php" class="btn btn-outline-success">Sign Up</a>
        </li>
            <?php } ?>

        
        
      </ul>
      
   
      
    </div>
  </div>
</nav>
