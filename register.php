<?php
session_start();
 
$logged_in = false;
 
//jika session username belum dibuat, atau session username kosong
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
    $logged_in = true;
}
 
include_once('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aplikasi PT. Ujicoba Sejahtera Tbk.</title>
<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/normalize.css" type="text/css" />
<link rel="stylesheet" href="css/permata-ui-kit.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<style type="text/css">
    .panel-heading {
    padding: 5px 15px;
}

.panel-footer {
    padding: 1px 15px;
    color: #A0A0A0;
}

/* NOTIFICATION */
.info, .error {
    margin: 0 0 16px 8px;
    padding: 12px;
}

.info {
    background-color: lightYellow;
    border: 1px solid #E6DB55;
}

.error {
    background-color: #FFEBE8;
    border:1px solid #c00;
}*/
</style>
</head>
 
<body>

    <div class="container" style="margin-top:100px">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Please Sign Up</strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="insert.php" method="POST">
                            <fieldset>
                                <?php 
            $error = $_GET['error'];
            
            if ($error == 1) {
            ?>
            <div class="error">Username dan Password belum diisi.</div>
            <?php } else if ($error == 2) {?>
            <div class="error">Username belum diisi.</div>
            <?php } else if ($error == 3) {?>
            <div class="error">Password belum diisi.</div>
            <?php } else if ($error == 4) {?>
            <div class="error">Username dan Password tidak terdaftar.</div>
            <?php } ?>

            <?php 
            $message = $_GET['msg'];
            
            if ($message == 'success') {
            ?>
            <div class="info">Success</div>
            <?php } else if ($message == 'failed') {?>
            <div class="error">Error</div>
            <?php } ?>
            
            
        </fieldset>
                <div class="row">
                    <div class="center-block">
                        <center></center>
                    </div>
                    <br>
                </div>
                
                <div class="row">
                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                                </span> 
                                    <input class="form-control" placeholder="username" name="username" type="text" required="required" />
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                                </span> 
                                    <input class="form-control" placeholder="password" name="password" type="password" required="required" />
                            </div>
                        </div>
                                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                                </span>
                                    <input class="form-control" placeholder="email" name="email" type="email" required="required" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                <i class="glyphicon glyphicon-pencil"></i>
                                </span>
                                    <input class="form-control" placeholder="fullname" name="fullname" type="text" required="required" />
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Register">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer ">
                        Have an account! <a href="login.php" onClick=""> Sign in </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    

</div>

</body>
</html>