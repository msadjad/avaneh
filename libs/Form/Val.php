<?php

class Val 
{
    public function __construct()
    {
        
    }
    
    public function minlength($data, $arg)
    {
        if (strlen($data) < $arg) {
            return "طول رشته شما باید حداقل". $arg ." باشد"."<br/>";
        }
    }
    
    public function datamatch($data1, $data2, $type)
    {
        if ($data1 != $data2) {
            return $type." ها یکسان نیستند."."<br/>";
        }
    }
    
    public function maxlength($data, $arg)
    {
        if (strlen($data) > $arg) {
            return "طول رشته شما میتواند نهایتا ". $arg ." باشد"."<br/>";
        }
    }
    
    public function digit($data)
    {
        if (ctype_digit($data) == false) {
            return "رشته ورودی باید عدد باشد"."<br/>";
        }
    }
    
    public function __call($name, $arguments) 
    {
        throw new Exception("$name در کلاس مقابل وجود ندارد: " . __CLASS__);
    }
    
}