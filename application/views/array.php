<?php

function solution($initialWord, $dictionary)
{
    $x = strlen($initialWord);
    $hasil = $initialWord + $dictionary;
    return "" . $hasil - 3;
}
$initialWord = "abba";
$dictionary =
    [
        "aadd",
        "abbb",
        "dnnd",
        "lbbl"
    ];
echo solution(strlen($initialWord), intval($dictionary));
foreach ($dictionary as $a) {
    echo PHP_EOL . $a . PHP_EOL;
}

// NO 2
$array = array(1 => 0, 2, 7 => 3, 4);
$array2 = array_merge(array('a'), array_slice($array, 2));
array_splice($array, 3, count($array), $array2);
print_r($array) . PHP_EOL;

// NO 3
$a = array('' => 3, true => 2, false => 3, 0 => 4, NULL => 5);
$a2 = array_merge(array(10, 20, 30), array_slice($a, 2));
next($a2);
array_splice($a, 0, key($a2), $a2);
print_r($a) . PHP_EOL;

// NO 4
$a = 8;
$b = 3.5;
$c = array();
list($c[0], $c[1], $c[2], $c[3]) = array($a * $b, $a % $b, $a, $b);
next($c);
$e = current($c);
print_r($e) . PHP_EOL;

// NO 6
echo PHP_EOL;
$a = array();
echo (($a == null) ? 'isNULL' : 'isNotNULL') . PHP_EOL;
$a[1] = 5;
unset($a[1]);
echo (($a == null) ? 'isNULL' : 'isNotNULL') . PHP_EOL;
$a[1] = null;
echo (($a == null) ? 'isNULL' : 'isNotNULL') . PHP_EOL;

// NO 7
// namespace aaa;

// ini_set('display_errors', 'on');
// ini_set('error_reporting', E_ALL);
// function array_merge($f, $g)
// {
//     return array_intersect($f, $g);
// }
// $f = array(1, 2, 3);
// $g = array(2, 3, 4);
// var_dump(array_merge($f, $g));

// NO 8
function f()
{
    return function (&$h) {
        ++$h;
    };
}
$inc = f();
$h = 'X39';
$inc($h);
echo PHP_EOL . $h . PHP_EOL;

// NO 10
echo "--------------------" . PHP_EOL;
// function h($ab)
// {
//     return "\$$ab";
// }
// $ab = "b";
// $bc = "c";
// $cd = "d";
// $str = "\$d" . h(h("a")) . ";";
// eval($str);
// echo $d;

// NO 12
// class Myclass1
// {
//     function __construct()
//     {
//         echo 'This is MyClass1';
//     }
// }
// class MyClass2
// {
// }
// class Myclass extends Myclass1
// {
//     function __construct()
//     {
//         echo 'This is MyClass';
//     }
// }
// $a = new Myclass();
// echo $a;

function ssolution($inputStr)
{

    // $x  = strlen($inputStr);
    // $hasil = $x * 6.75;
    // return $hasil;
    $x  = intval($inputStr); //strlen($inputStr);
    //$y = str_split($inputStr);
    $hasil = $x;
    return $hasil;
}

echo ssolution("aabb") . PHP_EOL;

// buat $film disini
$film = array('a', 'b');

// masukkan setidaknya 5 elemen di $film
array_push($film, 'c');
array_push($film, 'd');
array_push($film, 'e');
$a = sort($film);
echo $array[Rand(0, count($film) - 1)];
$c = strtoupper($b);
echo $c . PHP_EOL;



// cetak isi dari $film
var_dump($film);
$bbt = array("Sheldon", "Leonard", "Penny", "Raj", "Howard");

echo $a = join(', ', $bbt);

// urutkan $bbt dan cetak hasilnya
echo sort($bbt);
echo join(', ', $bbt) . PHP_EOL;

// urutkan $bbt terbalik dan cetak hasilnya 
echo rsort($bbt);
echo join(',', $bbt) . PHP_EOL;


// membuat nomor dengan if
$data = null;
if ($data != null) {
    for ($i = 1; $i < 50; $i++) {
        echo $i;
    }
} else {
    echo "tidak ada data";
}

echo PHP_EOL . "---------------------------------------------------" . PHP_EOL;

$data = null;
if ($data != null) {
    # code...
    for ($nomor = 1; $nomor < 50; $nomor++) {
        echo "<button type=\"button\" class=\"btn btn-success btn-sm\">" . $nomor . ". " . $data . "</button>" . PHP_EOL;
    }
} else {
    echo "tidak ada data";
}
