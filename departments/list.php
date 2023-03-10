<?php
include '../public/header.php';
include '../public/nav.php';
include '../App/config.php';
include '../App/function.php';
auth();
$select = "SELECT * FROM `department`";
$s = mysqli_query($conn, $select);
// testcon($s,"selected");
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `department` WHERE `department`.`id` = '$id'";
    $d = mysqli_query($conn, $delete);
    testcon($d, "Deleted");
    path("departments/list.php");
}
?>
<h1>List Department</h1>
<div class="container  col-8">
    <div class="card mx-auto mt-3">
        <div class="card-body">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Department</th>
                        <th scope="col">Created At</th>
                        <th scope="col" class="text-center" colspan="2">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($s as $data) :
                    ?>
                        <tr>
                            <th scope="row"><?= $data['id'] ?></th>
                            <td><?= $data['name'] ?></td>
                            <td><?= substr($data['created_at'], 10, 6) ?></td>
                            <td><a class="btn btn-primary" href="/project/session8/departments/edite.php?edite=<?= $data['id'] ?>">Edite</a></td>
                            <td><a class="btn btn-danger" href="/project/session8/departments/list.php?delete=<?= $data['id'] ?>">Delete</a></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include '../public//end_head.php';
?>