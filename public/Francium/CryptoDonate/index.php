<?php
require_once __DIR__ . '/../../../inc/load.php';
init(46);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php head();?>
        <link async="async" href="//lab.subinsb.com/projects/francium/cryptodonate/css/cryptodonate.css" rel="stylesheet"/>
        <link async="async" href="//lab.subinsb.com/projects/francium/cryptodonate/css/cryptodonate.dark.css" rel="stylesheet"/>
    </head>
    <body>
        <?php top();?>
        <div id="content">
            <div class="row">
                <div class="col s12 m6 l4" id="form">
                    <div class="input-field col s12">
                        <div for="coin">
                            Coin
                        </div>
                        <select id="coin" class="browser-default">
                            <option value="bitcoin">
                                Bitcoin
                            </option>
                            <option value="litecoin">
                                Litecoin
                            </option>
                            <option value="ethereum">
                                Ethereum
                            </option>
                            <option value="monero">
                                Monero
                            </option>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <div for="address">
                            Wallet Address
                        </div>
                        <input class="validate" id="address" placeholder="Wallet Address" type="text" value="3Q2zmZA3LsW5JdxkJEPDRbsXu2YzzMQmBQ"/>
                    </div>
                    <div class="input-field col s12">
                        <div for="theme">
                            Theme
                        </div>
                        <select id="theme" class="browser-default">
                            <option value="">
                                Light
                            </option>
                            <option value="dark">
                                Dark
                            </option>
                        </select>
                    </div>
                    <div class="input-field col s12 center-align">
                        <a class="btn green" id="update">
                            Get Code
                        </a>
                    </div>
                </div>
                <div class="col s12 m6 l8" id="preview">
                    <div id="btn-preview">
                    </div>
                    <p>
                        Use this code to display it wherever you want :
                    </p>
                    <pre id="code-wrapper"><code id="code"></code></pre>
                </div>
            </div>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
            <script src="//lab.subinsb.com/projects/francium/cryptodonate/cryptodonate.js" type="text/javascript"></script>
            <script src="js/widget-maker.js" type="text/javascript"></script>
        </div>
        <?php
        footer();
        ?>
    </body>
</html>
