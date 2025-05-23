<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-3 text-2xl mb-4"><?php echo isset($reservation) ? 'Edit Reservation' : 'Add Reservation'; ?></h2>
<form action="index.php?entity=reservation&action=<?php echo isset($reservation) ? 'update&id=' . $reservation['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Guest:</label>
        <select name="guest_id" class="border p-2 w-full" required>
            <option value="" selected disabled></option>
            <?php foreach ($guests as $guest): ?>
                <option value="<?php echo $guest['id']; ?>" <?php echo isset($reservation) && $reservation['guest_id'] == $guest['id'] ? 'selected' : ''; ?>><?php echo $guest['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Room:</label>
        <select name="room_id" class="border p-2 w-full" required>
            <option value="" selected disabled></option>
            <?php foreach ($rooms as $room): ?>
                <option value="<?php echo $room['id']; ?>" <?php echo isset($reservation) && $reservation['room_id'] == $room['id'] ? 'selected' : ''; ?>>
                    <?php echo $room['number']; ?> -
                    <?php echo $room['type']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label class="block">Check In:</label>
        <input type="date" name="check_in" value="<?php echo isset($reservation) ? $reservation['check_in'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Check Out:</label>
        <input type="date" name="check_out" value="<?php echo isset($reservation) ? $reservation['check_out'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-red-900 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>