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
   
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <a href="create.php" class="btn btn-primary">Add Student</a>
                <div class="card">
                    <div class="card-body">
                        <h3>All Students Data</h3>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Cell</th>
                                    <th>Location</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Amount</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                    $data=all('students');
                                 //    $d=$data->fetch_object();
                                 while($d=$data->fetch_object()):
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $d->name; ?></td>
                                    <td><?php echo $d->email; ?></td>
                                    <td><?php echo $d->cell; ?></td>
                                    <td><?php echo $d->location; ?></td>
                                    <td><?php echo $d->age; ?></td>
                                    <td><?php echo $d->gender; ?></td>
                                    <td><?php echo $d->amount; ?></td>
                                    <td>
                                        <img style="width: 50px; height: 50px;" src="media/students/<?php echo $d->photo; ?>" alt="dsff">
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary">View</a>
                                        <a class="btn btn-warning" href="edit.php?edit_id=<?php echo $d->id; ?>">Edit</a>
                                        <a id="delete_btn" href="delete.php?delete_id=<?php echo $d->id; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                       
                </div>
            </div>
        </div>
    </div>
    
<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    $('a#delete_btn').click(function(){
            let conn=confirm("Are you Sure?");
            if(conn){
                return true;
            } else{
                return false;
            }
    });
</script>
</body>
</html>