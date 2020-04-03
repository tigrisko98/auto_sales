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

    public function show($post)
    {
        try {
            $this->db->getConnection();
            $result = $this->db->checkUser($post['email'], $post['password']);

            if ($result) {
                $_SESSION['user'] =
                    [
                        'id' => $result['id'],
                        'name' => $result['name'],
                        'email' => $result['email'],
                        'date_reg' => $result['date_reg']
                    ];
                header('Location:/auto_sales/vendor/dashboard.php');
            } else {
               echo 'Unauthorized user';

            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function validate($post)
    {
        $countErrors = 0;

        if (empty($post['email'])){
            $_SESSION ['email_error'] = 'Please enter your Email';
            $countErrors++;
        }

        if (empty($post['password'])){
            $_SESSION ['password_error'] = 'Please enter your Password';
            $countErrors++;
        }
        if ($countErrors > 0){
            header('Location: ../index.php');

        } else{
            $this->show($post);
        }
    }
}

$signIn = new SignIn(new Connection());
$signIn->validate($_POST);