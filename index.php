<?php 
include 'lib/User.php';
Session::init();
Session::checkSession();

    $user = new User();

if (isset($_GET['action']) && $_GET['action'] == "logout") {
        Session::destroy();
    }
$userid = Session::get("id");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registration</title>
    <link rel="stylesheet" type="text/css" href="inc/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="inc/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="inc/css/style.css">
    <link rel="stylesheet" type="text/css" href="inc/css/theme2.css">
</head>
<body>

    <style type="text/css">
        .website-logo-inside{
            margin-bottom: 40px;
        }
        .website-logo-inside .logo img {
            width: 60px;
            margin-right: 5px;
        }

    </style>
    <div class="form-body" class="container-fluid">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a>
                                <span class="logo">
                                    <img class="logo-size" src="inc/images/logo.png" alt=""><span>LR SYSTEM</span>
                                </span>
                            </a>
                        </div>

                        <h3>Профиль</h3>
                        <p>Здесь отображены все данные которые вы ввели при регистрации.</p>
                 
                        <div class="page-links">
                            <a href="index.php" class="active">Профиль</a><a href="update.php">Изменить</a><a href="?action=logout">Выйти</a>
                        </div>
                        <?php 
                        //get result of session and print

                        $loginmsg = Session::get("loginmsg");
                        if (isset($loginmsg)) {
                            echo $loginmsg;
                        }
                        Session::set("loginmsg", NULL); // clear session

                        $userdata = $user->getUserById($userid);
                         if ($userdata) {

                         ?>
                        
                        
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Имя:</th><td><?php echo $userdata->firstname; ?></td>
                                </tr>
                                <tr>
                                    <th>Фамилия:</th><td><?php echo $userdata->lastname ?></td>
                                </tr>
                                <tr>
                                    <th>Дата рождения:</th><td><?php echo $userdata->date ?></td>
                                </tr>
                                <tr>
                                    <th>Пол:</th><td><?php echo $userdata->gender ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th><td><?php echo $userdata->email ?></td>
                                </tr>
                            </table>
                        </div>
                        
                        <?php } ?>

                        <div class="other-links">
                            <span><b>Контакты:</b></span><a href="https://vk.com/tor.abaev">ВКонтакте</a><a href="mailto:tor.abaev@mail.ru">tor.abaev@mail.ru</a><a href="https://github.com/torogeldi">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php' ?>