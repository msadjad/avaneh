<?php

class Aboutus_Model extends Model {

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
    
    public function getFacilityTypes()
    {
        return $this->db->select('SELECT * FROM facilitytypes',array());
    }
    
    public function getNodesWithFacilitiesOfType($id)
    {
        /*SELECT * FROM nodes WHERE id IN ( 
                SELECT node_id FROM `node-facility` WHERE facility_id IN (
                        SELECT id FROM facilities WHERE facility_type_id =1 ) )*/
        return $this->db->select('SELECT * FROM nodes WHERE id IN (
                SELECT node_id FROM `node-facility` WHERE facility_id IN (
                SELECT id FROM facilities WHERE facility_type_id = :facilityTypeId))',
                array('facilityTypeId' => $id));
    }
    
    public function getDistanceOfTwoFacilities($sourceID,$destinationID)
    {
        return $this->db->select('SELECT * FROM `facility-facility-distance` WHERE 
            facility_source_id = :source and facility_destination_id = :destination', array(
            'source' => $sourceID,
            'destination' => $destinationID));
    }
}