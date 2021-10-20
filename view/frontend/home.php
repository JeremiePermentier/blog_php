<?php $title = "Page d'accueil"; ?>

<?php ob_start(); ?>
<?php 
    while($post = $posts->fetch())
    {
        echo '<div class="card">';
            echo "<img class='card__img' src='" . htmlspecialchars($post['img_url']) . "'/>";
            echo "<div class='card_content'>";
                echo "<p class='card_author'> Ecrit par : " . htmlspecialchars($post['pseudo']) . "</p>"; 
                echo "<h2 class='card_content--title'>" . htmlspecialchars($post['title']) . "</h2>";
                echo "<p class='card_content--text'>" . htmlspecialchars($post['message']) . "</p>";
                echo "<a href='single_post.php?id=" . $post['id'] . "'>Voir l'article</a>";
            echo '</div>';
        echo '</div>';
    }
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>