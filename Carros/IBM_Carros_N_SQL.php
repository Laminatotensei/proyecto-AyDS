<?php

    try {

        $id_cliente = $_POST['id'];
        $modelo = $_POST['TbModelo'];
        $fallas = $_POST['TbFallas'];
        $estado = false;

        $base = new PDO("mysql:host=localhost; dbname=manolo", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        // Actualizar el numero de carros del cliente
        $sql = "SELECT N_CARROS
                FROM CLIENTES
                WHERE ID = :id";

        $resultado = $base->prepare($sql);
        $resultado ->execute(array(":id" => $id_cliente));

        $registro = $resultado->fetch();

        $N_Carros_Viejo = $registro['N_CARROS'];
        $N_Carros_Nuevo = $N_Carros_Viejo + 1;

        $sql = "UPDATE CLIENTES
                SET N_CARROS = '$N_Carros_Nuevo'
                WHERE ID = '$id_cliente'";

        $resultado = $base->prepare($sql);
        $resultado->execute();

        // Agregar la info del carro a la tabla
        $sql = "INSERT INTO CARROS (ID_CLIENTE, MODELO, FALLAS, ESTADO)
                VALUE ('$id_cliente', '$modelo', '$fallas', '$estado')";

        $resultado = $base->prepare($sql);
        $resultado->execute();

        if ($resultado ==  false)
            header("location:IBM_Carros.php?case=2");

        else
            header("location:IBM_Carros.php?case=1");
            

    } catch (Exception $e) {

        die ("Error: " . $e->getMessage());

    }

    $base = null;

?>