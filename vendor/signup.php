<?php
session_start();
require_once 'connection.php';

class SighUp
{
    protected $db;
    protected $full_name;
    protected $email;
    protected $password;
    protected $password_confirm;
    protected $error = false;

    public function __construct($post, Connection $connection)
    {
        $this->db = $connection->getConnection();
        $this->full_name = $post['full_name'];
        $this->email = $post['email'];
        $this->password = $post['password'];
        $this->password_confirm = $post['password_confirm'];
    }

    public function show()
    {
        try {
            $result = $this->db->prepare("INSERT INTO users (`name`, `email`, `password`)
                VALUES (:full_name, :email, :password)");
            $result->bindParam(':full_name', $this->full_name);
            $result->bindParam(':email', $this->email);
            $result->bindParam(':password', $this->password);
            $result->execute();

                $_SESSION['user'] =
                    [
                        'id' => $result['id'],
                        'name' => $result['name'],
                        'email' => $result['email'],
                        'date_reg' => $result['date_reg']
                    ];
                header('Location: /auto_sales/vendor/dashboard.php');

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$signUp = new SighUp($_POST, new Connection());
$signUp->show();



//$_SESSION['full_name'] = $full_name;
//$_SESSION['email'] = $email;
//$_SESSION['password'] = $password;
//$_SESSION['password_confirm'] = $password_confirm;