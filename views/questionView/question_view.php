<?php

include_once 'views/partials/head.php';
include_once 'views/partials/header.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'form':
            $user = $response['user'];
            $question = $response['question'];
            include_once 'partialsQuestion/questionForm.php';
        break;
    }
}

include_once 'views/partials/footer.php';