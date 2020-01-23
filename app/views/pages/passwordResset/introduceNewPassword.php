<?php require APPROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto mt-5">
        <div class="card card-body bg-light mt5">
            <?php flash('register_success'); ?>
            <h2>Write your new password</h2>
            <p>Password should have minimum 5 characters:</p>
            <form action="<?php echo URLROOT ?>/passwords/passwordChange" method="post">               
                <div class="form-group">
                    <label for="emailRecover"><ul>
                            <li>one or more letter: 'a' to 'z'</li>
                            <li>one or more letter: 'A' to 'Z'</li>
                            <li>one or more number: '0' to '9'</li>
                            <li>one or more special character: * ! @ # $ % ^ &</li>
                        </ul></label>
                    <input type="password" name="newPassword" class="form-control form-control-lg <?php echo(!empty($data['newPassword_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['newPassword']; ?>">
                    <span class="invalid-feedback"><?php echo $data['newPassword_err'] ?></span>
                </div>                

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Change the password" class="btn btn-success btn-block">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>