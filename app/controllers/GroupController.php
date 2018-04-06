<?php

class GroupController extends Controller {
    public function index ($userId = 0){

        $groupManagement =  $this->model->getGroupManagement();
        $this->notSignedIn();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $groupManagement->addGroup();
        }
        $_SESSION['outputCotent'] = $groupManagement->getListOfGroups($_SESSION['userid']);
        $this->view("list-group-page", ["uId" => $userId]);
    }

    public function add($userId = 0) {
        $this->notSignedIn();
        $this->view("add-group-page", ["uId" => $userId]);
    }

    public function addMember($groupNum = 0) {
        $this->notSignedIn();
        $groupManagement =  $this->model->getGroupManagement();
        $this->view("add-groupmember-page", ["gId" => $groupNum]);

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $groupManagement->addMember();
        }
    }

    public function update($groupNum = 0) {
        $this->notSignedIn();
        $groupManagement =  $this->model->getGroupManagement();
        $this->view("update-group-page", ["gn" => $groupNum]);

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $groupName =  $_SESSION['groupid' . $groupNum]['name'];
            $groupManagement->updateGroup($groupNum, $groupName);
        }
    }

    public function delete($groupNum = 0) {
        $this->notSignedIn();
        $groupManagement =  $this->model->getGroupManagement();
        $this->view("delete-group-page", ["gn" => $groupNum]);

        $groupManagement->deleteGroup($groupNum);
    }

    public function groupmembers($ownerId = 0, $groupNum = 0) {
        $groupManagement =  $this->model->getGroupManagement();
        $this->notSignedIn();

        $_SESSION['outputCotent'] = $groupManagement->getListOfMembers($ownerId, $groupNum);
        $this->view("list-groupmember-page", ["uId" => $ownerId, "gn" => $groupNum]);
    }
}