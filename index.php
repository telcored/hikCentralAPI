<?php




    //aqui poner la direcion de la api
    $apiUrl = "https://v6.exchangerate-api.com/v6/76a4a67a34660542e07dc6a2/pair/USD/CLP/{$valor}";
    
    // aqui iniciamos una instancia de curl y le chantamos la varibable de arriba
    $iniciarCURL = curl_init($apiUrl);

    //una vez de esto ya podemos obtener el contenido, tomamos contenido y lo mandamos a una variable
    //con esto obtenemos y devolvemos los datos de la solicitud

    curl_setopt($iniciarCURL, CURLOPT_RETURNTRANSFER, true);

    //la siguiente variable ya tiene la respuesta
    $respuesta = curl_exec($iniciarCURL);
    //print_r($respuesta);

    //validamos que la URL exista
    if (curl_errno($iniciarCURL)) {

        //si hay un prpblema lo imprime y sale
        echo "Error en la solicitud " . curl_errno($iniciarCURL);
        exit;
    }

    //si esta ok, cierra el curl , no dejar como tu hermana
    curl_close($iniciarCURL);
    //guarda los datos en formado json
    
    $datos = json_decode($respuesta, true);

    print_r($datos['conversion_result']);



