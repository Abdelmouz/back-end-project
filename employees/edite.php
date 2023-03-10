<?php
include '../public/nav.php';
include '../App/config.php';
include '../App/function.php';
auth();
$select = "SELECT * FROM `department`";
$s = mysqli_query($conn, $select);
if (isset($_GET['edite'])) {
    $id = $_GET['edite'];
    $select_id = "SELECT * FROM `employeeswithdepartment` where id='$id'";
    $s_id = mysqli_query($conn, $select_id);
    $data_id = mysqli_fetch_assoc($s_id);
}
if (isset($_POST['btn_save'])) {
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $department = $_POST['departmentID'];
    if (!empty($_FILES['image']['name'])) {
        $image = rand(0, 900000) . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "../upload/" . $image;
        move_uploaded_file($tmp_name, $location);
        $image_old = $data_id['image'];
        unlink("../upload/$image_old");
    } else {
        $image = $data_id['image'];
    }

    $update = "UPDATE `employees` SET `name` = '$name', `salary`='$salary',`image`='$image', `departmentID`='$department' WHERE `employees`.`id` = '$id'";
    $up = mysqli_query($conn, $update);
    testcon($up, "UPdata");
    path("employees/list.php");
}
?>
<h1>Edite Employess</h1>
<div class="container col-8">
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="fprm-groub mt-2">
                    <label>Name : </label>
                    <input type="text" name="name" value="<?= $data_id['NameEmployees'] ?>" class="form-control">
                </div>
                <div class="fprm-groub mt-2">
                    <label>Salary : </label>
                    <input type="number" name="salary" value="<?= $data_id['salary'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>image : </label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="fprm-groub mt-2">
                    <label>Department : </label>
                    <select name="departmentID" class="form-control">
                        <option selected value="<?= $data_id['depID'] ?>"><?= $data_id['NameDepartment'] ?></option>
                        <?php foreach ($s as $data) : ?>
                            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button name="btn_save" class="btn btn-success mt-3 w-100">Save Edite</button>
            </form>
        </div>
    </div>
</div>
</div>
<?php
include '../public/end_head.php';
?>