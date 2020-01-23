<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>Black list</h1>
<?php flash('remove_blacklist'); ?>
<table class="table">
    <thead>
        <tr>      
            <th scope="col">Ip</th>
            <th scope="col">Atempts</th>
            <th scope="col">Date/time</th>
            <th scope="col">Remove</th>     
        </tr>
    </thead>
    <?php foreach ($data['blacklist'] as $val): ?>
        <tbody>
            <tr>
                <td><?php echo $val->Ip; ?></td>       
                <td><?php echo $val->Atempts; ?></td>  
                <td><?php echo $val->atemptDate; ?></td>
                <td>
                    <form action="<?php echo URLROOT; ?>/domains/removeblacklist/<?php echo $val->Id; ?>" method="post">
                        <input type="submit" value="Remove from black list" class="btn btn-success" <?php if ($val->Atempts == 0) {
        echo 'disabled';
    } ?>>
                    </form>
                </td>
            </tr>  
        </tbody>
<?php endforeach; ?>
</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>