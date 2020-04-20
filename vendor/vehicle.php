<?php
require_once 'connection.php';

class vehicle
{
    protected $db;
    protected $years;
    const PRICE = [200, 500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 6000, 7000, 8000, 9000, 10000, 11000,
        12500, 14000, 15000, 17500, 20000, 22500, 25000, 27500, 30000, 35000, 40000, 45000, 50000, 60000, 75000, 100000];
    const FUEL = ['Gas', 'Petrol', 'Gas/Petrol', 'Hybrid', 'Electric'];
    const GEARBOX = ['Manual', 'Manual-4', 'Manual-5', 'Manual-6', 'Automatic', 'Manumatic', 'Semi-tronic',
        'Semi-automatic', 'Variator'];
    const DRIVE = ['FWD', 'RWD', 'AWD'];

    public function __construct(Connection $connection)
    {
        $this->db = $connection;
    }

    public function getYears()
    {
        $this->years = range(1921, 2020);
        return $this->years;
    }

    public function getPrice()
    {
        return self::PRICE;
    }

    public function getFuel()
    {
        return self::FUEL;
    }

    public function getGearbox()
    {
        return self::GEARBOX;
    }

    public function getDrive()
    {
        return self::DRIVE;
    }

    public function show($post)
    {
        try {
            $this->db->getConnection();
            $result = $this->db->createAd($post['brand'], $post['model'], $post['price'], $post['year'], $post['mileage'],
                $post['engine_capacity'], $post['fuel'], $post['gearbox'], $post['drive'],
                $post['colour'], $post['description']);
            if ($result) {
                echo 'Your Ad posted successfully!';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function showAds($post)
    {
        try {
            $this->db->getConnection();
           $result = $this->db->searchAd($post['brand'], $post['model'], $post['yearFrom'], $post['yearTo'],
                $post['priceFrom'], $post['priceTo']);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

}

$car = new vehicle(new Connection());
$years = $car->getYears();
$prices = $car->getPrice();
$fuels = $car->getFuel();
$gearboxes = $car->getGearbox();
$drives = $car->getDrive();

if (isset($_POST['postAd'])) {
    $car->show($_POST);
}

if (isset($_POST['search'])) {
    $car->showAds($_POST);
}