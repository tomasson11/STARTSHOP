<?php
include '../php/bd.php';
include 'carrito.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Invoice with ribbon - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
<div class="row">
  <div class="col-sm-12">
	  	<div class="panel panel-default invoice" id="invoice">
		  <div class="panel-body">
		    <div class="row">

				

				<div class="col-sm-6 top-right">
						<h2 class="marginright">CARRITO DE COMPRAS</h2>
						
			    </div>

			</div>
			<?php if(!empty($_SESSION['CARRITO'])) { ?>
            <div class="row table-row">
            <table class="table table-striped">
            <tbody>
            <tr>
            <th width="30%">Descripcion</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="15%" class="text-center">----</th>
        </tr>

        <?php 

        $sql=""

        ?>
        <?php $total=0 ;?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td width="30%"><?php echo $producto['NOMBRE']?></td>
            <td style="vertical-align: middle;">
            <form id="form2" name="form1" method="post" action="carrito.php">
           <input name="cantidad" type="number" id="cantidad" style="width:58px;" class="align-middle text-center" value="<?php echo $producto['CANTIDAD'];?>" maxlength="4" />
           <button type="button" name="btnAccion"  > <img src="./dist/img/actualiza.png" class="btn btn-sm btn-primary btn-rounded" /></button>
           </form>
            </td>

            <td width="20%" class="text-center">$<?php echo $producto['PRECIO']?></td>
            <td width="20%" class="text-center">$<?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
            <td width="5%">

            <form action="" method="post">

            <input type="hidden" name="id" id="id1" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY); ?>">

                <button class="btn btn-danger" 
                name="btnAccion"
                value="Eliminar"
                type="submit"
                >Eliminar</button>
            </form>

        </tr> 
        <?php $total=$total + ($producto['PRECIO']*$producto['CANTIDAD'])  ;?>
        <?php }?> 
        <tr>
            <td colspan="3" align="right"><h3>Total: <?php echo number_format($total,2);?></h3></td>

            <td></td>
        </tr>
            
       
    </tbody>
    <tfoot>
        <tr>
        <td><a href="../usuarios/index.php" class="btn btn-primary btn-lg "><i class="glyphicon glyphicon-menu-left"></i> Regresar</a></td>
            <td colspan="3">    </td>
            
            <td><a href="../usuarios/pagar.php" class="btn btn-primary btn-lg "><i class="glyphicon glyphicon-menu-right"></i> Continuar</a></td>
            
         </tr>
    </tfoot>
    </table>
    <?php }else{?>
        
        <div class="alert alert-success">

        no hay productos en el carrito...

        </div>

    <?php }?>    

</div>
          </div>

<style type="text/css">
body{margin-top:20px;
background:#eee;
}

/*Invoice*/
.invoice .top-left {
    font-size:65px;
	color:#3ba0ff;
}

.invoice .top-right {
	text-align:right;
	padding-right:20px;
}

.invoice .table-row {
	margin-left:-15px;
	margin-right:-15px;
	margin-top:25px;
}

.invoice .payment-info {
	font-weight:500;
}

.invoice .table-row .table>thead {
	border-top:1px solid #ddd;
}

.invoice .table-row .table>thead>tr>th {
	border-bottom:none;
}

.invoice .table>tbody>tr>td {
	padding:8px 20px;
}

.invoice .invoice-total {
	margin-right:-10px;
	font-size:16px;
}

.invoice .last-row {
	border-bottom:1px solid #ddd;
}

.invoice-ribbon {
	width:85px;
	height:88px;
	overflow:hidden;
	position:absolute;
	top:-1px;
	right:14px;
}

.ribbon-inner {
	text-align:center;
	-webkit-transform:rotate(45deg);
	-moz-transform:rotate(45deg);
	-ms-transform:rotate(45deg);
	-o-transform:rotate(45deg);
	position:relative;
	padding:7px 0;
	left:-5px;
	top:11px;
	width:120px;
	background-color:#66c591;
	font-size:15px;
	color:#fff;
}

.ribbon-inner:before,.ribbon-inner:after {
	content:"";
	position:absolute;
}

.ribbon-inner:before {
	left:0;
}

.ribbon-inner:after {
	right:0;
}

@media(max-width:575px) {
	.invoice .top-left,.invoice .top-right,.invoice .payment-details {
		text-align:center;
	}

	.invoice .from,.invoice .to,.invoice .payment-details {
		float:none;
		width:100%;
		text-align:center;
		margin-bottom:25px;
	}

	.invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
		font-size:22px;
	}

	.invoice .btn {
		margin-top:10px;
	}
}

@media print {
	.invoice {
		width:900px;
		height:800px;
	}
}
</style>

<script type="text/javascript">

</script>
</body>
</html>

