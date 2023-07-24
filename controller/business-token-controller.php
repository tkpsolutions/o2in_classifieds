<?php
include("business-token-model.php");

class BusinessTokenController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessTokens = array();
        $businessIds = "0";
        $businessServiceIds = "0";
        $cityIds = "0";
        $userIds = "0";
        $walletIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $businessToken = new BusinessToken(
                $row['id'],
                $row['businessId'],
                $row['businessServiceId'],
                $row['cityId'],
                $row['tokenDate'],
                $row['fromTime'],
                $row['toTime'],
                $row['duration'],
                $row['userId'],
                $row['bookedDateTime'],
                $row['walletId'],
                $row['bookingRemarks'],
                $row['createdDateTime'],
                $row['updatedDateTime'],
                $row['status']
            );
            array_push($businessTokens, $businessToken);
            $businessIds = $businessIds . "," . $row['businessId'];
            $businessServiceIds = $businessServiceIds . "," . $row['businessServiceId'];
            $cityIds = $cityIds . "," . $row['cityId'];
            $userIds = $userIds . "," . $row['userId'];
            $walletIds = $walletIds . "," . $row['walletId'];
        }

        if (sizeof($businessTokens)) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);

            $businessServiceController = new BusinessServiceController();
            $businessServices = $businessServiceController->getByIds($businessServiceIds);

            $cityController = new CityController();
            $citys = $cityController->getByIds($cityIds);

            $userController = new UserController();
            $users = $userController->getByIds($userIds);

            $walletController = new WalletController();
            $wallets = $walletController->getByIds($walletIds);

            foreach ($businessTokens as $businessToken) {
                foreach ($businesses as $business) {
                    if ($businessToken->getBusinessId() == $business->getId()) {
                        $businessToken->setBusiness($business);
                    }
                }
                foreach ($businessServices as $businessService) {
                    if ($businessToken->getBusinessServiceId() == $businessService->getId()) {
                        $businessToken->setBusinessService($businessService);
                    }
                }
                foreach ($citys as $city) {
                    if ($businessToken->getCityId() == $city->getId()) {
                        $businessToken->setCity($city);
                    }
                }
                foreach ($users as $user) {
                    if ($businessToken->getUserId() == $user->getId()) {
                        $businessToken->setUser($user);
                    }
                }
                foreach ($wallets as $wallet) {
                    if ($businessToken->getWalletId() == $wallet->getId()) {
                        $businessToken->setWallet($wallet);
                    }
                }
            }
        }
        return $businessTokens;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessToken = null;
        $businessIds = "0";
        $businessServiceIds = "0";
        $cityIds = "0";
        $userIds = "0";
        $walletIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $businessToken = new BusinessToken(
                $row['id'],
                $row['businessId'],
                $row['businessServiceId'],
                $row['cityId'],
                $row['tokenDate'],
                $row['fromTime'],
                $row['toTime'],
                $row['duration'],
                $row['userId'],
                $row['bookedDateTime'],
                $row['walletId'],
                $row['bookingRemarks'],
                $row['createdDateTime'],
                $row['updatedDateTime'],
                $row['status']
            );
            $businessIds = $businessIds . "," . $row['businessId'];
            $businessServiceIds = $businessServiceIds . "," . $row['businessServiceId'];
            $cityIds = $cityIds . "," . $row['cityId'];
            $userIds = $userIds . "," . $row['userId'];
            $walletIds = $walletIds . "," . $row['walletId'];
        }

        if ($businessToken != null) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);

           $businessServiceController = new BusinessServiceController();
            $businessServices = $businessServiceController->getByIds($businessServiceIds);

            $cityController = new CityController();
            $citys = $cityController->getByIds($cityIds);

            $userController = new UserController();
            $users = $userController->getByIds($userIds);

            $walletController = new WalletController();
            $wallets = $walletController->getByIds($walletIds);

            foreach ($businesses as $business) {
                if ($businessToken->getBusinessId() == $business->getId()) {
                    $businessToken->setBusiness($business);
                }
            }
            foreach ($businessServices as $businessService) {
                if ($businessToken->getBusinessServiceId() == $businessService->getId()) {
                    $businessToken->setBusinessService($businessService);
                }
            }
            foreach ($citys as $city) {
                if ($businessToken->getCityId() == $city->getId()) {
                    $businessToken->setCity($city);
                }
            }
            foreach ($users as $user) {
                if ($businessToken->getUserId() == $user->getId()) {
                    $businessToken->setUser($user);
                }
            }
            foreach ($wallets as $wallet) {
                if ($businessToken->getWalletId() == $wallet->getId()) {
                    $businessToken->setWallet($wallet);
                }
            }
        }


        return $businessToken;
    }

    public function getAll() {
        $query = "SELECT * FROM business_token";
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM business_token WHERE id = $id";
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM business_token WHERE id IN ($ids)";
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }

    public function getByBusinessId($businessId) {
        $query = "SELECT * FROM business_token WHERE businessId = $businessId";
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }

    public function getByBusinessServiceId($businessServiceId) {
        $query = "SELECT * FROM business_token WHERE businessServiceId = $businessServiceId";
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }

    public function getByCityId($cityId) {
        $query = "SELECT * FROM business_token WHERE cityId = $cityId";
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }
    
    public function getByUserId($userId) {
        $query = "SELECT * FROM business_token WHERE userId = $userId order by tokenDate";
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }
    public function getByWalletId($walletId) {
        $query = "SELECT * FROM business_token WHERE walletId = '$walletId'";
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM business_token WHERE status = '$status'";
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }

    public function search($businessId, $fromDate, $toDate, $cityId, $businessServiceId) {
        $query = "SELECT * FROM business_token WHERE businessId = $businessId";
        if( $fromDate != null ){
            $query = $query . " and tokenDate >= '" . $fromDate . "'";
        }
        if( $toDate != null ){
            $query = $query . " and tokenDate <= '" . $toDate . "'";
        }
        if( $cityId != 0 ){
            $query = $query . " and cityId = " . $cityId;
        }
        if( $businessServiceId != 0 ){
            $query = $query . " and businessServiceId = " . $businessServiceId;
        }
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }

    public function search1($businessId, $fromDate, $toDate, $cityId, $businessServiceId, $status) {
        $query = "SELECT * FROM business_token WHERE businessId = $businessId";
        if( $fromDate != null ){
            $query = $query . " and tokenDate >= '" . $fromDate . "'";
        }
        if( $toDate != null ){
            $query = $query . " and tokenDate <= '" . $toDate . "'";
        }
        if( $cityId != 0 ){
            $query = $query . " and cityId = " . $cityId;
        }
        if( $businessServiceId != 0 ){
            $query = $query . " and businessServiceId = " . $businessServiceId;
        }
        if( $status != null ){
            $query = $query . " and status = '" . $status . "'";
        }
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }

    public function getAvailableDates($businessId, $toDate, $cityId, $businessServiceId) {
        $query = "SELECT * FROM business_token WHERE businessId = $businessId and tokenDate >= NOW()";
        if( $toDate != null ){
            $query = $query . " and tokenDate <= '" . $toDate . "'";
        }
        if( $cityId != 0 ){
            $query = $query . " and cityId = " . $cityId;
        }
        if( $businessServiceId != 0 ){
            $query = $query . " and businessServiceId = " . $businessServiceId;
        }
        $query = $query . " group by tokenDate";
        $businessTokenController = new BusinessTokenController();
        return $businessTokenController->createObjects($query);
    }

    public function add($businessToken) {
        include('db_connection.php');
        $query = "INSERT INTO business_token (id, businessId, businessServiceId, cityId, tokenDate, fromTime, toTime, duration, userId, bookedDateTime, walletId, bookingRemarks, createdDateTime, updatedDateTime, status) VALUES (
            '" . $businessToken->getId() . "',
            '" . $businessToken->getBusinessId() . "',
            '" . $businessToken->getBusinessServiceId() . "',
            '" . $businessToken->getCityId() . "',
            '" . $businessToken->getTokenDate() . "',
            '" . $businessToken->getFromTime() . "',
            '" . $businessToken->getToTime() . "',
            '" . $businessToken->getDuration() . "',
            '" . $businessToken->getUserId() . "',
            '" . $businessToken->getBookedDateTime() . "',
            '" . $businessToken->getWalletId() . "',
            '" . $businessToken->getBookingRemarks() . "',
            NOW(),
            NOW(),
            '" . $businessToken->getStatus() . "'
        )";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function addBulk($businessTokens) {
        include('db_connection.php');
        $query = "";
        foreach($businessTokens as $businessToken){
            $query = $query . "INSERT INTO business_token (id, businessId, businessServiceId, cityId, tokenDate, fromTime, toTime, duration, userId, bookedDateTime, walletId, bookingRemarks, createdDateTime, updatedDateTime, status) VALUES (
                '" . $businessToken->getId() . "',
                '" . $businessToken->getBusinessId() . "',
                '" . $businessToken->getBusinessServiceId() . "',
                '" . $businessToken->getCityId() . "',
                '" . $businessToken->getTokenDate() . "',
                '" . $businessToken->getFromTime() . "',
                '" . $businessToken->getToTime() . "',
                '" . $businessToken->getDuration() . "',
                '" . $businessToken->getUserId() . "',
                '" . $businessToken->getBookedDateTime() . "',
                '" . $businessToken->getWalletId() . "',
                '" . $businessToken->getBookingRemarks() . "',
                NOW(),
                NOW(),
                '" . $businessToken->getStatus() . "'
            ); ";
        }
        return mysqli_multi_query($db_connection, $query);
    }

    public function update($businessToken) {
        include('db_connection.php');
        $query = "UPDATE business_token SET 
            businessId = '" . $businessToken->getBusinessId() . "',
            businessServiceId = '" . $businessToken->getBusinessServiceId() . "',
            cityId = '" . $businessToken->getCityId() . "',
            tokenDateId = '" . $businessToken->getTokenDate() . "',
            fromTime = '" . $businessToken->getFromTime() . "',
            toTime = '" . $businessToken->getToTime() . "',
            duration = '" . $businessToken->getDuration() . "',
            userId = '" . $businessToken->getUserId() . "',
            bookedDateTime = '" . $businessToken->getbookedDateTime() . "',
            walletId = '" . $businessToken->getWalletId() . "',
            bookingRemarks = '" . $businessToken->getbookingRemarks() . "',
            updatedDateTime = NOW(),
            status = '" . $businessToken->getStatus() . "'
        WHERE id = " . $businessToken->getId();
        return mysqli_query($db_connection, $query);
    }

    public function updateBooking($businessTokenId, $userId, $walletId, $bookingRemarks) {
        include('db_connection.php');
        $query = "UPDATE business_token SET 
            userId = '" . $userId . "',
            bookedDateTime = NOW(),
            walletId = " . $walletId . ",
            bookingRemarks = '" . $bookingRemarks . "',
            updatedDateTime = NOW(),
            status = 'Booked'
        WHERE id = " . $businessTokenId;
        return mysqli_query($db_connection, $query);
    }

    public function deleteById($businessToken) {
        include('db_connection.php');
        $query = "DELETE FROM business_token WHERE id = " . $businessToken->getId();
        echo $query;
        return mysqli_query($db_connection, $query);
    }
}
