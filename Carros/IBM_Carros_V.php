<html>
<head runat="server">
    <title> Carros </title>

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

        .form-comentario {
        display: block;
        width: 100%;
        height: 200px;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

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

    <div class="container">
    
        <h4> Registro de carros </h4>

        <div class="row bg-light border">
        
            <div class="col-lg-8 col-md-6 col-sm-6">
            
                <a id="BtnNuevo" class="btn btn-md btn-secondary fa fa-plus-square pr-3" href="IBM_Carros_SC.php"> Nuevo Carro </a>
                <a id="BtnMnuListado" class="btn btn-md btn-secondary fa fa-list-alt pr-3" href="IBM_Carros_Lista.php"> Listado </a>

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

        <?php

            try {

                $id = $_GET['c'];

                $base = new PDO('mysql:host=localhost; dbname=manolo', 'root', '');
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");

                $sql = "SELECT ID_CLIENTE, MODELO, FALLAS, ESTADO FROM CARROS WHERE ID = :id";

                $resultado = $base->prepare($sql);
                $resultado->execute(array(":id" => $id));

                $registro = $resultado->fetch();

                echo
                "<form>
        
                    <div class='container'>
            
                        <div class='card'>  

                            <div class='card-header text-center'>
                                <h5 class='card-title'> Informacion del carro </h5>";

                                if ( $registro['ESTADO'] != 0)
                                    echo "Este carro ya fue terminado/entregado";

                            echo
                            "</div>  

                            <div class='row pl-2 pr-2'>

                                <div class='col-12'>
                                    <div class='form-group'>
                                        <p class='text-dark font-weight-bold'> Modelo del carro </p>
                                        <td><input type='text' value='" . $registro['MODELO'] . "' name='TbModelo' class='form-control' placeholder='Modelo del carro' readonly></td>
                                    </div>
                                </div>

                            </div>

                            <div class='row pl-2 pr-2'>

                                <div class='col-12'>
                                    <div class='form-group'>
                                        <p class='text-dark font-weight-bold'> Fallas </p>
                                        <td><input type='text' value='" . $registro['FALLAS'] . "' name='TbFallas' class='form-comentario' placeholder='Defina las fallas del carro' readonly></td>
                                    </div>
                                </div>

                            </div>

                            <div>

                                <td><input type='text' class='oculta' value='" . $id . "' placeholder='id' name='id' id='id' readonly></td>
                                <td><input type='text' class='oculta' value='" . $registro['ID_CLIENTE'] . "' placeholder='id_c' name='id_c' id='id_c' readonly></td>

                            </div>
                            
                            <div class='row pl-2 pr-2'>";

                                $sql_piezas = "SELECT ID, NOMBRE, PRECIO
                                                FROM REFACCIONES
                                                WHERE ID_CARRO = '$id'";

                                $resultado_piezas = $base->prepare($sql_piezas);
                                $resultado_piezas->execute();
                                $vueltas = 0;
                                $total = 0;

                                while ($registro_piezas = $resultado_piezas->fetch(PDO::FETCH_ASSOC)) {

                                    echo "<div class='col-lg-6 col-md-12 col-12'>
                                            <div class='form-group'>";

                                    if ($vueltas == 0) 
                                         echo "<p class='text-dark font-weight-bold'> Refacciones </p>";

                                    echo
                                    "<td><input type='text' value='" . $registro_piezas['NOMBRE'] . "' name='TbRefaccion' class='form-control' placeholder='Nombre del cliente' readonly></td>
                                    </div>
                                    </div>
                                    <div class='col-lg-6 col-md-12 col-12'>
                                    <div class='form-group'>";

                                    if ($vueltas == 0) 
                                        echo "<p class='text-dark font-weight-bold'> Precio </p>";

                                    echo
                                    "<td><input type='text' value='$ " . $registro_piezas['PRECIO'] . ".00' name='TbRefaccion' class='form-control' placeholder='Nombre del cliente' readonly></td>
                                    </div>
                                    </div>";

                                    $vueltas = $vueltas + 1;
                                    $total = $total + $registro_piezas['PRECIO'];

                                }

                                if ($vueltas != 0) {

                                    echo 
                                    "<div class='col-lg-6 col-md-12 col-12'>
                                        <div class='form-group'>
                                            <td><input type='text' value=' TOTAL ' name='TbTotalTexto' class='form-control' placeholder='Nombre del cliente' readonly></td>
                                        </div>
                                    </div>
                                    <div class='col-lg-6 col-md-12 col-12'>
                                        <div class='form-group'>
                                            <td><input type='text' value='$ " . $total . ".00' name='TbTotalPrecio' class='form-control' placeholder='Nombre del cliente' readonly></td>
                                        </div>
                                    </div>";

                                }

                            echo
                            "</div>
                            <div class='card-footer text-muted'>

                                <a id='BtnLstEditar' class='btn btn-md btn btn-primary  fa fa-edit pr-3' href='IBM_Carros_E.php?c=" . $id . "'> Editar carro </a> 
                                <a id='BtnLstBorrar' class='btn btn-md btn btn-danger  fa fa-trash-alt pr-3' href='IBM_Carros_B.php?c=" . $id . "'> Borrar carro</a> 
                                <a id='BtnLstPiezas' class='btn btn-md btn btn-success  fa fa-plus-square pr-3' href='IBM_Carros_Piezas.php?c=" . $id . "'> Agregar refaccion</a>";

                                if( $registro['ESTADO'] == 0)
                                    echo "<a id='BtnLstPiezas' class='btn btn-md btn btn-primary  fa fa-check-square pr-3' href='IBM_Carros_Listo.php?c=" . $id . "'> Terminar </a>";

                                echo
                                "<a id='BtnCancelar' class='btn btn-md btn btn-dark fa fa-times-circle pr-3' href='IBM_Carros.php?case=0'> Cancelar </a>

                            </div>
            
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