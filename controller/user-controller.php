<?php
    include ('user-model.php');
    class UserController {
        public function createObjects($query) {
            include("db_connection.php");
            $rows = mysqli_query($db_connection, $query);
            $users = array();

            $cityIds = "0";
            while ($row = mysqli_fetch_array($rows)) {
                $user = new User($row['id'], $row['name'],  $row['mobile'], $row['whatsappNo'], $row['email'], $row['createDateTime'], $row['address'], $row['pincode'], $row['role'], $row['cityId'], $row['password'], $row['status']);
                array_push($users, $user);
                $cityIds = $cityIds. "," . $row['cityId'];
            }

            if (sizeof($users)) {
                $cityController = new CityController();
                $cities = $cityController->getByIds($cityIds);

                foreach ($users as $user) {
                    foreach ($cities as $city) {
                        if ($user->getCityId() == $city->getId()) {
                            $user->setCity($city);
                        }
                    }
                }
            }
            return $users;
        }

        public function createObject($query) {
            include("db_connection.php");
            $rows = mysqli_query($db_connection, $query);
            $user = null;

            $cityIds = "0";
            while ($row = mysqli_fetch_array($rows)) {
                $user = new User($row['id'], $row['name'],  $row['mobile'], $row['whatsappNo'], $row['email'], $row['createDateTime'], $row['address'], $row['pincode'], $row['role'], $row['cityId'], $row['password'], $row['status']);
                $cityIds = $cityIds. "," . $row['cityId'];
            }

            if ($user != null) {
                $cityController = new CityController();
                $cities = $cityController->getByIds($cityIds);

                foreach ($cities as $city) {
                    if ($user->getCityId() == $city->getId()) {
                        $user->setCity($city);
                    }
                }
            }
            return $user;
        }

        public function getByIds($ids) {
            $query = "SELECT * FROM user WHERE id IN ($ids)";
            $userController = new UserController();
            return $userController->createObjects($query);
        }
        
        public function getById($id) {
            $query = "SELECT * FROM user WHERE id = $id";
            $userController = new UserController();
            return $userController->createObject($query);
        }

        public function getAll() {
            $query = "SELECT * FROM user";
            $userController = new UserController();
            return $userController->createObjects($query);
        }

        public function getByName($name) {
            $query = "SELECT * FROM user WHERE name = '$name'";
            $userController = new UserController();
            return $userController->createObjects($query);
        }

        public function getByStatus($status) {
            $query = "SELECT * FROM user WHERE status = '$status'";
            $userController = new UserController();
            return $userController->createObjects($query);
        }

		
		public function getByEmail($email)
		{
			include('db_connection.php');
			$query="select * from `user` where email = '" . $email . "'";
			$userController = new UserController();
			$user = $userController->createObject($query);
			return $user;
		}

        public function getByMobile($mobile)
		{
			include('db_connection.php');
			$query="select * from `user` where mobile = '" . $mobile . "'";
			$userController = new UserController();
			$user = $userController->createObject($query);
			return $user;
		}
		
		public function add($user) {
            include('db_connection.php');
            $query = "INSERT INTO user (`id`, `name`, `mobile`, `whatsappNo`, `email`, `createDateTime`, `address`, `pincode`, `role`, `cityId`, `password`, `status`) VALUES ('" . $user->getId() . "', '" . $user->getName() . "', '" . $user->getMobile() . "', '" . $user->getWhatsappNo() . "',  '" . $user->getEmail() . "', '" . $user->getCreateDateTime() . "', '" . $user->getAddress() . "',  '" . $user->getPincode() . "', '" . $user->getRole() . "',  '" . $user->getCityId() . "', '" . $user->getPassword() . "', '" . $user->getStatus() . "')";
            mysqli_query($db_connection, $query);
            return mysqli_insert_id($db_connection);
        }

        public function update($user) {
            include('db_connection.php');
            $query = "UPDATE user SET  `name` = '" . $user->getName() . "',  mobile = '" . $user->getMobile() . "', whatsappNo = '" . $user->getWhatsappNo() . "', email = '" . $user->getEmail() . "',  password = '" . $user->getPassword() . "', status = '" . $user->getStatus() . "' WHERE id = " . $user->getId();
            return mysqli_query($db_connection, $query);
        }

        public function updateProfile($user) {
            include('db_connection.php');
            $query = "UPDATE user SET  `name` = '" . $user->getName() . "',  mobile = '" . $user->getMobile() . "', whatsappNo = '" . $user->getWhatsappNo() . "', email = '" . $user->getEmail() . "' WHERE id = " . $user->getId();
            return mysqli_query($db_connection, $query);
        }

        public function updatePassword($user) {
            include('db_connection.php');
            $query = "UPDATE user SET  `password` = '" . $user->getPassword() . "' WHERE id = " . $user->getId();
            return mysqli_query($db_connection, $query);
        }

        public function delete($id) {
            include('db_connection.php');
            $query = "DELETE FROM `user` WHERE id = " . $id;
            return mysqli_query($db_connection, $query);
        }
        public function getByRole($role) {
            $query = "SELECT * FROM `user` WHERE `role` = '$role' and `status` = 'active'";
            $userController = new UserController();
			$user = $userController->createObjects($query);
			return $user;
    
    }

}

?>