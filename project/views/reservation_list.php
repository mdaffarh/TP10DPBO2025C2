<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-3 text-2xl mb-4">Reservation List</h2>
<a href="index.php?entity=reservation&action=add" class="bg-red-900 text-white px-4 py-2 rounded mb-4 inline-block">Add Reservation</a>
<table class="w-full border shadow-md">
    <tr class="bg-gradient-to-br from-black to-red-900 text-white">
        <th class="border p-2">Guest Name</th>
        <th class="border p-2">Room Number</th>
        <th class="border p-2">Room Type</th>
        <th class="border p-2">Room Price</th>
        <th class="border p-2">Check In</th>
        <th class="border p-2">Check Out</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($reservationList as $reservation): ?>
        <tr class="bg-white">
            <td class="border p-2"><?php echo $reservation['guest_name']; ?></td>
            <td class="border p-2"><?php echo $reservation['room_number']; ?></td>
            <td class="border p-2"><?php echo $reservation['room_type']; ?></td>
            <td class="border p-2"><?php echo $reservation['room_price']; ?></td>
            <td class="border p-2"><?php echo $reservation['check_in']; ?></td>
            <td class="border p-2"><?php echo $reservation['check_out']; ?></td>
            <td class="border p-2">
                <a href="index.php?entity=reservation&action=edit&id=<?php echo $reservation['id']; ?>" class="text-blue-700">Edit</a>
                <a href="index.php?entity=reservation&action=delete&id=<?php echo $reservation['id']; ?>" class="text-red-700 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>