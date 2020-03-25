<?php
require_once __DIR__ . '/../../inc/load.php';
init(47);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php head();?>
    </head>
    <body>
        <?php top();?>
        <div class="container" id="content">
            <p>Transliterate from Malayalam, Hindi, Kannada to English/Latin/Roman script. Convert to Manglish, Hinglish, Kanglish. This works directly in the browser. See <a href="https://libindic.org/Transliteration">libindic's Transliterator</a> for more language support, but text is processed in the server though (Python).</p>
            <form id="transliterate-form">
                <textarea class="materialize-textarea" id="input" placeholder="Paste text here..."></textarea>
                <label>Language:</label>
                <select class="browser-default" id="lang">
                    <option value="ml">Malayalam</option>
                    <option value="hi">Hindi</option>
                    <option value="kn">Kannada</option>
                </select><br/>
                <button class="btn">Transliterate</button>
            </form>
            <textarea class="materialize-textarea" id="output" placeholder="Output will be shown here..."></textarea>
            <script type="text/javascript" src="./transliterator.js"></script>
            <script type="text/javascript">
                var a = document.getElementById('transliterate-form');
                a.onsubmit = function(e) {
                    e.preventDefault();

                    var l = document.getElementById('lang').value,
                        input = document.getElementById('input').value,
                        output = '',
                        t = new Transliterator();

                    if (l === 'ml') {
                        output = t.transliterate_ml_en(input);
                    } else if (l === 'hi') {
                        output = t.transliterate_hi_en(input);
                    } else {
                        output = t.transliterate_kn_en(input);
                    }

                    document.getElementById('output').value = output;

                    return false;
                };
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
