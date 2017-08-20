 <script src="<?php echo base_url()  ?>tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: "link image"
         });
          
        </script>
        
         <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
   
    <header id="headerimg" class="intro-header" style="background-image: url('<?= base_url() ?>public/img/<?= $img ?>')">
       
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-8 ">
                    <div class="site-heading">
                         <form role="form" id="changeimg" class="form" action="<?php echo base_url() ?>articulo/actualizarImg" method="POST" enctype='multipart/form-data'>
                        <?php
                        $atributos = array('style' 	=> 'display: none;','value'=>$row->id);
                        echo form_input_text('id', '', $atributos);
                        ?>
                         <?php echo form_input_file('Selecciona una imagen'); ?>
                        <input class="btn btn-info btn-block" type="submit" value="modifica post" name="submit">
                        <!-- <input type="button" id="btn-ingresar" value="Ingresar" class="btn btn-info btn-block" />-->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
     <div id="prueba" class="container">eee</div>


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
                        <input class="btn btn-info btn-block" type="submit" value="modifica post" name="submit ">
                    </form>

                </div>
             
                </div> 
                
<script>
   $(document).ready(function()
    {
          $("#contenido").val('<?php echo $row->contenido ?>');
          
           $("#changeimg").submit(function(e)
        {
           
        var request;
        if(request)
        {
            request.abort();
            
            
        }
       
        
        var $form=$(this);
        var $inputs=$form.find("input,select,button,textarea");
         
        
        var formData=new FormData(document.getElementById("changeimg"));;
        var formDataSerialized=$(this).serialize();
        
       
        
          
        $inputs.prop("disabled",true);
        
        
      
          request = $.ajax({
           cache:false,
           contentType:false,
           processData:false,
           url:$(this).attr('action'),
           type:$(this).attr('method'),
           data:formData
            }); 
      
      request.done(function(response,textStatus,jqXHR){
          
          //console.log(response);
        
          if(response.indexOf("http")>-1){
              //  $("#prueba").html(response);
              $('#headerimg').css('background-image', 'url(' + response + ')');
              
          }else{
              alert("no es posible cargar la imagen")
          }
        });
        request.fail(function(jqXHR,textStatus,thrown){
             alert("no es posible cargar la imagenn")
        });
        request.always(function(){
            $inputs.prop("disabled",false);

        });
          
        e.preventDefault();
        
         });
    });
    </script>