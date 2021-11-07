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

   
    
<section class="user-profile">
<?php
        if(isset($_POST['update'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $cell=$_POST['cell'];
            $uname=$_POST['uname'];
            $gendar=$_POST['gendar'];
            $age=$_POST['age'];
            $edu=$_POST['edu'];
            $update_at=date('Y-m-d h:m:s');
            $login_user_id=$user_info->id;
            if((empty($name)||empty($email)||empty($cell)||empty($uname)||empty($gendar))){
                echo msgShow('All Fields are Required','danger');
            }else{
                update("UPDATE users SET name='$name',email='$email',cell='$cell',username='$uname',gendar='$gendar',age='$age',edu='$edu',updated_at='$update_at' WHERE id='$login_user_id'");
                setMsg('success','Data Updated Successfully');
                header('location:edit.php');
            }
        }
        getMsg('success'); 
   ?>

    <div class="card shadow">
   
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?php echo $user_info->name; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="text" name="email" value="<?php echo $user_info->email; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Cell</label>
                    <input type="text" name="cell" value="<?php echo $user_info->cell; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">User Name</label>
                    <input type="text" name="uname" value="<?php echo $user_info->username; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Age</label>
                    <input type="text" name="age" value="<?php echo $user_info->age; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Education</label>
                    <input type="text" name="edu" value="<?php echo $user_info->edu; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Gendar</label>
                    <br>
                    <input type="radio" name="gendar" value="male" <?php echo ($user_info->gendar=="male") ? 'checked' : ''; ?> id="male"><label for="male">Male</label>
                    <input type="radio" name="gendar" value="female" <?php echo ($user_info->gendar=="female") ? 'checked' : ''; ?> id="female"><label for="female">Female</label>
                    
                </div>
                <div class="form-group">
                    <input type="submit" name="update" value="Update" class="btn btn-info">
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