<?php 
include ("db.php");
include ("includes/header.php");?>

<div class="container p-4">
    <div class="row">
    <div class="col-md-4">

  <?php if(isset($_SESSION['message'])){ ?>
    <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php  session_unset(); } ?>
    <div class="card card-body">
        <form action="save_task.php" method="POST">
            <div class="form-group p-2">
                <input type="text" name="title" class="form-control"
                placeholder="task title" autofocus>
            </div>
            <div class="form-group p-2">
                <textarea name="description" rows="2" class="form-control" placeholder="task description"></textarea>
            </div>
            <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-success d-grid gap-2" name="save_task" value="Save Task">
            </div>
        </form>
    </div>

    </div>
    <div class="col-md-8">
        <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
        <tbody>
        <?php 
            $sql = "SELECT * FROM task";
            $result = $conexion->query($sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
             <td><?php echo $row['title'] ?></td>
             <td><?php echo $row['description'] ?></td>
             <td><?php echo $row['created'] ?></td>
             <td>
                <a href="edit_task.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary" >
                <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                <i class="fa-solid fa-trash"></i>
                </a>
             </td>
             <?php include("css/style.php"); ?>
        </tr>
         <?php  }?>
        </tbody>
        </table>
        </div>
    </div>
</div>



<?php include("includes/footer.php");?>