<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Venta de Productos</title>
    <link href="estilo.css" rel="stylesheet">
</head>
<body>
    <header>
    <img src="bannerElectrodomesticos.jpg" width="780"
        height="250" alt="bannerElectrodomesticos"/>
    <h2 id="centrado">VENTA DE PRODUCTOS</h2>
</header>
<?php
    error_reporting(0);

    $producto=$_POST['selProducto'];

    $precio=0;
    switch ($producto){
        case 'lavadora': $precio=1500; break;
        case 'refrigeradora': $precio=3500; break;
        case 'radiograbadora': $precio=500; break;
        case 'tostadora': $precio=150;
    }
    if ($producto=='lavadora') $selL='SELECTED'; else $selL="";
    if ($producto=='refrigeradora') $selRe='SELECTED'; else $selRe="";
    if ($producto=='radiograbadora') $selRa='SELECTED'; else $selRa="";
    if ($producto=='tostadora') $selT='SELECTED'; else $selT="";
    ?>

    <form method="POST" name="frmVenta">
        <table border="0" width="500" cellspacing="0" cellpadding="0">
        <tr>
            <td>Producto</td>
            <td><select name="selProducto" onchange="this.form.submit()">
                    <option value="lavadora" <?php echo $selL;?>>
                        Lavadora</option>
                    <option value="refrigeradora" <?php  echo $selRe;?>>
                        Refrigeradora</option>
                    <option value="radiograbadora" <?php echo $selRa;?>>
                        Radiograbadora</option>
                    <option value="tostadora" <?php echo $selT;?>>
                        Tostadora</option>
                </select>
            </td>
        </tr>
        <tr>
         <td>Precio</td>
         <td>
            <input type="text" name="txtPrecio" readonly="readonly"
                value="<?php
                        if ($_POST[selProducto])
                            echo number_format($precio,'2','.','');
                      ?>" />
        </td>
    </tr>
    <?php
        $cantidad=$_POST['txtCantidad'];
        $subtotal=$cantidad*$precio;
    ?>
    <tr>
        <td>Cantidad</td>
        <td>
        <input type="text" name="txtCantidad"
                value="<?php echo $cantidad; ?>" />

    </td>
    <td>
        <input type="submit" vale="Calcular" name="btnCalcular" />
    </td>
</tr>

    <tr>
        <td>subtotal</td>
        <td><input type="text" name="txtSubtotal"
            value="<?php
                echo '$' .number_format($subtotal,'2','.',''); ?>"

            />
        </td>
        </tr>
        <tr>
            <td>Cuotas</td>
            <td>
                <select name="selCuotas"
                        onchange="this.form.submit()">
                    <option value="3">3</option>
                    <option value="6">6</option>
                    <option value="9">9</option>
                    <option value="12">12</option>
                </select>
            </td>
        </tr>
        <?php
            if ($_POST['selCuotas']) {
        ?>
        <tr id="fila">
            <td>N° Letras</td>
            <td>Monto</td>
        </tr>
        <?php
            $cuotas=$_POST['selCuotas'];
            $i=1;
            $montoMensual = $subtotal/$cuotas;
            while($i<=$cuotas){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td>
        <?php echo '$' .number_format($montoMensual,'2','.','');?>
    </td>
  </tr>
  <?php
        $i++;
        }
    }
   ?>
</table>
</form>
</body>
</html>