<?php $title = "Ajouter un billets"; ?>

<?php ob_start(); ?>

<form class="form" action="?action=send_post" method="post" enctype="multipart/form-data">
        <h3>Ajouter un artcile</h3>
        <label for="file">Image :</label>
        <input class="form__input" type="file" name="file" id="file" accept="image/png, image/jpeg" required>
        <label for="title">Titre :</label>
        <input class="form__input" type="text" name="title" id="title" min="5" max="55"required>
        <label for="message">Message : </label>
        <textarea name="message" id="message" cols="30" rows="10" min="5"></textarea required>
        <button class="form__btn" type="submit">Créer le post</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>