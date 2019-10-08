<?php
$conn = new PDO("mysql:host=lochnagar.abertay.ac.uk;dbname=sql1701721",'sql1701721','YhxGCn8aYKwI');

include_once '../controller/pagination.php';
$pagination = new paginate_1($conn);
?>