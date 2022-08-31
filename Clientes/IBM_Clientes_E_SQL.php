<?php

    try {

        $id = $_POST['id'];
        $nombre = $_POST['TbNombreCliente'];
        $apellido = $_POST['TbApellidoCliente'];
        $celular = $_POST['TbCelularCliente'];
        $telefono = $_POST['TbTelefonoCliente'];
        $email = $_POST['TbEmailCliente'];
        $empresa = $_POST['TbNombreEmpresa'];
        $RFC = $_POST['TbRFCCliente'];

        $base = new PDO("mysql:host=localhost; dbname=manolo", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $sql = "UPDATE CLIENTES SET NOMBRE = '$nombre',
                                    APELLIDO = '$apellido',
                                    CELULAR = '$celular',
                                    TELEFONO = '$telefono', 
                                    EMAIL = '$email',
                                    EMPRESA = '$empresa',
                                    RFC = '$RFC'
                WHERE ID = '$id'";
        
        $resultado = $base->prepare($sql);
        $resultado->execute();

        if ($resultado == false)
            header("location:IBM_Clientes.php?case=4");

        else
            header("location:IBM_Clientes.php?case=3");
        

    } catch (Exception $e) {

        die ("Error: " . $e->getMessage());

    }

    $base = null;

?>