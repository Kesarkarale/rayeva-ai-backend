<?php
require_once __DIR__ . '/../services/aiService.php';
require_once __DIR__ . '/../config/db.php';

function generateProposal($industry, $budget, $focus) {

    global $conn;

    $prompt = "
    Create a sustainable B2B proposal.

    Industry: $industry
    Budget: ₹$budget
    Focus: $focus

    Return ONLY JSON with:
    product_mix
    budget_allocation
    cost_breakdown (must include total)
    impact_summary
    ";

    $response = callOpenAI($prompt);

    if (!isset($response['choices'][0]['message']['content'])) {
        throw new Exception("Invalid AI response structure");
    }

    $content = $response['choices'][0]['message']['content'];

    $jsonOutput = json_decode($content, true);

    if (!$jsonOutput) {
        throw new Exception("Invalid AI JSON response");
    }

    // 🔥 Business Logic Validation (Important for Assignment)
    if ($jsonOutput['cost_breakdown']['total'] > $budget) {
        throw new Exception("Generated proposal exceeds given budget.");
    }

    $stmt = $conn->prepare(
        "INSERT INTO proposals (industry, budget, focus, ai_output) VALUES (?, ?, ?, ?)"
    );

    if (!$stmt) {
        throw new Exception("Database prepare failed: " . $conn->error);
    }

    $stmt->bind_param("siss", $industry, $budget, $focus, $content);

    if (!$stmt->execute()) {
        throw new Exception("Database insert failed: " . $stmt->error);
    }

    $stmt->close();

    return $jsonOutput;
}
?>