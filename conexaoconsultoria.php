<?php

$servidor = "localhost";
$banco = "id18902137_consultoria";
$usuario = "id18902137_mendes";
$senha = "e!N[AE]TIW1$*xKY";
$porta = "3306";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

if(!$conn){
    die("A conexão falhou: " . mysqli_connect_error());
}
?>