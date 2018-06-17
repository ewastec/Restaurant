<?php
class FoodModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function showMenuEntree()
    {
        $sql = 'SELECT * FROM product WHERE id_category = ?';
        $value = [1];
        $result = $this->db->query($sql, $value);
        return $result;
    }
    public function showMenuPlates()
    {
        $sql = 'SELECT * FROM product WHERE id_category = ?';
        $value = [2];
        $result = $this->db->query($sql, $value);
        return $result;
    }
}