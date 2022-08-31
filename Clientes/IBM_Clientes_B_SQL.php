<?php

    try {

        $id = $_POST['id'];
        $nombre = $_POST['TbNombreCliente'];
        $apellido = $_POST['TbApellidoCliente'];
        $celular = $_POST['TbCelularCliente'];
        $telefono = $_POST['TbTelefonoCliente'];
        $empresa = $_POST['TbNombreEmpresa'];

        $base = new PDO("mysql:host=localhost; dbname=manolo", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $sql = "DELETE FROM CLIENTES
                WHERE ID = '$id'";
    
        $resultado = $base->prepare($sql);
        $resultado->execute();

        if ($resultado == false)
            header("location:IBM_Clientes.php?case=6");

        else
            header("location:IBM_Clientes.php?case=5");
        

} catch (Exception $e) {

    die ("Error: " . $e->getMessage());

}

$base = null;

?>