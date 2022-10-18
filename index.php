<?php
    session_start();
    $url = dirname($_SERVER['SCRIPT_NAME']);                   // Obtém URL básica da aplicação Web
    $url = substr($url,strrpos($url,"\\/")+1,strlen($url));    // Retira 1o. '/'
    if (substr_count($url, '/') >= 1){                          
        $url = substr($url,strrpos($url,"\\/"),strlen($url));  // Retira 2o. '/', se ainda houver esse caracter
        $url = strstr($url, '/',true);
    }
    $url = "Location: /" . $url . "/medListar.php";	// Monta página para redirecionamento
    header($url);
?>