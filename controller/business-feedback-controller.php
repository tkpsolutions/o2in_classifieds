<?php
include("business-feedback-model.php");

class BusinessFeedbackController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessFeedbacks = array();
        $businessIds = "0";
        $userIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $businessFeedback = new BusinessFeedback(
                $row['id'],
                $row['businessId'],
                $row['userId'],
                $row['starCount'],
                $row['message'],
                $row['createdDateTime'],
                $row['updateDateTime'],
                $row['status']
            );
            array_push($businessFeedbacks, $businessFeedback);
            $businessIds = $businessIds . "," . $row['businessId'];
            $userIds = $userIds . "," . $row['userId'];
        }

        if (sizeof($businessFeedbacks)) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);
            $userController = new UserController();
            $users = $userController->getByIds($userIds);

            foreach ($businessFeedbacks as $businessFeedback) {
                foreach ($businesses as $business) {
                    if ($businessFeedback->getBusinessId() == $business->getId()) {
                        $businessFeedback->setBusiness($business);
                    }
                }
                foreach ($users as $user) {
                    if ($businessFeedback->getUserId() == $user->getId()) {
                        $businessFeedback->setUser($user);
                    }
                }
            }
        }

        return $businessFeedbacks;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessFeedback = null;
        $businessIds = "0";
        $userIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $businessFeedback = new BusinessFeedback(
                $row['id'],
                $row['businessId'],
                $row['userId'],
                $row['starCount'],
                $row['message'],
                $row['createdDateTime'],
                $row['updateDateTime'],
                $row['status']
            );
            $businessIds = $businessIds . "," . $row['businessId'];
            $userIds = $userIds . "," . $row['userId'];
        }

        if ($businessFeedback !== null) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);
            $userController = new UserController();
            $users = $userController->getByIds($userIds);

            foreach ($businesses as $business) {
                if ($businessFeedback->getBusinessId() == $business->getId()) {
                    $businessFeedback->setBusiness($business);
                }
            }
            foreach ($users as $user) {
                if ($businessFeedback->getUserId() == $user->getId()) {
                    $businessFeedback->setUser($user);
                }
            }
        }

        return $businessFeedback;
    }

    public function getAll() {
        $query = "SELECT * FROM business_feedback";
        $businessFeedbackController = new BusinessFeedbackController();
        return $businessFeedbackController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM business_feedback WHERE status = '$status'";
        $businessFeedbackController = new BusinessFeedbackController();
        return $businessFeedbackController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM business_feedback WHERE id = $id";
        $businessFeedbackController = new BusinessFeedbackController();
        return $businessFeedbackController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM business_feedback WHERE id IN ($ids)";
        $businessFeedbackController = new BusinessFeedbackController();
        return $businessFeedbackController->createObjects($query);
    }

    public function getByBusinessId($businessId) {
        $query = "SELECT * FROM business_feedback WHERE businessId = $businessId";
        $businessFeedbackController = new BusinessFeedbackController();
        return $businessFeedbackController->createObjects($query);
    }

    public function getByBusinessIdUserId($businessId, $userId) {
        $query = "SELECT * FROM business_feedback WHERE userId = $userId and businessId = $businessId";
        $businessFeedbackController = new BusinessFeedbackController();
        return $businessFeedbackController->createObject($query);
    }

    public function getSummaryByBussinessId($businessId) {
        $query = "SELECT count(*) as id, businessId, userId, sum(starCount) as starCount, message, createdDateTime, updateDateTime, status FROM `business_feedback` WHERE businessId = $businessId GROUP by businessId;";
        $businessFeedbackController = new BusinessFeedbackController();
        return $businessFeedbackController->createObject($query);
    }

    public function getByUserId($userId) {
        $query = "SELECT * FROM business_feedback WHERE userId = $userId";
        $businessFeedbackController = new BusinessFeedbackController();
        return $businessFeedbackController->createObjects($query);
    }
    public function add($businessFeedback) {
        include('db_connection.php');
        $query = "INSERT INTO business_feedback (id, businessId, userId, starCount, message, createdDateTime, updateDateTime, status) VALUES (
            '" . $businessFeedback->getId() . "',
            '" . $businessFeedback->getBusinessId() . "',
            '" . $businessFeedback->getUserId() . "',
            '" . $businessFeedback->getStarCount() . "',
            '" . $businessFeedback->getMessage() . "',
            NOW(),
            NOW(),
            '" . $businessFeedback->getStatus() . "'
        )";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($businessFeedback) {
        include('db_connection.php');
        $query = "UPDATE business_feedback SET 
            businessId = '" . $businessFeedback->getBusinessId() . "',
            userId = '" . $businessFeedback->getUserId() . "',
            starCount = '" . $businessFeedback->getStarCount() . "',
            message = '" . $businessFeedback->getMessage() . "',
            updateDateTime = NOW(),
            status = '" . $businessFeedback->getStatus() . "'
        WHERE id = " . $businessFeedback->getId();
        return mysqli_query($db_connection, $query);
    }

    public function deleteById($id) {
        include('db_connection.php');
        $query = "DELETE FROM business_feedback WHERE id = $id";
        return mysqli_query($db_connection, $query);
    }
}
