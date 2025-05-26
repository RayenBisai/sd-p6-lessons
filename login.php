
<div class="container-ig">
    <hb>Inloggen</hb>
    <?php if(!empty($errors['credentials'])): ?>
        <div class="alert alert-danger">
            <?= $errors['credentials'] ?? '' ?>
        </div>
    <?php endif; ?>
        
    <?php 
    session_start();
    include_once 'modules/database.php';
    include_once 'modules/functions.php';

    $errors = [];
    $inputs = [];

    const EMAIL_REQUIRED = 'Email invullen';
    const EMAIL_INVALID = 'Geldig eimail adres invullen';
    const PASSWORD_REQUIRED = 'Password invullen';
    const CREDENTIALS_NOT_VALID = 'Verkeerde eamil en/of password';
    if (isset($_POST)) {
        $email = filter_input(INPUT_POST, 'email, FILTER_VALIDATE_EMAIL');

        if ($email===false) {
            $errors['email'] = EMAIL_REQUIRED;
        } else { $inputs['email'] = $email;
        }
    }

    $password = filter_input(INPUT_POST, 'password');
    if (empty($password)) {
        $errors['password'] = PASSWORD_REQUIRED;
    } else {
        $inputs['password'] = $password;
    } 

    if (count($errors) === 0) {
        $result = checkLogin($inputs);
        switch ($result) {
            case 'ADMIN':
                header("Location: admin.php");
                break;

                case 'FAILURE':
                    $errors['credentials']=CREDENTIALS_NOT_VALID;
                    include_once 'login.php';
                    break;
        }
    }
    ?>

<button type="submit" name="login" class="btn btn-primary mb-5">Login</button>
</form>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
        <div class="mb-3 mt-3">
            <label for="mail" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="mail" value="<?= $inputs['email'] ?? '' ?>">
            <div class="form-text text-danger">
                <?= $errors['email'] ?? '' ?>
            </div>
        </div>
    </form>
</div>

<div class="mb-3 mt-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" value="<?= $inputs['password'] ?? '' ?>">
    <div class="form-text text-danger">
        <?= $errors['password'] ?? '' ?>
    </div>
</div>
</body>
</html>


