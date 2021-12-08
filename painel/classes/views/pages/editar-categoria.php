<?php

use classes\models\CategoriaModel;

$categoria = CategoriaModel::pega_categoria($_GET['editar']); ?>
<div class="box-content w100">
    <h2>Editar Categoria</h2>
    <form method="post">
        <div class="form-group">
            <label>Nome da Categoria: </label>
            <input type="text" name="categoria" value="<?= $categoria['categoria']; ?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Editar Categoria!" name="editar_categoria">
        </div>
    </form>
</div>