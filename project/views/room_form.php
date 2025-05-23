<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-3 text-2xl mb-4"><?php echo isset($room) ? 'Edit Room' : 'Add Room'; ?></h2>
<form action="index.php?entity=room&action=<?php echo isset($room) ? 'update&id=' . $room['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Number:</label>
        <input type="text" name="number" value="<?php echo isset($room) ? $room['number'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Type:</label>
        <input type="text" name="type" value="<?php echo isset($room) ? $room['type'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Price:</label>
        <input type="text" name="price" value="<?php echo isset($room) ? $room['price'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-red-900 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>