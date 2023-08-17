<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require_once './admin/config/config.php';

class CollageModel
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getCollage()
    {
        $sql_category_list = "SELECT * FROM category ORDER BY category_id ASC LIMIT 3";
        $query_category_list = $this->mysqli->query($sql_category_list);

        $collage = array();
        while ($row = $query_category_list->fetch_assoc()) {
            $collage[] = $row;
        }
        return $collage;
    }
}
?>