<?php
include_once "config.php";

class Perusahaan
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }
    public function input($id, $nama)
    {
        $query = $this->db->prepare("INSERT INTO perusahaan VALUES 
        ('$id','$nama')");
        $query->execute();
        return true;
    }
    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM perusahaan");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
}
