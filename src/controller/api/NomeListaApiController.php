<?php
require_once __DIR__ . '/../NomeListaController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'inserirNomeNaListaApiController') {
    $nomeLista = new NomeListaController();
    $nomeLista->inserirNomeNaLista($_POST);
}

if (isset($_GET['carregaLista'])) {
    $nomeLista = new NomeListaController();
    $nomeLista = $nomeLista->listarTodosNomeNaLista();

    echo json_encode($nomeLista);
}

if (isset($_GET['nomeExistente'])) {
    $nomeLista = new NomeListaController();
    $nome = $nomeLista->verificarNomeNaLista($_GET['nomeExistente']);

    echo json_encode($nome);
}

if (isset($_GET['carregarTotal'])) {
    $nomeLista = new NomeListaController();
    $nome = $nomeLista->carregarTotalLista();

    echo json_encode($nome);
}

if (isset($_GET['idNomeConfirmar'])) {
    $nomeLista = new NomeListaController();
    $retorno = $nomeLista->confirmarPresenca($_GET['idNomeConfirmar']);

    echo json_encode($retorno);
}

?>