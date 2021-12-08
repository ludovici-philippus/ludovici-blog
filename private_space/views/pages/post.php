<main class="container new-width">
    <article>
        <header>
            <h1><?= $post['titulo']; ?></h1>
            <p><?= $post['descricao']; ?></p>
            <img src="<?= $post['capa']; ?>" alt="<?= $post['titulo'];?>" title="<?= $post['titulo']; ?>">
        </header>
        <main>
            <?= $post['texto'];?>
        </main>
        <footer>Tags: <?= $post['tags'];?></footer>
    </article>
</main>