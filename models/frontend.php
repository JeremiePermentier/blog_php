<?php
function signin_user() {

    $password = $_POST['password'];
    $db = dbConnect();
    $req = $db->prepare('SELECT id, email, pseudo, password, role FROM users WHERE email = ?');
    $req->execute(array(
        $_POST['email']
    ));
    $user = $req->fetch();

    if (empty($user['email'])) {
        $_SESSION['error'] = "Erreur sur l'adresse mail";
        header('Location: http://localhost/blog/public');
        die("Erreur sur l'adresse mail");
    } elseif (password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['role'] = $user['role'];
        header('Location: http://localhost/blog/public');
    } else {
        $_SESSION['error'] = "Mauvais mot de passe";
        header('Location: http://localhost/blog/public');
        die('Mauvais mot de passe');
    }
    
}

function create_user() {

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $db = dbConnect();
    $req = $db->prepare('INSERT INTO users (email, pseudo, password) VALUES (?, ?, ?)');
    $req->execute(
        array(
            $_POST['email'],
            $_POST['pseudo'],
            $password
        )
    );
}

function add_post() {
    $img_url = "./img/" . basename($_FILES['file']['name']);

    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        if ($_FILES['file']['size'] <= 6000000 ) {
            move_uploaded_file($_FILES['file']['tmp_name'], $img_url);
        } else {
            die("L'image est trop lourde");
        }
    } else {
        die("Problème pendant le transfert");
    }

    $db = dbConnect();
    $req = $db->prepare('INSERT INTO posts (img_url, title, message, user_id) VALUES (?, ?, ?, ?)');
    $req->execute(
        array(
            $img_url,
            $_POST['title'],
            $_POST['message'],
            $_SESSION['id']
        )
    );
}

function add_comment() {

}

function get_posts() {
    $db = dbConnect();
    $req = $db->query(('SELECT posts.id, img_url, title, message, posts.date, pseudo FROM posts INNER JOIN users ON posts.user_id = users.id'));
    return $req;
}

function dbConnect() {
    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    return $db;
}