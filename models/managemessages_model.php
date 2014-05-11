<?php

class ManageMessages_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getAllNodes()
    {
        return $this->db->select('SELECT * FROM nodes',array());
    }
    
    public function getNodeByID($id)
    {
        return $this->db->select('SELECT * FROM nodes WHERE id=:nodeid',array
                (
                    "nodeid" => $id
                ));
    }
    
    public function getLinkBySourceAndDestination($sourceID,$destinationID)
    {
        return $this->db->select("select * from links
         where source_node_id = :sourceID and destination_node_id = :destinationID",
                array
                (
                    "sourceID" => $sourceID,
                    "destinationID" => $destinationID
                ));
    }
    
    public function getAllNeighbours($minNode)
    {
        return $this->db->select('SELECT * FROM links WHERE source_node_id = :minNode',
                array('minNode' => $minNode));
    }
}