<?php

class Contactus_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function clearFacilityDistances()
    {
        $this->db->delete('facility-facility-distance', "");
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
    
    public function getNodesWithFacilitiesNotOfType($id)
    {
        return $this->db->select('SELECT * FROM nodes WHERE id IN (
                SELECT node_id FROM `node-facility` WHERE facility_id IN (
                SELECT id FROM facilities WHERE facility_type_id != :facilityTypeId))',
                array('facilityTypeId' => $id));
    }
    
    public function getAllNodes()
    {
        return $this->db->select('SELECT * FROM nodes',array());
    }
    
    public function getAllNeighbours($minNode)
    {
        return $this->db->select('SELECT * FROM links WHERE source_node_id = :minNode',
                array('minNode' => $minNode));
    }
    
    public function createFacilityFacilityDistance($sourceID,$destinationID,$distance)
    {
        $this->db->insert('facility-facility-distance', array(
            'facility_source_id' => $sourceID,
            'facility_destination_id' => $destinationID,
            'distance' => $distance
        ));
    }
}