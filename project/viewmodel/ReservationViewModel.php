<?php
require_once 'model/Reservation.php';
require_once 'model/Room.php';
require_once 'model/Guest.php';

class ReservationViewModel
{
    private $staff;
    private $department;
    private $shift;

    public function __construct()
    {
        $this->staff = new Reservation();
        $this->department = new Room();
        $this->shift = new Guest();
    }

    public function getReservationList()
    {
        return $this->staff->getAll();
    }

    public function getReservationById($id)
    {
        return $this->staff->getById($id);
    }

    public function getRooms()
    {
        return $this->department->getAll();
    }

    public function getGuests()
    {
        return $this->shift->getAll();
    }

    public function addReservation($room_id, $guest_id, $check_in, $check_out)
    {
        return $this->staff->create($room_id, $guest_id, $check_in, $check_out);
    }

    public function updateReservation($id, $room_id, $guest_id, $check_in, $check_out)
    {
        return $this->staff->update($id, $room_id, $guest_id, $check_in, $check_out);
    }

    public function deleteReservation($id)
    {
        return $this->staff->delete($id);
    }
}
