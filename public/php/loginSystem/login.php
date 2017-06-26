<?php
require_once __DIR__ . '/../../../inc/load.php';
init(27);

require 'config.php';
$LS->init();
?>
<html>
 <head>
    <title>Log In</title>
    <?php head();?>
    </head>
    <body>
        <?php top();?>
        <div class="container" id="content">
            <h1>Log In</h1>
            <p>This demo shows how logSys can be used to implement two step verification.</p>
            <?php
            function showErrorMessage($title, $message)
            {
                echo <<<HTML
<div class="card card-panel red">
    <span class="white-text">
        <div class="card-title ">$title</div>
        <p>$message</p>
    </span>
</div>
HTML;
            }

            $two_step_login_form_display = false;
            try {
                if (isset($_POST['action_login'])) {
                    /**
                     * Try login
                     */
                    $LS->twoStepLogin($_POST['login'], $_POST['password'], isset($_POST['remember_me']));
                } else {
                    /**
                     * Handle 2 Step Login
                     */
                    $LS->twoStepLogin();
                }
            } catch (Fr\LS\TwoStepLogin $TSL) {

                if ($TSL->getStatus() === 'login_fail') {
                    showErrorMessage(
                        'Login Failed',
                        'Username or Password wrong'
                    );
                } elseif ($TSL->getStatus() === 'blocked') {
                    $blockInfo = $TSL->getBlockInfo();

                    showErrorMessage(
                        'Blocked',
                        'Too many login attempts. You can attempt login after ' . $blockInfo['minutes'] . ' minutes (' . $blockInfo['seconds'] . ' seconds)'
                    );
                } elseif ($TSL->getStatus() === 'enter_token_form' || $TSL->getStatus() === 'invalid_token') {
                    $two_step_login_form_display = true;

                    if ($TSL->getStatus() === 'invalid_token') {
                        showErrorMessage(
                            'Wrong Token',
                            'You entered a wrong token. You have ' . $TSL->getOption('tries_left') . ' tries left'
                        );
                    }

                    $curPageURL         = Fr\LS::curPageURL();
                    $two_step_login_uid = $TSL->getOption('uid');

                    echo <<<HTML
<form action="$curPageURL" method="POST">
    <p>A token was sent to your E-Mail address. Paste the token in the box below :</p>
    <div class="input-field">
        <div for="two_step_login_token">Token</div>
        <input type="text" name="two_step_login_token" id="two_step_login_token" placeholder="Paste the token here..." />
    </div>
    <div class="center-align">
        <input type="checkbox" name="two_step_login_remember_device" id="two_step_login_remember_device" />
        <label for="two_step_login_remember_device">Remember this device ?</label>
    </div>
    <input type='hidden' name="two_step_login_uid" value="$two_step_login_uid" />
HTML;

                    if ($TSL->getOption('remember_me')) {
                        $csrfInputField = $LS->csrf('i');

                        echo <<<HTML
<input type="hidden" name="two_step_login_remember_me" />
$csrfInputField
HTML;
                    }

                    echo <<<HTML
    <div class="input-field center-align">
        <button class="btn green">Verify</button>
        <a onclick="window.location.reload();" href="#">Resend Token</a>
    </div>
</form>
HTML;

                } elseif ($TSL->getStatus() === 'login_success') {
                    // Nothing to do. Auto Init will do the redirect if it's enabled
                } elseif ($TSL->isError()) {
                    showErrorMessage(
                        'Error',
                        $TSL->getStatus()
                    );
                }
            }

            if (!$two_step_login_form_display) {

                $login = isset($_POST['login']) ? htmlspecialchars($_POST['login']) : '';
                $rememberMe = isset($_POST['remember_me']) ? 'checked="checked"' : '';

                echo <<<HTML
<form action="login.php" method="POST">
    <div class="input-field">
        <div for="login">Username / E-Mail</div>
        <input type="text" name="login" id="login" value="$login" />
    </div>
    <div class="input-field">
        <div for="password">Password</div>
        <input type="password" name="password" id="password" />
    </div>
    <div class="center-align">
        <input type="checkbox" name="remember_me" id="remember_me" $rememberMe />
        <label for="remember_me">Remember Me</label>
    </div>
    <div class="input-field center-align">
        <button name="action_login" class="btn green">Log In</button>
    </div>
</form>
HTML;
            }
            ?>
            <div class="row">
                <div class="col l6 right-align">
                    <p>Don't have an account ?</p>
                    <a class="btn orange" href="register.php">Register</a>
                </div>
                <div class="col l6">
                    <p>Forgot Your Password ?</p>
                    <a class="btn red" href="reset.php">Reset Password</a>
                </div>
            </div>
        </div>
        <?php footer();?>
    </body>
</html>
