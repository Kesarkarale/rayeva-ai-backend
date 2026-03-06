  <?php

require_once __DIR__.'/../config/config.php';

function callOpenAI($prompt){

$apiKey = getenv("OPENAI_API_KEY");

$url = "https://api.openai.com/v1/chat/completions";

$data = [
"model" => "gpt-4o-mini",
"messages" => [
["role"=>"system","content"=>"Return only valid JSON."],
["role"=>"user","content"=>$prompt]
],
"temperature" => 0.7
];

$ch = curl_init($url);

curl_setopt_array($ch,[
CURLOPT_RETURNTRANSFER => true,
CURLOPT_HTTPHEADER => [
"Content-Type: application/json",
"Authorization: Bearer ".$apiKey
],
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => json_encode($data)
]);

$response = curl_exec($ch);

if(curl_errno($ch)){
    throw new Exception("Curl Error: ".curl_error($ch));
}

curl_close($ch);

$result = json_decode($response,true);

if(!isset($result['choices'][0]['message']['content'])){
    throw new Exception("Invalid AI Response");
}

$content = $result['choices'][0]['message']['content'];

/* Extract JSON only */
$start = strpos($content,'{');
$end = strrpos($content,'}');
$json = substr($content,$start,$end-$start+1);

/* Convert JSON to PHP array */
return json_decode($json,true);

}

?>
