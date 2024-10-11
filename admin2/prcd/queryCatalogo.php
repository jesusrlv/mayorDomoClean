<?php

include ('qc.php');

$id = $_POST['idPhoto'];

if($id == 1){
    $photo = "admin2/docs/01.png";
}
else if($id == 2){
    $photo = "admin2/docs/02.png";
}
else if($id == 3){
    $photo = "admin2/docs/03.png";
}
else if($id == 4){
    $photo = "admin2/docs/04.png";
}
else if($id == 5){
    $photo = "admin2/docs/05.png";
}
else if($id == 6){
    $photo = "admin2/docs/06.png";
}

echo '
<div class="row w-100 d-flex justify-content-center align-items-center g-3">
';

$sql = "SELECT * FROM photo WHERE categoria = '$id' ORDER BY id DESC";
$resultadoSql = $conn->query($sql);
while ($row = $resultadoSql->fetch_assoc()) {
    
    echo '
        <div class="col-lg-3 col-md-4 col-sm-12 m-2 text-start" id="photosC">
            <div class="card text-bg-primary mb-3" style="" id="cardDesc">
              <img src="'.$photo.'" class="card-img-top" alt="...">

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

