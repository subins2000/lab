<?php
require_once __DIR__ . '/../../inc/load.php';
init(48);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php head();?>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu|Manjari&display=swap" rel="stylesheet" async="async" />
    </head>
    <body>
        <?php top();?>
        <div class="container" id="content">
            <h5>Encode</h5>
            <p>Convert 0, 1, 2 etc.. numbers to its Malayalam equivalent ൦, ൧, ൨. Note: This just replaces the numerals and is not according to the <a href="https://en.wikipedia.org/wiki/Malayalam_script#Other_symbols">numeric grammar of Malayalam</a>.</p>
            <form>
                <textarea class="materialize-textarea" id="വാക്യം" placeholder="ഹിന്ദു-അറബിക്ക് അക്കമുള്ള വാക്യം ഇവിടെ എഴുതുക... Write English numerals here..."></textarea>
            </form>
            <textarea class="materialize-textarea" id="മാറ്റിയവാക്യം" placeholder="മലയാള അക്കത്തിലേക്ക് മാറ്റിയ വാക്യം ഇവിടെ ദൃശ്യമാകും... Converted Malayalam numerals equivalent will be displayed here..." readonly="readonly"></textarea>
            <h5>Decode</h5>
            <p>Convert Malayalam numbers to its Hindu-Arabic numerals equivalent </p>
            <form>
                <textarea class="materialize-textarea" id="മലയാളവാക്യം" placeholder="ഹിന്ദു-അറബിക്ക് അക്കമുള്ള വാക്യം ഇവിടെ എഴുതുക... Write English numerals here..."></textarea>
            </form>
            <textarea class="materialize-textarea" id="ഹിന്ദുഅറബിക്കിലേക്ക്മാറ്റിയവാക്യം" placeholder="മലയാള അക്കത്തിലേക്ക് മാറ്റിയ വാക്യം ഇവിടെ ദൃശ്യമാകും... Converted Malayalam numerals equivalent will be displayed here..." readonly="readonly"></textarea>
            <script type="text/javascript" src="//lab.subinsb.com/projects/thengascript/thengascript.js"></script>
            <script type="text/thengascript" src="//lab.subinsb.com/projects/thengascript/malayakkam.js"></script>
            <script type="text/thengascript">
                ആവട്ടെ വാക്യസ്ഥലം = document.getElementById('വാക്യം'),
                      മാറ്റിയവാക്യസ്ഥലം = document.getElementById('മാറ്റിയവാക്യം');
                വാക്യസ്ഥലം.addEventListener('keyup', () => {
                    മാറ്റിയവാക്യസ്ഥലം.value = മലയക്കം(വാക്യസ്ഥലം.value);
                });
                ആവട്ടെ മലയാളവാക്യസ്ഥലം = document.getElementById('മലയാളവാക്യം'),
                      ഹിന്ദുഅറബിക്കിലേക്ക്മാറ്റിയവാക്യസ്ഥലം = document.getElementById('ഹിന്ദുഅറബിക്കിലേക്ക്മാറ്റിയവാക്യം');
                മലയാളവാക്യസ്ഥലം.addEventListener('keyup', () => {
                    ഹിന്ദുഅറബിക്കിലേക്ക്മാറ്റിയവാക്യസ്ഥലം.value = മലയക്കം(മലയാളവാക്യസ്ഥലം.value, ശരി);
                });
            </script>
            <style>
                #content .materialize-textarea {
                    overflow-y: auto;
                    min-height: 5rem;
                    resize: vertical;
                }
            </style>
        </div>
        <?php
        footer();
        ?>
    </body>
</html>
