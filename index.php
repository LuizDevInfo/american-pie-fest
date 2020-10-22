<?php
include_once('src/controller/NomeListaController.php');
$nomeListaController = new NomeListaController();
$visitas = $nomeListaController->setVisualizador();

?>

<!DOCTYPE HTML>
<!--
	Broadcast by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>American Pie</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="css/style.css?1433981258"/>
</head>
<body>
<div class="fh5co-loader"></div>
<!-- Header -->
<header id="header">
    <h1><a href="#">American Pie <span>A FEST</span></a></h1>
    <a href="#menu">Menu</a>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li><a href="index.php">Acessar</a></li>
        <li><a href="#list-convidados">Lista de Convidados</a></li>
    </ul>
</nav>

<!-- Banner -->
<!--
    To use a video as your background, set data-video to the name of your video without
    its extension (eg. images/banner). Your video must be available in both .mp4 and .webm
    formats to work correctly.
-->
<section id="banner" data-video="images/banner" class="formt-img">
    <div class="inner">
        <header>
            <div class="simply-countdown simply-countdown-one"></div>

            <h1>American Pie Fest</h1>
            <p>Coloque seu nome na lista<br/>
                <!--                    vivamus vitae libero in nulla iaculis eleifend non sit amet nulla.</p>-->
            <div class="position-campos">
                <div class="row-input-name">
                    <div class="6u 12u$(xsmall)">
                        <input type="text" class="campo-nome" name="nome" id="nome" value="" placeholder="Nome"/>
                    </div>
                </div>
                <div class="row uniform">
                    <div class="4u 12u$(small)">
                        <input type="radio" id="priority-low" value="H" name="sexo" onclick="setarValorSexoFunc('H')"
                               checked>
                        <label for="priority-low" style="color: white">Homem</label>
                    </div>
                    <div class="4u 12u$(small)">
                        <input type="radio" id="priority-normal" value="M" onclick="setarValorSexoFunc('M')"
                               name="sexo">
                        <label for="priority-normal" style="color: white">Mulher</label>
                    </div>
                </div>
            </div>
        </header>
        <br>
        <br>
        <button class="button big alt scrolly" id="button">
            <a onclick="adicionarNaLista()">Adicionar
                na Lista
            </a>
        </button>
    </div>
</section>
<b>Visitas: </b><i><?php echo $visitas['views'] ?></i>

<!-- Main -->
<div id="main">

    <!-- One -->
    <section class="wrapper style1" id="list-convidados">
        <div class="inner">
            <header class="align-center">
                <h2>Lista de convidados</h2>
                <p></p>
                <div id="totalLista"><span></span></div>
            </header>

            <!--            <div class="row-input-name">-->
            <!--                <div class="6u 12u$(xsmall) input-busca">-->
            <!--                    <input type="text" class="campo-pesquisa" name="campo-pesquisa" id="campo-pesquisa"-->
            <!--                           placeholder="Escreva o nome para pesquisar"/>-->
            <!--                </div>-->
            <!---->
            <!--                <div class="row-input-name button-busca">-->
            <!--                                        <a href="#main" class="button big alt scrolly">Buscar na Lista</a>-->
            <!--                </div>-->
            <!---->
            <!--            </div>-->
            <div id="snackbar"></div>

            <div class="table-wrapper">
                <table class="alt" id="table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!--                    --><?php
                    //                    foreach ($nomesLista
                    //                             as $nomeLista) {
                    //                        ?>
                    <!--                        <tr>-->
                    <!--                            <td>--><?php //echo $nomeLista['nome']; ?><!--</td>-->
                    <!--                        </tr>-->
                    <!--                        --><?php
                    //                    }
                    //                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

</div>

<!-- Footer -->
<footer id="footer">
    <div class="inner">
        <div class="flex flex-3">
            <div class="col">
                <h4>Organizadores</h4>
                <ul class="alt">
                    <li><a href="https://www.instagram.com/l_fachinetto" class="icon fa-instagram position-icons">&nbsp;Luiz
                            Gustavo<span
                                    class="label">Instagram</span></a></li>
                    <li><a href="https://www.instagram.com/thayan.alves10" class="icon fa-instagram position-icons">&nbsp;Thayan
                            Alves<span
                                    class="label">Instagram</span></a></li>
                    <li><a href="https://www.instagram.com/thallys_xavier98"
                           class="icon fa-instagram position-icons">&nbsp;Thallys
                            Xavier<span
                                    class="label">Instagram</span></a></li>
                    <li><a href="https://www.instagram.com/bruno.lisboa.750"
                           class="icon fa-instagram position-icons">&nbsp;Bruno
                            Lisboa<span
                                    class="label">Instagram</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright">
        <ul class="icons">
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
        </ul>
        &copy; Untitled. American Pie Festival: <a href="https://templated.co"></a>.
    </div>
</footer>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js?1433981258"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/simplyCountdown.js?1433981258"></script>

</body>
</html>