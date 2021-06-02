<?php
include_once "config.php";

class Pertanyaan
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }
    public function input($pertanyaan, $gambar)
    {
        $query = $this->db->prepare("INSERT INTO pertanyaan VALUES 
        (null,'$pertanyaan','$gambar')");
        $query->execute();
        return true;
    }
    public function tampil()
    {
        $query = $this->db->prepare("SELECT a.id, a.pertanyaan, a.gambar, b.pertanyaan_id,
        b.pertanyaan_id, b.jenis_tubuh_id, 
        c.id, c.jenis As jenis 
        FROM pertanyaan as a, jenis_tubuh_pertanyaan as b, jenis_tubuh as c 
        WHERE a.id = b.pertanyaan_id
        AND b.jenis_tubuh_id = c.id");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
}
