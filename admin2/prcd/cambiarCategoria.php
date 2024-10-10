<?php
include('qc.php');

$id = $_POST['idPhoto'];
$categoria = $_POST['categoria'];

$sql = "UPDATE photo SET categoria = '$categoria' WHERE id = '$id'";
$resultadoSql = $conn->query($sql);

if ($resultadoSql){
    echo json_encode(array(
        'success'=>1
    ));
}
else{
    echo json_encode(array(
        'success'=>0
    ));
}


?>

