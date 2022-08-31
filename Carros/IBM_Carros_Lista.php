<html>
<head runat="server">
    <title> Carros </title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie-edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="../CSS/tablas.css">

    <link href="../CSS/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../CSS/cssVentas.css" rel="stylesheet" type="text/css" />

    <script src="../JavaScript/bootstrap.js"></script>
    <script src="../JavaScript/bootstrap.min.js"></script>

</head>
<body>
    
    <header>

        <nav class="navbar navbar-expand-sm badge-dark navbar-dark">

            <a class="navbar-brand" href="index.php">
                <img src="../Images/luces.jpg" class="Icono" />
            </a>

            <ul class="navbar-nav">

                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Inicio</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="../Clientes/IBM_Clientes.php?case=0">Clientes</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="IBM_Carros.php?case=0">Carros</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link fab fa-facebook" href="https://www.facebook.com" target="_blank"></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fab fa-whatsapp" href="https://web.whatsapp.com/" target="_blank"></a>
                </li>
            </ul>

        </nav>

    </header>

    <br>

    <br>

    <div class="container">
    
        <h4> Registro de carros </h4>

        <div class="row bg-light border">
        
            <div class="col-lg-8 col-md-6 col-sm-6">
            
                <a id="BtnNuevo" class="btn btn-md btn-secondary fa fa-plus-square pr-3" href="IBM_Carros_SC.php"> Nuevo Carro </a>
                <a id="BtnMnuListado" class="btn btn-md btn-secondary fa fa-list-alt pr-3"> Listado </a>

            </div>

            <form class="col-lg-4 col-md-6 col-sm-6" action="IBM_Carros_Busqueda.php" method="post">
            
                <div class="row">
                
                    <dic class="col-lg-8 col-md-6 col-sm-6">
                        <td><input type="text" name="TbCriterioBusqueda" class="form-control" placeholder="Criterio de busqueda"></td>
                    </dic>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <td><input type="submit" value=" Buscar" id="BtnBuscar" class="btn btn-ms btn btn-success fa fa-file-search pr-3"></td>
                    </div>
                
                </div>

            </form>
        
        </div>

        <br>

        <table>
        
            <caption> Carros </caption>

            <tr>
            
                <th> Modelo </th>
                <th> Nombre Cliente </th>
                <th> Celular Cliente </th>
                <th>  </th>

            </tr>

            <?php

                try {

                    $base = new PDO('mysql:host=localhost; dbname=manolo', 'root', '');
                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $base->exec("SET CHARACTER SET utf8");

                    $sql_carro = "SELECT ID, ID_CLIENTE, MODELO, ESTADO
                                    FROM CARROS";
                    
                    $resultado_carro = $base->prepare($sql_carro);
                    $resultado_carro->execute();

                    while ($registro_carro = $resultado_carro->fetch(PDO::FETCH_ASSOC)) {

                        $id_cliente = $registro_carro['ID_CLIENTE'];

                        $sql_cliente = "SELECT NOMBRE, CELULAR
                                        FROM CLIENTES
                                        WHERE ID = '$id_cliente'";

                        $resultado_cliente = $base->prepare($sql_cliente);
                        $resultado_cliente->execute();

                        $registro_cliente = $resultado_cliente->fetch();

                        echo 
                        "<tr>
            
                        <td>" . $registro_carro['MODELO'] . "</td>
                        <td>" . $registro_cliente['NOMBRE'] . "</td>
                        <td> " . $registro_cliente['CELULAR'] . " </td>
                        <td> <a id='BtnLstEditar' class='btn btn-md btn btn-primary  fa fa-edit pr-3' href='IBM_Carros_E.php?c=" . $registro_carro['ID'] . "'> Editar carro </a> 
                             <a id='BtnLstBorrar' class='btn btn-md btn btn-danger  fa fa-trash-alt pr-3' href='IBM_Carros_B.php?c=" . $registro_carro['ID'] . "'> Borrar carro</a> 
                             <a id='BtnLstPiezas' class='btn btn-md btn btn-success  fa fa-plus-square pr-3' href='IBM_Carros_Piezas.php?c=" . $registro_carro['ID'] . "'> Agregar refaccion</a> 
                             <a id='BtnLstVer' class='btn btn-ms btn btn-success fa fa-file-search pr-3' href='IBM_Carros_V.php?c=" . $registro_carro['ID'] . "'> Ver carro </a> </td>
                        </tr>";

                    }

                    $resultado_carro->closeCursor();

                } catch(Exception $e) {

                    die ('Error: ' . $e->getMessage());

                }

                $base = null;

            ?>

        </table>
    
    </div>

</body>
</html>