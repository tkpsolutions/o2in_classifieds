<?php
include('config-model.php');
class ConfigController
{
	private function createObjects($query)
	{
		include('db_connection.php');
		$rss = mysqli_query($db_connection,$query);
		$configs = array();
		while($rs = mysqli_fetch_array($rss))
		{
			//$id, $name,$value
			$config = new Config($rs['id'], $rs['name'], $rs['value'],$rs['status']);
			array_push($configs,$config);
		}
		return $configs;
	}

	private function createObject($query)
	{
		include('db_connection.php');
		$rss = mysqli_query($db_connection,$query);
		$config = null;
		while($rs = mysqli_fetch_array($rss))
		{
			//$id, $name ,$value
			$config = new Config($rs['id'], $rs['name'], $rs['value'],$rs['status']);			
		}
		return $config;
	}

	public function getAll($status)
	{
		include('db_connection.php');
		$query = "select * from `config`";
		if($status != null)
		{
			$query = $query . " where status = '" . $status . "'";
		}
		$configController = new ConfigController();
		return $configController->createObjects($query);
	}
	
	public function getById($id)
	{
		include('db_connection.php');
		$query = "select * from `config` where `id` = '$id'";
		$configController = new ConfigController();
		return $configController->createObject($query);
		 
	}

	public function getByName($name)
	{
		include('db_connection.php');
		$query = "select * from `config` where `name` = '$name'";
		$configController = new ConfigController();
		return $configController->createObject($query);
		 
	}
	
	public function getByIds($ids)
	{
		include('db_connection.php');
		$config = array();
		if(strlen($ids)>0)
		{
			$query="select * from `config` where `id` in(" . $ids . ")";
			$configController = new ConfigController();
			$configs = $configController->createObjects($query);
		}
		return $configs;
	}
	
	
	public function add($config)
	{
		include('db_connection.php');
		
		$query ="INSERT INTO `config`(`name`,`value`,`status`) VALUES ('".$config->getName()."','" . $config->getValue() . "','".$config->getStatus()."')";
		//echo $query;
		mysqli_query($db_connection,$query);
		return mysqli_insert_id($db_connection);
	}
	
	public function update($config)
	{
		/**/
		include('db_connection.php');
		$query ="UPDATE `config` SET `name`='".$config->getName()."',`value`='" . $config->getValue() . "',`status`='" . $config->getStatus() . "' WHERE id = " . $config->getId();
		return mysqli_query($db_connection,$query);
	}
	
	public function delete($config)
	{
		include('db_connection.php');
		$query ="delete from `config` where `id`= '". $config->getId() ."'";
		return mysqli_query($db_connection,$query);
	}
	
}

?>