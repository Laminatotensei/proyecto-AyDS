<html>
<head runat="server">
    <title> Borrar cliente </title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0" />
    <meta http-equiv="x-ua-compatible" content="ie-edge" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />

    <link href="../CSS/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../CSS/cssVentas.css" rel="stylesheet" type="text/css" />

    <script src="../JavaScript/bootstrap.js"></script>
    <script src="../JavaScript/bootstrap.min.js"></script>

    <style>

        .oculta {
            opacity: 0;
            visibility: hidden;
            display: none;
            position: absolute;
            top: -9999px;
            width: 0;
            height: 0;
            margin: 0;
            padding: 0;
            border: 0;
            line-height: 0; /* sólo en caso de elementos inline-block */
            overflow: hidden;
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
            clip-path: polygon(1px 1px, 1px 1px, 1px 1px);
        }

    </style>

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
                    <a class="nav-link" href="IBM_Clientes.php?case=0">Clientes</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="../Carros/IBM_Carros.php?case=0">Carros</a>
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

    <div class="container">
    
        <h4> Registro de clientes </h4>

        <div class="row bg-light border">
        
            <div class="col-lg-8 col-md-6 col-sm-6">
            
                <a id="BtnNuevo" class="btn btn-md btn-secondary fa fa-plus-square pr-3" href="IBM_Clientes_N.php"> Nuevo Cliente </a>
                <a id="BtnMnuListado" class="btn btn-md btn-secondary fa fa-list-alt pr-3" href="IBM_Clientes_Lista.php"> Listado </a>

            </div>

            <form class="col-lg-4 col-md-6 col-sm-6" action="IBM_Clientes_Busqueda.php" method="post">
            
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

        <?php

            try {

                $id = $_GET['c'];

                $base = new PDO('mysql:host=localhost; dbname=manolo', 'root', '');
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");

                $sql = "SELECT NOMBRE, APELLIDO, CELULAR, TELEFONO, EMAIL, EMPRESA, RFC FROM CLIENTES WHERE ID = :id";

                $resultado = $base->prepare($sql);
                $resultado->execute(array(":id" => $id));

                $registro = $resultado->fetch();

                echo
                "<form id='PnlEditarDatos'>
        
                    <div class='container'>
            
                        <div class='card'>
                
                            <div class='card-header text-center'>
                                <h5 class='card-title'> Informacion del cliente </h5>
                            </div>

                            <div class='card-body'>

                            <div class='row pl-2 pr-2'>

                                <div class='col-lg-6 col-md-12 col-12'>
                                    <div class='form-group'>
                                        <p class='text-dark font-weight-bold'> Nombre </p>
                                        <td><input value='" . $registro['NOMBRE'] . "' type='text' name='TbNombreCliente' class='form-control' placeholder='Nombre del cliente' readonly></td>
                                    </div>
                                </div>

                                <div class='col-lg-6 col-md-12 col-12'>
                                    <div class='form-group'>
                                        <p class='text-dark font-weight-bold'> Apellido </p>
                                        <td><input value='" . $registro['APELLIDO'] . "' type='text' name='TbApellidoCliente' class='form-control' placeholder='Apellido del cliente' readonly></td>
                                    </div>
                                </div>

                            </div>

                            <div class='row pl-2 pr-2'>

                                <div class='col-lg-6 col-md-12 col-12'>
                                    <div class='form-group'>
                                        <p class='text-dark font-weight-bold'> Telefono Celular </p>
                                        <td><input value='" . $registro['CELULAR'] . "' type='text' name='TbCelularCliente' class='form-control' placeholder='Telefono celular del cliente' readonly></td>
                                    </div>
                                </div>

                                <div class='col-lg-6 col-md-12 col-12'>
                                    <div class='form-group'>
                                        <p class='text-dark font-weight-bold'> Telefono </p>
                                        <td><input value='" . $registro['TELEFONO'] . "' type='text' name='TbTelefonoCliente' class='form-control' placeholder='Telefono de la empresa' readonly></td>
                                    </div>
                                </div>
                    
                            </div>

                            <div class='row pl-2 pr-2'>

                                <div class='col-12'>
                                    <div class='form-group'>
                                        <p class='text-dark font-weight-bold'> Correo electronico </p>
                                        <td><input value='" . $registro['EMAIL'] . "' type='text' name='TbEmailCliente' class='form-control' placeholder='Correo electronico' readonly></td>
                                    </div>
                                </div>

                            </div>

                            <div class='row pl-2 pr-2'>

                                <div class='col-12'>
                                    <div class='form-group'>
                                        <p class='text-dark font-weight-bold'> Nombre de la Empresa </p>
                                        <td><input value='" . $registro['EMPRESA'] . "' type='text' name='TbNombreEmpresa' class='form-control' placeholder='Nombre de la empresa' readonly></td>
                                    </div>
                                </div>

                            </div>

                            <div class='row pl-2 pr-2'>

                                <div class='col-12'>
                                    <div class='form-group'>
                                        <p class='text-dark font-weight-bold'> RFC de la empresa </p>
                                        <td><input value='" . $registro['RFC'] . "' type='text' name='TbRFCEmpresa' class='form-control' placeholder='RFC de la empresa' readonly></td>
                                    </div>
                                </div>

                            </div>

                            <td><input type='text' class='oculta' value='" . $id . "' placeholder='id' name='id' id='id' readonly></td>
                
                        </div>

                        <div class='card-footer text-muted'>

                            <a id='BtnLstEditar' class='btn btn-md btn btn-primary  fa fa-edit pr-3' href='IBM_Clientes_E.php?c=" . $id . "'> Editar </a> 
                            <a id='BtnLstBorrar' class='btn btn-md btn btn-danger  fa fa-trash-alt pr-3' href='IBM_Clientes_B.php?c=" . $id . "'> Borrar </a>
                            <a id='BtnCancelar' class='btn btn-md btn btn-dark fa fa-times-circle pr-3' href='IBM_Clientes.php?case=0'> Volver </a> 

                        </div>
            
                    </div>
        
                </form>";

            } catch(Exception $e) {

                die ('Error: ' . $e->getMessage());

            }

            $base = null;

        ?>
    
    </div>

</body>
</html>