<?php

class Dashboard_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function addToDB($id)
    {
        $stringCreated = "";
        
        $source = $_POST["source"];
        $sourceSelect = $this->db->select('SELECT * FROM nodes WHERE id = :sourceid', array('sourceid' => $source));
        $sourceName = $sourceSelect[0]['node_name'];
        $destination = $_POST["destination"];
        $price = $_POST['price'];
        $destinationSelect = $this->db->select('SELECT * FROM nodes WHERE id = :destinationid', array('destinationid' => $destination));
        $destinationName = $destinationSelect[0]['node_name'];
        $type = $_POST["type"];
        if($type == "bus")
        {
            $typeID = 1;
            $typeName = "خطوط اتوبوس تندرو";
            $distance = 500;
            $time = 3;
            $price = 0;
        }
        else if($type == "metro")
        {
            $typeID = 2;
            $typeName = "مترو";
            $distance = 1000;
            $time = 2;
            $price = 0;
        }
        else if($type == "walk")
        {
            $typeID = 3;
            $typeName = "پیاده";
            $distance = $_POST['distance'];
            $time = $_POST['time'];
            $price = $_POST['price'];
        }
        $linkname = $typeName. " " .$sourceName. " - " . $destinationName;

        $data = array(
                'id' => $id,
                'link_name' => $linkname,
                'distance' => $distance,
                'time' => $time,
                'link_type_id' => $typeID,
                'price' => $price,
                'source_node_id' => $source,
                'destination_node_id' => $destination
            );
        $this->db->insert('links', $data);

        if($this->db->lastInsertId() == $id)
        {
            $stringCreated .= "link  {$linkname} has been added with price: {$price} and time :{$time} and distance :{$distance}<br/>";
        }
        return $stringCreated;
    }
    
    public function addToDBBoth($id) {
        
        $stringCreated = "";
        
        $source = $_POST["source"];
        $sourceSelect = $this->db->select('SELECT * FROM nodes WHERE id = :sourceid', array('sourceid' => $source));
        $sourceName = $sourceSelect[0]['node_name'];
        $destination = $_POST["destination"];
        $destinationSelect = $this->db->select('SELECT * FROM nodes WHERE id = :destinationid', array('destinationid' => $destination));
        $destinationName = $destinationSelect[0]['node_name'];
        $type = $_POST["type"];
        if($type == "bus")
        {
            $typeID = 1;
            $typeName = "خطوط اتوبوس تندرو";
            $distance = 500;
            $time = 3;
        }
        else if($type == "metro")
        {
            $typeID = 2;
            $typeName = "مترو";
            $distance = 1000;
            $time = 2;
        }
        else if($type == "walk")
        {
            $typeID = 3;
            $typeName = "پیاده";
            $distance = 50;
            $time = 5;
        }
        $linkname = $typeName. " " .$sourceName. " - " . $destinationName;

        $data = array(
                'id' => $id,
                'link_name' => $linkname,
                'distance' => $distance,
                'time' => $time,
                'link_type_id' => $typeID,
                'price' => 0,
                'source_node_id' => $source,
                'destination_node_id' => $destination
            );
        $this->db->insert('links', $data);

        if($this->db->lastInsertId() == $id)
        {
            $stringCreated .= "Link: $linkname has been added<br/>";
            $id++;
            $linkname = $typeName. " " .$destinationName. " - " . $sourceName;
            $data = array(
                'id' => $id,
                'link_name' => $linkname,
                'distance' => $distance,
                'time' => $time,
                'link_type_id' => $typeID,
                'price' => 0,
                'source_node_id' => $destination,
                'destination_node_id' => $source
            );
            $this->db->insert('links', $data);
            if($this->db->lastInsertId() == $id)
            {
                $stringCreated .= "Link: $linkname has been added<br/>";
            }
        }
        return $stringCreated;
    }
    
    public function getAllNodes()
    {
        return $this->db->select('SELECT * from nodes');
    }
}