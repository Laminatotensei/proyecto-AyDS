<?php

    try {

        $id_carro = $_POST['id'];
        $nombre = $_POST['TbRefaccion'];
        $precio = $_POST['TbPrecio'];

        $base = new PDO("mysql:host=localhost; dbname=manolo", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $sql = "INSERT INTO REFACCIONES (ID_CARRO, NOMBRE, PRECIO)
                VALUE ('$id_carro', '$nombre', '$precio')";

        $resultado = $base->prepare($sql);
        $resultado->execute();

        if ($resultado == false)
            header("location:IBM_Carros.php?case=8");

        else
            header("location:IBM_Carros.php?case=7");

    } catch (Exception $e) {

        die ("Error: " . $e->getMessage());

    }

    $base = null;

?>