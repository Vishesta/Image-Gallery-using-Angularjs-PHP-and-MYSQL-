

    <div class="row">
        <div class="well col-md-5 center login-box" id="well">
            <div class="alert alert-info">
                Change Password for your Account.
            </div>
            <form class="form-horizontal" action="password.php" method="post" autocomplete="off">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                    </div>
                    <div class="clearfix"><br></div>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="New Password" name="password1" required>
                    </div>
                    <div class="clearfix"><br></div>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password2" required>
                    </div>
                    <div class="clearfix"></div>
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
                </fieldset>
            </form>
        </div>
    </div>