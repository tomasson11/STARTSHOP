<?php 
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){
   
    switch($_POST['btnAccion']){

        case 'AGREGAR' :

            if(is_numeric( openssl_decrypt($_POST['id'], COD, KEY))){
                $ID=openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje.="OK ID CORRECTO".$ID."</br>";

            }else{
                $mensaje.="Upss... ID INCORRECTO".$ID."</br>";
            }

            if(is_string(openssl_decrypt($_POST['nombre'], COD, KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'], COD, KEY);
                $mensaje.="OK NOMBRE".$NOMBRE."</br>";
            }else{ $mensaje.="upss... algo pasa con el nombre"."</br>";  break;}

            if(is_numeric( openssl_decrypt($_POST['cantidad'], COD, KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'], COD, KEY);
                $mensaje.="OK CANTIDAD".$CANTIDAD."</br>";
            }else{ $mensaje.="upss... algo pasa con la cantidad"."</br>";  break;}

            if(is_numeric( openssl_decrypt($_POST['precio'], COD, KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'], COD, KEY);
                $mensaje.="OK PRECIO".$PRECIO. "</br>";
            }else{ $mensaje.="upss... algo pasa con el precio"."</br>";  break;}    

            if(!isset($_SESSION['CARRITO'])){
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );

                $_SESSION['CARRITO'][0]=$producto;
                $mensaje= "Producto agregado al carrito";

            }else{

                $idProductos=array_column($_SESSION['CARRITO'],"ID");

                if(in_array($ID,$idProductos)){
                    echo "<script>alert('El producto ya ha sido seleccionado');</script>";
                    $mensaje="";        

                }else{


                $numeroproductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );

                $_SESSION['CARRITO'][$numeroproductos]=$producto; 
                $mensaje= "Producto agregado al carrito";
               }
            }
            // $mensaje= print_r($_SESSION, true);
            

        break;
        case "Eliminar" :

            if(is_numeric( openssl_decrypt($_POST['id'], COD, KEY))){
                $ID=openssl_decrypt($_POST['id'], COD, KEY);
                
                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    
                    if($producto['ID']==$ID){
                        unset($_SESSION['CARRITO'][$indice]); 
                        echo "<script>alert('ELEMENTO BORRADO...');</script>";

                    }

                }

            }

        break;    

}    

}

?>
