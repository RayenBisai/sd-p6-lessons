<?php 
session_start();
include_once 'database.php';
include_once 'functions.php';

$errors = [];
$inputs = [];

const EMAIL_REQUIRED = 'Email invullen';
const EMAIL_INVALID = 'Geldig email adres invullen'
const PASSWOR_REQUIRED = 'Password invullen';
const CREDENTIAL_NOT_VALID = 'Verkeerde email';
if (isset($_POST['login'])) {
    
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-lg">
    <h4>Inloggen</h4>
    <?php if(!empty($errors['credentials'])): ?>
        <div class="alert alert-danger">
            <?= $errors['credentials'] ?? '' ?>
        </div>
    <?php endif;?>

    <form method="post">
        <div class="mb-3 mt-3">
            <label for="mail" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="mail" value="<?= $inputs['email'] ?? '' ?>">
            <div class="form-text text-danger">
                <?= $errors['email'] ?? '' ?>
            </div>
        </div>
 <div class="mb-3 mt-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <div class="form-text text-danger">
                <?= $errors['password'] ?? '' ?>
            </div>
        </div>

        <button type="submit" name="login" class="btn btn-primary mb-5">Login</button>
    </form>
</body>
</html>
