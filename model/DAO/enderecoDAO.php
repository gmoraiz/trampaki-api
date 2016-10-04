<?php
    require_once('configuration/dataBase.php');
    require_once('model/BPO/endereco.php');
    
    class EnderecoDAO{
        private static $instance;
        public static function getInstance(){
        #   Existe uma instância feita..
            return !isset(self::$instance) ? self::$instance = new enderecoDAO() : self::$instance;
        }
        public function cadastrarEndereco($estado, $cidade, $CEP, $numRes, $long, $lati){
            $bancoDeDados = Database::getInstance();
            $querySQL = "INSERT INTO endereco (cd_numeroResidencia, cd_cep, nm_cidade, sg_estado, cd_longitude, cd_latitude) 
                         VALUES (:cd_numResiden, :cd_cep, :nm_cidade, :sg_estado, :cd_lon, :cd_lat)";
            $comandoSQL =  $bancoDeDados->prepare($querySQL);
            $comandoSQL -> bindParam(':cd_numResiden', $numRes);
            $comandoSQL -> bindParam(':cd_cep', $CEP);
            $comandoSQL -> bindParam(':nm_cidade', $cidade);
            $comandoSQL -> bindParam(':sg_estado', $estado);
            $comandoSQL -> bindParam(':cd_lon', $long);
            $comandoSQL -> bindParam(':cd_lat', $lati);
            $comandoSQL->execute();
            $enderecoBPO = new EnderecoBPO($bancoDeDados->lastInsertId(), $estado, $cidade, $CEP, $numRes, $long, $lati);
            return $enderecoBPO;
        }
    }
?>