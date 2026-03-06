<?php

if(isset($_POST['generate'])){

$result = generateCategory(
$_POST['name'],
$_POST['description'],
$_POST['material']
);

echo "<h3>Category Result</h3>";

echo "<pre>";
print_r($result);
echo "</pre>";

}

?>
