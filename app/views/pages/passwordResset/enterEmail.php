<?php require APPROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto mt-5">
        <div class="card card-body bg-light mt5">
            <?php flash('register_success'); ?>
            <h2>Write your email</h2>
            <p>Password could be reseated just by the owner email</p>
            <form action="<?php echo URLROOT ?>/passwords" method="post">               

                <div class="form-group">
                    <label for="emailRecover">What is the owner email?</label>
                    <input type="email" name="emailRecover" class="form-control form-control-lg <?php echo(!empty($data['emailRecover_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['emailRecover']; ?>">
                    <span class="invalid-feedback"><?php echo $data['emailRecover_err'] ?></span>
                </div>                

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Recover" class="btn btn-success btn-block">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>