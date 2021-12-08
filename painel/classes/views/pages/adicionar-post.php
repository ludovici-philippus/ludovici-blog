<?php use classes\models\CategoriaModel; ?>
<div class="box-content w100">
    <h2>Adicionar Post</h2>
    <form method="post">
        <div class="form-group">
            <label>Título:</label>
            <input type="text" name="titulo">
        </div>
        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="descricao">
        </div>
        <div class="form-group">
            <label>Capa:</label>
            <input type="text" name="capa">
        </div>
        <div class="form-group">
            <label>Categoria:</label>
            <select name="categoria_slug">
                <?php
                    $categorias = CategoriaModel::pega_categorias();
                    foreach ($categorias as $key => $value) {
                ?>
                <option value="<?= $value['slug']?>"><?= $value['categoria']?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label>Tags:</label>
            <input type="text" name="tags">
        </div>
        <div class="form-group">
            <label>Texto:</label>
            <textarea name="texto"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Postar!" name="criar_post">
        </div>
    </form>
</div>
<script src="https://cdn.tiny.cloud/1/ryfrlrf9b187a2ca3ol1tw3il7venwgdolh2egh66un8rk0t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: 'textarea',
    plugins: 'media advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating',
});
</script>
