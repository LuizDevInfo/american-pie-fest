<?php

class PdoCon
{
    private $user = 'u343095473_americanpie';
    private $pass = 'aCrojc3^Eo';
    private $sqlCon = 'mysql:host=sql124.main-hosting.eu;dbname=u343095473_american_pie';
    private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    protected function getInstance()
    {
        return $this->conexao();
    }

    private function conexao()
    {
        try {
            $con = new PDO($this->sqlCon, $this->user, $this->pass, $this->options);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            echo $e;
            print "Falha ao tentar conectar no banco de dados!";
            die();
        }
    }

    protected function desconectar()
    {
        $con = null;
        return $con;
    }
}

?>

