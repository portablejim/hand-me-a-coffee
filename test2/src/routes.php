<?php

use Slim\Http\Request;
use Slim\Http\Response;

require_once "App/SignVideo.php";

// Routes

$app->get('/how-to-order.html', function (Request $request, Response $response) {
    $videos = [
        new SignVideo("hello", "&ldquo;Hello, how are you?&rdquo;", "01-hi-how-are-you.mp4"),
        new SignVideo("milk", "Milk", "02-milk.mp4"),
        new SignVideo("water", "Water", "03-water.mp4"),
        new SignVideo("tea", "Tea", "04-tea.mp4"),
        new SignVideo("cappuccino", "Cappuccino", "05-cappuccino.mp4"),
        new SignVideo("latte", "Latte", "06-latte.mp4"),
        new SignVideo("flatwhite", "Flat White", "07-flat-white.mp4"),
        new SignVideo("sugar", "Sugar", "08-sugar.mp4"),
        new SignVideo("thankyou", "Thank you", "09-thank-you.mp4"),
        new SignVideo("please", "Please", "10-please.mp4"),
        new SignVideo("no", "No", "11-no.mp4"),
        new SignVideo("yes", "Yes", "12-yes_me-coffee-want.mp4"),
    ];

    $videosFragment = $this->renderer->fetch('howtoorder.phtml', ['videos' => $videos]);

    return $this->renderer->render($response, 'index.phtml', ['activePage' => 'howtoorder', 'pageContent' => $videosFragment]);
});

$app->get('/about.html', function (Request $request, Response $response, array $args) {
    $fragment = $this->renderer->fetch('about.html');
    return $this->renderer->render($response, 'index.phtml', ['activePage' => 'about', 'pageContent' => $fragment]);
});

$app->get('/get-involved.html', function (Request $request, Response $response, array $args) {
    $fragment = $this->renderer->fetch('get-involved.html');
    return $this->renderer->render($response, 'index.phtml', ['activePage' => 'getinvolved', 'pageContent' => $fragment]);
});

$app->get('/', function (Request $request, Response $response, array $args) {

    // Render index view
    return $this->renderer->render($response, 'index.phtml', ['activePage' => 'index', 'pageContent' => '']);
});

