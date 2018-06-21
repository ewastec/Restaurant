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
    public function showMenuDeserts()
    {
        $sql = 'SELECT * FROM product WHERE id_category = ?';
        $value = [3];
        $result = $this->db->query($sql, $value);
        return $result;
    }
    public function showMenuBoissons()
    {
        $sql = 'SELECT * FROM product WHERE id_category = ?';
        $value = [4];
        $result = $this->db->query($sql, $value);
        return $result;
    }
    public function showCategories()
    {
        $sql = 'SELECT * FROM category';
        $value = [];
        $result = $this->db->query($sql, $value);
        return $result;
    }
}