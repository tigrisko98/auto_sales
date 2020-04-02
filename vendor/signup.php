<?php
session_start();
require_once 'connection.php';

class SignUp
{
    protected $db;

    public function __construct(Connection $connection)
    {
        $this->db = $connection;
    }

    public function show($post)
    {
        try {
            $db = $this->db->getConnection();
            $result = $this->db->registration($post['full_name'], $post['email'], $post['password']);

            if ($result) {
                $lastId = $db->lastInsertId();
                $row = $this->db->getRecordsById($lastId);

                $_SESSION['user'] =
                    [
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'date_reg' => $row['date_reg']
                    ];
                header('Location: /auto_sales/vendor/dashboard.php');
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function validation ($post)
    {
        $countErrors = 0;

        if ($post['password'] !== $post['password_confirm'] && !empty($post['password'])){
            $_SESSION ['password_confirm_error'] = 'Passwords are different';
            $countErrors++;
        }

        if (empty($post['full_name'])){
            $_SESSION ['full_name_error'] = 'Please enter your Full name';
            $countErrors++;
        }

        if (empty($post['email'])){
            $_SESSION ['email_error'] = 'Please enter your Email';
            $countErrors++;
        }

        if (empty($post['password'])){
            $_SESSION ['password_error'] = 'Please enter your Password';
            $countErrors++;
        }

        if (empty($post['password_confirm'])){
            $_SESSION ['password_confirm_error'] = 'Please confirm your Password';
            $countErrors++;
        }
        if ($countErrors > 0){
            header('Location: ../register.php');

        } else{
            $this->show($post);
        }
    }
}

$signUp = new SignUp(new Connection());
$signUp->validation($_POST);










//$_SESSION['full_name'] = $full_name;
//$_SESSION['email'] = $email;
//$_SESSION['password'] = $password;
//$_SESSION['password_confirm'] = $password_confirm;