<?php

include_once 'views/partials/head.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'signup':
            include_once 'partialsSession/sessionSignup.php';
            break;
        case 'cuenta':
            include_once 'partialsSession/sessionAth.php';
            break;
        case 'question':
            $question = $response['question'];
            include_once 'partialsSession/sessionQuestion.php';
            break;
        default:
            include_once 'partialsSession/sessionLogin.php';
    }
} else {
    include_once 'partialsSession/sessionLogin.php';
}

include_once 'views/partials/footer.php';
