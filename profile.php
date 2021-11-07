<?php include_once "autoload.php";
    if(userLogin()==false){
        header('location:index.php');
    }else{
        if(isset($_GET['user_id'])){
            $user_info=userloginData('users',$_GET['user_id']);
        }else{
            $user_info=userloginData('users',$_SESSION['id']);
        }
        
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
    <h3 class="text-center display-4 py-3"><?php echo $user_info->name; ?></h3>
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <td>Name</td>
                    <td><?php echo $user_info->name; ?></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><?php echo $user_info->email; ?></td>
                </tr>
                <tr>
                    <td>Cell</td>
                    <td><?php echo $user_info->cell; ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $user_info->gendar; ?></td>
                </tr>
                <?php if($user_info->age!=NULL || $user_info->age!=0): ?>
                <tr>
                    <td>Age</td>
                    <td><?php echo $user_info->age; ?></td>
                </tr>
                <?php endif; ?>
                <?php if($user_info->edu!=NULL): ?>
                <tr>
                    <td>Education</td>
                    <td><?php echo $user_info->edu; ?></td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</section>
<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>