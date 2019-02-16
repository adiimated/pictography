	
<?php

// Array with names

$a[] = "Art";

$a[] = "Building";
$a[] = "Modern";

$a[] = "Dog";

$a[] = "Cute";

$a[] = "Festival";

$a[] = "China";

$a[] = "Dragon";

$a[] = "cholebhature";

$a[] = "dessert";

$a[] = "monster";

$a[] = "delhi";

$a[] = "lifestyle";

$a[] = "food";

$a[] = "bharatnatyam";

$a[] = "Abstract";
$a[] = "Wildlife";
$a[]="Animal";
$a[]="INDIA";





// get the q parameter from URL

$q = $_GET["q"];



$hint = "";



// lookup all hints from array if $q is different from "" 

if ($q !== "") {

    $q = strtolower($q);

    $len=strlen($q);

    foreach($a as $name) {

        if (stristr($q, substr($name, 0, $len))) {

            if ($hint === "") {

                $hint = $name;

            } else {

                $hint .= ", $name";

            }

        }

    }

}



// Output "no suggestion" if no hint was found or output correct values 

echo $hint;

?>