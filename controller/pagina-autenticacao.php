<?php
    session_start();
    require_once('model/dataBase.php');
    require_once('model/login.php');
    
    class PaginaAutenticacao{
        
        public function __construct(){
            if(isset($_POST["enviar"])){
            #   Passo 01 ----------------------------------------------------------------------------------------
            #   A função PHP 'filter_input()' tem como finalidade obter a variavel especifica do formulario.
            #   O 'FILTER_SANITIZE_MAGIC_QUOTES' retorna uma barra invertida na frente das aspas simples, neste
            #   passo estou recuperando os dados inseridos no formulario de login e verificando se são validos:
        
                $DadosLogin = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
                $DadosSenha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);
                $login = new Login($DadosLogin, $DadosSenha);
                
            #   --------------------------------------------------------------------------------------------------
            
            #   Passo 02 -----------------------------------------------------------------------------------------
            #   A função 'header()' recebe como parametro um arquivo PHP e direciona o usuario até o endereço, 
            #   inserido na String de seu parametro, neste passo verifico se o método 'efetuarLogin()' 
            #   retornou verdadeiro caso sim, o usuario sera direcionado para a tela principal:
            
                $login->efetuarLogin() ? header("Location: painel-de-operacoes") : print('Erro ao logar');
            
            #   --------------------------------------------------------------------------------------------------
            }
            include('view/pagina-autenticacao.html');
        }
    }
?>