 <?php

require_once __DIR__.'/../config/db.php';

function generateCategory($name,$description,$material){

global $conn;

$nameLower=strtolower($name);

/* Dynamic Category Logic */

if(strpos($nameLower,'bag')!==false){
$primary="Bags";
$sub="Eco Friendly Bags";
}
elseif(strpos($nameLower,'bottle')!==false){
$primary="Drinkware";
$sub="Reusable Bottles";
}
else{
$primary="Eco Products";
$sub="Sustainable Items";
}

/* Structured Array Output */

$result=[
"primary_category"=>$primary,
"sub_category"=>$sub,
"seo_tags"=>[
"eco ".$name,
$material." ".$name,
"sustainable ".$name,
"reusable ".$name,
"eco friendly"
],
"sustainability_filters"=>[
"plastic-free",
"reusable",
"eco-friendly"
]
];

/* Save JSON in DB */

$json=json_encode($result);

$stmt=$conn->prepare(
"INSERT INTO products(name,description,material,ai_output)
VALUES (?,?,?,?)"
);

$stmt->bind_param("ssss",$name,$description,$material,$json);
$stmt->execute();

return $result;

}
