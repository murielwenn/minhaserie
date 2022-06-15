<?php
    include "head.php"
?>

<?php

//session_start();
require "./util/Mensagem.php";
$controller = new SeriesController();
$series = $controller->index();

?>

<body>
    <nav class="nav-extended grey lighten-1">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li><a class="active" href="/">Galeria</a></li>
                <li><a href="/novo">Cadastrar</a></li>
            </ul>                   
        </div>

        <div class="nav-header center">
                <h1>Minhas Séries</h1>
        </div> 

        <div class="nav-content">
            <ul class="tabs tabs-transparent grey darken-1">
                <li class="tab"><a class="active" href="#test1">Todos</a></li>
                <li class="tab"><a href="#test2">Assistidos</a></li>
                <li class="tab"><a href="#test3">Favoritos</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <?php foreach($series as $serie){ ?>
                <div class="col s12 m6 l3">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="<?php echo $serie->poster?>">
        
                            <button class="btn-fav btn-floating halfway-fab waves-effect waves-light red" data-id="<?= $serie->id ?>">
                                <i class="material-icons"><?= ($serie->favorito)? "favorite":"favorite_border" ?></i>
                            </button>
                        </div>
                        <div class="card-content">
                            <span class="card-title"><?php echo $serie->titulo?></span>
                            <p><?php echo $serie->sinopse?></p>
                    </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?= Mensagem::mostrar(); ?>

    <script>
        document.querySelectorAll(".btn-fav").forEach(btn => {
            btn.addEventListener("click", e => {
                const id = btn.getAttribute("data-id")
                fetch(`/favoritar/${id}`)
                .then(response => response.json())
                .then(response => {
                    if(response.success === "ok"){
                        if (btn.querySelector("i").innerHTML === "favorite"){
                            btn.querySelector("i").innerHTML = "favorite_border"
                        } else{
                            btn.querySelector("i").innerHTML = "favorite"
                        }
                    }
                })
                .catch (error => {
                    M.toast({html: 'Erro ao favoritar'})
                })               
            });
        });
    </script>

</body>

</html>