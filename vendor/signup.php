<?php
session_start();
require_once 'connection.php';

class SignUp
{
    protected $db;
    protected $full_name;
    protected $email;
    protected $password;
    protected $password_confirm;
    protected $error = false;

    public function __construct($post, Connection $connection)
    {
        $this->db = $connection;
        $this->full_name = $post['full_name'];
        $this->email = $post['email'];
        $this->password = $post['password'];
        $this->password_confirm = $post['password_confirm'];
    }

    public function show()
    {
        try {
            $db = $this->db->getConnection();
            $result = $this->db->registration($this->full_name, $this->email, $this->password);

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
                header('Location: /vendor/dashboard.php');
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$signUp = new SignUp($_POST, new Connection());
$signUp->show();



//$_SESSION['full_name'] = $full_name;
//$_SESSION['email'] = $email;
//$_SESSION['password'] = $password;
//$_SESSION['password_confirm'] = $password_confirm;