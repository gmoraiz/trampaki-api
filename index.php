<?php
    
    include ('router.php');
    include ('controller/pagina-autenticacao.php');
    include ('controller/pagina-operacoes.php');
    include ('controller/pagina-principal.php');
    include ('controller/novo-prestador.php');
    include ('controller/novo-anunciante.php');
    include ('controller/carregar-anuncios.php');
    include ('controller/carregar-categorias.php');
    include ('controller/carregar-dados-prestador.php');
    include ('controller/carregar-dados-anunciante.php');
    include ('controller/carregar-prestadores.php');
    include ('controller/carregar-meus-anuncios.php');

    
    $roteador =  new Router();
    $roteador -> novaRota('/','PaginaPrincipal');
    $roteador -> novaRota('/login','PaginaAutenticacao');
    $roteador -> novaRota('/novo-anunciante','novoAnunciante');
    $roteador -> novaRota('/novo-prestador','NovoPrestador');
    $roteador -> novaRota('/painel-de-operacoes','painelDeOperacoes');
    $roteador -> novaRota('/carregar-anuncios','CarregarAnuncios');
    $roteador -> novaRota('/carregar-categorias','CarregarCategorias');
    $roteador -> novaRota('/carregar-dados-prestador','CarregarDadosPrestador');
    $roteador -> novaRota('/carregar-dados-anunciante','CarregarDadosAnunciante');
    $roteador -> novaRota('/carregar-prestadores','CarregarPrestadores');
    $roteador -> novaRota('/carregar-meus-anuncios','CarregarMeusAnuncios');
    
    $roteador -> rotear();

?>