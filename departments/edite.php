<?php
include '../public/header.php';
include '../public/nav.php';
include '../App/config.php';
include '../App/function.php';
auth();
if (isset($_GET['edite'])) {
    $id = $_GET['edite'];
    $select = "SELECT * FROM `department` where id='$id' ";
    $s = mysqli_query($conn, $select);

    $data = mysqli_fetch_assoc($s);
}
if (isset($_POST['btn_save'])) {
    $name = $_POST['name'];
    $update = "UPDATE `department` SET name='$name' WHERE id='$id' ";
    $up = mysqli_query($conn, $update);
    // testcon($up, "updted");
    path('departments/list.php');
}
?>
<h1>Edite Page</h1>
<div class="container  col-6">
    <div class="card mx-auto mt-3">
        <div class="card-body">
            <form method="post">
                <label>Name :</label>
                <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control">
                <button name="btn_save" class="btn btn-primary mt-2">Save Edite</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../public//end_head.php';
?>