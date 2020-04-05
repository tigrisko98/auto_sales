<?php
require_once 'connectionInterface.php';

class Connection implements connectionInterface
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO(connectionInterface::DB_SETTINGS, connectionInterface::USER, connectionInterface::PASSWORD);
    }

    public function getConnection()
    {
        return $this->db;
    }

    public function getRecordsById($id)
    {
        $row = $this->db->query('SELECT * FROM `users` WHERE `id`=' . $id);
        return $row->fetch(PDO::FETCH_ASSOC);
    }

    public function registration($name, $email, $password): bool
    {
        $result = $this->db->prepare("INSERT INTO users (`name`, `email`, `password`)
                VALUES (:full_name, :email, :password)");
        $result->bindParam(':full_name', $name);
        $result->bindParam(':email', $email);
        $result->bindParam(':password', $password);
        return $result->execute();
    }

    public function checkUser($email, $password)
    {
        $checkUser = $this->db->query("SELECT * FROM `users`
                    WHERE `email` = '$email' AND `password` = '$password'");
        return $result = $checkUser->fetch(PDO::FETCH_ASSOC);
    }

    public function createAd($brand, $model, $price, $year, $mileage, $engine_capacity, $fuel, $gearbox, $drive,
                             $colour, $description) :bool
    {
        $createAd = $this->db->prepare("INSERT INTO `vehicles`(`brand`, `model`, `price`, `year`, 
                                       `mileage`, `engine_capacity`, `fuel`, `gearbox`, `drive`, `color`, `description`) 
                                       VALUES (:brand, :model, :price, :year, :mileage, :engine_capacity, :fuel, :gearbox,
                                               :drive, :colour, :description)");
        $createAd->bindParam(':brand', $brand);
        $createAd->bindParam(':model', $model);
        $createAd->bindParam(':price', $price);
        $createAd->bindParam(':year', $year);
        $createAd->bindParam(':mileage', $mileage);
        $createAd->bindParam(':engine_capacity', $engine_capacity);
        $createAd->bindParam(':fuel', $fuel);
        $createAd->bindParam(':gearbox', $gearbox);
        $createAd->bindParam(':drive', $drive);
        $createAd->bindParam(':colour', $colour);
        $createAd->bindParam(':description', $description);

        return $createAd->execute();
    }

}