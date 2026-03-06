<?php
require_once "../modules/proposalModule.php";
?>

<h2>AI Proposal Generator</h2>

<form method="POST">

Industry
<input type="text" name="industry" required><br><br>

Budget
<input type="number" name="budget" required><br><br>

Focus
<input type="text" name="focus" required><br><br>

<button type="submit" name="generate">Generate Proposal</button>

</form>

<?php

$result = null;

if(isset($_POST['generate'])){

$result = generateProposal(
$_POST['industry'],
$_POST['budget'],
$_POST['focus']
);

}

if($result){

echo "<h3>Proposal Result</h3>";

echo "<pre>";
print_r($result);
echo "</pre>";

}

?>
