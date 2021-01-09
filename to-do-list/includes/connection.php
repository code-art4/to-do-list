<?php
    $con = mysqli_connect('localhost', 'root', '', 'list');
    if (!$con) {
        die(' Please check your connection'.mysqli_error());
    }
?>