<?php
error_reporting(0);
if (basename($_SERVER["PHP_SELF"]) === basename(__FILE__)) {
    header('HTTP/1.0 403 Forbidden');
    header("Location: ../index.php");
    die();
}

// DADOS DA HOSPEDAGEM
$endereco = "sql103.epizy.com";
$usuario = "epiz_30164496";
$senha = "DrL6xC57Bo9rn";
$banco = "epiz_30164496_iptv";

// HORA PAINEL
date_default_timezone_set('America/Sao_Paulo');

// DATA PAINEL
$t = date('d-m-Y');
$dayNum = strtolower(date("d",strtotime($t)));
$dayNum = intval($dayNum);

// CONEXÃO PAINEL
if (mysqli_connect($endereco, $usuario, $senha, $banco)) {
    $conexao = mysqli_connect($endereco, $usuario, $senha, $banco);
} else {
    echo "Erro na conexão com o banco de dados!";
    die();
}
$q1 = 'UPDATE usuario SET uso = uso + 1, uso_dia = '.$dayNum.' WHERE uso_dia != '.$dayNum.'';
$q2 = 'UPDATE usuario SET estado_usuario = 0, uso = 0 WHERE dia = '.$dayNum.' and uso >= 1';
mysqli_query($conexao, $q1);	
mysqli_query($conexao, $q2);
