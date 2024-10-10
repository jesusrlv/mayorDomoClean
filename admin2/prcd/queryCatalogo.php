<?php
include('qc.php');

$id = $_POST['idPhoto'];

$sql = "SELECT * FROM photo WHERE categoria = '$id' ORDER BY id DESC";
$resultadoSql = $conn->query($sql);
while ($row = $resultadoSql->fetch_assoc()) {

    echo '
            <div class="card text-bg-primary mb-3" style="max-width: 700px;">
                <div class="card-body">
                    <h5 class="card-title">'.$row['producto'].'</h5>
                    <p class="card-text">Descripción: '.$row['descripcion'].'.</p>
                    <p class="card-text">Precio: $'.$row['precio'].'.</p>
                </div>
            </div>
    ';
}

?>

