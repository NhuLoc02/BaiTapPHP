<?php
require_once './pages/models/CollageModel.php';
$collageModel = new CollageModel($mysqli);
class CollageController
{
    public function __construct() {
       
    }

    public function collage($collageModel)
    {
        $collage = $collageModel->getCollage();
        include("./pages/views/CollageView.php");
    }
}
?>