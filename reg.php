<?php include_once "autoload.php" ?>
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
        if(isset($_POST['reg'])){
             $name=$_POST['name'];
             $email=$_POST['email'];
             $cell=$_POST['cell'];
             $uname=$_POST['uname'];
             $pass=$_POST['pass'];
             $cpass=$_POST['cpass'];
            $gendar=NULL;
            if(isset($_POST['gendar'])){
                $gendar=$_POST['gendar'];
            }
            $hash_pass=gethash($pass);
            if(empty($name)||empty($email)||empty($cell)||empty($uname)||empty($gendar)){
                $msg=msgShow("All Fields are Required",'danger');
            } else if(emailCheck($email)==false){
                $msg=msgShow("Invalid E-mail Address",'danger');
            } else if(cellCheck($cell)==false){
                $msg=msgShow("Invalid Cell Format",'danger');
            } else if(passCheck($pass,$cpass)==false){
                $msg=msgShow("Confirm Password Not Match",'danger');
            } else if(dataCheck('users','email',$email)==false){
                $msg=msgShow("E-mail Already Exists",'danger');
            } else if(dataCheck('users','cell',$cell)==false){
                $msg=msgShow("Cell No Already Exists",'danger');
            } else if(dataCheck('users','username',$uname)==false){
                $msg=msgShow("User Name Already Exists",'danger');
            } 
            else{
                create("INSERT INTO users (name,email,cell,username,password,gendar) values ('$name','$email','$cell','$uname','$hash_pass','$gendar') ");
                $msg=msgShow("Your Registration process is Successfull",'success');
                formClean();
            }
        }
    ?>
   
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Create an Account</h3>
                        <?php
                            if(isset($msg)){
                                echo $msg;
                            }
                        ?>
                    </div>
                    <div class="card-body">
                        <form action="" autocomplete="off" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" placeholder="Enter Your name" class="form-control" value="<?php echo old('name'); ?>" >
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="text" name="email" placeholder="Enter Your E-mail" class="form-control" value="<?php echo old('email'); ?>" >
                        </div>
                        <div class="form-group">
                            <label for="">Cell</label>
                            <input type="text" name="cell" placeholder="Enter Your Cell" class="form-control" value="<?php echo old('cell'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" name="uname" placeholder="Enter Your User Name" class="form-control" value="<?php echo old('uname'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="cpass" placeholder="Confirm Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <br>
                            <input type="radio" name="gendar" value="male" id="male"><label for="male">Male</label>
                            <input type="radio" name="gendar" value="female" id="female"><label for="female">Female</label>
                        </div>
                        
                       
                        <div class="form-group">
                            <input type="submit" name="reg" value="Sign Up" class="btn btn-primary">
                        </div>
                    </form>
                    </div>
                    <div class="card-footer">
                        <a href="index.php">Login Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>