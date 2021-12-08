<?php

use private_space\models\HomeModel;
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $por_pagina = 9;

if(isset($_POST['busca'])){
        $posts_totais = HomeModel::conta_posts($_POST['busca']);
        $posts = HomeModel::pega_posts($_POST['busca'], $pagina, $por_pagina);
    }
    else{
        $posts_totais = HomeModel::conta_posts();
        $posts = HomeModel::pega_posts(false, $pagina, $por_pagina);
    }
?>
<main>
    <aside class="sobre-mim">
        <h2>Sobre o pai</h2>
		<p>Católico Romano Tradicional, distributista e extremista de Software Livre. Uso Artix Linux, gosto da Igreja e de filosofia clássica e medieval.</p>
    </aside>
    <section class="posts">
    <h2>Posts</h2>
    <?php if(isset($_POST['busca'])){echo "<p style='text-align: center;'>".count($posts)." resultado(s) no total.</p>";}?>
        <div class="container">
            <?php
             foreach ($posts as $key => $value) {?>
            <div class="post-single">
                <a rel=internal title="<?= $value['titulo'];?>" href="<?= INCLUDE_PATH.$value['categoria_slug']."/".$value['slug']; ?>">    
                    <div class="post-img">
                        <img src="<?= $value['capa'];?>" alt="<?= $value['titulo'];?>" title="<?= $value['titulo'];?>">
                    </div>
                    <div class="post-desc">
                        <h3><?= $value['titulo'];?></h3>
                        <p><?= $value['descricao'];?></p>
                    </div>
                </a>
                <a rel=internal class="btn" title="<?= $value['titulo'];?>" href="<?= INCLUDE_PATH.$value['categoria_slug']."/".$value['slug'];?>">📖 Ler 📖</a>
            </div>
            <?php }?>
        </div>
        <div class="paginacao">
            <?php 
                $qnt_paginas_base = ceil($posts_totais/ $por_pagina);
                $qnt_paginas = $qnt_paginas_base;
                $inicio = 1;
                if($qnt_paginas > 10){
                    $inicio = $pagina == 1 ? $pagina : $pagina - 1;
                    $qnt_paginas = 10 + $inicio <= $qnt_paginas_base ? 10 + $inicio : $qnt_paginas_base;
                }
                for($i=$inicio; $i <= $qnt_paginas; $i++){
                    echo "<a href=?pagina=$i>$i</a>";
                }
            ?>
        </div>
    </section>
    
</main>
