<?php

use classes\models\CategoriaModel;

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$por_pagina = 12;
$categorias = CategoriaModel::pega_categorias($pagina, $por_pagina);
$categorias_total = CategoriaModel::conta_categorias();
?>
<div class="box-content w100">
    <h2>Gerenciar Categorias</h2>
    <div class="table-wrapper">
        <table>
            <tr>
                <td>Categoria</td>
                <td>#</td>
                <td>#</td>
            </tr>
            <?php foreach ($categorias as $key => $value) {?>
            <tr>
                <td><?= $value['categoria'];?></td>
                <td><a class="btn edit" href="<?= INCLUDE_PATH_PAINEL;?>editar-categoria?editar=<?= $value['id'];?>">Editar</a></td>
                <td><a class="btn delete" href="<?= INCLUDE_PATH_PAINEL;?>gerenciar-categorias?deletar-categoria=<?= $value['id'];?>">Deletar</a></td>
            </tr>
            <?php }?>
        </table>
    </div>
    <div class="paginacao">
        <?php 
            $qnt_paginas_base = ceil($categorias_total/ $por_pagina);
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