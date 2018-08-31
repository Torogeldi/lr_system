<?php 
include 'lib/User.php';
Session::init();
Session::checkSession();

    $user = new User();

if (isset($_GET['action']) && $_GET['action'] == "logout") {
        Session::destroy();
    }
$userid = Session::get("id");

$user = new User();

        //edit user data

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatepass'])) {
            $updatepass = $user->updatePassword($userid, $_POST);
    }

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
    <link rel="stylesheet" type="text/css" href="inc/css/core.css">
    <link rel="stylesheet" type="text/css" href="inc/css/datepicker.css">
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
        .form-content input, .form-content .dropdown-toggle.btn-default {
            border: 0;
            background-color: #f7f7f7;
            color: #606060;
        }
        .form-content input:hover, .form-content input:focus, .form-content .dropdown-toggle.btn-default:hover, .form-content .dropdown-toggle.btn-default:focus {
            border: 0;
            background-color: #f4f4f4;
            color: #000000;
        }
        .form-items label{
            color: #606060;
            text-align: left;
        }
        .form-content .form-button .ibtn {
        background-color: #0093ffc7;
        color: #ffffff;
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

                        <h3>Изменить пароль</h3>
                        <p>Чтобы изменить пароль нужно знать старый.</p>
                 
                        
                        <?php 
                        //get result of session and print

                        if (isset($updatepass)) {
                            echo $updatepass;
                        }
                         ?>
                        
                        
                        <form method="POST">
                            <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" name="old_pass" placeholder="Старый пароль">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" name="password" placeholder="Новый пароль">
                                    </div>
                                </div>
                            <div class="form-button">
                                <button id="submit" type="submit" name="updatepass" class="btn btn-success">Сохранить</button>
                                <a href="update.php" class="btn btn-info">Отмена</a>
                            </div>
                        </form>

                        <div class="other-links">
                            <span><b>Контакты:</b></span><a href="https://vk.com/tor.abaev">ВКонтакте</a><a href="mailto:tor.abaev@mail.ru">tor.abaev@mail.ru</a><a href="https://github.com/torogeldi">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php' ?>
<script>
        $('#datepicker').datepicker({ locale: 'ru-ru', format: 'yyyy-mm-dd', weekStartDay: 1, header: true, modal: true, footer: true});
    </script>