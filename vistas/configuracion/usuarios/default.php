<script type="text/javascript">

    function nuevo_usuario() {

        abrirVentanaContenedor(
            'configuracion', 'Usuarios', 'nuevo', '', ''
        );

    }

    function editar_usuario(id_usuario) {

        abrirVentanaContenedor(
            'configuracion',
            'Usuarios',
            'editar',
            'id_usuario=' + id_usuario,
            ''
        );

    }

    function eliminar_usuario(id_usuario) {

        mensaje_confirmar("¿Está seguro de eliminar el usuario?", "eliminar_usuario2(" + id_usuario + "); ");

    }

    function eliminar_usuario2(id_usuario) {

        ejecutarAccion(
            'configuracion',
            'Usuarios',
            'eliminar',
            "id_usuario=" + id_usuario,
            ' mensaje_alertas("success", "Usuario Eliminado con Éxito", "center"); cargar_usuarios();'
        );

    }

    $(document).ready(function() {
        CrearTabla('tabla_usuarios');
    });
</script>

<div class="row">


    <div style="padding:25px" class="box-body table-responsive no-padding">

        <div class="card">
            <div class="card-header">
                <div class="box">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 style="color:grey">GESTIONAR USUARIOS</h4>
                        </div>
                        <div class="col-md-2">

                            <button onclick="nuevo_usuario(); return false;" class="btn btn-success btn-sm">
                                Nuevo Usuario
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
                            <th style='background-color:lavender'>NICK</th>
                            <th style='background-color:lavender'>ESTADO</th>
                            <th style='background-color:lavender'>ROL</th>
                            <th style='background-color:lavender; width:15px'></th>
                            <th style='background-color:lavender; width:15px'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($usuarios as $NM => $items) {

                            echo "<tr>";

                            echo "<td>" . utf8_encode(strtolower($items['nick_usuario'])) . "</td>";

                            if ($items['estado_usuario'] == '1') {
                                echo "<td>Activo</td>";
                            } else {
                                echo "<td>Inactivo</td>";
                            }

                            echo "<td>" . utf8_encode(strtolower($items['nombre_rol'])) . "</td>";

                            echo "<td><a href='#'><i onclick='editar_usuario(" . $items['id_usuario'] . ");' 
                                    class='fas fa-edit'></i></a></td>";

                            echo "<td><a href='#'><i onclick='eliminar_usuario(" . $items['id_usuario'] . ");' 
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