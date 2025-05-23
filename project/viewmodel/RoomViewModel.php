<?php
require_once 'model/Room.php';

class RoomViewModel
{
    private $department;

    public function __construct()
    {
        $this->department = new Room();
    }

    public function getRoomList()
    {
        return $this->department->getAll();
    }

    public function getRoomById($id)
    {
        return $this->department->getById($id);
    }

    public function addRoom($number, $type, $price)
    {
        return $this->department->create($number, $type, $price);
    }

    public function updateRoom($id, $number, $type, $price)
    {
        return $this->department->update($id, $number, $type, $price);
    }

    public function deleteRoom($id)
    {
        return $this->department->delete($id);
    }
}
