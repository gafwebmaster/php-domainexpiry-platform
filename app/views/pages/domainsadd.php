<?php require APPROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto mt-5">
        <div class="card card-body bg-light mt5">

            <h1>Add domain</h1>            
            <form action="<?php echo URLROOT ?>/domains/add" method="post">               
                <div class="form-group">
                    <label for="name">Domain:</label>
                    <input type="text" name="domain" class="form-control   <?php echo(!empty($data['domain_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['domain']; ?>">
                    <span class="invalid-feedback"><?php echo $data['domain_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="customerName">Customer name:</label>
                    <input type="text" name="customerName" class="form-control   <?php echo(!empty($data['customerName_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['customerName']; ?>">
                    <span class="invalid-feedback"><?php echo $data['customerName_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="hostingCompany">Hosting company:</label>
                    <input type="text" name="hostingCompany" class="form-control   <?php echo(!empty($data['hostingCompany_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['hostingCompany']; ?>">
                    <span class="invalid-feedback"><?php echo $data['hostingCompany_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="otherDetails">Other details:</label>                    
                    <textarea class="form-control" id="otherDetails" rows="3" name="otherDetails" class="form-control   <?php echo(!empty($data['otherDetails_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['otherDetails']; ?>"></textarea>
                    <span class="invalid-feedback"><?php echo $data['otherDetails_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="domainExpiry">Domain expiry date:</label>
                    <input type="date" name="domainExpiry" class="form-control   <?php echo(!empty($data['domainExpiry_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['domainExpiry']; ?>">
                    <span class="invalid-feedback"><?php echo $data['domainExpiry_err'] ?></span>
                </div>  
                <div class="form-group">
                    <label for="hostingExpiry">Hosting expiry date:</label>
                    <input type="date" name="hostExpiry" class="form-control   <?php echo(!empty($data['hostExpiry_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['hostExpiry']; ?>">
                    <span class="invalid-feedback"><?php echo $data['hostExpiry_err'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Save" class="btn btn-success btn-block">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>