<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-3 text-2xl mb-4"><?php echo isset($guest) ? 'Edit Guest' : 'Add Guest'; ?></h2>
<form action="index.php?entity=guest&action=<?php echo isset($guest) ? 'update&id=' . $guest['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Guest Name:</label>
        <input type="text" name="name" value="<?php echo isset($guest) ? $guest['name'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Phone Number:</label>
        <input type="tel" name="phone" value="<?php echo isset($guest) ? $guest['phone'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-red-900 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>