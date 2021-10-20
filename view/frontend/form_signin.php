<?php $title = "Se connecter"; ?>

<?php ob_start(); ?>


<section class="form-container">
    <?php 
        if(isset($_SESSION['error'])) {
            echo "<p class='card-error'>" . $_SESSION['error'] . "</p>";
        }
    ?>
    <form class="form" action="?action=signin" method="post">
            <h1 class="form__title">Se connecter</h1>
            <label class="form__label" for="email">Email :</label>
            <input class="form__input" type="email" placeholder="EX : janedoe@gmail.com" name="email" id="email" required>
            <label class="form__label" for="password">Mot de passe :</label>
            <input class="form__input" type="password" placeholder="Mot de passe" name="password" id="password" required>
            <button class="form__btn" type="submit">Se connecter</button>
    </form>
    <a class="form__link" href="?login=signup">Créer un compte</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>