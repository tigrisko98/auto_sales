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
                             $colour, $description): bool
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

    public function fieldsData()
    {
        $fieldsData = $this->db->query("SELECT * FROM `vehicles`");
        return $result = $fieldsData->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchAd($brand, $model, $yearFrom, $yearTo, $priceFrom, $priceTo)
    {
        if ($brand && $model && $yearFrom && $yearTo && $priceFrom && $priceTo) {
            $searchAd = $this->db->query("SELECT * FROM `vehicles`
                    WHERE `brand` = '$brand' AND `model` = '$model' AND `year` BETWEEN '$yearFrom' AND '$yearTo' 
                    AND `price` BETWEEN '$priceFrom' AND '$priceTo'");
        }
        if ($brand != '- all brands -' && $model == '- all models -' && ($yearFrom && $priceFrom) == 'from' &&
            ($yearTo && $priceTo) == 'to') {
            $searchAd = $this->db->query("SELECT * FROM `vehicles`
                    WHERE `brand` = '$brand'");
        }
        if ($brand == '- all brands -' && $model == '- all models -' && ($yearFrom && $priceFrom) == 'from' &&
            ($yearTo && $priceTo) == 'to') {
            $searchAd = $this->db->query("SELECT * FROM `vehicles`");
        }
        if ($brand == '- all brands -' && $model == '- all models -' && $yearFrom != 'from' && $priceFrom == 'from'
            && ($yearTo && $priceTo) == 'to') {
            $searchAd = $this->db->query("SELECT * FROM `vehicles` WHERE `year` BETWEEN '$yearFrom' AND '2020'");
        }
        if ($brand == '- all brands -' && $model == '- all models -' && ($yearFrom && $priceFrom) == 'from'
            && $yearTo != 'to' && $priceTo == 'to') {
            $searchAd = $this->db->query("SELECT * FROM `vehicles` WHERE `year` BETWEEN '1921' AND '$yearTo'");
        }
        if ($brand == '- all brands -' && $model == '- all models -' && $yearFrom != 'from' && $priceFrom == 'from'
            && $yearTo != 'to' && $priceTo == 'to') {
            $searchAd = $this->db->query("SELECT * FROM `vehicles` WHERE `year` BETWEEN '$yearFrom' AND '$yearTo'");
        }
        if ($brand == '- all brands -' && $model == '- all models -' && $yearFrom == 'from' && $priceFrom != 'from'
            && ($yearTo && $priceTo) == 'to') {
            $searchAd = $this->db->query("SELECT * FROM `vehicles` WHERE `price` BETWEEN '$priceFrom' AND '100000'");
        }
        if ($brand == '- all brands -' && $model == '- all models -' && ($yearFrom && $priceFrom) == 'from'
            && $yearTo == 'to' && $priceTo != 'to') {
            $searchAd = $this->db->query("SELECT * FROM `vehicles` WHERE `price` BETWEEN '200' AND '$priceTo'");
        }
        if ($brand == '- all brands -' && $model == '- all models -' && $yearFrom == 'from' && $priceFrom != 'from'
            && $yearTo == 'to' && $priceTo != 'to') {
            $searchAd = $this->db->query("SELECT * FROM `vehicles` WHERE `year` BETWEEN '$priceFrom' AND '$priceTo'");
        }


        return $result = $searchAd->fetchAll(PDO::FETCH_ASSOC);
    }
}