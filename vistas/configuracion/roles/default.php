<script type="text/javascript">

    function nuevo_rol() {

        abrirVentanaContenedor(
            'configuracion', 'Roles', 'nuevo', '', ''
        );

    }

    function editar_rol(id_rol) {

        abrirVentanaContenedor(
            'configuracion',
            'Roles',
            'editar',
            'id_rol=' + id_rol,
            ''
        );

    }

    function eliminar_rol(id_rol) {

        mensaje_confirmar("¿Está seguro de eliminar el rol?", "eliminar_rol2(" + id_rol + "); ");

    }

    function eliminar_rol2(id_rol) {

        ejecutarAccion(
            'configuracion',
            'Roles',
            'eliminar',
            "id_rol=" + id_rol,
            ' mensaje_alertas("success", "Rol Eliminado con Éxito", "center"); cargar_roles();'
        );

    }

    $(document).ready(function() {
        CrearTabla('tabla_roles');
    });
</script>

<div class="row">


    <div style="padding:25px" class="box-body table-responsive no-padding">

        <div class="card">
            <div class="card-header">
                <div class="box">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 style="color:grey">GESTIONAR ROLES</h4>
                        </div>
                        <div class="col-md-2">

                            <button onclick="nuevo_rol(); return false;" class="btn btn-success btn-sm">
                                NUEVO ROL
                            </button>

                        </div>
                    </div>
                </div>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style='background-color:lavender'>NOMBRE</th>
                            <th style='background-color:lavender; width:15px'></th>
                            <th style='background-color:lavender; width:15px'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($roles as $NM => $items) {

                            echo "<tr>";

                            echo "<td>" . utf8_encode(strtolower($items['nombre_rol'])) . "</td>";


                            echo "<td><a href='#'><i onclick='editar_rol(" . $items['id_rol'] . ");' 
                                    class='fas fa-edit'></i></a></td>";

                            echo "<td><a href='#'><i onclick='eliminar_rol(" . $items['id_rol'] . ");' 
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