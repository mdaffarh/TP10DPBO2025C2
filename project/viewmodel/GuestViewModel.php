<?php
require_once 'model/Guest.php';

class GuestViewModel
{
    private $shift;

    public function __construct()
    {
        $this->shift = new Guest();
    }

    public function getGuestList()
    {
        return $this->shift->getAll();
    }

    public function getGuestById($id)
    {
        return $this->shift->getById($id);
    }

    public function addGuest($name, $phone)
    {
        return $this->shift->create($name, $phone);
    }

    public function updateGuest($id, $name, $phone)
    {
        return $this->shift->update($id, $name, $phone);
    }

    public function deleteGuest($id)
    {
        return $this->shift->delete($id);
    }
}
