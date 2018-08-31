<?php 
include 'lib/User.php';
Session::init();
Session::checkLogin();
?>
<?php 
    //user registration

    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            $usrRegi = $user->userRegistration($_POST);
    }

    include 'inc/header.php';
?>
<body>

<style type="text/css">
.img-holder{
    min-height: 770px;
}
.gj-datepicker-md [role="right-icon"] {
    right: 4px;
    top: 8px;
    font-size: 27px;
    color: #0093ff;
}
.form-content .form-items {
    max-width: 400px;
    min-width: 300px;
    text-align: left;
}
</style>

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
                        <h3>Зарегистрируйтесь чтобы войти в профиль.</h3>
                        <p>Войдите если Вы уже зарегистрированы.</p>
                        <div class="page-links">
                            <a href="login.php">Войти</a><a href="register.php" class="active">Регистрация</a>
                        </div>
            <?php 
                if (isset($usrRegi)) {
                        echo $usrRegi;
                    }               
             ?>
                        <form method="POST">
                            <div class="form-row">
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" name="firstname" placeholder="Имя">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" name="lastname" placeholder="Фамилия">
                                    </div>
                                </div>
                            <label>Дата рождения</label>
                            <input id="datepicker" class="form-control" name="date" placeholder="">
                            <div class="form-group">
                                <label>Пол</label>
                                <div class="custom-options">
                                    <input type="radio" id="rad1" name="gender" value="М"><label for="rad1"></i> Мужской</label>
                                    <input type="radio" id="rad2" name="gender" value="Ж"><label for="rad2">Женский</label>
                                </div>
                            </div>
                            <input class="form-control" type="email" name="email" placeholder="E-mail">
                            <input class="form-control" type="password" name="password" placeholder="Пароль">
                            <div class="form-button">
                                <button id="submit" type="submit" name="register" class="ibtn">Регистрация</button>
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
<?php include 'inc/footer.php' ?>

    <script>
        $('#datepicker').datepicker({ locale: 'ru-ru', format: 'yyyy.mm.dd', weekStartDay: 1, header: true, modal: true, footer: true});
    </script>