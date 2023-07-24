<?php
include("business-tag-model.php");

class BusinessTagController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessTags = array();
        $businessIds = "0";
        $tagIds = "0";
        

        while ($row = mysqli_fetch_array($rows)) {
            $businessTag = new BusinessTag($row['id'], $row['businessId'], $row['tagId'], $row['status']);
            array_push($businessTags, $businessTag);
            $businessIds = $businessIds . "," . $row['businessId'];
            $tagIds = $tagIds . "," . $row['tagId'];
            
        }

        if (sizeof($businessTags)) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);

            $tagController = new TagController();
            $tags = $tagController->getByIds($tagIds);

            

            foreach ($businessTags as $businessTag) {
                foreach ($businesses as $business) {
                    if ($businessTag->getBusinessId() == $business->getId()) {
                        $businessTag->setBusiness($business);
                    }
                }
                foreach ($tags as $tag) {
                    if ($businessTag->getTagId() == $tag->getId()) {
                        $businessTag->setTag($tag);
                    }
                }
                
            }
        }

        return $businessTags;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
        $businessTag = null;
        $businessIds = "0";
        $tagIds = "0";


        while ($row = mysqli_fetch_array($rows)) {
            $businessTag = new BusinessTag($row['id'], $row['businessId'], $row['tagId'], $row['status']);
            $businessIds = $businessIds . "," . $row['businessId'];
            $tagIds = $tagIds . "," . $row['tagId'];
           
        }

        if ($businessTag != null) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);

            $tagController = new TagController();
            $tags = $tagController->getByIds($tagIds);

            

            foreach ($businesses as $business) {
                if ($businessTag->getBusinessId() == $business->getId()) {
                    $businessTag->setBusiness($business);
                }
            }
            foreach ($tags as $tag) {
                if ($businessTag->gettagId() == $tag->getId()) {
                    $businessTag->settag($tag);
                }
            }
           
        }

        return $businessTag;
    }

    public function getAll() {
        $query = "SELECT * FROM business_tag";
        $businessTagController = new BusinessTagController();
        return $businessTagController->createObjects($query);
    }

    public function getByBusinessId($businessId) {
        $query = "SELECT * FROM business_tag WHERE businessId = $businessId";
        $businessTagController = new BusinessTagController();
        return $businessTagController->createObjects($query);
    }

    public function getByBusinessIds($businessIds) {
        $query = "SELECT * FROM business_tag WHERE businessId in ($businessIds)";
        $businessTagController = new BusinessTagController();
        return $businessTagController->createObjects($query);
    }


    public function getByTagId($tagId) {
        $query = "SELECT * FROM business_tag WHERE tagId = $tagId";
        $businessTagController = new BusinessTagController();
        return $businessTagController->createObject($query);
    }

   public function getById($id) {
        $query = "SELECT * FROM business_tag WHERE id = $id";
        $businessTagController = new BusinessTagController();
        return $businessTagController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM busines_tag WHERE id IN ($ids)";
        $businessTagController = new BusinessTagController();
        return $businessTagController->createObjects($query);
    }
    public function getByStatus($status) {
        $query = "SELECT * FROM business_tag WHERE status = '$status'";
        $businessTagController = new BusinessTagController();
        return $businessTagController->createObjects($query);
    }
    
    
   
    public function add($businessTag) {
        include('db_connection.php');
        $query = "INSERT INTO `business_tag` ( `businessId`,`tagId`, `status`) VALUES (  '" . $businessTag->getBusinessId() . "','" . $businessTag->getTagId() . "','" . $businessTag->getStatus() . "')";
            
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($businessTag) {
        include('db_connection.php');
        $query = "UPDATE `business_tag` SET   `businessId` = '" . $businessTag->getBusinessId() . "', `tagId` = '" . $businessTag->getTagId() . "', `status` = '" . $businessTag->getStatus() . "' WHERE id = " . $businessTag->getId();
        
        return mysqli_query($db_connection, $query);
    }

    public function deleteById($businessTagId) {
        include('db_connection.php');
        $query = "DELETE FROM business_tag WHERE id = " . $businessTagId;
        return mysqli_query($db_connection, $query);
    }
}
?>