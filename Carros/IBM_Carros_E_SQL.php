<?php

    try {

        $id = $_POST['id'];
        $modelo = $_POST['TbModelo'];
        $fallas = $_POST['TbFallas'];

        $base = new PDO("mysql:host=localhost; dbname=manolo", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $sql = "UPDATE CARROS SET MODELO = '$modelo',
                                  FALLAS = '$fallas'
                WHERE ID = '$id'";

        $resultado = $base->prepare($sql);
        $resultado->execute();

        if ($resultado == false)
            header("location:IBM_Carros.php?case=4");
        
        else
            header("location:IBM_Carros.php?case=3");

    } catch (Exception $e) {

        die ("Error: " . $e->getMessage());

    }

    $base = null;

?>