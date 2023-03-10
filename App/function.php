<?php
function testcon($condition, $message)
{
    if ($condition) {
        echo "<div class='alert  alert-success mx-auto col-6 mt-5'>
    $message  succefully</div>";
    } else {
        echo "<div class='alert alert-danger mx-auto col-6 '>
    $message  falid</div>";
    }
}
function path($go)
{
    echo "<script> location.replace('/project/session8/$go')</script>";
}

function auth()
{
    if (!isset($_SESSION['user'])) {
        header("location: /project/session8/admin/login.php");
    }
}
