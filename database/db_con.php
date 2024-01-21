<?php
    $link = mysqli_connect("localhost", "root", "") or die ("Connection error");
    $db = mysqli_select_db($link,"teachease") or die ("Database error");
?>