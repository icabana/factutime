<?php

    include("classes/easy_upload/upload_class.php");

    $upload = new file_upload();

    $upload->upload_dir = '../../archivos/uploads/'.$_POST['id_analisis_upload'].'/';
    $upload->extensions = array('.png', '.jpg', '.zip', '.pdf', '.doc', '.docx', '.xls', '.xlsx'); // specify the allowed extensions here
    $upload->rename_file = false;

    if(!empty($_FILES)) {
        
        $upload->the_temp_file = $_FILES['userfile']['tmp_name'];
        $upload->the_file = $upload->quitar_tildes($_FILES['userfile']['name']);
        $upload->http_error = $_FILES['userfile']['error'];
        $upload->do_filename_check = 'n';                 

        if ($upload->upload()){

                echo '<div id="status">success</div>';
                echo "<div id='message'>Archivo Cargado Ex&iacute;tosamente <script>".$_POST['funcion_actualizar']."</script></div>";  
                echo '<div id="uploadedfile">'. $upload->file_copy .'</div>';

        } else {

                echo '<div id="status">failed</div>';
                echo '<div id="message"></div>';

        }  
            
    }
        
?>