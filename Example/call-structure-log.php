<?php
    /***********************************************
    CALL-STRUCTURE-LOG.PHP - PARAMETERIZATION OF HANDLING ROUTINES AND TREATMENT OF LOG INFORMATION OUR APPLICATION.
    ***********************************************

    Copyright (c) 2020, Jeferson L. Souza INTERLIG SOLUÇÕES INTELIGENTES
    E-mail: contato@interligsolucoes.com.br
    Site: http://interligsolucoes.com.br*/

    ob_start();

    require 'Developers/Log.php';

    $datas = ["usuario" => "Jeferson Souza", "email" => "contato@interlig.com.br", "perfil"=> "Admin","sessao"=>"Logado"];

    $log = new \Developers\Log();
    $log->LogCreate("Login", "success", $datas);

    ob_end_flush();