<?php
if (isset($_POST['delete'])) {
$id = $_POST['ID'];

$sql="DELETE FROM `book` WHERE id = $id";

}

?>