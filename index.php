<?php
require_once 'modules/proposalModule.php';

try {

$result = generateProposal(
    "Corporate Office",
    50000,
    "Plastic Reduction"
);

echo "<pre>";
print_r($result);
echo "</pre>";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>