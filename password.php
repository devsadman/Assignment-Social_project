<?php include_once "autoload.php";
    if(userLogin()==false){
        header('location:index.php');
    }else{
        $user_info=userloginData('users',$_SESSION['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user_info->name; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
    
<?php include_once ('templates/menu.php'); ?>

    <?php
        if(isset($_POST['cpass'])){
            $old_pass=$_POST['oldpass'];
            $new_pass=$_POST['newpass'];
            $cnew_pass=$_POST['cnewpass'];
            $hash_pass=gethash($new_pass);
            if(empty($old_pass)||empty($new_pass)||empty($cnew_pass)){
                $msg=msgShow('All Fields are Required','danger');
            }else if(password_verify($old_pass,$user_info->password)==false){
                $msg=msgShow('Old Password is Wrong','danger');
            }else if($new_pass!=$cnew_pass){
                $msg=msgShow('Password Confirm is Wrong','danger');
            } else{
                update("UPDATE users SET password='$hash_pass' WHERE id='$user_info->id' ");
                session_destroy();
                header('location:index.php');
            }
        }
    ?>
    
<section class="user-profile">
<?php
        if(isset($msg)){
            echo $msg;
        }
    ?>
    <div class="card shadow">
   
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                <input type="password" name="oldpass" placeholder="Old password" class="form-control">
                </div>
                <div class="form-group">
                <input type="password" name="newpass" placeholder="New Password" class="form-control">
                </div>
                <div class="form-group">
                <input type="password" name="cnewpass" placeholder="Confirm New password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="cpass" value="Change Password" class="btn btn-info">
                </div>

            </form>
        </div>
    </div>
</section>
<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>