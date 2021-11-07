<?php include_once "autoload.php";

    if(isset($_GET['recent_login_id'])){
        $rlogin_id=$_GET['recent_login_id'];
        setcookie('login_user_cookie_id',$rlogin_id,time()+(60*60*24*365*7));
        header('location:index.php');
    }

    if(isset($_GET['rcl_id'])){

        $rcl_id=$_GET['rcl_id'];
        $rcl_arr=json_decode($_COOKIE['recent_login_id'],true);
        $rlu_arr=array_unique($rcl_arr);
        $index=array_search($rcl_id,$rlu_arr);
        array_splice($rlu_arr,$index,1);
        if(count($rlu_arr)>0){
            setcookie('recent_login_id',json_encode($rlu_arr),time()+(60*60*24));
        }else{
            setcookie('recent_login_id','',time()-(60*60*24*365*7));
        }
        header('location:index.php');
        // echo "<pre>";
        // print_r($rlu_arr);
        // echo "</pre>";
    }
    if(userLogin()==true){
        header('location:profile.php');
    }
    if(isset($_COOKIE['login_user_cookie_id'])){
        $login_user_cookie_id=$_COOKIE['login_user_cookie_id'];
        $_SESSION['id']=$login_user_cookie_id;
        header('location:profile.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
    <?php 
        if(isset($_POST['signin'])){
            $login=$_POST['login'];
            $pass=$_POST['password'];
            if(empty($login)||empty($pass)){
                $msg=msgShow('All Fields are Required','danger');
            } 
            else{
                $user_email_data=emailAuth('users','email',$login);
                if($user_email_data!==false){

                    if(passAuth($user_email_data->password,$pass)){
                        $_SESSION['id']=$user_email_data->id;
                        setcookie('login_user_cookie_id',$user_email_data->id,time()+(60*60*24*365*7));
                        // $_SESSION['name']=$user_email_data->name;
                        // $_SESSION['email']=$user_email_data->email;
                        // $_SESSION['cell']=$user_email_data->cell;
                        // $_SESSION['gender']=$user_email_data->gendar;
                        // $_SESSION['photo']=$user_email_data->photo;
                        header('location:profile.php');
                    } else{
                        $msg=msgShow('Invalid Password','danger');
                    }
                } else{
                    $msg=msgShow('Invalid Email address','danger');
                }
                
            }
        }
    ?>
    
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Log In</h3>
                        <?php
                            if(isset($msg)){
                                echo $msg;
                            }
                        ?>
                    </div>
                    
                    <div class="card-body">
                        <form action="" autocomplete="off" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Login Info</label>
                            <input type="text" name="login" placeholder="Email or Cell or User Name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="signin" value="Log In" class="btn btn-primary">
                        </div>
                    </form>
                    </div>
                    <div class="card-footer">
                        <a href="reg.php">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap">
        <div class="row">
            <?php 
            if(isset($_COOKIE['recent_login_id'])):
            $recent_login_user_arr=json_decode($_COOKIE['recent_login_id']);
            // print_r($recent_login_user_arr);
            $users_id=implode(',',$recent_login_user_arr);
            $sql="SELECT * FROM users WHERE id IN($users_id)";
            $data=connect()->query($sql); 
            while($user=$data->fetch_object()):
            
            
            ?>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body rlc-div">
                        <div class="rlogin">
                            <a class="close rlc" href="?rcl_id=<?php echo $user->id; ?>">&times;</a>
                           <a href="?recent_login_id=<?php echo $user->id; ?>">
                                <img style="width: 100%;height:120px;" src="media/users/<?php echo $user->photo; ?>" alt="">
                                <h4><?php echo $user->name; ?></h4>
                           </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <?php 
        endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
    
<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>