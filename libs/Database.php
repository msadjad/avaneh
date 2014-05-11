<?php

class Database extends PDO
{
    
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
    }
    
    /**
     * select
     * @param string $sql An SQL string
     * @param array $array Paramters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return mixed
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        //$sth = $this->prepare($sql);
        /*foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }*/
        
        $keys = array();
        
        foreach ($array as $key => $value) {
            if (is_string($key)) {
                $keys[] = '/:'.$key.'/';
            } else {
                $keys[] = '/[?]/';
            }
        }
        //print_r($array);
        //print_r($keys);
        $sql = preg_replace($keys, $array, $sql, 1, $count);
        //echo $sql;
        //if(!empty($array))
           // die;
        $sth = $this->prepare($sql);
        //echo $sth->queryString."<br/>";
              // die;
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }
    
    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data)
    {
        ksort($data);
        
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        
        $sth = $this->prepare("INSERT INTO `{$table}` (`$fieldNames`) VALUES ($fieldValues)");
        
        foreach ($data as $key => $value) {
            if($key == "password")
                $sth->bindValue(":$key", Hash::create('sha256', $value, HASH_PASSWORD_KEY));
            else
                $sth->bindValue(":$key", $value);
        }
    }
    
    /**
     * update
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where)
    {
        ksort($data);
        
        $fieldDetails = NULL;
        foreach($data as $key=> $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();
    }
    
    /**
     * delete
     * 
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected Rows
     */
    public function delete($table, $where)
    {
        return $this->exec("DELETE FROM $table WHERE $where");
    }
    
}