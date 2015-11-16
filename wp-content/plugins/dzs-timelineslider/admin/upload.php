<?php

/*
 * DZS Upload
 * version: 1.0
 * author: digitalzoomstudio
 * website: http://digitalzoomstudio.net
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

$disallowed_filetypes = array('.php', '.exe', '.htaccess', '.asp', '.py', '.jsp', '.pl');
$upload_dir = dirname(__FILE__) . '/upload';

function get_theheaders() {
    //$headers = array();
    //print_r($_SERVER);
    return $_SERVER;
}

//print_r($_POST); print_r($HTTP_POST_FILES); print_r($_FILES);

if (isset($_FILES['file_field']['tmp_name'])) {
    $file_name = $_FILES['file_field']['name'];
    $file_name = str_replace(" ", "_", $file_name); // strip spaces
    $path = $upload_dir . "/" . $file_name;
    //print_r($HTTP_POST_FILES);
    //==== checking for disallowed file types
    $sw = false;

    foreach ($disallowed_filetypes as $dft) {
        $pos = strpos($file_name, $dft);
        if ($pos !== false) {
            $sw = true;
        }
    }

    if ($sw == true) {
        die('<div class="error">invalid extension - disallowed_filetypes</div><script>hideFeedbacksCall()</script>');
    }
    if (!is_writable($upload_dir)) {
        die('<div class="error">dir not writable - check permissions</div><script>hideFeedbacksCall()</script>');
    }




    if (copy($_FILES['file_field']['tmp_name'], $path)) {
        echo '<div class="success">file uploaded</div><script>top.hideFeedbacksCall();</script>';
    } else {
        echo '<div class="error">file could not be uploaded</div><script>window.hideFeedbacksCall()</script>';
    }
} else {
    $headers = get_theheaders();
    if (isset($headers['HTTP_X_FILE_NAME'])) {
        //print_r($headers);
        $file_name = $headers['HTTP_X_FILE_NAME'];
        $file_name = str_replace(" ", "_", $file_name); // strip spaces
        $target = $upload_dir . "/" . $file_name;


        //==== checking for disallowed file types
        $sw = false;

        foreach ($disallowed_filetypes as $dft) {
            $pos = strpos($file_name, $dft);
            if ($pos !== false) {
                $sw = true;
            }
        }

        if ($sw == true) {
            die('<div class="error">invalid extension - disallowed_filetypes</div>');
        }

        if (!is_writable($upload_dir)) {
            die('<div class="error">dir not writable - check permissions</div>');
        }


        //echo $target;
        $content = file_get_contents("php://input");

        if (file_put_contents($target, $content)) {
            echo 'success';
        } else {
            die('<div class="error">error at file_put_contents</div>');
        }
    } else {
        die('not for direct access');
    }
}