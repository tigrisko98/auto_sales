<?php
require_once 'connectionInterface.php';

class Connection implements connectionInterface
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO(connectionInterface::DB_SETTINGS,connectionInterface::USER, connectionInterface::PASSWORD);
    }

    public function getConnection()
    {
        return $this->db;
    }
}