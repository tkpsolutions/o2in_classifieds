<?php
include("wallet-model.php");

class WalletController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $wallets = array();
        $userIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $wallet = new Wallet($row['id'], $row['userId'], $row['deposit'], $row['used'], $row['refund'], $row['gift'], $row['actionDateTime'], $row['reference'], $row['remarks'], $row['status']);
            array_push($wallets, $wallet);
            $userIds = $userIds . "," . $row['userId'];
        }

        if (sizeof($wallets)) {
            $userController = new UserController();
            $users = $userController->getByIds($userIds);

            foreach ($wallets as $wallet) {
                foreach ($users as $user) {
                    if ($wallet->getUserId() == $user->getId()) {
                        $wallet->setUser($user);
                    }
                }
            }
        }

        return $wallets;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $wallet = null;
        $userIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $wallet = new Wallet($row['id'], $row['userId'], $row['deposit'], $row['used'], $row['refund'], $row['gift'], $row['actionDateTime'], $row['reference'], $row['remarks'], $row['status']);
            $userIds = $userIds . "," . $row['userId'];
        }

        if ($wallet !== null) {
            $userController = new UserController();
            $users = $userController->getByIds($userIds);

            foreach ($users as $user) {
                if ($wallet->getUserId() == $user->getId()) {
                    $wallet->setUser($user);
                }
            }
        }

        return $wallet;
    }

    public function getAll() {
        $query = "SELECT * FROM wallet";
        $walletController = new WalletController();
        return $walletController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM wallet WHERE status = '$status'";
        $walletController = new WalletController();
        return $walletController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM wallet WHERE id = $id";
        $walletController = new WalletController();
        return $walletController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM wallet WHERE id IN ($ids)";
        $walletController = new WalletController();
        return $walletController->createObjects($query);
    }

    public function getByUserId($userId) {
        $query = "SELECT * FROM wallet WHERE userId = $userId";
        $walletController = new WalletController();
        return $walletController->createObjects($query);
    }

    public function add($wallet) {
        include('db_connection.php');
        $query = "INSERT INTO wallet (id, userId, deposit, used, refund, gift, actionDateTime, reference, remarks, status) VALUES ('" . $wallet->getId() . "', '" . $wallet->getUserId() . "', '" . $wallet->getDeposit() . "', '" . $wallet->getUsed() . "', '" . $wallet->getRefund() . "', '" . $wallet->getGift() . "', NOW(), '" . $wallet->getReference() . "', '" . $wallet->getRemarks() . "', '" . $wallet->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($wallet) {
        include('db_connection.php');
        $query = "UPDATE wallet SET userId = '" . $wallet->getUserId() . "', deposit = '" . $wallet->getDeposit() . "', used = '" . $wallet->getUsed() . "', refund = '" . $wallet->getRefund() . "', gift = '" . $wallet->getGift() . "', actionDateTime = '" . $wallet->getActionDateTime() . "', reference = '" . $wallet->getReference() . "', remarks = '" . $wallet->getRemarks() . "', status = '" . $wallet->getStatus() . "' WHERE id = " . $wallet->getId();
        return mysqli_query($db_connection, $query);
    }

    public function deleteById($wallet) {
        include('db_connection.php');
        $query = "DELETE FROM wallet WHERE id = " . $wallet->getId();
        return mysqli_query($db_connection, $query);
    }
}
?>
