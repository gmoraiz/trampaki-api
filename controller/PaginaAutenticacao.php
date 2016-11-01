<?php
    require_once 'configuration/autoload-geral.php';
    
    class PaginaAutenticacao{
        public function __construct(){
        #   Verificação de metodo da requisição:
            $_SERVER['REQUEST_METHOD'] == 'POST' ? $this->efetuarAutenticacao() : include('view/pagina-autenticacao.html');
        }
        
        private function efetuarAutenticacao(){
        #   A função PHP 'filter_input()' tem como finalidade obter a variavel especifica do formulario.
        #   O 'FILTER_SANITIZE_MAGIC_QUOTES' retorna uma barra invertida na frente das aspas simples, neste
        #   passo estou recuperando os dados inseridos no formulario de login e verificando se são validos:
        
            $dadosLogin  = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
            $dadosSenha  = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);
            
            $token = base64_encode($dadosLogin. ':' .$dadosSenha);    
            $loginDAO = LoginDAO::getInstance();
            $usuario = $loginDAO->gerarAutenticacao($token);
        }
        private function redirecionar(){
            header('HTTP/1.1 301 Moved Permanently');
            header("Location: painel-de-operacoes");
        }
    }
?>