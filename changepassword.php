<!DOCTYPE html>
<html>
 <head>
  <title>Image Gallery </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
 <br />
  
  <br />
  <body> 
 <div class="container form_style">
   <div class="panel panel-default" >
    <div class="panel-heading">
     <h3 class="panel-title">Change your Password</h3>
    </div>
    <div class="panel-body">
     <form class="form-horizontal" action="password.php" method="post" autocomplete="off">
      <div class="form-group">
       <label>Enter Your Username:</label>
       <input type="text" class="form-control" placeholder="Name" name="name" required>
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" class="form-control" placeholder="New Password" name="password1" required>
      </div>
       <div class="form-group">
       <label>Re-Enter Your Password</label>
        <input type="password" class="form-control" placeholder="Confirm Password" name="password2" required>
      </div>
      
      <div class="form-group" align="center">
      
            
                    <?php
                        if (isset($_SESSION['reset_error'])) { ?>
                            <div class="alert alert-warning">
                                Error resetting account password! try again later..
                            </div>
                        <?php }elseif (isset($_SESSION['password_nomatch'])) { ?>
                            <div class="alert alert-warning">
                                Passwords do not match!
                            </div>
                        <?php }
                    ?>

                    <p class="center col-md-5">
                        <button name="reset" class="btn btn-primary">Reset Password</button>
                    </p>
                
            </form>
        </div>
    </div>
</body>
</html>