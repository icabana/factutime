<script type="text/javascript">

    function nuevo_parametro() {

        abrirVentanaContenedor(
            'configuracion', 'Parametros', 'nuevo', '', ''
        );

    }

    function editar_parametro(id_parametro) {

        abrirVentanaContenedor(
            'configuracion',
            'Parametros',
            'editar',
            'id_parametro=' + id_parametro,
            ''
        );

    }

    function eliminar_parametro(id_parametro) {

        mensaje_confirmar("¿Está seguro de eliminar el parametro?", "eliminar_parametro2(" + id_parametro + "); ");

    }

    function eliminar_parametro2(id_parametro) {

        ejecutarAccion(
            'configuracion',
            'Parametros',
            'eliminar',
            "id_parametro=" + id_parametro,
            ' mensaje_alertas("success", "Parametro Eliminado con Éxito", "center"); cargar_parametros();'
        );

    }

    $(document).ready(function() {
        CrearTabla('tabla_parametros');
    });
</script>

<div class="row">


    <div style="padding:25px" class="box-body table-responsive no-padding">

        <div class="card">
            <div class="card-header">
                <div class="box">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 style="color:grey">GESTIONAR PARAMETROS</h4>
                        </div>
                        <div class="col-md-2">

                            <button onclick="nuevo_parametro(); return false;" class="btn btn-success btn-sm">
                                Nuevo Parametro
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
                            <th style='background-color:lavender'>PARAMETRO</th>
                            <th style='background-color:lavender'>VALOR</th>
                            <th style='background-color:lavender; width:15px'></th>
                            <th style='background-color:lavender; width:15px'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($parametros as $NM => $items) {

                            echo "<tr>";

                            echo "<td>" . utf8_encode(strtolower($items['nombre_parametro'])) . "</td>";

                            echo "<td>" . utf8_encode(strtolower($items['valor_parametro'])) . "</td>";

                            echo "<td><a href='#'><i onclick='editar_parametro(" . $items['id_parametro'] . ");' 
                                    class='fas fa-edit'></i></a></td>";

                            echo "<td><a href='#'><i onclick='eliminar_parametro(" . $items['id_parametro'] . ");' 
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