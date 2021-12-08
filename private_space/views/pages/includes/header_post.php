<?php
$url = explode("/", $_GET['url'])[1];
use private_space\models\CategoriaModel;
use private_space\models\PostModel;

$post = PostModel::pega_post($url);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post['titulo'];?></title>
    <meta name="description" content="<?= $post['descricao'];?>">
    <meta name="keywords" content="<?= $post['tags'];?>, ludovici, descentralize">

    <meta name="twitter:card" value="summary_large_image"> 
    <meta name="twitter:title" content="<?= $post['titulo'];?>">
    <meta name="twitter:site" content="@ludoviciphilip">
    <meta name="twitter:description" content="<?= $post['descricao'];?>">
    <meta name="twitter:creator" content="@ludoviciphilip">
    <meta name="twitter:image" content="<?= $post['capa']; ?>" > 
    
    <meta property="og:title" content="<?= $post['titulo'];?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?= INCLUDE_PATH.$post['categoria_slug']."/".$post['slug']; ?>" />
    <meta property="og:image" content="<?= $post['capa']; ?>" />
    <meta property="og:description" content="<?= $post['descricao'];?>" /> 
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
