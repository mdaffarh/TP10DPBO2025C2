<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-3 text-2xl mb-4">Room List</h2>
<a href="index.php?entity=room&action=add" class="bg-red-900 text-white px-4 py-2 rounded mb-4 inline-block">Add Room</a>
<table class="w-full border shadow-md">
    <tr class="bg-gradient-to-br from-black to-red-900 text-white">
        <th class="border p-2">Number</th>
        <th class="border p-2">Type</th>
        <th class="border p-2">Price</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($roomList as $room): ?>
        <tr class="bg-white">
            <td class="border p-2"><?php echo $room['number']; ?></td>
            <td class="border p-2"><?php echo $room['type']; ?></td>
            <td class="border p-2"><?php echo $room['price']; ?></td>
            <td class="border p-2">
                <a href="index.php?entity=room&action=edit&id=<?php echo $room['id']; ?>" class="text-blue-700">Edit</a>
                <a href="index.php?entity=room&action=delete&id=<?php echo $room['id']; ?>" class="text-red-700 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>