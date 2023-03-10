<?php
include '../public/header.php';
include '../public/nav.php';
include '../App/config.php';
include '../App/function.php';
auth();
$select = "SELECT * FROM `department`";
$s = mysqli_query($conn, $select);
if (isset($_POST['btn_create']) && $_POST['name'] != "" && $_POST['salary'] != "") {
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $department = $_POST['deparmentID'];
    $image =rand(0,9000000). $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $insert = "INSERT INTO `EMPLOYEES` VALUES (NULL, '$name','$salary','$image' , '$department', current_timestamp())";
    $i = mysqli_query($conn, $insert);
    $location = "../upload/" . $image;
    move_uploaded_file($tmp_name, $location);
    testcon($i, "insert");
    path("employees/list.php");
}

?>
<h1>Add employees</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name : </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Salary : </label>
                    <input type="number" name="salary" class="form-control">
                </div>
                <div class="form-group">
                    <label>image : </label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Department : </label>
                    <select name="deparmentID" class="form-control">
                        <option disabled selected>Choose department </option>
                        <?php foreach ($s as $data) : ?>
                            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button name="btn_create" class="btn btn-success w-100">Create Employess</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../public/end_head.php';

?>