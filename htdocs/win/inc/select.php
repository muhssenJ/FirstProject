<?php

$sql = 'SELECT * FROM users ORDER BY RAND() limit 1 ';
$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);//same Array

?>