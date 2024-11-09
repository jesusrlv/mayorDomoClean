<?php

include ('qc.php');

$id = $_POST['idPhoto'];

if($id == 1){
    $photo = "admin2/docs/04.png";
}
else if($id == 2){
    $photo = "admin2/docs/01.png";
}
else if($id == 3){
    $photo = "admin2/docs/02.png";
}
else if($id == 4){
    $photo = "admin2/docs/06.png";
}
else if($id == 5){
    $photo = "admin2/docs/12.png";
}
else if($id == 6){
    $photo = "admin2/docs/03.png";
}
else if($id == 7){
    $photo = "admin2/docs/12.png";
}
else if($id == 8){
    $photo = "img/ico/ICONOS TRANSPARENTES-02.png";
}
else if($id == 9){
    $photo = "img/ico/ICONOS TRANSPARENTES-03.png";
}
else if($id == 10){
    $photo = "admin2/docs/10.png";
}
else if($id == 11){
    $photo = "img/ico/ICONOS TRANSPARENTES-04.png";
}
else if($id == 12){
    $photo = "admin2/docs/05.png";
}
else if($id == 13){
    $photo = "img/ico/ICONOS TRANSPARENTES-05.png";
}
else if($id == 14){
    $photo = "admin2/docs/09.png";
}
else if($id == 15){
    $photo = "admin2/docs/08.png";
}
else if($id == 16){
    $photo = "admin2/docs/11.png";
}
else if($id == 17){
    $photo = "admin2/docs/17.png";
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
              <img src="'.$photo.'" class="card-img-top w-100" alt="...">

                <div class="card-body border-bottom border-light bg-light">
                    <h5 class="card-title">'.$row['producto'].'</h5>
                    <p class="card-text" style="font-size:10px"><strong>DESCRIPCIÓN:</strong> '.$row['descripcion'].'.</p>
                    <p class="card-text">Precio: '.$row['precio'].'.</p>
                </div>
            </div>
        </div>
    ';
}

echo '
</div>
';

?>

