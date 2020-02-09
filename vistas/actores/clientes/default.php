<script type="text/javascript" src="js/vistas/actores/clientes/default.js"></script>

<div class="row">

    <div style="padding:25px" class="box-body table-responsive no-padding">

        <div class="card">

            <div class="card-header">
                <div class="box">
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

            
            <div class="card-body">
                <table id="tabla_clientes" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style='background-color:lavender'>Tipo de Cliente</th>
                            <th style='background-color:lavender'>Documento</th>
                            <th style='background-color:lavender'>Nombre del Cliente</th>
                            <th style='background-color:lavender; width:15px'></th>
                            <th style='background-color:lavender; width:15px'></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($clientes as $cliente) {

                        echo "<tr>";
                        
                        echo "<td>".$cliente['nombre_tipo'] . "</td>";
                        echo "<td>".$cliente['codigo_tipodocumento']." ".$cliente['nombre_tipodocumento']."</td>";
                        echo "<td>".$cliente['nombre_cliente'] . "</td>";

                        echo "<td><a href='#'><i onclick='editar_cliente(" . $cliente['id_cliente'] . ");' 
                                class='fas fa-edit'></i></a></td>";

                        echo "<td><a href='#'><i onclick='eliminar_cliente(" . $cliente['id_cliente'] . ");' 
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