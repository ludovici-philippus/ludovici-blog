<?php 
    $url = isset($_GET['url']) ? $_GET['url'] : "";
    $controller = "classes\controllers\\";
    $controller .= $url != "" ? "PageController" : "HomeController";

?>
<main>
    <aside>
        <p>Blog</p>
        <a href="<?= INCLUDE_PATH_PAINEL;?>adicionar-post">Adicionar Post</a>
        <a href="<?= INCLUDE_PATH_PAINEL;?>gerenciar-posts">Gerenciar Posts</a>
        <a href="<?= INCLUDE_PATH_PAINEL;?>adicionar-categoria">Adicionar Categoria</a>
        <a href="<?= INCLUDE_PATH_PAINEL;?>gerenciar-categorias">Gerenciar Categorias</a>
        <p>Admin</p>
        <a href="<?= INCLUDE_PATH_PAINEL;?>editar-perfil">Editar Perfil</a>
    </aside>
    <section class="content">
        <?php 
        $controller = new $controller();
        $controller->index();
        ?>
    </section>
</main>

