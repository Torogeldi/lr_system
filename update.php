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

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            $updateusr = $user->updateUser($userid, $_POST);
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
        .gj-datepicker-md [role="right-icon"] {
            right: 4px;
            top: 8px;
            font-size: 27px;
            color: #0093ff;
        }
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

                        <h3>Изменить профиль</h3>
                        <p>Здесь вы можете изменить все данные профиля.</p>
                 
                        <div class="page-links">
                            <a href="index.php">Профиль</a><a href="update.php" class="active">Изменить</a><a href="?action=logout">Выйти</a>
                        </div>
                        <?php 
                        //get result of session and print

                        if (isset($updateusr)) {
                            echo $updateusr;
                        }

                        $userdata = $user->getUserById($userid);
                         if ($userdata) {

                         ?>
                        
                        
                        <form method="POST">
                            <div class="form-row">
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="<?php echo $userdata->firstname; ?>" name="firstname" placeholder="Имя">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="<?php echo $userdata->lastname; ?>" name="lastname" placeholder="Фамилия">
                                    </div>
                                </div>
                            <label>Дата рождения</label>
                            <input id="datepicker" class="form-control" value="<?php echo $userdata->date; ?>" name="date" placeholder="">
                            <div class="form-group">
                                <label>Пол</label>
                                <div class="custom-options">
                                    <input type="radio" id="rad1" name="gender" value="М"><label for="rad1"></i> Мужской</label>
                                    <input type="radio" id="rad2" name="gender" value="Ж"><label for="rad2">Женский</label>
                                </div>
                            </div>
                            <input class="form-control" type="email" value="<?php echo $userdata->email; ?>" name="email" placeholder="E-mail">
                            <div class="form-button">
                                <button id="submit" type="submit" name="update" class="btn btn-success">Сохранить</button>
                                <a href="changepass.php" class="btn btn-info">Изменить пароль</a>
                            </div>
                        </form>
                        
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
<script>
        $('#datepicker').datepicker({ locale: 'ru-ru', format: 'yyyy-mm-dd', weekStartDay: 1, header: true, modal: true, footer: true});
    </script>