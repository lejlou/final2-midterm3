<?php
require_once __DIR__."/../dao/MidtermDao.php";

class MidtermService {
    protected $dao;

    public function __construct(){
        $this->dao = new MidtermDao();
    }

    /** TODO
    * Implement service method to add content to database
    */
    public function input_data($locationName, $county_code , $country, $city) {
        // Read the IP2LOCATION.json file
        $fileContent = file_get_contents('../IP2LOCATION.json');
        $jsonContent = json_decode($fileContent, true);
    
        // Insert the data into the "locations" table
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=midterm", "root", "");
        $stmt = $pdo->prepare("INSERT INTO locations (location_name, from, to, country_code, country, region, city) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
        foreach ($jsonContent as $item) {
            $country = $item['country'];
            $city = $item['City']; 
            $stmt->execute([$$locationName, $county_code , $country, $city]);
        }
    
        return false; // Change this according to your logic if the insertion is successful
    }

    /** TODO
    * Implement service method for route /midterm/summary
    */
    public function summary(){
        return $this->dao->summary();
    }

    /** TODO
    * Implement service method for route /midterm/report_per_country
    */
    public function report_per_country(){
        return $this->dao->report_per_country();
    }

    /** TODO
    * Implement service method for route /midterm/search
    */
    public function search($from , $to ){
        return $this->dao->search($from, $to);
    }
}
?>
