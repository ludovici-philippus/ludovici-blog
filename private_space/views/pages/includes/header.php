<?php use private_space\models\CategoriaModel;?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ludovici - Descentralize-se</title>
    <meta name="description" content="Ludovici é um blog com objetivo de descentralizar-me das redes sociais convencionais. Defendo a Igreja Católica, o Distributismo e o Software Livre!">
    <meta name="keywords" content="catolicismo, distributismo, software livre, linux, ludovici, descentralize">
    
    <meta name="twitter:card" value="summary"> 
    <meta name="twitter:title" content="Ludovici - Descentralize-se">
    <meta name="twitter:site" content="@ludoviciphilip">
    <meta name="twitter:description" content="Ludovici é um blog com objetivo de descentralizar-me das redes sociais convencionais. Defendo a Igreja Católica, o Distributismo e o Software Livre!">
    <meta name="twitter:creator" content="@ludoviciphilip">
    <meta name="twitter:image" content="<?= INCLUDE_PATH_STATIC;?>/images/bg.jpg" > 

    <meta property="og:title" content="Ludovici - Descentralize-se" />
    <meta property="og:type" content="site" />
    <meta property="og:url" content="<?= INCLUDE_PATH ?>" />
    <meta property="og:image" content="<?= INCLUDE_PATH_STATIC;?>/images/bg.jpg" />
    <meta property="og:description" content="Ludovici é um blog com objetivo de descentralizar-me das redes sociais convencionais. Defendo a Igreja Católica, o Distributismo e o Software Livre!" /> 

    <link type="text/css" rel="stylesheet" href="<?= INCLUDE_PATH_STATIC;?>css/style.css">
</head>
<body>
    <header>
        <div class="bg-img">
            <div class="overlay">
                <div class="bg-conteudo">
                    <a href="<?= INCLUDE_PATH;?>"><h1>Ludovici</h1></a>
                    <h2>Literalmente eu lol</h2>
                    <p>Site com objetivo de descentralizar-me das redes sociais convencionais.</p>
                    <p>Site criado sem uso de soy-frame-works nem entulhado de soy-java-script. Só HTML, CSS e PHP</p>
                </div>
                <div class="busca">
                    <form method="post" action="<?= INCLUDE_PATH;?>">
                        <input type="text" name="busca" placeholder="Pesquisar">
                        <button type="submit">🔎</button>
                    </form>
                </div>
				<a class="btn-house" title="Home" href="<?= INCLUDE_PATH;?>">🏠</a>
				<a class="btn-house" title="Biblioteca" href="<?= INCLUDE_PATH;?>biblioteca">📚</a>
                <div class="categorias">
                    <?php
                    $categorias = CategoriaModel::pega_categorias();
                    foreach ($categorias as $key => $value) {
                    ?>
                    <a href="<?= INCLUDE_PATH.$value['slug']?>" title="<?= $value['categoria'];?>"><?= $value['categoria'];?></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </header>
