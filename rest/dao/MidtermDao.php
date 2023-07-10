<?php
require_once "BaseDao.php";

class MidtermDao extends BaseDao {

    public function __construct(){
        parent::__construct();
    }

    /** TODO
    * Implement DAO method used to add content to database
    */
    public function input_data($locationName,$country, $region, $city){
          
    }
    /** TODO
    * Implement DAO method to return summary as requested within route /midterm/summary
    */
    public function summary(){
            $stmt = $this->conn->prepare("SELECT COUNT(DISTINCT country) AS total_countries, COUNT(DISTINCT region) AS total_regions, COUNT(DISTINCT city) AS total_cities FROM locations");
            $stmt->execute();
            $summary = $stmt->fetch(PDO::FETCH_ASSOC);
            return $summary;
    }


    /** TODO
    * Implement DAO method to return report as requested within route /midterm/report_per_country
    */
    public function report_per_country(){
            $stmt = $this->conn->prepare("SELECT country, COUNT(DISTINCT city) AS total_cities FROM locations GROUP BY country");
            $stmt->execute();
            $report = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** TODO
    * Implement DAO method to return location as requested within route /midterm/search
    */
    public function search($from = null, $to = null){
            $query = "SELECT * FROM locations";
            $params = [];

            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $locations;
    }
}
?>
