<?php

require_once 'db.php';
require_once 'login.php';
try{
    //consulta do buscando, por nomes ($palavras)
    $pessoaTabela = ("SELECT * FROM pessoa WHERE nome LIKE '%$palavra%'");
    $seleciona    = $conn->prepare($pessoaTabela);
    $seleciona->execute();

    //consulta dos perfis
    $selecionaPerfil = ("SELECT * FROM perfis");
    $perfil = $conn->prepare($selecionaPerfil);
    $perfil->execute();
}catch (PDOException $e){
    echo $e->getMessage()."<br>"."Ops: Deu algum erro com o banco, verifique sua conexão!";
};