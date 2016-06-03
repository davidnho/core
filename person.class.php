<?php

class Person {
    
public $name = "Noel";
/*
 * function name
 * @param $arg
 */

function talk($arg) {
    echo "I am talking";
}



static function add($a,$b) {
    return $a + $b;
}
}

$p = new Person();

echo $p->name;
echo Person::add(3,5);

?>
