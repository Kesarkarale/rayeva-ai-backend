# Rayeva AI Systems – PHP AI Modules

## 📌 Project Overview

This project implements two AI-powered modules for the **Rayeva AI System** using PHP and MySQL.

The system demonstrates how AI can automate product categorization and generate sustainability proposals for businesses.

## 🚀 Features

### 1️⃣ AI Auto Category & Tag Generator

Automatically generates product categories and SEO tags based on product details.

**Input**

* Product Name
* Description
* Material

**Output**

* Primary Category
* Sub Category
* SEO Tags
* Sustainability Filters

Example Output:

```
Array
(
    [primary_category] => Bags
    [sub_category] => Eco Friendly Bags
    [seo_tags] => Array
        (
            [0] => eco bag
            [1] => cotton bag
            [2] => sustainable bag
        )

    [sustainability_filters] => Array
        (
            [0] => plastic-free
            [1] => reusable
            [2] => eco-friendly
        )
)
```

---

### 2️⃣ AI Smart Proposal Generator

Generates sustainability product proposals based on industry and budget.

**Input**

* Industry
* Budget
* Focus

**Output**

* Product Mix
* Budget Allocation
* Cost Breakdown
* Impact Summary

Example Output:

```
Array
(
    [product_mix] => Array
        (
            [0] => Array
                (
                    [product] => Eco Packaging Kit
                    [quantity] => 10
                    [unit_price] => 100
                )
        )

    [budget_allocation] => Array
        (
            [eco_kits] => 1000
            [bags] => 1000
        )

    [cost_breakdown] => Array
        (
            [subtotal] => 2000
            [discount] => 0
            [total] => 2000
        )

    [impact_summary] => This proposal promotes sustainable packaging and reduces plastic usage.
)
```

---

## 🛠 Tech Stack

* PHP
* MySQL
* HTML / CSS
* cURL (API integration)

---

## 📂 Project Structure

```
rayeva-ai
│
├── config
│   └── db.php
│
├── modules
│   ├── categoryModule.php
│   └── proposalModule.php
│
├── pages
│   ├── category.php
│   └── proposal.php
│
├── services
│   └── aiService.php
│
└── index.php
```

---

## ⚙️ Setup Instructions

1. Install **XAMPP** or any PHP server.
2. Place the project folder inside:

```
htdocs/
```

3. Create database:

```
rayeva_ai
```

4. Create table:

```
products
```

5. Run project in browser:

```
http://localhost/rayeva-ai
```

---

## 📸 Screenshots

Add screenshots of:

* Category Generator Page
* Proposal Generator Page
* Output Results

---

## 👩‍💻 Author

**Kesar Karale**

Regal College of Technology & Management
SNDT University

---

## 📄 License

This project is for educational purposes.
