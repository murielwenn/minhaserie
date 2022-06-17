<?php
    include "head.php"
?>
<body>
    <nav class="nav-extended grey lighten-1">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li><a href="/">Galeria</a></li>
                <li><a class="active" href="/novo">Cadastrar</a></li>
            </ul>                   
        </div>

        <div class="nav-header center">
                <h1>Minhas Séries</h1>
        </div> 
        <div class="nav-content">
            <ul class="tabs tabs-transparent grey darken-1">
                
            </ul>
        </div>

    </nav>

    <div class="row">
        <form method="POST" enctype="multipart/form-data">
            <div class="col s6 offset-s3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Cadastrar Série</span>
                        <div class="row">
                            <div class="input-field col s12">
                            <input id="titulo" type="text" class="validate" name="titulo" required>
                            <label for="titulo">Título do filme</label>
                            </div>
                        </div>
                        <div class="row">
            
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="sinopse" id="sinopse" class="materialize-textarea"></textarea>
                                    <label for="sinopse">Sinopse</label>
                                </div>
                            </div>
            
                        </div>
                        <div class=" input-field file-field ">
                            <div class="btn grey darken-1">
                                <span>Capa</span>
                                <input type="file" name="poster_file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" name="poster">
                            </div>
                        </div>
            
                    </div>
                    <div class="card-action">
                        <a class="btn waves-effect waves-light grey" href="/">Cancelar</a>
                        <button type="submit" class="waves-effect waves-light btn grey darken-2">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>