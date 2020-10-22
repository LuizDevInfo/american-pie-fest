<?php
require_once __DIR__ . '/../connection/PdoCon.php';

class NomeListaRepository extends PdoCon
{
    private $pdoCon;
    private $conexao;


    protected function inserirNomeNalistaRepo($nomeLista)
    {
        try {
            $sql = 'INSERT INTO TB_NOME_LISTA(nome,sexo,confirmado,nome_festa) VALUES (:nome, :sexo, :confirmado, :nome_festa)';
            $this->pdoCon = new PdoCon();
            $this->conexao = $this->pdoCon->getInstance();
            $stm = $this->conexao->prepare($sql);

            $stm->bindValue(':nome', $nomeLista->getNome(), PDO::PARAM_STR);
            $stm->bindValue(':sexo', $nomeLista->getSexo(), PDO::PARAM_STR);
            $stm->bindValue(':confirmado', $nomeLista->getConfirmado(), PDO::PARAM_STR);
            $stm->bindValue(':nome_festa', $nomeLista->getNomeFesta(), PDO::PARAM_STR);

            $this->conexao->beginTransaction();
            $stm->execute();
            $this->conexao->commit();

            $this->conexao = $this->pdoCon->desconectar();

            return true;

        } catch (PDOException $e) {
            if (stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)) {
                $this->conexao->commit();
                usleep(250000);
            } else {
                $this->conexao->rollBack();
                throw $e;
            }
            return false;
        }
    }

    protected function recuperarListaDeNomes($nomeFesta)
    {
        try {
            $sql = 'SELECT * FROM
    TB_NOME_LISTA as nl
WHERE
    nl.nome_festa = :nomeFesta ORDER BY nl.id Desc;';
            $this->pdoCon = new PdoCon();
            $this->conexao = $this->pdoCon->getInstance();
            $stm = $this->conexao->prepare($sql);

            $stm->bindValue(':nomeFesta', $nomeFesta, PDO::PARAM_STR);

            $this->conexao->beginTransaction();
            $stm->execute();
            $this->conexao->commit();
            $fetch = $stm->fetchAll(PDO::FETCH_ASSOC);

            $this->conexao = $this->pdoCon->desconectar();
            return $fetch;

        } catch (PDOException $e) {
            echo $e;
            return $e;
        }
    }

    protected function contabilizarViwes()
    {
        try {
            $sql = 'UPDATE TB_VIEWS SET views = views +1 WHERE id = 1';
            $this->pdoCon = new PdoCon();
            $this->conexao = $this->pdoCon->getInstance();
            $stm = $this->conexao->prepare($sql);

            $this->conexao->beginTransaction();
            $stm->execute();
            $this->conexao->commit();
            $this->conexao = $this->pdoCon->desconectar();

            return $this->recuperarViews();

        } catch (PDOException $e) {
            echo $e;
            return $e;
        }
    }

    protected function recuperarViews()
    {
        try {
            $sql = 'SELECT * FROM TB_VIEWS WHERE id = 1';
            $this->pdoCon = new PdoCon();
            $this->conexao = $this->pdoCon->getInstance();
            $stm = $this->conexao->prepare($sql);

            $this->conexao->beginTransaction();
            $stm->execute();
            $this->conexao->commit();
            $returno = $stm->fetch();
            $this->conexao = $this->pdoCon->desconectar();

            return $returno;
        } catch (PDOException $e) {
            echo $e;
            return $e;
        }
    }

    protected function validarNome($nome, $nomeFesta)
    {
        try {
            $sql = 'SELECT * FROM
    TB_NOME_LISTA as nl
WHERE
    nl.nome like :nome and nl.nome_festa = :nomeFesta';
            $this->pdoCon = new PdoCon();
            $this->conexao = $this->pdoCon->getInstance();
            $stm = $this->conexao->prepare($sql);

            $stm->bindValue(':nome', "%" . $nome . "%", PDO::PARAM_STR);
            $stm->bindValue(':nomeFesta', $nomeFesta, PDO::PARAM_STR);

            $this->conexao->beginTransaction();
            $stm->execute();
            $this->conexao->commit();
            $returno = $stm->fetch();
            $this->conexao = $this->pdoCon->desconectar();

            if ($returno != null) {
                return (object)[
                    "valor" => true,
                ];
            } else {
                return (object)[
                    "valor" => false,
                ];
            }

        } catch (PDOException $e) {
            echo $e;
            return $e;
        }
    }

    protected function carregarObjetoTotalLista($nomeFesta)
    {

        $homem = $this->carregarTotalSexo($nomeFesta, "H");
        $mulher = $this->carregarTotalSexo($nomeFesta, "M");

        try {
            $sql = 'SELECT COUNT(*) FROM TB_NOME_LISTA WHERE nome_festa = :nomeFesta';
            $this->pdoCon = new PdoCon();
            $this->conexao = $this->pdoCon->getInstance();
            $stm = $this->conexao->prepare($sql);

            $stm->bindValue(':nomeFesta', $nomeFesta, PDO::PARAM_STR);

            $this->conexao->beginTransaction();
            $stm->execute();
            $this->conexao->commit();
            $returno = $stm->fetch();
            $this->conexao = $this->pdoCon->desconectar();

            return (object)[
                "total" => $returno,
                "homem" => $homem,
                "mulher" => $mulher
            ];

        } catch (PDOException $e) {
            echo $e;
            return $e;
        }
    }

    protected function carregarTotalSexo($nomeFesta, $sexo)
    {
        try {
            $sql = 'SELECT COUNT(*) FROM TB_NOME_LISTA WHERE sexo = :sexo and nome_festa = :nomeFesta';
            $this->pdoCon = new PdoCon();
            $this->conexao = $this->pdoCon->getInstance();
            $stm = $this->conexao->prepare($sql);

            $stm->bindValue(':sexo', $sexo, PDO::PARAM_STR);
            $stm->bindValue(':nomeFesta', $nomeFesta, PDO::PARAM_STR);

            $this->conexao->beginTransaction();
            $stm->execute();
            $this->conexao->commit();
            $returno = $stm->fetch();
            $this->conexao = $this->pdoCon->desconectar();

            return $returno;

        } catch (PDOException $e) {
            echo $e;
            return $e;
        }
    }

    protected function recuperarNomeLista($idNome)
    {
        try {
            $sql = 'SELECT * FROM TB_NOME_LISTA WHERE id = :idNome';
            $this->pdoCon = new PdoCon();
            $this->conexao = $this->pdoCon->getInstance();
            $stm = $this->conexao->prepare($sql);

            $stm->bindValue(':idNome', $idNome, PDO::PARAM_STR);

            $this->conexao->beginTransaction();
            $stm->execute();
            $this->conexao->commit();
            $returno = $stm->fetch();
            $this->conexao = $this->pdoCon->desconectar();

            return $returno;
        } catch (PDOException $e) {
            echo $e;
            return $e;
        }
    }

    protected function confirmarPresencaRepo($idNome)
    {
        $nome = $this->recuperarNomeLista($idNome);

        if ($nome['confirmado'] === 'N') {
            $confirmacao = 'S';
        } else {
            $confirmacao = 'N';
        }

        try {
            $sql = 'UPDATE TB_NOME_LISTA SET confirmado = :confirmacao WHERE id = :idNome';
            $this->pdoCon = new PdoCon();
            $this->conexao = $this->pdoCon->getInstance();
            $stm = $this->conexao->prepare($sql);

            $stm->bindValue(':idNome', $idNome, PDO::PARAM_STR);
            $stm->bindValue(':confirmacao', $confirmacao, PDO::PARAM_STR);

            $this->conexao->beginTransaction();
            $stm->execute();
            $this->conexao->commit();
            $returno = $stm->fetch();
            $this->conexao = $this->pdoCon->desconectar();

            return $returno;

        } catch (PDOException $e) {
            echo $e;
            return $e;
        }
    }
}

?>