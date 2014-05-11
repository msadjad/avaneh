<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    
    function index() {
        //echo Hash::create('sha256', 'sadjad', HASH_PASSWORD_KEY);
        //echo Hash::create('sha256', 'test2', HASH_PASSWORD_KEY);
        $this->view->title = 'راهنمای سفر';
        $this->view->selected = 1;
        $this->view->allNodes = $this->model->getAllNodes();
        $this->view->render('header');
        $this->view->render('main/index');
        $this->view->render('footer');
    }
    
    function findPath()
    {
        //ini_set('memory_limit', '-1');
        $source = $_POST['source'];
        $destination = $_POST['destination'];
        $parents = $this->dijkstra_by_price($source);
        $this->view->title = 'راهنمای سفر';
        $this->view->selected = 1;
        $this->view->allNodes = $this->model->getAllNodes();
        //$this->view->showPath = $showPath;
        $this->view->render('header');
        $this->view->render('main/index');
        /*$masterSource;
        $totalTime=0;
        $totalDistance=0;
        echo "<h3>مسیر یافته شده به صورت خلاصه به شرح زیر میباشد</h3><br/>";
        $showPath = $this->showPathShort($parents, $destination,0);
        echo "<h3>مسیر یافته شده به شرح زیر میباشد</h3><br/>";*/
        $showPath = $this->showPath($parents, $destination,0);
        $this->view->render('footer');
    }
    
    public function dijkstra_by_price($source)
    {
        $all_nodes = array();
        $parents = array();
        $shortestPath = array();
        
        $allNodes = $this->model->getAllNodes();
        
        foreach($allNodes as $key => $row)
        {
            $all_nodes[$row["id"]] = 2147483647;
            $parents[$row["id"]] = -1;
        }
        
        $count = count($all_nodes);
        $all_nodes[$source] = 0;
         
        while($count>0)
        {
            $minNodeArray = array_keys($all_nodes, min($all_nodes));
            $minNode = $minNodeArray[0];
            $shortestPath[$minNode] = $all_nodes[$minNode];
            unset($all_nodes[$minNode]);
            
            $allNeighbours = $this->model->getAllNeighbours($minNode);
            
            foreach($allNeighbours as $key => $row)
            {
                if(!isset($shortestPath[$row["destination_node_id"]]) &&
                   $shortestPath[$minNode] + $row["price"] < $all_nodes[$row["destination_node_id"]])
                {
                    $all_nodes[$row["destination_node_id"]] = $shortestPath[$minNode] + $row["price"];
                    $parents[$row["destination_node_id"]] = $minNode;
                }
            }
            $count--;
        }
        
        return $parents;
    }
    
    function showPathShort($parents,$destination,$level)
    {
        global $masterSource;
        global $totalTime;
        global $totalDistance;
        if($parents[$destination]!=-1 && $level!=50)
        {
            $this->showPath($parents,$parents[$destination],$level+1);
            $source_result = $this->model->getNodeByID($parents[$destination]);
            foreach($source_result as $key => $value)
            {
                $sourceR = $value['node_name'];
            }
            $destination_result = $this->model->getNodeByID($destination);
            foreach($destination_result as $key => $value)
            {
                $destinationR = $value['node_name'];
            }
            $link_result = $this->model->getLinkBySourceAndDestination($parents[$destination],$destination);
            foreach($link_result as $key => $value)
            {
                $linkR = $value;
            }
            if($linkR["price"]>0)
                echo "از {$masterSource} برو به {$destinationR} با هزینه {$linkR["price"]} و زمان {$totalTime} و مسافت {$totalDistance}.<br/>";
            else
            {
                $masterSource = $sourceR;
                $totalTime += $linkR["time"];
                $totalDistance += $linkR["distance"];
            }
        }
    }
    
    function showPath($parents,$destination,$level)
    {
        if($parents[$destination]!=-1 && $level!=50)
        {
            $this->showPath($parents,$parents[$destination],$level+1);
            $source_result = $this->model->getNodeByID($parents[$destination]);
            foreach($source_result as $key => $value)
            {
                $sourceR = $value['node_name'];
            }
            $destination_result = $this->model->getNodeByID($destination);
            foreach($destination_result as $key => $value)
            {
                $destinationR = $value['node_name'];
            }
            $link_result = $this->model->getLinkBySourceAndDestination($parents[$destination],$destination);
            foreach($link_result as $key => $value)
            {
                $linkR = $value;
            }
            echo "از {$sourceR} برو به {$destinationR} با هزینه {$linkR["price"]} و زمان {$linkR["time"]} و مسافت {$linkR["distance"]}.<br/>";
            
        }
    }
}