<?php

use classes\models\PostModel;
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$por_pagina = 12;
$posts = PostModel::pega_posts($pagina, $por_pagina);
$posts_total = PostModel::conta_posts();
?>
<div class="box-content w100">
    <h2>Gerenciar Posts</h2>
    <div class="table-wrapper">
        <table>
            <tr>
                <td>Título</td>
                <td>Descrição</td>
                <td>#</td>
                <td>#</td>
            </tr>
            <?php foreach ($posts as $key => $value) {?>
            <tr>
                <td><?= $value['titulo'];?></td>
                <td><?= $value['descricao'];?></td>
                <td><a class="btn edit" href="<?= INCLUDE_PATH_PAINEL;?>editar-post?editar=<?= $value['id'];?>">Editar</a></td>
                <td><a class="btn delete" href="<?= INCLUDE_PATH_PAINEL;?>gerenciar-posts?deletar-post=<?= $value['id'];?>">Deletar</a></td>
            </tr>
            <?php }?>
        </table>
    </div>
    <div class="paginacao">
        <?php 
            $qnt_paginas_base = ceil($posts_total/ $por_pagina);
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
</div>