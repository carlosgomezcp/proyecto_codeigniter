<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            
                <a href='<?= base_url()?>articulo/nuevo' class="btn bg-info"><h1>Crear Post</h1></a>
                <div class="row">
                    <h1>Tus Post</h1>
                </div>
                
                              
                <?php
                
                	$content  = "<div class='table-responsive'>";
		$content .= "<table class='table table-hover table-bordered table-condensed'>";
		$content .=	"<thead>";
		$content .=	"<tr>";  
			$content .= "<th style='text-align: center;'>Nombres del post</th>";
                        $content .= "<th style='text-align: center;'>Eliminar</th>";
                        $content .= "<th style='text-align: center;'>Modificar</th>";
		$content .=	"</tr>";
		$content .=	"</thead>";
		$content .=	"<tbody>";
               $id=0;
			foreach ($post->result_array() as $row) {
                             
				$content .= "<tr id='tr$id' >";
				foreach ($row as $key => $value) {
                                         
                                    if($key=="post"){
                                             
					$content .= "<td style='text-align: center;'>" . $value . "</td>";
                                          $date=datetime::createfromformat('Y-m-d',$row['fecha']);
                                          $year=$date->format("Y");
                                          $name= str_replace(" ","_",$row['post']);
                                         $content .= "<td style='text-align: center;'><a href='". base_url('articulo/Modificar')."/$year/$name' class='btn btn-primary'>Modificar</a></td>";
                                         $content .= "<td style='text-align: center;'><button class='btn btn-danger' name='$value' id='$id' >Eliminar</button></td>";
                                         }
				}
				$content .= "</tr>";
                                $id++;
			}
                        
		$content .=	"</tbody>";
		$content .=	"</table>";
		$content .= "</div>";
		echo $content;
               
                
                
                
                //send info to method test of controller welcome
                echo form_open("welcome/test");
                $atributos = array('style' 	=> 'text-align: center;');
                echo form_input_text('nombre', 'Ingresa nombre', $atributos);
                echo form_input_password('password','Ingresa contraseña', $atributos);
                 //echo form_input_checkbox('remember','Recordar');
                //echo form_input_radio('area','Valor 1', 'valor1');
                //echo form_input_radio('area','Valor 2', 'valor2');
                //echo form_input_radio('area','Valor 3', 'valor3');
               // echo form_input_textarea('area','ingresa una descripcion');
                //echo form_input_select("lol");
                //$options = array('1' => 1,'2' => 2);
                //echo select_options($options);
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

<script>
    $(document).ready(function()
    {
        $("button").on('click',function(e)
        {
          var name = $(this).attr('name');
          var id = $(this).attr('id');
        
       
        
        var request;
        if(request)
        {
            request.abort();
            
            
        }
       // var dataString = 'postname='+name+'&id='+id;
        var dataString = 'postname='+name;
          request = $.ajax({
         
           url:"<?php echo base_url('articulo/delete'); ?>",
           type:"POST",
           data:'postname='+name+'&id='+id
            }); 
      
      request.done(function(response,textStatus,jqXHR){
         
           $("#tr" + response).html("");
        });
        request.fail(function(jqXHR,textStatus,thrown){
            alert("Error"+textStatus);
        });
        request.always(function(){
            //alert("Proceso Terminado");
        });
          
        e.preventDefault();
        
         });
   
    });
</script>