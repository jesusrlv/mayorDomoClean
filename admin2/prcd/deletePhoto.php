<?php
include('qc.php');

$id = $_POST['idPhoto'];

$sql = "DELETE FROM photo WHERE id = '$id'";
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

