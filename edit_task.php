<?php
    include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM task WHERE id = $id";
    $result = $conexion->query($sql);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
    
        $sql = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";
        $conexion->query($sql);
    
        $_SESSION['message'] = 'Tarea Actualizada Corrrectamente!';
        $_SESSION['message_type'] = 'info';
        header("Location: index.php");
    }


?>

<?php include ("includes/header.php")?>

<div class="conatiner p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group p-2">
                        <input type="text" name="title" value ="<?php echo $title; ?>" class="form-control" placeholder= "Update title">
                    </div>
                    <div class="form-group p-2">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update description" ><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ("includes/footer.php");}?>