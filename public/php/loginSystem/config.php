<?php
include 'class.logsys.php';
/**
 * This configuration is for Subin's Blog Demos page
 * running on RedHat's OpenShift server
 */
\Fr\LS::$config = array(
    'basic' => array(
        'company'        => "Subin's Blog Demos",
        'email'          => 'mail@subinsb.com',
        'email_callback' => function ($email, $subject, $body) {
            $api_key = getenv('demo27_mailgun_key'); /* Api Key got from https://mailgun.com/cp/my_account */
            $domain  = 'subinsb.com'; /* Domain Name you given to Mailgun */

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $api_key);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/' . $domain . '/messages');
            curl_setopt($ch, CURLOPT_POSTFIELDS, array(
                'from'    => "Subin's Blog Demos - PHP logSys <mail@subinsb.com>",
                'to'      => $email,
                'subject' => $subject,
                'html'    => $body,
            ));
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        },
    ),
    'db'             => array(
        'host'     => getenv('OPENSHIFT_MYSQL_DB_HOST'),
        'port'     => getenv('OPENSHIFT_MYSQL_DB_PORT'),
        'username' => getenv('OPENSHIFT_MYSQL_DB_USERNAME'),
        'password' => getenv('OPENSHIFT_MYSQL_DB_PASSWORD'),
        'name'     => getenv('OPENSHIFT_GEAR_NAME'),
        'table'    => 'logSysUsers',
    ),
    'keys'           => array(
        'cookie' => getenv('demo27_logSys_cookie_key'),
        'salt'   => getenv('demo27_logSys_salt'),
    ),
    'features'       => array(
        'auto_init'      => true,
        'two_step_login' => true,
    ),
    'pages'          => array(
        'no_login'   => array(
            '/php/loginSystem/',
            '/php/loginSystem/reset.php',
            '/php/loginSystem/register.php',
        ),
        'login_page' => '/php/loginSystem/login.php',
        'home_page'  => '/php/loginSystem/home.php',
    ),
    'two_step_login' => array(
        'send_callback' => function ($uid, $token) {
            \Fr\LS::sendMail(\Fr\LS::getUser('email', $uid), 'logSys Two Step Verification', "Your account was logged in. To complete loggin in, type in this Two Step Verification Code : <blockquote>$token</blockquote><p>If you didn't attempt this login, ignore this email and conside <a href='https://demos.subinsb.com/php/loginSystem/change.php'>updating your password</a>.</p><p>- <a href='https://demos.subinsb.com'>Subin's Labs</a></p>");
        },
        'instruction'   => 'A token was sent to your E-Mail address. Paste the token in the box below :',
    ),
);
