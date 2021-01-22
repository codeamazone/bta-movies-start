<?php require_once 'inc/html_header.php'; ?>

<?php if (isset($list) && count($list) > 0) : ?>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Autoren-ID</th>
            <th>Titel</th>
        </tr>
        <?php foreach ($list as $item) : ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['author_id']; ?></td>
                <td><a href="/movies/<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else : ?>
    <h3>Pech jehabt, Keule!</h3>
<?php endif; ?>

<?php require_once 'inc/html_footer.php'; ?>