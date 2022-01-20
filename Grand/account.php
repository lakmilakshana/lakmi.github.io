<?php
require_once "initialize.php";
$errors = [];
$user = null;
$authController->require_login();
$user = $session->get_logged_in_user();
$editable = false;
$active = 'view';

if (isset($_GET['editable'])) {
    $editable = true;
    $active = 'edit';
}

if (isset($_POST['update-password'])){
    $old_password = $_POST['old_password'];
    $user_password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password'];

    $result = $user->verify_password($old_password);

    if ($result !== false){
        $user->set_password();
        if($user->patch_update(['password' => $user->password])){
            redirect_to("account.php?id=". $user->id);
        }else{
            redirect_to("account.php?id=". $user->id. "&editable=1");
        }
    }else{
        $errors['old-password'] = "Your old password doesn't match with what you entered";
    }

}

if (isset($_POST['update-profile'])){
    $args = $_POST['user'];
    $result = $user->patch_update($args);
    if ($result !== false){
        redirect_to("account.php?id=". $user->id);
    }else{
        redirect_to("account.php?id=". $user->id. "&editable=1");

    }

}?>


<?php
require_once "header.php";
?>
<div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >

    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <h1 style="color: white; font-weight: bolder;">Your Profile</h1>



            </div>
        </div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="mt-5 mb-5">

    <section class="container">
        <div class="row">
            <div class="col-12">

                <?php if ($editable) {?>
                    <p class="lead">Change your personal details or your password here.</p>
                <?php }else{?>
                    <p class="lead">View your personal details here. Or click <a href="account.php?editable=1"> here </a> to edit. </p>

                <?php }?>

                <?php if ($editable) {?>
                    <div class="box mt-5">
                        <div class="container">
                        <div class="heading">
                            <h3 class="text-uppercase">Change password</h3>
                        </div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_old">Old password</label>
                                        <input id="password_old" name="old_password" type="password" class="form-control <?= (isset($errors['old-password'])) ? 'is-invalid' : '' ?>">
                                        <small class="text-danger"><?= (isset($errors['old-password'])) ? $errors['old-password'] : '' ?> </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_1">New password</label>
                                        <input id="password_1" name="user_password" type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password</label>
                                        <input id="password_2" name="confirm_password" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="update-password" class="btn btn-success"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>
                    </div>
                    </div>
                <?php }?>
                <div class="box ">
                    <div class="container">
                    <div class="heading">
                        <h3 class="text-uppercase">Personal details </h3>
                    </div>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input id="firstname"  <?= ($editable) ? '' :'disabled'?> type="text" value="<?= (isset($user->first_name)) ? $user->first_name: '' ?>" name="user[first_name]" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input id="lastname" <?= ($editable) ? '' :'disabled'?> type="text" value="<?= (isset($user->last_name)) ? $user->last_name: '' ?>" name="user[last_name]" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Telephone</label>
                                    <input id="phone" <?= ($editable) ? '' : 'disabled'?> name="user[phone_number]" value="<?= (isset($user->phone_number)) ? $user->phone_number: '' ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email_account">Email</label>
                                    <input id="email_account" <?= ($editable) ? '' : 'disabled'?> value="<?= (isset($user->user_mail)) ? $user->user_mail: '' ?>" name="user[user_mail]" type="text" class="form-control">
                                </div>
                            </div>
                            <?php if ($editable){?>
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="update-profile" class="btn btn-success"><i class="fa fa-save"></i> Save changes</button>
                                </div>
                            <?php } ?>
                        </div>
                    </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once "footer.php"?>
