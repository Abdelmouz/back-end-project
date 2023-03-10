<?php
include '../public/nav.php';
include '../App/config.php';
include '../App/function.php';

if (isset($_POST['btn_login']) && !empty($_POST['username']) && !empty($_POST['pass'])) {
    $usename = $_POST['username'];
    $pass = $_POST['pass'];
    $select = "SELECT * FROM `admins` where `username`='$usename' and `password`='$pass'";
    $s = mysqli_query($conn, $select);
    $numrows = mysqli_num_rows($s);
    if ($numrows == 1) {
        $_SESSION['user'] = $usename;
        // path("/session8/index.php");
        header("location:/project/session8/index.php");
    }
}

?>

<h1>Login Page</h1>
<div class="container col-md-6 mt-5">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Username : </label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password : </label>
                    <input type="password" name="pass" class="form-control">
                </div>
                <button name="btn_login" class="btn btn-primary w-100">Login</button>

            </form>
        </div>
    </div>

</div>
<?php
include '../public/end_head.php'
?>