<?php
use KKiernan\CaesarCipher;
use StringToColor\Support\ColorParser;
$encrypted="";
$stringToColor="";
$decrypted="";
if (isset($_REQUEST['cifrar']))
{
    
    
    require __DIR__ . '/vendor/autoload.php';
        
    $cipher = new CaesarCipher();
    $mensaje_original=$_POST['mensaje_original'];
    $desplazamiento=$_POST['desplazamiento'];
    //$key = 12;
    $encrypted = $cipher->encrypt($mensaje_original,$desplazamiento );
    //echo $encrypted."\n";
    $decrypted = $cipher->decrypt($encrypted, $desplazamiento);
    //echo $decrypted."\n";
    $stringToColor = new \StringToColor\StringToColor();
    $stringToColor = $stringToColor->handle($encrypted);
    //echo $stringToColor;
}

echo'

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
</head>

<body style="background-color:'.$stringToColor.';">


    <div class="row">

        <div class="col s12  blue center-align card-panel teal lighten-2">
            <h4>Examen Despliegue Aplicaciones Web</h4>
        </div>
        
        <div class="col s9  ">
            
            <p>En criptografía, el cifrado César ( Packagist --> kkiernan/caesar-cipher), también conocido como cifrado por desplazamiento, 
            código de César o desplazamiento de César, es una de las técnicas de cifrado más simples y más usadas. 
            Es un tipo de cifrado por sustitución en el que una letra en el texto original es reemplazada por otra 
            letra que se encuentra un número fijo de posiciones más adelante en el alfabeto.
            <br>
            Por ejemplo, con un desplazamiento de 3, la A sería sustituida por la D (situada 3 lugares a la derecha de la A),
            la B sería reemplazada por la E, etc.<br>
            </p>
            <p align="center">
               <img src="imagenes/cesar.jpg" alt="cesar" width="270" height="120" />

            </p>
        
            
        </div>
        <aside>
                    <h5>Enlace Heroku </h5>
                    Pulsa sobre esta imagen para ver desplegada la aplicacion sobre heroku
                    <p>
                    <a title="Heroku" href=""><img src="imagenes/heroku.png" alt="Heroku" width="100" height="100" /></a>
                    </p>
        </aside>
        <form class="col s12" method="POST" action="index.php">
        <div class="row">
            <!-- el "for" del label tiene que asociarse a la ID del input, no al nombre,
                 sino, al hacer click sobre el texto en el navegador, este no se quita para escribir -->
            <div class="col s12">
                <div class="input-field col s7">
                    <label for="mensaje_original">Mensaje a Cifrar</label>
                    <input name="mensaje_original" type="text" class="validate" id="mensaje_original" required>
                </div>
               
                <div class="input-field col s1">
                    <label for="desplazamiento">Desplazamiento </label>
                    <input name="desplazamiento" type="text" class="validate" id="desplazamiento" required>
                   
                </div>
            </div>
            
               

                <div class="row "></div> <!-- linea en blanco -->
                <div class="col s4">

                    <button class="btn waves-effect waves-light" type="submit" name="cifrar">Cifrar

                    </button>

                </div>

                <div class="col s12">
                    <div class="input-field col s7">
                        <label for="mensaje_cifrado">Mensaje Cifrado</label>
                        <input name="mensaje_cifrado" type="text" class="validate" value="'.$encrypted.'" >
                    </div>
                    <div class="input-field col s7">
                        <label for="color">Color asociado a el mensaje Original ( https://github.com/gomzyakov/string-to-color )</label>
                        <input name="color" type="text" class="validate" value="'.$stringToColor.'" >
                    </div>
                </div>
               
                
            </div>
                
        </div>
        </form>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>';



