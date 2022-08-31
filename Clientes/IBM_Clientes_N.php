<html>
<head runat="server">
    <title> Clientes </title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0" />
    <meta http-equiv="x-ua-compatible" content="ie-edge" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />

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
            
                <a id="BtnNuevo" class="btn btn-md btn-secondary fa fa-plus-square pr-3"> Nuevo Cliente </a>
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

        <form id="PnlCampturaDatos" action="IBM_Clientes_N_SQL.php" method="post">
        
            <div class="container">
            
                <div class="card">
                
                    <div class="card-header text-center">
                        <h5 class="card-title"> Registro de nuevo cliente </h5>
                    </div>

                    <div class="card-body">
                    
                    <div class="row pl-2 pr-2">

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <p class="text-dark font-weight-bold"> Nombre </p>
                                <td><input type="text" name="TbNombreCliente" class="form-control" placeholder="Nombre del cliente" required></td>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <p class="text-dark font-weight-bold"> Apellido </p>
                                <td><input type="text" name="TbApellidoCliente" class="form-control" placeholder="Apellido del cliente"></td>
                            </div>
                        </div>

                    </div>

                    <div class="row pl-2 pr-2">

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <p class="text-dark font-weight-bold"> Telefono Celular </p>
                                <td><input type="text" name="TbCelularCliente" class="form-control" placeholder="Telefono celular del cliente" required></td>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <p class="text-dark font-weight-bold"> Telefono </p>
                                <td><input type="text" name="TbTelefonoCliente" class="form-control" placeholder="Telefono de la empresa"></td>
                            </div>
                        </div>
                    
                    </div>

                    <div class="row pl-2 pr-2">

                        <div class="col-12">
                            <div class="form-group">
                                <p class="text-dark font-weight-bold"> Correo Electronico </p>
                                <td><input type="text" name="TbEmailEmpresa" class="form-control" placeholder="Correo Electronico"></td>
                            </div>
                        </div>

                    </div>

                    <div class="row pl-2 pr-2">

                        <div class="col-12">
                            <div class="form-group">
                                <p class="text-dark font-weight-bold"> Nombre de la Empresa </p>
                                <td><input type="text" name="TbNombreEmpresa" class="form-control" placeholder="Nombre de la empresa"></td>
                            </div>
                        </div>

                    </div>

                    <div class="row pl-2 pr-2">

                        <div class="col-12">
                            <div class="form-group">
                                <p class="text-dark font-weight-bold"> RFC de la Empresa </p>
                                <td><input type="text" name="TbRFCEmpresa" class="form-control" placeholder="RFC de la empresa"></td>
                            </div>
                        </div>

                    </div>
                
                </div>

                <div class="card-footer text-muted">

                    <td><input type="submit" name="Grabar" value=" Grabar" class="btn btn-md btn btn-success fa fa-plus-square pr-3"></td>
                    <a id="BtnCancelar" class="btn btn-md btn btn-dark fa fa-times-circle pr-3" href="IBM_Clientes.php?case=0"> Cancelar </a>

                </div>
            
            </div>
        
        </form>
    
    </div>

</body>
</html>