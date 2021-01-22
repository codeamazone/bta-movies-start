<?php require_once 'inc/html_header.php'; ?>

<div>
    <a href="/movies/edit" role="button" class="btn btn-primary mt-0 mb-3">Neuen Film anlegen</a>
</div>

<?php if (isset($list) && count($list) > 0) : ?>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Autoren-ID</th>
            <th>Titel</th>
            <th colspan="2"><br></th>
        </tr>
        <?php foreach ($list as $item) : ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['author_id']; ?></td>
                <td><a href="/movies/<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></td>
                <td class="col-1"><a href="/movies/edit/<?php echo $item['id']; ?>" class="btn-sm btn-primary" role="button">Edit</a></td>
                <td class="col-1"><a href="/authors/delete/<?php echo $item['id']; ?>" class="btn-sm btn-danger delsoft" role="button">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else : ?>
    <h3>Kannste knicken!</h3>
<?php endif; ?>

<?php require_once 'inc/html_footer.php'; ?>