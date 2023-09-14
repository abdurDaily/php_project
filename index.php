<?php
  session_start();
  include './controller/env.php';
 
    $allPost = "SELECT * FROM add_data";
    $reault = mysqli_query($conn,$allPost,1);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toDoList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>

</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                       
                        <h5>To Do List </h5>
                    </div>
                    <div class="card-body">
                         <!-- SUCCESS ALEART -->
                         <?php if(isset($_SESSION['success'])): ?>
                                <div class="alert alert-primary" role="alert">
                                     <span>
                                        <?php echo $_SESSION['success']; ?>
                                     </span>
                                  </div>
                        <?php endif; ?>
                        <!-- SUCCESS ALEART END-->
                        <form action="./controller/add.php" method="POST">
                            <label for="title">Enter a Title</label>
                            <input type="text" id="title" class="form-control my-2" placeholder="enter a tile" name="title">
                            
                            <input type="date" class="form-control my-2" name="date">


                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- ALL DATA TABLE -->
<div class="container mt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h6>All Data List</h6>
                </div>

                <div class="card-body">
                    <table class="table table-responsive table-striped table-hover">
                       <tr>
                         <td>Id</td>
                         <td>Title</td>
                         <td>Date</td>
                         <td>Action</td>
                       </tr>

                       <?php
                        foreach($reault as $key => $rslt){
                            ?>
                                <tr>
                                   <td><?= ++$key ?></td>
                                   <td><?= $rslt['title'] ?></td>
                                   <td><?= $rslt['date'] ?></td>
                                   <td>
                                       <a href="./controller/update.php?edit=<?= $rslt['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                       <a href="./controller/delete.php?id=<?= $rslt['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                   </td>
                            <?php
                        }
                       ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
  unset($_SESSION['success']);
?>