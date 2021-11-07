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
        <?php include_once "templates/menu.php"; ?>
        
        <section class="users my-2">
                <div class="container">
                    <div class="row">
                    <?php
                        $all_users= all('users');
                        while($user=$all_users->fetch_object()):
                    ?>
                    <?php
                        if($user->id!=$_SESSION['id']):
                    ?>
                        <div class="col-md-3">
                            <div class="user-item">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="media/users/<?php echo $user->photo; ?>" alt="">
                                        <h4><?php echo $user->name; ?></h4>
                                        <a href="profile.php?user_id=<?php echo $user->id; ?>" class="btn btn-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php endwhile; ?>
                    </div>
                </div>
        </section>
        
<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>