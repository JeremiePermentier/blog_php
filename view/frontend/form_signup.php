<?php $title = "S'inscrire"; ?>

<?php ob_start(); ?>

<section class="form-container">
    <form class="form" action="?action=signup" method="post">
            <h1 class="form__title">Création du compte</h1>
            <label class="form__label" for="pseudo">Pseudo :</label>
            <input class="form__input" type="text" name="pseudo" id="pseudo"  placeholder="Pseudo"  required>
            <label class="form__label" for="email">Email :</label>
            <input class="form__input" type="email" name="email" id="email" placeholder="EX : janedoe@gmail.com" required>
            <label class="form__label" for="password">Mot de passe :</label>
            <input class="form__input" type="password" placeholder="Mot de passe" name="password" id="password" required>
            <label class="form__label" for="confirm_password">Confirmer le mot de passe :</label>
            <input class="form__input" type="password" placeholder="Comfirmation du mot de passe"  name="confirm_password" id="confirm_password" required>
            <button class="form__btn" type="submit">Créer le compte</button>
    </form>
    <a class="form__link" href="index.php">J'ai déjà un compte</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>