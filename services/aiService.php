<?php

function callOpenAI($prompt) {

    // If proposal related prompt
    if (strpos($prompt, "B2B proposal") !== false) {

        $fakeResponse = [
            "choices" => [
                [
                    "message" => [
                        "content" => json_encode([
                            "product_mix" => [
                                [
                                    "product" => "Compostable Packaging Kits",
                                    "quantity" => 500,
                                    "unit_price" => 50
                                ],
                                [
                                    "product" => "Reusable Office Bottles",
                                    "quantity" => 200,
                                    "unit_price" => 150
                                ]
                            ],
                            "budget_allocation" => [
                                "packaging" => 25000,
                                "office_products" => 30000
                            ],
                            "cost_breakdown" => [
                                "subtotal" => 55000,
                                "discount" => 5000,
                                "total" => 50000
                            ],
                            "impact_summary" => "This proposal reduces plastic usage by replacing single-use packaging with compostable alternatives and promotes reusable office supplies, enhancing sustainability impact."
                        ])
                    ]
                ]
            ]
        ];

    } else {

        // Category Module Fake Response
        $fakeResponse = [
            "choices" => [
                [
                    "message" => [
                        "content" => json_encode([
                            "primary_category" => "Packaging",
                            "sub_category" => "Compostable Bags",
                            "seo_tags" => [
                                "eco friendly",
                                "plastic free",
                                "biodegradable",
                                "sustainable",
                                "green packaging"
                            ],
                            "sustainability_filters" => [
                                "plastic-free",
                                "compostable",
                                "biodegradable"
                            ]
                        ])
                    ]
                ]
            ]
        ];
    }

    // Logging
    file_put_contents(
        __DIR__ . '/../logs/ai_logs.txt',
        "PROMPT:\n$prompt\nFAKE RESPONSE:\n" . json_encode($fakeResponse) . "\n\n",
        FILE_APPEND
    );

    return $fakeResponse;
}
?>
