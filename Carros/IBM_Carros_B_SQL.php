<?php

    try {

        $id_cliente = $_POST['id_c'];
        $id = $_POST['id'];

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
        $N_Carros_Nuevo = $N_Carros_Viejo - 1;

        $sql = "UPDATE CLIENTES
                SET N_CARROS = '$N_Carros_Nuevo'
                WHERE ID = '$id_cliente'";

        $resultado = $base->prepare($sql);
        $resultado->execute();

        // Borrar la info del carro de la tabla
        $sql = "DELETE FROM CARROS
                WHERE ID = '$id'";

        $resultado = $base->prepare($sql);
        $resultado->execute();

        if ($resultado == false)
            header("location:IBM_Carros.php?case=6");

        else
            header("location:IBM_Carros.php?case=5");


    } catch (Exception $e) {

        die ("Error: " . $e->getMessage());

    }

    $base = null;

?>