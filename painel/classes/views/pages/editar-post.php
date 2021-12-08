<?php 
use classes\models\CategoriaModel;
use classes\models\PostModel;

$post = PostModel::pega_post($_GET['editar']);
?>
<div class="box-content w100">
    <h2>Editar Post</h2>
    <form method="post">
        <div class="form-group">
            <label>Título:</label>
            <input type="text" name="titulo" value="<?= $post['titulo'];?>">
        </div>
        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="<?= $post['descricao'];?>">
        </div>
        <div class="form-group">
            <label>Capa:</label>
            <input type="text" name="capa" value="<?= $post['capa'];?>">
        </div>
        <div class="form-group">
            <label>Categoria:</label>
            <select name="categoria_slug">
                <?php
                    $categorias = CategoriaModel::pega_categorias();
                    foreach ($categorias as $key => $value) {
                ?>
                <option <?php if($value['slug'] == $post['categoria_slug']) echo "selected"; ?> value="<?= $value['slug']?>"><?= $value['categoria']?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label>Tags:</label>
            <input type="text" name="tags" value="<?= $post['tags'];?>">
        </div>
        <div class="form-group">
            <label>Texto:</label>
            <textarea name="texto"><?= $post['texto'];?></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Editar!" name="editar_post">
        </div>
    </form>
</div>
<script src="https://cdn.tiny.cloud/1/ryfrlrf9b187a2ca3ol1tw3il7venwgdolh2egh66un8rk0t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: 'textarea',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak media',
    toolbar_mode: 'floating',
});
</script>
