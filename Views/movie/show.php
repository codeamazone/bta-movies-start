<?php require_once 'inc/html_header.php'; ?>

<?php if (isset($item) && is_array($item)) : ?>
    <table class="table table-striped">
        <tr>
            <th>ID:</th>
            <td><?php echo $item['id']; ?></td>
        </tr>
        <tr>
            <th>Titel:</th>
            <td><?php echo $item['title']; ?></td>
        </tr>
        <tr>
            <th>Autor (Vorname):</th>
            <td><?php echo $item['firstname']; ?></td>
        </tr>
        <tr>
            <th>Autor (Nachname):</th>
            <td><?php echo $item['lastname']; ?></td>
        </tr>
    </table>
<?php else : ?>
    <h3>Hier gibt es nichts zu sehen!</h3>
<?php endif; ?>

<?php require_once 'inc/html_footer.php'; ?>