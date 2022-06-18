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
                <li class="tab"><a href="#test3">Favoritos</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            
                <?php foreach($series as $serie){ ?>
                    <div class="col s6 m4 l3">
                        <div class="card hoverable">
                            <div class="card-image">
                                <img class="fotoo"   src="<?php echo $serie->poster?>">
            
                                <button class="btn-fav btn-floating halfway-fab waves-effect waves-light red" data-id="<?= $serie->id ?>">
                                    <i class="material-icons"><?= ($serie->favorito)? "favorite":"favorite_border" ?></i>
                                </button>
                            </div>
                            <div class="card-content">
                                <span class="card-title activator truncate">
                                    <?php echo $serie->titulo?>
                                </span>
                                
                                
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><?= $serie->titulo ?><i class="material-icons right">close</i></span>
                                <p><?php echo substr($serie->sinopse, 0, 1000) ?></p>
                                <button class="waves-effect waves-light btn-small right red accent-2 btn-delete" data-id="<?= $serie->id ?>"><i class="material-icons">delete</i></button>
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

        document.querySelectorAll(".btn-delete").forEach(btn => {
            btn.addEventListener("click", e => {
                const id = btn.getAttribute("data-id")
                const requestConfig = {method: "DELETE", headers: new Headers()}
                fetch(`/series/${id}`, requestConfig)
                .then(response => response.json())
                .then(response => {
                    if(response.success === "ok"){
                        const card = btn.closest(".col")
                        card.remove()
                    }
                })
                .catch (error => {
                    M.toast({html: 'Erro ao deletar'})
                })               
            });
        });
    </script>

</body>

</html>