<?php
include('qc.php');

$x = 0;
$sql = "SELECT * FROM photo ORDER BY id DESC";
$resultadoSql = $conn->query($sql);
while ($row = $resultadoSql->fetch_assoc()) {
    $x++;
    echo'
    <tr>
        <td>'.$x.'</td>
        <td><img src="docs/'.$row['ruta'].'" width="100" class="p-2"></td>
        
        <td>
            <span>'.$row['descripcion'].'</span>
        </td>     
        <td>

            <select class="form-select" aria-label="Default select example" onchange="cambiarCategoria('.$row['id'].',this.value)">
                <option value="0" '.(($row['categoria'] == 0) ? 'selected' : '').'>Selecciona la categoría</option>
                <option value="1" '.(($row['categoria'] == 1) ? 'selected' : '').'>Doméstico</option>
                <option value="2" '.(($row['categoria'] == 2) ? 'selected' : '').'>Automotriz</option>
                <option value="3" '.(($row['categoria'] == 3) ? 'selected' : '').'>Mascotas</option>
                <option value="4" '.(($row['categoria'] == 3) ? 'selected' : '').'>Higiénicos</option>
                <option value="5" '.(($row['categoria'] == 3) ? 'selected' : '').'>Jarcería</option>
                <option value="6" '.(($row['categoria'] == 3) ? 'selected' : '').'>Escobas y trapeadores</option>
            </select>

        </td>    
        <td>
            <button class="btn btn-danger" onclick="eliminarPhoto('.$row['id'].')"><i class="bi bi-trash3-fill"></i> Eliminar</button>
        </td> 
    </tr>
    ';
}

?>

