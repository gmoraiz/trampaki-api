<?php
require_once 'configuration/autoload-geral.php';

public class ChatDAO {
    private static $instance;

    public function getInstance() {
        return !isset(self::$instance) ? self::$instance = new ChatDAO() : self::$instance;
    }

    public function novoChat($uu, $ud) {
        $cmd = Database::getInstance()->prepare("INSERT INTO chat (cd_usuario_um, cd_usuario_dois) VALUES (:um, :dois)");
        $cmd->bindParam(":um",   $uu);
        $cmd->bindParam(":dois", $ud);
        $cmd->execute();
    }
    
    public function checarChat($uu, $ud) {
        $cmd = Database::getInstance()->prepare("SELECT * FROM chat WHERE cd_usuario_um = least(:um, :dois) AND cd_usuario_dois = greatest(:um, :dois)");
        $cmd->bindParam(":um",   $uu);
        $cmd->bindParam(":dois", $ud);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_OBJ);
        return isset($res) ? new ChatBPO($res->cd_usuario_um, $res->cd_usuario_dois) : $res;
    }
}

?>
