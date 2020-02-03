<script type="text/javascript" src="js/vistas/actores/clientes/default.js"></script>

<div class="row">

    <div style="padding:25px" class="box-body table-responsive no-padding">

        <div class="card">
            <div class="card-header">
                <div class="box">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 style="color:grey">GESTIONAR CLIENTES</h4>
                        </div>
                        <div class="col-md-2">
                            <button onclick="nuevo_cliente(); return false;" class="btn btn-success btn-sm">
                                NUEVO CLIENTE
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tabla_clientes" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style='background-color:lavender'>DOCUMENTO</th>
                            <th style='background-color:lavender'>DEPENDENCIA</th>
                            <th style='background-color:lavender'>NOMBRE DEL CLIENTE</th>
                            <th style='background-color:lavender; width:15px'></th>
                            <th style='background-color:lavender; width:15px'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($clientes as $NM => $items) {

                            echo "<tr>";
                            
                            echo "<td>" . $items['codigo_tipodocumento']." ".$items['documento_cliente'] . "</td>";
                            echo "<td>" . $items['nombre_dependencia'] . "</td>";
                            echo "<td>" . $items['nombres_cliente']."  ".$items['apellidos_cliente'] . "</td>";

                            echo "<td><a href='#'><i onclick='editar_cliente(" . $items['id_cliente'] . ");' 
                                    class='fas fa-edit'></i></a></td>";

                            echo "<td><a href='#'><i onclick='eliminar_cliente(" . $items['id_cliente'] . ");' 
                                    class='fas fa-trash'></i></a></td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>