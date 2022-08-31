<?php

    try {

        $nombre = $_POST['TbNombreCliente'];
        $apellido = $_POST['TbApellidoCliente'];
        $celular = $_POST['TbCelularCliente'];
        $telefono = $_POST['TbTelefonoCliente'];
        $email = $_POST['TbEmailCliente'];
        $empresa = $_POST['TbNombreEmpresa'];
        $RFC = $_POST['TbRFCEmpresa'];
        $carros = 0;

        $base = new PDO("mysql:host=localhost; dbname=manolo", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $sql = "INSERT INTO CLIENTES (Nombre, Apellido, Celular, Telefono, Email, Empresa, RFC, N_Carros)
                VALUE ('$nombre', '$apellido', '$celular', '$telefono', '$email', '$empresa', '$RFC', '$carros')";
        
        $resultado = $base->prepare($sql);
        $resultado->execute();

        if ($resultado == false)
            header("location:IBM_Clientes.php?case=2");

        else
            header("location:IBM_Clientes.php?case=1");
        

    } catch (Exception $e) {

        die ("Error: " . $e->getMessage());

    }

    $base = null;

?>