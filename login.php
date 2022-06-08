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
    $user = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $db = new Model();
        $login = $db->login($_POST);

        if(!$login["status"]){
            $error 	= $login["error"];
        }else{
            $success = 'success';
            $user = (object)$login["user"];
        }
    }
?>

    <div class="wrapper col-md-6 offset-3" style="min-height: 80vh;">
        <form class="form" id="login_form" method="POST">
            <h3 class="title">Login</h3><?php
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
                if($user->user_type == 'Admin'):
                ?>
                <script>
                    window.location.href='admin/index.php'
                </script>
                <?php else: ?>
                    <script>
                        window.location.href='index.php'
                    </script>
                    <?php endif; ?>
            <?php endif; ?>

            <div class="form-group m-3">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter your Username" required/>
            </div>

            <div class="form-group m-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your Password" required/>
            </div>
            <div class="form-group float-end m-3">
                <span>Don't have any account? <a href="./register.php">Sign Up</a> Now</span>
            </div>
            <div class="form-group text-center m-4">
                <input type="submit" id="submit_login" value="Login" name="submit" class="btn btn-outline-success"/>
            </div>
        </form>
    </div>

<?php
    require_once './include/footer_control.php';
?>
