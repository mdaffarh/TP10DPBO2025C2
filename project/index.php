<?php
require_once 'viewmodel/ReservationViewModel.php'; // reservation
require_once 'viewmodel/GuestViewModel.php'; // guest
require_once 'viewmodel/RoomViewModel.php'; // room

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'reservation';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'reservation') {
    $viewModel = new ReservationViewModel();
    if ($action == 'list') {
        $reservationList = $viewModel->getReservationList();
        require_once 'views/reservation_list.php';
    } elseif ($action == 'add') {
        $guests = $viewModel->getGuests();
        $rooms = $viewModel->getRooms();
        require_once 'views/reservation_form.php';
    } elseif ($action == 'edit') {
        $reservation = $viewModel->getReservationById($_GET['id']);
        $guests = $viewModel->getGuests();
        $rooms = $viewModel->getRooms();
        require_once 'views/reservation_form.php';
    } elseif ($action == 'save') {
        $viewModel->addReservation($_POST['room_id'], $_POST['guest_id'], $_POST['check_in'], $_POST['check_out']);
        header('Location: index.php?entity=reservation');
    } elseif ($action == 'update') {
        $viewModel->updateReservation($_GET['id'], $_POST['room_id'], $_POST['guest_id'], $_POST['check_in'], $_POST['check_out']);
        header('Location: index.php?entity=reservation');
    } elseif ($action == 'delete') {
        $viewModel->deleteReservation($_GET['id']);
        header('Location: index.php?entity=reservation');
    }
} elseif ($entity == 'guest') {
    $viewModel = new GuestViewModel();
    if ($action == 'list') {
        $guestList = $viewModel->getGuestList();
        require_once 'views/guest_list.php';
    } elseif ($action == 'add') {
        require_once 'views/guest_form.php';
    } elseif ($action == 'edit') {
        $guest = $viewModel->getGuestById($_GET['id']);
        require_once 'views/guest_form.php';
    } elseif ($action == 'save') {
        $viewModel->addGuest($_POST['name'], $_POST['phone']);
        header('Location: index.php?entity=guest');
    } elseif ($action == 'update') {
        $viewModel->updateGuest($_GET['id'], $_POST['name'], $_POST['phone']);
        header('Location: index.php?entity=guest');
    } elseif ($action == 'delete') {
        $viewModel->deleteGuest($_GET['id']);
        header('Location: index.php?entity=guest');
    }
} elseif ($entity == 'room') {
    $viewModel = new RoomViewModel();
    if ($action == 'list') {
        $roomList = $viewModel->getRoomList();
        require_once 'views/room_list.php';
    } elseif ($action == 'add') {
        require_once 'views/room_form.php';
    } elseif ($action == 'edit') {
        $room = $viewModel->getRoomById($_GET['id']);
        require_once 'views/room_form.php';
    } elseif ($action == 'save') {
        $viewModel->addRoom($_POST['number'], $_POST['type'], $_POST['price']);
        header('Location: index.php?entity=room');
    } elseif ($action == 'update') {
        $viewModel->updateRoom($_GET['id'], $_POST['number'], $_POST['type'], $_POST['price']);
        header('Location: index.php?entity=room');
    } elseif ($action == 'delete') {
        $viewModel->deleteRoom($_GET['id']);
        header('Location: index.php?entity=room');
    }
}
