<?php
include('post-category-model.php');

class PostCategoryController
  {
    public function createObjects($query){
		include('db_connection.php');
		$rows = mysqli_query($db_connection, $query);

        $postCategories = array(); 
	

		while( $row = mysqli_fetch_array($rows) ){
			$postCategory = new PostCategory( $row['id'], $row['name'], $row['image'],$row['status'] );
			array_push($postCategories, $postCategory);
			
		}
        return $postCategories;
    }

    public function createObject($query) {
        include('db_connection.php');
        $rows = mysqli_query($db_connection, $query);

        $postCategory = null;

        while ($row = mysqli_fetch_array($rows)) {
            $postCategory = new PostCategory($row['id'], $row['name'], $row['image'], $row['status']);
        }

        return $postCategory;
    }

    public function getAll() {
        $query = "SELECT * FROM post_category";
        $postCategoryController = new PostCategoryController();
        return $postCategoryController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM `post_category` WHERE id = " . $id;
        $postCategoryController = new PostCategoryController();
        return $postCategoryController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM `post_category` WHERE id IN ($ids)";
        $postCategoryController = new PostCategoryController();
        return $postCategoryController->createObjects($query);
    }

    public function getByName($name) {
        $query = "SELECT * FROM `post_category` WHERE name = '" . $name . "'";
        $postCategoryController = new PostCategoryController();
        return $postCategoryController->createObject($query);
    }

    

    public function add($postCategory) {
        include('db_connection.php');
        $query = "INSERT INTO `post_category`(`name`,`image`,`status`) VALUES ( '" . $postCategory->getName() . "', '" . $postCategory->getImage() . "', '" . $postCategory->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($postCategory) {
        include('db_connection.php');
        $query = "UPDATE `post_category` SET `name`='" . $postCategory->getName() . "',`image`='" . $postCategory->getImage() . "' WHERE id = " . $postCategory->getId();
        return mysqli_query($db_connection, $query);
    }

    public function delete($id) {
        include('db_connection.php');
        $query = "DELETE FROM `post_category` WHERE `id` = '$id'";
        return mysqli_query($db_connection, $query);
    }
    


}
