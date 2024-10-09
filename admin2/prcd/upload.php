<?php    
    include('qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    
    $categoria = $_POST['categoria'];

$fileName = $_FILES["file"]["name"]; // The file name
$fileTmpLoc = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file"]["type"]; // The type of file it is
$fileSize = $_FILES["file"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}


$archivo_ext=$_FILES['file']['name'];
$extension = pathinfo($archivo_ext, PATHINFO_EXTENSION);
$namePhoto = uniqid('photoMayorDome_', true) . '.' . $extension;

    if(move_uploaded_file($_FILES["file"]["tmp_name"],"../docs/". $namePhoto )){
    echo "$fileName carga completa";
    
    $ruta = $namePhoto;
    $sqlInsert= "INSERT INTO photo(ruta,categoria) 
    VALUES('$namePhoto','$categoria')";
    $resultado= $conn->query($sqlInsert);
    
    
} else {
    echo "move_uploaded_file function failed";
}
    
?>
