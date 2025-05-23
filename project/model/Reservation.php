<?php
require_once 'config/Database.php';

class Reservation
{
    private $conn;
    private $table = 'reservations';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ambil semua reservasi lengkap dengan nama tamu dan info kamar
    public function getAll()
    {
        $query = "SELECT r.*, 
                         g.name AS guest_name, 
                         rm.number AS room_number, 
                         rm.type AS room_type, 
                         rm.price AS room_price
                  FROM " . $this->table . " r
                  JOIN guests g ON r.guest_id = g.id
                  JOIN rooms rm ON r.room_id = rm.id
                  ORDER BY r.id
                  ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil reservasi berdasarkan ID
    public function getById($id)
    {
        $query = "SELECT r.*, 
                         g.name AS guest_name, 
                         rm.number AS room_number, 
                         rm.type AS room_type, 
                         rm.price AS room_price
                  FROM " . $this->table . " r
                  JOIN guests g ON r.guest_id = g.id
                  JOIN rooms rm ON r.room_id = rm.id
                  WHERE r.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah reservasi baru
    public function create($room_id, $guest_id, $check_in, $check_out)
    {
        $query = "INSERT INTO " . $this->table . " (room_id, guest_id, check_in, check_out) 
                  VALUES (:room_id, :guest_id, :check_in, :check_out)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':room_id', $room_id);
        $stmt->bindParam(':guest_id', $guest_id);
        $stmt->bindParam(':check_in', $check_in);
        $stmt->bindParam(':check_out', $check_out);
        return $stmt->execute();
    }

    // Update reservasi
    public function update($id, $room_id, $guest_id, $check_in, $check_out)
    {
        $query = "UPDATE " . $this->table . " 
                  SET room_id = :room_id, guest_id = :guest_id, check_in = :check_in, check_out = :check_out 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':room_id', $room_id);
        $stmt->bindParam(':guest_id', $guest_id);
        $stmt->bindParam(':check_in', $check_in);
        $stmt->bindParam(':check_out', $check_out);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Hapus reservasi
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
