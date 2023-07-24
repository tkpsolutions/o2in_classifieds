<?php
include("tag-model.php");

class TagController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $tags = array();
        $categoryIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $tag = new Tag($row['id'], $row['categoryId'], $row['name'], $row['status']);
            array_push($tags, $tag);
            $categoryIds .= "," . $row['categoryId'];
        }

        if (!empty($tags)) {
            $categoryController = new CategoryController();
            $categories = $categoryController->getByIds($categoryIds);

            foreach ($tags as $tag) {
                foreach ($categories as $category) {
                    if ($tag->getCategoryId() == $category->getId()) {
                        $tag->setCategory($category);
                    }
                }
            }
        }

        return $tags;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $tag = null;
        $categoryIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $tag = new Tag($row['id'], $row['categoryId'], $row['name'], $row['status']);
            $categoryIds .= "," . $row['categoryId'];
        }

        if ($tag !== null) {
            $categoryController = new CategoryController();
            $categories = $categoryController->getByIds($categoryIds);

            foreach ($categories as $category) {
                if ($tag->getCategoryId() == $category->getId()) {
                    $tag->setCategory($category);
                }
            }
        }

        return $tag;
    }

    public function getAll() {
        $query = "SELECT * FROM tag";
        $tagController = new TagController();
        return $tagController->createObjects($query);
    }

    public function getByName($name) {
        $query = "SELECT * FROM tag WHERE name = '$name'";
        $tagController = new TagController();
        return $tagController->createObject($query);
    }

    public function getByCategoryId($categoryId) {
        $query = "SELECT * FROM tag WHERE categoryId = $categoryId";
        $tagController = new TagController();
        return $tagController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM tag WHERE id = $id";
        $tagController = new TagController();
        return $tagController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM tag WHERE id IN ($ids)";
        $tagController = new TagController();
        return $tagController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM tag WHERE status = '$status'";
        $tagController = new TagController();
        return $tagController->createObjects($query);
    }
    public function getByNameAndCategoryId($name, $categoryId) {
        $query = "SELECT * FROM tag WHERE name = '" . $name . "' AND categoryId = '" . $categoryId . "'";
        $tagController = new TagController();
        return $tagController->createObject($query);
    }

    public function add($tag) {
        include('db_connection.php');
        $query = "INSERT INTO tag (categoryId, name, status) VALUES ('" . $tag->getCategoryId() . "', '" . $tag->getName() . "', '" . $tag->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($tag) {
        include('db_connection.php');
        $query = "UPDATE tag SET categoryId = '" . $tag->getCategoryId() . "', name = '" . $tag->getName() . "', status = '" . $tag->getStatus() . "' WHERE id = " . $tag->getId();
        return mysqli_query($db_connection, $query);
    }

    public function deleteById($tag) {
        include('db_connection.php');
        $query = "DELETE FROM tag WHERE id = " . $tag->getId();
        return mysqli_query($db_connection, $query);
    }
}
?>
