<?php
include_once "config.php";

class Bidang
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }
    public function input($id, $nama, $perusahaan)
    {
        $query = $this->db->prepare("INSERT INTO bidang VALUES 
        ('$id','$nama','$perusahaan')");
        $query->execute();
        return true;
    }
    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM bidang");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
}
