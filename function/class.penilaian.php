<?php
include_once "config.php";

class Penilaian
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }

    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM pertanyaan");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
}
