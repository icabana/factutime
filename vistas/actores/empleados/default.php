<script type="text/javascript" src="js/vistas/actores/empleados/default.js"></script>


<div class="row">

    <div style="padding:25px" class="box-body table-responsive no-padding">

        <div class="card">
            <div class="card-header">
                <div class="box">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 style="color:grey">GESTIONAR EMPLEADOS</h4>
                        </div>
                        <div class="col-md-2">
                            <button onclick="nuevo_empleado(); return false;" class="btn btn-success btn-sm">
                                NUEVO EMPLEADO
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tabla_empleados" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style='background-color:lavender'>DOCUMENTO</th>
                            <th style='background-color:lavender'>DEPENDENCIA</th>
                            <th style='background-color:lavender'>NOMBRE DEL EMPLEADO</th>
                            <th style='background-color:lavender; width:15px'></th>
                            <th style='background-color:lavender; width:15px'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($empleados as $NM => $items) {

                            echo "<tr>";
                            
                            echo "<td>" . $items['codigo_tipodocumento']." ".$items['documento_empleado'] . "</td>";
                            echo "<td>" . $items['nombre_dependencia'] . "</td>";
                            echo "<td>" . $items['nombre_empleado'] . "</td>";

                            echo "<td><a href='#'><i onclick='editar_empleado(" . $items['id_empleado'] . ");' 
                                    class='fas fa-edit'></i></a></td>";

                            echo "<td><a href='#'><i onclick='eliminar_empleado(" . $items['id_empleado'] . ");' 
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