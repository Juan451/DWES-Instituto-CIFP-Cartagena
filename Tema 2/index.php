<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .altoDch1 {color: #00f; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
	    .altoDch2 {color: #f00; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
            
            </style>
    </head>
    <body>
        <h1>Listado de vehiculos disponibles</h1>
        <?php 
                                       //Usamos la funcion error_reporting para no tener errores inesperados
                                        error_reporting(0);
						
                                              //Comprobamos que se han recibido los datos 'anteriores' por POST
						if (!empty($_POST['vehiculos'])) { 
								//Se crea un array con todos los datos antiguos indicándole que están separados por coma
								$array = explode("," , $_POST['vehiculos']);
								//almacenamos en 'pos' el número de elementos almacenados
								$pos = count($array);
						}else{
								// Si no hay datos antiguos, sólo reiniciamos las variables globales
								$array=array();
								$pos=0;
                                                                 
                                                                
                                                                  
						}
						if(!empty($_POST['coche']) && !empty($_POST['fecha'])){
							//Hemos introducido el nombre del vehiculo y la fecha 
        
								$nom=($_POST['coche']);
								$fecha = date(($_POST['fecha']));
                                                                //Si el nombre existe ya, almacenamos su índice, lo hacemos con la funcion array_search
								$si=existe($array,$nom);
                                                                //Damos un mensaje de que hemos añadido los datos 
                                                                echo "<div class='altoDch1'><p>DATOS AÑADIDOS</p></div>";
                                                                
								if(!empty($_POST['precio'])){
										// Hay nombre y precio
										$precio=$_POST['precio'];
                                                                                $codigo;
                                                                                //generamos el codigo a partir de una funcion predeterminada llamada rand(), 
                                                                                //que nos da un codigo aleatorio 
                                                                               
                                                                                $code = generacodigo($codigo); 
                                                                                
				                                                     //almacenamos los datos introducidos en cada posicion del array. 
												$array[$pos]=$nom;
												$array[$pos+1]=$precio;
                                                                                                $array[$pos+2]=$code;
                                                                                                
              
                                                                                                
										}
                                                                                     
                  
                                                                                }else{
                                                                                    //si no se ha introducido datos, lanzamos un mensaje de error
                                                                                    echo "<div class='altoDch2'><p>NO HA INTRODUCIDO DATOS</p></div>";
                                                                                }
                                                                    
                                                                
                                                                                                                                			                                                                                					
													
                                                //si el array tiene datos, los mostramos 
						if (count($array)>1){
								
								//recorremos el array con un bucle for, que nos salga por pantalla todos los datos del array fila a fila 
								for ($i=0 ; $i < count($array) ; $i+=3){
										if($array[$i]!==NULL && $array[$i+1]!==NULL){
                                                                                   
												echo "<div class='bajoDch'>".$array[$i]."//".$array[$i+1]." euros"."//".$array[$i+2]."//"."<br>"."</div>";
                                                                                               //salida por pantalla del array del coche,precio y codigo.
                                                                                                
                                                                                               
                                                                                }   
                                                                                
                                                                               
								}
                                                                
								
						}
                                                
                                                
                                                //codigo para introducir el codigo del vehiculo y que coincida con el codigo generado de cada coche para ser eliminado
                                                
                                                
                                                 if(!empty($_POST['codigocoche'])){
                                                            
                                                       echo "codigo no valido";

                                                             $codigocoche = ($_POST['codigocoche']);
                                                               
                                                              
                                                               
                                                              if($codigodelvehiculo === $codigocoche){  
                                                                   
                                                                
                                                                         
                                                                         
                                                                         unset($array[$si]);
                                                                         unset($array[$si+1]);
                                                                         unset($array[$si+2]);
                                                                         
                                                                         $array=array_values($array);
                                                                     }
                                                                     
                                                                }else{
                                                                    
                                                                    
                                                                }
                                                             
                                                              
                                                    
		                                //funcion que sirve para comprobar que existe el nombre del coche dentro de nuestro array $array.
						function existe($miArray,$miNom){
								$posicion=array_search($miNom,$miArray,false);
								return $posicion;
						} 
                                              
                                                //funcion predeterminada que nos genera un codigo aleatorio de 9 cifras.
                                                function generacodigo($codigo){
                                                      
                                                      $code = rand();
                                                        return $code;
                                                }
                                                
                                                     
                                                                  
                                                
                                        ?>
      
        

           
           
            <style type="text/css">.bajoDch{
              color: green; 
              
             }</style>
            
            
             =============================<br>
        
        <p>
        <h2>Suma de ventas acumuladas:<style type="text/css">.sumarcoches {color: #00f; float:left; position:absolute};</style><br></h2>
        </p>
        
        <p>
        <h3>Formulario para introducir nuevos vehiculos encontrados:</h3>
          <form name="formulario" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              Marca y Modelo del vehiculo:<input name="coche" type="text" /><br><div class="bajoDch"></div>
              <br>
              Fecha del hallazgo del vehiculo:<input name="fecha" type="date" /><br>
              <br>
              Precio de venta del vehiculo:<input name="precio" type="text" /><br>
              <br>
              <!--creamos un campo oculto para recoger los datos con atenriorirdad--->
		<input name="vehiculos" type="hidden" value="<?php if (isset($array)) echo implode("," , $array) ?>" style="text-align:right;" />
			<!-- Enviamos los datos del formulario -->
			<input type="submit" value="Introducir" /> 
        
         </p>         
        </form>
    </body>
</html>
