<?php

/**
 * Name:
 * Date:
 */
class PropertyController extends Controller {
    public function index ($userId = 0){

        $proManagement =  $this->model->getPropertyManagement();
        $this->notSignedIn();
        $_SESSION['outputCotent'] = $proManagement->getListOfProperties($_SESSION['userid']); 
        $this->view("list-property-page", ["uId" => $userId]);
    }

    public function add($userId = 0) {
        $this->notSignedIn();
        $this->view("add-property-page", ["uId" => $userId]);
        $proManagement =  $this->model->getPropertyManagement();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $proManagement->addProperty();
        }
    }

    public function update($propertyNum = 0) {
        $this->notSignedIn();
        $proManagement =  $this->model->getPropertyManagement();
        $images = $proManagement->getImage($propertyNum);

        $this->view("update-property-page", ["pn" => $propertyNum, "img" => $images]);
        /**
         * If form is submitted as post method, update property method is called.
         * Property ID is passed as parameter in the update property method.
         * Property ID $data['pn'] is passed from PropertyController class.
         * 'pn' is array of different property ID.
         */
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $propertyName =  $_SESSION['propertyid' . $propertyNum]['name'];
            if (isset($_POST['updateProperty'])){
                $proManagement->updateProperty($propertyNum, $propertyName);
            }  
            if (isset($_POST['addImg'])){
                $proManagement->addImage($_SESSION['propertyid' . $propertyNum]['id']);
            }      
            if (isset($_POST['deleteImage'])){
                $proManagement->deleteImage($_SESSION['propertyid' . $propertyNum]['id']);
            }
            echo '<script language="javascript">';
            echo 'window.location.href = "/home_maintenance_manager/public/propertycontroller/update/'.$propertyNum.'";';
            echo '</script>';
        }

    }

    public function delete($propertyNum = 0) {
        $this->notSignedIn();
        $proManagement =  $this->model->getPropertyManagement();
        $this->view("delete-property-page", ["pn" => $propertyNum]);

        $proManagement->deleteProperty($propertyNum);
    }
}
