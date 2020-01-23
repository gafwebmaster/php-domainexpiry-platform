<?php require APPROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto mt-5">
        <div class="card card-body bg-light mt5">
            <?php flash('password_changed'); ?>
            <h2 class='text-center'>Login</h2>            
            <form action="<?php echo URLROOT ?>/logins" method="post">               

                <div class="form-group">
                    <label for="name">Password:</label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo(!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                </div>                

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>