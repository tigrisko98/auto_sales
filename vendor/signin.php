<?php
session_start();
require_once 'connection.php';

class SignIn
{
    protected $db;


    public function __construct(Connection $connection)
    {
        $this->db = $connection;

    }

    public function show($result)
    {
        $_SESSION['user'] =
            [
                'id' => $result['id'],
                'name' => $result['name'],
                'email' => $result['email'],
                'date_reg' => $result['date_reg']
            ];
        header('Location: dashboard.php');
    }

    public function validate($post)
    {
        $countErrors = 0;

        if (empty($post['email'])) {
            $_SESSION ['email_error'] = 'Please enter your E-mail';
            $countErrors++;
        }

        if (empty($post['password'])) {
            $_SESSION ['password_error'] = 'Please enter your Password';
            $countErrors++;
        }

        if ($countErrors == 0) {
            $this->db->getConnection();
            $result = $this->db->checkUser($post['email'], $post['password']);
            if ($result) {
                $this->show($result);
            } else {
                $_SESSION['email_password_error'] = 'Incorrect E-mail or Password';
                header('Location: ../index.php');
            }
        } else {
            header('Location: ../index.php');
        }

    }
}

$signIn = new SignIn(new Connection());
$signIn->validate($_POST);