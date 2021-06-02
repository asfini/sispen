<?php
include_once "config.php";

class Jenis
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }
    public function input($id, $jenis)
    {
        $query = $this->db->prepare("INSERT INTO jenis_tubuh VALUES 
        ('$id','$jenis')");
        $query->execute();
        return true;
    }
    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM jenis_tubuh");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
}
