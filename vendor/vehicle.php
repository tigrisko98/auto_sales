<?php
require_once 'connection.php';

class vehicle
{
    protected $db;
    const YEAR = [1998, 1999, 2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013,
        2014, 2015, 2016, 2017, 2018, 2019, 2020];
    const FUEL = ['Gas', 'Petrol', 'Gas/Petrol', 'Hybrid', 'Electric'];
    const GEARBOX = ['Manual', 'Manual-4', 'Manual-5', 'Manual-6', 'Automatic', 'Manumatic', 'Semi-tronic',
        'Semi-automatic', 'Variator'];
    const DRIVE = ['FWD', 'RWD', 'AWD'];

    public function __construct(Connection $connection)
    {
        $this->db = $connection;
    }

    public function getYear()
    {
        return self::YEAR;
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
}

$car = new vehicle(new Connection());
$years = $car->getYear();
$fuels = $car->getFuel();
$gearboxes = $car->getGearbox();
$drives = $car->getDrive();

if (isset($_POST['postAd'])){
    $car->show($_POST);
}
