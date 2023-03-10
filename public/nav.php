<?php
session_start();
if (isset($_POST['btn_style_Black'])) {
    $stle = "/project/session8/css/stley_black.css";
}
if (isset($_POST['btn_style_White'])) {
    $stle = "/project/session8/css/main.css";
}
if (isset($_POST['btn_login'])) {
    header("location: /project/session8/admin/login.php");
}
if (isset($_POST['btn_logout'])) {
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/project/session8/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/project/session8/css/main.css">
    <link rel="stylesheet" href="<?= $stle ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg nav-stly  ">
        <a class="navbar-brand" href="/project/session8/index.php">company</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <i class="fa-solid fa-bars barssi"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item active">
                        <a class="nav-link" ref="/project/session8/index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Department
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/project/session8/departments/list.php">Lisr Department</a>
                            <a class=" dropdown-item" href="/project/session8/departments/add.php">Add Department</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Employees
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/project/session8/employees/list.php">List Employees</a>
                            <a class=" dropdown-item" href="/project/session8/employees/add.php">Add Employees</a>
                        </div>
                    </li>
                <?php endif; ?>

            </ul>
            <form method="post" class="form-inline my-2 my-lg-0">
                <?php if (isset($_SESSION['user'])) : ?>
                    <button name="btn_logout" class="btn btn-danger mr-2">Logout</button>
                <?php else : ?>
                    <button name="btn_login" class="btn btn-info mr-2">Login</button>
                <?php endif; ?>
                <?php if (isset($_POST['btn_style_Black'])) : ?>
                    <button name="btn_style_White" class="bubble1 bubble2">White style</button>
                <?php else : ?>
                    <button name="btn_style_Black" class="bubble1">Black style</button>
                <?php endif; ?>
            </form>
        </div>
    </nav>