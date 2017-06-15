<?php
/**
 * Request has BLOB Data
 * ---------------------
 */
if (isset($_FILES['file'])) {
    $name = time() . '.wav';
    move_uploaded_file($_FILES['file']['tmp_name'], __DIR__ . "/uploads/$name");

    echo "//demos.sim/Francium/voice/uploads/$name";
}
