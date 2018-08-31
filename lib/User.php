<?php 
	include_once 'Session.php'; // get session fucntions
	include 'Database.php'; // connection db

	class User{
		public $db;
		public function __construct(){ // create constructor
			$this->db = new Database();
		}

                function clean_data($str){
                    return strip_tags(trim($str));
                }

                // user registration mechanism
                
                public function userRegistration($data){
                    $firstname = $this->clean_data($data['firstname']);
                    $lastname = $this->clean_data($data['lastname']);
                    $gender = $data['gender'];
                    $date = $data['date'];
                    $email = $this->clean_data($data['email']);
                    $password =  trim($data['password']);

                    $chk_email = $this->emailCheck($email);
                    
                    if ($firstname == "" OR $lastname == "" OR $gender == "" OR $gender == "NULL" OR $date == "" OR $email == "" OR $password == "") {
                    $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong> Заполните все данные!</div>";
                    return $msg;
                }

                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Не правильный адрес почты!</div>";
                    return $msg;
                }

                if ($chk_email == true) {
                    $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Такой email уже сушествует!</div>";
                    return $msg;
                }

                if (strlen($password) < 6) {
                        $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Пароль слишком короткий!</div>";
                    return $msg;
                    }

                    $password =  md5($data['password']);


                $sql = "INSERT INTO users (firstname, lastname, gender, date, email, password) VALUES(:firstname, :lastname, :gender, :date, :email, :password)";
                    $query = $this->db->pdo->prepare($sql);
                    $query->bindValue(':firstname', $firstname);
                    $query->bindValue(':lastname', $lastname);
                    $query->bindValue(':gender', $gender);
                    $query->bindValue(':date', $date);
                    $query->bindValue(':email', $email);
                    $query->bindValue(':password', $password);
                    $result = $query->execute();

                    if ($result) {
                        $msg = "<div class='alert alert-success'>Регистрация выполнено успешно!</div>";
                    return $msg;
                    }else{
                        $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Возникла проблема с вложением ваших данных!</div>";
                    return $msg;
                    }

                }

                
                // checking email for uniqueness

                public function emailCheck($email){
                    $sql = "SELECT email FROM users WHERE email = :email";
                    $query = $this->db->pdo->prepare($sql);
                    $query->bindValue(':email', $email);
                    $query->execute();
                    if ($query->rowCount() > 0) {
                        return true;
                    }else{
                        return false;
                    }
                }

                // user login mechanism

                public function getLoginUser($email, $password){
                    $sql = "SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1";
                    $query = $this->db->pdo->prepare($sql);
                    $query->bindValue(':email', $email);
                    $query->bindValue(':password', $password);
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    return $result;
                }

                public function userLogin($data){
                    $email = $data['email'];
                    $password = md5($data['password']);

                    $chk_email = $this->emailCheck($email);
                    
                    if ($email == "" OR $password == "") {
                    $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong> Заполните поля!</div>";
                    return $msg;
                }

                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Не правильный адрес почты!</div>";
                    return $msg;
                }

                if ($chk_email == false) {
                    $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Адрес почты не найден!</div>";
                    return $msg;
                }

                    $result = $this->getLoginUser($email, $password);

                if ($result) {
                    Session::init();
                    Session::set("login", true);
                    Session::set("id", $result->id);
                    Session::set("firstname", $result->firstname);
                    Session::set("loginmsg", "<div class='alert alert-success'><strong>Поздравляю! </strong>Вы вошли!</div>");
                    header("Location: index.php");
                }
                else{
                        $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Не верный email или пароль!</div>";
                    return $msg;
                    }

                }

                //get all user data

                public function getUserData(){
                    $sql = "SELECT * FROM users ORDER BY id DESC";
                    $query = $this->db->pdo->prepare($sql);
                    $query->execute();
                    $result = $query->fetchAll();
                    return $result;
                }

                //get user by id

                public function getUserById($id){
                    $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
                    $query = $this->db->pdo->prepare($sql);
                    $query->bindValue(':id', $id);
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    return $result;
                }

                // update user info

                public function updateUser($id, $data){
                    $firstname = $data['firstname'];
                    $lastname = $data['lastname'];
                    $gender = $data['gender'];
                    $date = $data['date'];
                    $email = $data['email'];
                    
                    if ($firstname == "" OR $lastname == "" OR $gender == "" OR $gender == "NULL" OR $date == "" OR $email == "") {
                    $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong> Заполните поля</div>";
                    return $msg;
                }
                

                $sql = "UPDATE users SET firstname = :firstname, lastname = :lastname, gender = :gender, date = :date,
                    email = :email WHERE id = :id";
                    $query = $this->db->pdo->prepare($sql);
                    $query->bindValue(':firstname', $firstname);
                    $query->bindValue(':lastname', $lastname);
                    $query->bindValue(':gender', $gender);
                    $query->bindValue(':date', $date);
                    $query->bindValue(':email', $email);
                    $query->bindValue(':id', $id);
                    $result = $query->execute();

                    if ($result) {
                        $msg = "<div class='alert alert-success'>Данные успешно изменены!</div>";
                    return $msg;
                    }else{
                        $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Данные не найдены</div>";
                    return $msg;
                    }
                }

            //check old password mechanism

                public function checkPassword($id, $old_pass){
                    $password = md5($old_pass);
                    $sql = "SELECT password FROM users WHERE id = :id AND password = :password";
                    $query = $this->db->pdo->prepare($sql);
                    $query->bindValue(':id', $id);
                    $query->bindValue(':password', $password);
                    $query->execute();
                    if ($query->rowCount() > 0) {
                        return true;
                    }else{
                        return false;
                    }
                }

                //change password mechanism

                public function updatePassword($id, $data){
                    $old_pass = $data['old_pass'];
                    $new_pass = $data['password'];
                    $chk_pass = $this->checkPassword($id, $old_pass);

                    if ($old_pass == "" OR $new_pass == "") {
                        $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Заполните поля!</div>";
                    return $msg;
                    }

                    if ($chk_pass == false) {
                        $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Старый пароль не верный!</div>";
                    return $msg;
                    }

                    if (strlen($new_pass) < 6) {
                        $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Пароль слишком короткий!</div>";
                    return $msg;
                    }

                    $password = md5($new_pass);

                    $sql = "UPDATE users SET 
                    password = :password WHERE id = :id";
                    $query = $this->db->pdo->prepare($sql);
                    $query->bindValue(':id', $id);
                    $query->bindValue(':password', $password);
                    $result = $query->execute();

                    if ($result) {
                        $msg = "<div class='alert alert-success'>Пароль успешно изменен!</div>";
                    return $msg;
                    }else{
                        $msg = "<div class='alert alert-danger'><strong>Ошибка ! </strong>Пароль не изменен!</div>";
                    return $msg;
                    }
                }

	}

    ?>