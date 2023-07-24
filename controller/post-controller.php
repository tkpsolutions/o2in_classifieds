<?php
include("post-model.php");

class PostController 
{
    public function createObjects($query) {       
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $posts = array();        
        $cityIds = "0";
        $postCategoryIds = "0";
                        
        while ($row = mysqli_fetch_array($rows)) {
            $post = new Post($row['id'], $row['cityId'], $row['postCategoryId'], $row['title'], $row['description'], $row['createdDateTime'],$row['updatedDateTime'],$row['image'], $row['status']);
            array_push($posts, $post);
            $cityIds = $cityIds."," . $row['cityId'];
            $postCategoryIds = $postCategoryIds."," . $row['postCategoryId'];
        }

        if (sizeof($posts)) {
            $cityController = new CityController();
            $cities = $cityController->getByIds($cityIds);

            $postCategoryController = new PostCategoryController();
            $postCategories = $postCategoryController->getByIds($postCategoryIds);

            foreach ($posts as $post) 
            {

                foreach ($cities as $city) {
                    if ($post->getCityId() == $city->getId()) {
                        $post->setCity($city);
                    }
                }
            
            

                foreach ($postCategories as $postCategory) 
                {
                        if ($post->getPostCategoryId() == $postCategory->getId()) {
                            $post->setPostCategory($postCategory);
                        }
                    
                }
            }
        }

        return $posts;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $post = null;
        $cityIds = "0";
        $postCategoryIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $post = new Post($row['id'], $row['cityId'], $row['postCategoryId'], $row['title'], $row['description'], $row['createdDateTime'],$row['updatedDateTime'],$row['image'], $row['status']);
            $cityIds = $cityIds."," . $row['cityId'];
            $postCategoryIds = $postCategoryIds."," . $row['postCategoryId'];
        }

        if ($post != null) {
            $cityController = new CityController();
            $cities = $cityController->getByIds($cityIds);

            $postCategoryController = new PostCategoryController();
            $postCategories = $postCategoryController->getByIds($postCategoryIds);


            foreach ($cities as $city) {
                if ($post->getCityId() == $city->getId()) {
                    $post->setCity($city);
                }
            }
            foreach ($postCategories as $postCategory) {
                if ($post->getPostCategoryId() == $postCategory->getId()) {
                    $post->setPostCategory($postCategory);
                }
            
            }
        }

        return $post;
    }

    public function getAll() {
        $query = "SELECT * FROM post";
        $postController = new PostController();
        return $postController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM `post` WHERE id = " . $id;
        $postController = new PostController();
        return $postController->createObject($query);
    }
    public function getByName($name) {
        $query = "SELECT * FROM `post` WHERE name = '" . $name . "'";
        $postController = new PostController();
        return $postController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM `post` WHERE id IN ($ids)";
        $postController = new PostController();
        return $postController->createObjects($query);
    }
    
	
	
	
	public function getByCityId($cityId) {
        $query = "SELECT * FROM post WHERE cityId = '" . $cityId . "'";
        $postController = new PostController();
        return $postController->createObject($query);
    }
	
    public function getByPostCategoryId($postCategoryId) {
        $query = "SELECT * FROM post WHERE postCategoryId = '" . $postCategoryId . "'";
        $postController = new PostController();
        return $postController->createObject($query);
    }

    public function getByLimit($status, $start, $count) {
        $query = "SELECT * FROM post";
        if( $status != null ){
            $query = $query . " where status = '$status' ";
        }
        $query = $query . " order by createdDateTime";
        $query = $query . " limit $start, $count";
        $postController = new PostController();
        return $postController->createObjects($query);
    }

    public function add($post) {
        include('db_connection.php');
        $query = "INSERT INTO post (`cityId`,`postCategoryId`,`title`,`description`,`createdDateTime`,`updatedDateTime`,`image` ,`status`) VALUES ('" . $post->getCityId() . "', '" . $post->getPostCategoryId() . "', '" . $post->getTitle() . "', '" . $post->getDescription() . "', NOW(),NOW(), '" . $post->getImage() . "', '" . $post->getStatus() . "')";
        
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($post) {
        include('db_connection.php');
        $query = "UPDATE post SET cityId = '" . $post->getCityId() . "', postCategoryId = '" . $post->getPostCategoryId() . "', title = '" . $post->getTitle() . "', description = '" . $post->getDescription() . "', image = '" . $post->getImage() . "', updatedDateTime = NOW() WHERE id = " . $post->getId();
        return mysqli_query($db_connection, $query);
    }
	
	
    public function deleteById($postId) {
        include('db_connection.php');
        $query = "DELETE FROM post WHERE `id` = " .$postId;
        return mysqli_query($db_connection, $query);
    }
}

?>