<?php
require_once('./BackUp.php');

$backup = new BackUp('src',"destination");
$backup->export_database('db_name','username','password');
echo '<p stye="font-weight: bold"> BACKUP CREATED SUCCESSFULLY!</p>';