<?php
require_once __DIR__ . '/../repository/NomeListaRepository.php';
require_once __DIR__ . '/../model/NomeLista.php';

class NomeListaController extends NomeListaRepository
{

    public function inserirNomeNaLista()
    {
        $metodo = null;
        $nomeFestaAtual = "AmericanPie1.0";
        $retorno = null;

        $nomeLista = new NomeLista();

        $nomeLista->setNome($_POST['nome']);
        $nomeLista->setSexo($_POST['sexo']);
        $nomeLista->setNomeFesta($nomeFestaAtual);
        $nomeLista->setConfirmado('N');


        if (strcmp($metodo, 'inserirNomeNaLista')) {
            $this->inserirNomeNalistaRepo($nomeLista);
        }
    }

    public function listarTodosNomeNaLista()
    {
        $nomeFestaAtual = "AmericanPie1.0";
        return $this->recuperarListaDeNomes($nomeFestaAtual);
    }

    public function setVisualizador()
    {
        return $this->contabilizarViwes();
    }

    public function verificarNomeNaLista($nome)
    {
        $nomeFestaAtual = "AmericanPie1.0";
        return $this->validarNome($nome, $nomeFestaAtual);
    }

    public function carregarTotalLista()
    {
        $nomeFestaAtual = "AmericanPie1.0";
        return $this->carregarObjetoTotalLista($nomeFestaAtual);
    }
}

?>