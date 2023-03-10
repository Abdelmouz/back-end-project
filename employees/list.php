<?php
include '../public/nav.php';
include '../App/config.php';
include '../App/function.php';

auth();
$select = "SELECT * FROM `employeeswithdepartment`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $select_image = "SELECT  `image` FROM `employees` WHERE id=$id";
    $s_image = mysqli_query($conn, $select_image);
    $data_image = mysqli_fetch_assoc($s_image);
    $image = $data_image['image'];
    unlink("../upload/$image");
    $delete = "DELETE FROM `employees` WHERE id='$id'";
    $d = mysqli_query($conn, $delete);
    testcon($d, "selected");
    path("employees/list.php");
}
if (isset($_POST['btn_search'])) {
    $name = $_POST['search'];
    $select_search = "SELECT * FROM `employeeswithdepartment` WHERE NameEmployees LIKE '%$name%'";
    $s_search = mysqli_query($conn, $select_search);
}
?>
<h1>List employees</h1>
<div class="container col-8">
    <div class="card carsp">
        <div class="card-body mb-3">
            <form class="form-inline my-2 my-lg-0" method="post">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="btn_search">Search</button>
            </form>
        </div>
        <div class="card-body ">
            <table class="table table-striped edi">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Employee</th>
                        <th scope="col">salary</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name Department</th>
                        <th scope="col" class="text-center" colspan="2">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($_POST['btn_search'])) : ?>
                        <tr>
                            <?php foreach ($s_search as $data_search) : ?>
                                <th scope="row"><?= $data_search['id'] ?></th>
                                <td><?= $data_search['NameEmployees'] ?></td>
                                <td><?= $data_search['salary'] ?></td>
                                <td><img class="image" src="../upload/<?= $data_search['image'] ?>"></td>
                                <td><?= $data_search['NameDepartment'] ?></td>
                                <td><a class="btn btn-info" href="/project/session8/employees/edite.php?edite=<?= $data['id'] ?>">Edite</a></td>
                                <td><a class="btn btn-danger" href="/project/session8/employees/list.php?delete=<?= $data['id'] ?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($s as $data) : ?>
                        <tr>
                            <th scope="row"><?= $data['id'] ?></th>
                            <td><?= $data['NameEmployees'] ?></td>
                            <td><?= $data['salary'] ?></td>
                            <td><img class="image" src="../upload/<?= $data['image'] ?>"></td>
                            <td><?= $data['NameDepartment'] ?></td>
                            <td><a class="btn btn-info" href="/project/session8/employees/edite.php?edite=<?= $data['id'] ?>">Edite</a></td>
                            <td><a class="btn btn-danger" href="/project/session8/employees/list.php?delete=<?= $data['id'] ?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include '../public/end_head.php';
?>