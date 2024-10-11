<?php
include('qc.php');

$id = $_POST['idPhoto'];

echo '
<div class="row">
<div class="col-xl-3 col-lg-3 col-md-2 col-sm-6 g-0" id="photosC">
';

$sql = "SELECT * FROM photo WHERE categoria = '$id' ORDER BY id DESC";
$resultadoSql = $conn->query($sql);
while ($row = $resultadoSql->fetch_assoc()) {

    echo '
            <div class="card text-bg-primary mb-3" style="width: auto; height: 450px;">
              <img src="admin2/docs/01.png" class="card-img-top" alt="...">

                <div class="card-body">
                    <h5 class="card-title">'.$row['producto'].'</h5>
                    <p class="card-text">Descripción: '.$row['descripcion'].'.</p>
                    <p class="card-text">Precio: $'.$row['precio'].'.</p>
                </div>
            </div>
    ';
}

echo '
</div>
</div>
';

?>

