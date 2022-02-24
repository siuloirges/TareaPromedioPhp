<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promedio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="loading.css">
</head>

    <?php

        $NOTA1  = $_REQUEST['NOTA_1']??'';
        $NOTA2  = $_REQUEST['NOTA_2']??'';
        $NOTA3  = $_REQUEST['NOTA_3']??'';
        $NOMBRE = $_REQUEST['NOMBRE']??'';

        function is_Completed(){
            return $NOTA1 && $NOTA2 && $NOTA3 && $NOMBRE;
        }

    ?>

<body>


    <div class="head">
        <h2>Calcula Tu Promedio</h2>&nbsp &nbsp
        <ion-icon name="calculator-outline" class="iconHead"></ion-icon>
    </div>
    
    <div class="contenedor">

        <div class="card form">

            <form action="">

                <div class="row">

                <div class="searchBox">
                    <div class="columnStart">
                        <label for="">Nombre</label>
                        <br>
                        <input id="name" type="text" value="<?php echo $NOMBRE ?>" placeholder="SERGIO VEGA"  name="NOMBRE" required>
                    </div>
                </div>
                </div>
                <br>
        

                <div class="columnStart">
                    <label for="">&nbsp &nbspNota 1 - 35%</label>
                    <div class="searchBox">
                        <div class="shadow"></div>
                        <input id="nota1" type="text"    required value="<?php echo $NOTA1 ?>" placeholder="0 ~ 5" name="NOTA_1">
                    </div>
                </div>

                <div class="columnStart">
                <label for="">&nbsp &nbspNota 2 - 35%</label>
                    <div class="searchBox">
                        <div class="shadow"></div>
                        <input id="nota2" type="text"    required value="<?php echo $NOTA2 ?>" placeholder="0 ~ 5" name="NOTA_2">
                    </div>
                </div>

                <div class="columnStart">
                <label for="">&nbsp &nbspNota 3 - 30%</label>
                    <div class="searchBox">
                        <div class="shadow"></div>
                        <input id="nota3"  type="text"  min="0" max="5" required value="<?php echo $NOTA3 ?>" placeholder="0 ~ 5" name="NOTA_3">
                    </div>
                </div>


                <div class="botones">
                    <input type="reset" value="Limpiar" class="botonEnviar" onclick=" location.replace('/CalcularPromedio/index.php'); "></input>
                    <input id="send" type="submit" value="Calcular" class="botonEnviar" onclick="calcular()"></input>
                </div>

              
            </form>
        </div>

        <div class="card result" id="result" data-tilt data-tilt-reverse="true" data-tilt-max-glare="0.8">

            <?php 


                 sleep(3);  
                if( $NOTA1 != null  && $NOTA2 != null && $NOTA3 != null && $NOMBRE != null ){
                  
                    $CORTE1 = $NOTA1 === 0? 0 :( $NOTA1 * 35 ) / 100;
                    $CORTE2 = $NOTA2 === 0? 0 :( $NOTA2 * 35 ) / 100;
                    $CORTE3 = $NOTA3 === 0? 0 :( $NOTA3 * 30 ) / 100;

                    $DEFINITIVA =round($CORTE1 + $CORTE2 + $CORTE3, 1); ;
                    $ICON = '';
                    $MENSAJE = '';

                    if($DEFINITIVA < 3.0){
                        $ICON = '<ion-icon name="sad-outline" class="iconResultBad" style="height:15px;"></ion-icon>';
                    }else{
                        $ICON = '<ion-icon name="happy-outline" class="iconResult" style="height:15px;" ></ion-icon>';
                    }
                    $MENSAJE = 'El Estudiante <strong>'. $NOMBRE.'</strong> <br> Tiene un promedio de: <br><br>';

              
                        echo '<div class="column">
                        
                            <span style="margin-top:50px;margin-bottom:50px">'.$ICON.'</span>
                            <br>
                            <p>'.$MENSAJE.'</p>
                            <h1 class="typing" style="margin:10px;--i:'.(strlen($DEFINITIVA)+1).'ch;--j:'.(strlen($DEFINITIVA)+1).';" >'. $DEFINITIVA.'</h1>
                   
                            </div>';

                }
            ?>


        </div>

    
    </div>


        <script>
            setInterval( validate, 1000);
                
            function calcular(){
                validate();
                if( document.getElementById('nota1').value != '' && document.getElementById('nota2').value && document.getElementById('nota3').value && document.getElementById('name').value){   
                  document.getElementById('result').innerHTML  ='<div class="lds-heart"><div></div></div>';
                }
             }   
             
             function validate(){

                 document.getElementById('nota1').value = document.getElementById('nota1').value.replace('$', '').replace(',', '').replace(/[~!@#$%^&*()_|+\-=?;:'",<>\{\}\[\]\\\/ A-z]/g, '');
                 document.getElementById('nota2').value = document.getElementById('nota2').value.replace('$', '').replace(',', '').replace(/[~!@#$%^&*()_|+\-=?;:'",<>\{\}\[\]\\\/ A-z]/g, '');
                 document.getElementById('nota3').value = document.getElementById('nota3').value.replace('$', '').replace(',', '').replace(/[~!@#$%^&*()_|+\-=?;:'",<>\{\}\[\]\\\/ A-z]/g, '');
                 
                 if( document.getElementById('nota1').value  > 5 ){
                    document.getElementById('nota1').value = 5;
                 }

                 if( document.getElementById('nota2').value  > 5 ){
                    document.getElementById('nota2').value = 5;
                 }

                 if( document.getElementById('nota3').value  > 5 ){
                    document.getElementById('nota3').value = 5;
                 }
                

                
                
           
             }
        </script>    
        <script type="text/javascript" src="vanilla-tilt.js"></script>    
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>