 <script src="<?php echo base_url()  ?>tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: "link image"
         });
          
        </script>

<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            
                     <div class="row clear_fix">
             
                <div class="col-md-12">
                    <form role="form" id="frmArticle" class="form" action="<?php echo base_url() ?>articulo/actualizar" method="POST" enctype='multipart/form-data'>
                        <?php
                        $atributos = array('style' 	=> 'display: none;','value'=>$row->id);
                        echo form_input_text('id', '', $atributos);
                         $atributos = array('style' 	=> 'text-align: center;','value'=>$row->post);
                echo form_input_text('titulo', 'Titulo', $atributos);
                $atributos = array('style' 	=> 'text-align: center;','value'=>$row->descripcion);
                echo form_input_text('descripcion', 'descripcion', $atributos);
                        ?>
                        <lablel>Content</lablel>
                        <textarea id="contenido" name="contenido" rows="8" class="form-control"></textarea>
                       <?php echo form_input_file('Selecciona una imagen'); ?>
                        <input class="btn btn-info btn-block" type="submit" value="modifica post" name="submit">
                    </form>

                </div>
             
                </div> 
<script>
    $(document).ready(function()
    {
          $("#contenido").val('<?php echo $row->contenido ?>');
    });
    </script>