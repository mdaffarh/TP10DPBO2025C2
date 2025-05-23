<?php
require_once 'config/Database.php';

class Guest
{
    private $conn;
    private $table = 'guests';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ambil semua tamu
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil tamu berdasarkan ID
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah tamu baru
    public function create($name, $phone)
    {
        $query = "INSERT INTO " . $this->table . " (name, phone) 
                  VALUES (:name, :phone)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        return $stmt->execute();
    }

    // Update tamu
    public function update($id, $name, $phone)
    {
        $query = "UPDATE " . $this->table . " 
                  SET name = :name, phone = :phone 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Hapus tamu
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
