<?php 
include ("carrito.php");

if(isset($_POST['action'])){

    $action = $_POST['action'];
    $id = isset($_POST['ID']) ? $_POST['ID'] : 0;

    if($action == 'agregar'){

        $Cantidad = isset($_POST['CANTIDAD']) ? $_POST['CANTIDAD'] : 0;
        $respuesta = agregar($id, $Cantidad);
        if($respuesta>0){

            $datos['ok'] = true;

        } else { 
            
            $datos['ok'] = false;
             
        }

        $datos['sub'] = number_format($respuesta, 2);

    } else {

        $datos['ok'] = false;
    }

} else {

    $datos['ok'] = false;
}

echo json_encode($datos); 

function agregar($id, $Cantidad){

    $res = 0;  
    if($id > 0 && $Cantidad > 0 && is_numeric(($Cantidad))){
        if(isset($_SESSION['CARRITO'][$id])){
            $_SESSION['CARRITO'][$id] = $Cantidad;

            include ("../php/bd.php");
            $sql = $pdo->prepare("SELECT precio_venta, descuento FROM articulo WHERE id_articulo=? AND id_estado=1 LIMIT=1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $precio = $row['precio_venta'];
            $descuento = $row['descuento'];
            $precio_desc = $precio - (($precio * $descuento)/ 100);
            $res =  $Cantidad * $precio_desc ;  
            echo $res;
            return $res;   
        }
    } else {
        return $res;
    }

}

?>