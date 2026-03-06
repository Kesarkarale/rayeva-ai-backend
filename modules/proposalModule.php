  <?php

function generateProposal($industry,$budget,$focus){

/* Dynamic Calculation */

$kitPrice = 100;
$bagPrice = 50;

$kitQty = floor(($budget*0.5)/$kitPrice);
$bagQty = floor(($budget*0.5)/$bagPrice);

$subtotal = ($kitQty*$kitPrice)+($bagQty*$bagPrice);

$result=[
"product_mix"=>[
["product"=>"Eco Packaging Kit","quantity"=>$kitQty,"unit_price"=>$kitPrice],
["product"=>"Reusable Bags","quantity"=>$bagQty,"unit_price"=>$bagPrice]
],
"budget_allocation"=>[
"eco_kits"=>$kitQty*$kitPrice,
"bags"=>$bagQty*$bagPrice
],
"cost_breakdown"=>[
"subtotal"=>$subtotal,
"discount"=>0,
"total"=>$subtotal
],
"impact_summary"=>"This proposal promotes sustainable packaging for ".$industry." industry with focus on ".$focus."."
];

return $result;

}
