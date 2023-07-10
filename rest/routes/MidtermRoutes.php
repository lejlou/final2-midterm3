<?php

require_once "./dao/MidtermDao.php";
require_once "./services/MidtermService.php";

Flight::route('GET /midterm/connection-check', function(){
    /** TODO
    * This endpoint prints the message from constructor within MidtermDao class
    * Goal is to check whether connection is successfully established or not
    * This endpoint does not have to return output in JSON format
    */
    $dao = new MidtermDao();
});

Flight::route('POST /midterm/input_data', function(){
});


Flight::route('GET /midterm/summary', function(){
    $service = new MidtermService();
    $summary = $service->summary();
    Flight::json($summary);
});

Flight::route("GET /midterm/report_per_country", function(){
    $service = new MidtermService();
    $report = $service->report_per_country();
    Flight::json($report);
});

Flight::route("GET /midterm/search", function(){
    $from = Flight::request()->query->from;
    $to = Flight::request()->query->to;

    $service = new MidtermService();
    $locations = $service->search($from, $to);
    Flight::json($locations);
});

?>
