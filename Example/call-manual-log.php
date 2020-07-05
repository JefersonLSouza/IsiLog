<?php
/*
    ***********************************************
    CALL-MANUAL-LOG.PHP - PARAMETERIZATION OF HANDLING ROUTINES AND TREATMENT OF LOG INFORMATION OUR APPLICATION.
    ***********************************************

    Copyright (c) 2020, Jeferson L. Souza INTERLIG SOLUÇÕES INTELIGENTES
    E-mail: contato@interligsolucoes.com.br
    Site: http://interligsolucoes.com.br/
*/
    ob_start();

    require 'Developers/Log.php';

    $Name = "Acesso Simultâneo";
    $data = "
        URL: ".__DIR__."
        IP: {$_SERVER['REMOTE_ADDR']}
        NAVEGADOR: {$_SERVER['HTTP_USER_AGENT']}
        PORTA: {$_SERVER['REMOTE_PORT']}

        Resultados do {$Name}:
        User: Jeferson L. Souza
        E-mail: contato@interligsolucoes.com.br
        Level: Admin
        Session: Logado

        Status: success";

    $log = new \Developers\Log();
    $log->LogManual($Name, $data);

    ob_end_flush();