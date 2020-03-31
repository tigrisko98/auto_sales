<?php
session_start();
require_once 'connection.php';

class SignIn
{
    protected $db;
    protected $email;
    protected $password;

    public function __construct($post, Connection $connection)
    {
        $this->db = $connection->getConnection();
        $this->email = $post['email'];
        $this->password = $post['password'];
    }

    public function show()
    {
        try {
            $checkUser = $this->db->query("SELECT * FROM `users`
                    WHERE `email` = '$this->email' AND `password` = '$this->password'");
            $result = $checkUser->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $_SESSION['user'] =
                    [
                        'id' => $result['id'],
                        'name' => $result['name'],
                        'email' => $result['email'],
                        'date_reg' => $result['date_reg']
                    ];
                header('Location: dashboard.php');
            } else {
                echo 'Unauthorized user';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$signin = new SignIn($_POST, new Connection());
$signin->show();