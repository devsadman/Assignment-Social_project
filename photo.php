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
    if(isset($_POST['upload'])){
        $file_data=move($_FILES['photo'],'media/users/');
        $user_id=$_SESSION['id'];
        if(empty($_FILES['photo']['name'])){
            setMsg('warning','Please Upload a Photo');
            header('location:photo.php');
        } else{
        update("UPDATE users SET photo='$file_data' WHERE id='$user_id' ");
            setMsg('success','Photo Uploaded Successfully');
            header('location:photo.php');
        }
        
    }
    getMsg('warning');
    getMsg('success');
?>
<?php
        if($user_info->photo!=NULL):
            
    ?>
    <img class="shadow" src="media/users/<?php echo $user_info->photo; ?>" alt="">
    <?php 
        elseif($user_info->gendar=='male'):
    ?>
            <img class="shadow" src="assets/img/m.jpg" alt="">
    <?php
        else:
    ?>
    <img class="shadow" src="assets/img/f.jpg" alt="">
    <?php endif; ?>
   
    <div class="card shadow my-3">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <input type="file" name="photo">
                <input type="submit" value="Upload" name="upload" class="btn btn-success">
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