<?php
include('qc.php');

$id = $_POST['idPhoto'];

echo '
<div class="row w-100 d-flex justify-content-center align-items-center">
';

$sql = "SELECT * FROM photo WHERE categoria = '$id' ORDER BY id DESC";
$resultadoSql = $conn->query($sql);
while ($row = $resultadoSql->fetch_assoc()) {
    
    echo '
        <div class="col-lg-3 col-md-4 col-sm-12 mx-auto text-start g-1" id="photosC">
            <div class="card text-bg-primary mb-3" style="" id="cardDesc">
              <img src="admin2/docs/01.png" class="card-img-top" alt="...">

                <div class="card-body border-bottom border-light bg-light">
                    <h5 class="card-title">'.$row['producto'].'</h5>
                    <p class="card-text" style="font-size:10px">Descripción: '.$row['descripcion'].'.</p>
                    <p class="card-text">Precio: $'.$row['precio'].'.</p>
                </div>
            </div>
        </div>
    ';
}

echo '
</div>
';

?>

