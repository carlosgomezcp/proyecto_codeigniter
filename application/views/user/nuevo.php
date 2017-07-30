<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            
                
                <?php
                //send info to method test of controller welcome
               // echo form_open("articulo/insert");
                //para enviar imagenes
                echo form_open_multipart("articulo/insert");
                $atributos = array('style' 	=> 'text-align: center;');
                echo form_input_text('titulo', 'Titulo', $atributos);
                echo form_input_text('descripcion', 'descripcion', $atributos);
                
                 //echo form_input_checkbox('remember','Recordar');
                //echo form_input_radio('area','Valor 1', 'valor1');
                //echo form_input_radio('area','Valor 2', 'valor2');
                //echo form_input_radio('area','Valor 3', 'valor3');
                echo form_input_textarea('contenido','contenido del post');
                //echo form_input_select("lol");
                //$options = array('1' => 1,'2' => 2);
                //echo select_options($options);
                echo form_input_file('Selecciona una imagen');
                echo form_submit("Enviar formulario");
                echo form_close();

                // send file to method uploadTest of controller welcome
                //echo form_open_multipart("welcome/uploadTest");
                //echo form_input_file('Selecciona una imagen');
                //echo form_submit("Enviar formulario");
                //echo form_close();
?>
            </div>
        </div>
</div>
