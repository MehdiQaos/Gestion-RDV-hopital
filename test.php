<?php

// $d = mktime(0, 0, 0, date('m'), date('d') + 7, date('Y'));
// echo date('Y-m-d', $d);

$s = '2022-12-15 15:16:12';
$dt = new DateTime($s);

$date = $dt->format('Y-m-d');
$time = $dt->format('H:i:s');

echo $date, ' | ', $time;


// class A {
//     public $a, $b;

//     public function __construct($a, $b) {
//         $this->a = $a;
//         $this->b = $b;
//     }

//     public static function aaa($a, $b) {
//         return new self($a, $b);
//     }
// }

// $i = new A(1, 22);
// $c = A::aaa(30, 40);
// echo $c->a . "\n";
// echo $c->b . "\n";

// $t = date('Y-m-d');
// echo strtotime($t);

// $assoc = [
//     "first_name" => "mehdi",
//     "last_name" => "qaos"
// ];
// $arr = [1, 2, 3, 4, 5];
// $index = 3;
// $key = "first_name";

// echo "value of index: $index is {$assoc['first_name']}";