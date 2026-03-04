<?php
require_once __DIR__ . '/../services/aiService.php';
require_once __DIR__ . '/../config/db.php';

function generateCategory($name, $description, $material) {

    global $conn; // 🔥 Important

    // Prompt (still required for logging)
    $prompt = "
    You are an AI assistant for sustainable commerce.

    Product Name: $name
    Description: $description
    Material: $material

    Return ONLY valid JSON with:
    primary_category
    sub_category
    seo_tags (5-10 items array)
    sustainability_filters
    ";

    // Call AI (mock version)
    $response = callOpenAI($prompt);

    // Check response structure
    if (!isset($response['choices'][0]['message']['content'])) {
        throw new Exception("Invalid AI response structure");
    }

    $content = $response['choices'][0]['message']['content'];

    // Convert JSON string to PHP array
    $jsonOutput = json_decode($content, true);

    if (!$jsonOutput) {
        throw new Exception("Invalid AI JSON response");
    }

    // Insert into database
    $stmt = $conn->prepare(
        "INSERT INTO products (name, description, material, ai_output) VALUES (?, ?, ?, ?)"
    );

    if (!$stmt) {
        throw new Exception("Database prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssss", $name, $description, $material, $content);

    if (!$stmt->execute()) {
        throw new Exception("Database insert failed: " . $stmt->error);
    }

    $stmt->close();

    return $jsonOutput;
}
?>
