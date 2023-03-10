<?php
include '../public/header.php';
include '../public/nav.php';
include '../App/config.php';
include '../App/function.php';
auth();

if (isset($_POST['btn_create']) && $_POST['name'] != "") {
    $name = $_POST['name'];
    $insert = "INSERT INTO `department` (`id`, `name`, `created_at`) VALUES (NULL, '$name', current_timestamp())";
    $i = mysqli_query($conn, $insert);
    testcon($i, "insert");
}
?>


<div class="dep">
    <h1>Add Department page</h1>
</div>
<div class="container  col-6">
    <div class="card mx-auto mt-3">
        <div class="card-body">
            <form method="post">
                <label>Name :</label>
                <input type="text" name="name" class="form-control">
                <button name="btn_create" class="btn btn-primary mt-2">Create Department</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../public/end_head.php';
?>