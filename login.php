<?php 
include 'lib/User.php';
Session::init();
Session::checkLogin();
?>
<?php 

    //user login

$user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $usrLogin = $user->userLogin($_POST);
    }

include "inc/header.php"; 

?>
<body>
    <div class="form-body" class="container-fluid">
        <div class="website-logo">
            <a>
                <span class="logo">
                    <img class="logo-size" src="inc/images/logo.png" alt=""><span>LR SYSTEM</span>
                </span>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="inc/images/graphic2.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Войдите если Вы уже зарегистрированы.</h3>
                        <p>Зарегистрируйтесь чтобы войти в профиль.</p>
                        <div class="page-links">
                            <a href="login.php" class="active">Войти</a><a href="register.php">Регистрация</a>
                        </div>
            <?php
                if (isset($usrLogin)) {
                    echo $usrLogin;
                }
            ?>
                        <form method="POST">
                            <input class="form-control" type="email" name="email" placeholder="E-mail">
                            <input class="form-control" type="password" name="password" placeholder="Пароль">
                            <div class="form-button">
                                <button id="submit" type="submit" name="login" class="ibtn">Войти</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Контакты:</span><a href="https://vk.com/tor.abaev">ВКонтакте</a><a href="mailto:tor.abaev@mail.ru">tor.abaev@mail.ru</a><a href="https://github.com/torogeldi">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "inc/footer.php"; ?>
