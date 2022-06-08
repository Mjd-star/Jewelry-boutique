<?php
    require_once './include/header_control.php';
    require_once './include/header.php';
    require_once './vendor/autoload.php';

    if(isset($_SESSION['users']) && !empty($_SESSION['users'])){
        $user = (object) $_SESSION['users'];
        if($user->user_type == 'Admin')
            echo "<script> window.location.href='admin/index.php' </script>";
        else echo "<script> window.location.href='index.php' </script>";
    }

    use JS\Jewelary\Model;

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $db = new Model();
        $register = $db->register($_POST);

        if(!$register["status"]){
            $error 	= $register["error"];
        }else{
            $success = 'Registration done successfully, Please login to access';
        }
    }
?>

<div class="wrapper col-md-8 offset-2" style="min-height: 80vh;">
    <form class="form" id="register_form" method="POST" action="">
        <h3 class="title">Register</h3>
        <?php
        if(isset($error) && !empty($error)):
            ?>

            <div class="alert alert-danger">
                <ol>
                    <?php foreach ($error as $err):?>
                        <li><?php echo $err;?></li>
                    <?php endforeach;?>
                </ol>
            </div>
        <?php endif; ?>

        <?php
        if(isset($success) && !empty($success)):
            ?>

            <div class="alert alert-success">
                <p class="text-center"><?php echo $success; ?></p>
            </div>
            <script>
                setTimeout(() => window.location.href='index.php', 2000);

            </script>
        <?php endif; ?>

        <div class="row m-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="f_name">First Name</label>
                    <input type="text" id="f_name" name="f_name" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Please enter alphabets only. ')" class="form-control" placeholder="Enter your First Name" required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" id="l_name" name="l_name" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Please enter alphabets only. ')" class="form-control" placeholder="Enter your Last Name" required/>
                </div>
            </div>
        </div>

        <div class="row m-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" pattern="[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9.-]{3,}\.[a-zA-Z]{2,4}" class="form-control" placeholder="Enter your Email" required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone No</label>
                    <input type="text" id="phone" name="phone" pattern="[+?096]+\s?\d{2}\s?\d{7}"
                           title="Phone number must be a valid number"  class="form-control" placeholder="Enter your Phone" required/>
                </div>
            </div>
        </div>

        <div class="row m-2">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" pattern="[A-Za-z]+" class="form-control" placeholder="Enter your Username" required/>
                </div>
            </div>
        </div>

        <div class="row m-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" onkeyup='check_pass();' id="password" name="password" class="form-control" placeholder="Enter your Password" required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" onkeyup='check_pass();' id="confirm_password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password" required/>
                    <small id="passwordHelp" class="text-danger" style="display: none;">
                        Password and confirm password does not match
                    </small>
                </div>
            </div>
        </div>

        <div class="form-group float-end m-3">
            <span>Already have an account? <a href="./login.php">Login</a> here</span>
        </div>

        <div class="row m-4">
            <div class="col-md-12">
                <div class="form-group text-center">
                    <input type="submit" id="submit_register" value="Register" name="submit" class="btn btn-outline-success"/>
                </div>
            </div>
        </div>
        <script>
            function check_pass() {
                if (document.getElementById('confirm_password').value !== '' && document.getElementById('password').value == document.getElementById('confirm_password').value) {
                    document.getElementById('passwordHelp').style.display = 'none';
                    document.getElementById('submit').disabled = false;
                } else {
                    document.getElementById('passwordHelp').style.display = '';
                    document.getElementById('submit').disabled = true;
                }
            }
        </script>
    </form>
</div>

<?php
    require_once './include/footer_control.php';
?>
