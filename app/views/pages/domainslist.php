<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class='text-center'>Domain list</h1>
<?php flash('domain_deleted');
flash('domain_added');
flash('updated_domain'); ?>
<table class="table">
    <thead>
        <tr>      
            <th scope="col">Domain</th>
            <th scope="col">Domain expirity</th> 
            <th scope="col">Hosting expirity</th>
            <th scope="col">Edit</th>
            <th scope="col">Details</th>
            <th scope="col">Remove</th>     
        </tr>
    </thead>
<?php foreach ($data['domains'] as $val): ?>
        <tbody>
            <tr>      
                <td><?php echo $val->Domain; ?></td>
                <td>
    <?php echo $val->domainExpiry; ?>
                    <div class="progress">                
                        <div class="progress-bar progress-bar-striped progress-bar-animated <?php calculateDifference($val->domainExpiry); ?>" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php calculatePercentage($val->domainExpiry); ?>%"></div>

                    </div>
                </td>
                <td><?php echo $val->hostExpiry; ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated <?php calculateDifference($val->hostExpiry); ?>" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php calculatePercentage($val->domainExpiry); ?>%"></div>
                    </div>
                </td>
                <td>
                    <a href="<?php echo URLROOT; ?>/domains/updateDomain/<?php echo $val->Id; ?>" class="btn btn-outline-info">
                        Edit
                    </a>
                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#<?php echo domainToIp($val->Domain); ?>">
                        View
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo domainToIp($val->Domain); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo domainToIp($val->Domain); ?>Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="<?php echo $val->Domain; ?>Label">Details for: <?php echo $val->Domain; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Customer:</strong> <?php echo $val->customerName; ?></p>
                                    <p><strong>Hosting:</strong> <?php echo $val->hostingCompany; ?></p>
                                    <p><strong>Other details:</strong> <?php echo $val->otherDetails; ?></p>                  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>               
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <form action="<?php echo URLROOT; ?>/domains/deleteDomain/<?php echo $val->Id; ?>" method="post">
                        <input type="submit" value="Delete" class="btn btn-outline-danger">
                    </form>
                </td>
            </tr>  
        </tbody>
<?php endforeach; ?>
</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>