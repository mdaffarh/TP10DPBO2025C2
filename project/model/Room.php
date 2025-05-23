<?php
require_once 'config/Database.php';

class Room
{
    private $conn;
    private $table = 'rooms';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ambil semua kamar
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil data kamar berdasarkan ID
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah kamar baru
    public function create($number, $type, $price)
    {
        $query = "INSERT INTO " . $this->table . " (number, type, price) 
                  VALUES (:number, :type, :price)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':price', $price);
        return $stmt->execute();
    }

    // Update data kamar
    public function update($id, $number, $type, $price)
    {
        $query = "UPDATE " . $this->table . " 
                  SET number = :number, type = :type, price = :price 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Hapus kamar
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
