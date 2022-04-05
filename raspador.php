<?php 

	if($_GET["municipio"]!=""){
		$localidad = strtolower($_GET["municipio"]);
		$localidad = trim($localidad);
		$localidad = str_replace(" ", "-", $localidad);

		echo $localidad;
		$url = "https://www.tiempo.com/".$localidad.".htm";

		$contenido = file_get_contents($url);

		if(strlen($contenido)>1000){
			$posfinhead = strpos($contenido, '</head>');
			$posinic = strpos($contenido, 'class="franjas');
			$posfin = strpos($contenido, 'class="creatividad"');
			$stringpantalla = substr(file_get_contents($url), 0, ($posfinhead))."".substr(file_get_contents($url), $posinic, ($posfin-$posinic));
			
			echo "posicion inicial: ".$posinic;
			echo "posicion final: ".$posfin;
			echo $stringpantalla;
		} else {
			echo "nombre de municipio no valido";
		}
	} else { echo "";}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	</style>

    <title>Document</title>
</head>
<body>

<form >
    <input type="text" name="municipio" id="texto" placeholder="introduczca municipio">
    <input type="submit" value="go!">
</form>
    <script type="text/javascript">
       /* 
        $("#start").click(function(e){
            url = "https://www.tiempo.com/"+ $("#texto").val() + ".htm";
            alert(url);

        });*/
    </script>
</body>
</html>