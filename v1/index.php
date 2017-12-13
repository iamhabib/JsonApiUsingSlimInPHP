<?php
/**
 * All api route
 *
 * @author Habibur Rahman
 * @link URL iamhabib.com
 */

require_once 'DbHandler.php';
require '.././libs/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

/**
 * Adding Middle Layer to authenticate every request
 * Checking if the request has valid api key in the 'Authorization' header
 */
function authenticate(\Slim\Route $route) {

    $app = \Slim\Slim::getInstance();
    // Getting request headers
    $api_key = $app->request->headers("Authorization");
    // Verifying Authorization Header
    $db = new DbHandler();
    if (!$db->isValidHeader($api_key)) {
        $app->stop();
    }
}

$app->get('/welcome', function () use ($app) {
    $db = new DbHandler();
    $message="welcome to my API!";
    jsonRespnse(200, $db->methodMethodName($message));
});

/**
 * Echoing json response to client
 * @param String $status_code Http response code
 * @param Int $response Json response
 */
function jsonRespnse($status_code, $response){
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);
    // setting response content type to json
    $app->contentType('application/json');

    echo json_encode($response);
}

$app->run();
?>