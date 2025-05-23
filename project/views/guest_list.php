<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-3 text-2xl mb-4">Guest List</h2>
<a href="index.php?entity=guest&action=add" class="bg-red-900 text-white px-4 py-2 rounded mb-4 inline-block">Add Guest</a>
<table class="w-full border shadow-md">
    <tr class="bg-gradient-to-br from-black to-red-900 text-white">
        <th class="border p-2">Guest Name</th>
        <th class="border p-2">Phone Number</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($guestList as $guest): ?>
        <tr class="bg-white">
            <td class="border p-2"><?php echo $guest['name']; ?></td>
            <td class="border p-2"><?php echo $guest['phone']; ?></td>
            <td class="border p-2">
                <a href="index.php?entity=guest&action=edit&id=<?php echo $guest['id']; ?>" class="text-blue-700">Edit</a>
                <a href="index.php?entity=guest&action=delete&id=<?php echo $guest['id']; ?>" class="text-red-700 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>