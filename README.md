# MassData OOP Test

This repository contains my OOP PHP test solution for **MassData Commerce DOO**.

---

## Task Objective

The goal of this task is to demonstrate a solid understanding of Object-Oriented Programming (OOP) principles in PHP.

**Key focus areas:**
- Inheritance  
- Interfaces  
- Polymorphism  
- Exception handling  

There is no need for a database, HTML, or CSS.  
The project’s purpose is to show clear OOP design and clean, readable PHP code.

---

## Task Description

1. A `Fruit` class represents a fruit with a defined **color** and **volume**.  
2. An `Apple` is a type of fruit that **can be rotten**.  
3. A **Juicer** consists of two parts: a **FruitContainer** and a **Strainer**.  
4. The **FruitContainer** has a **capacity** and can hold fruits.  
   - You can **add** a fruit.  
   - You can **see** how many fruits are inside.  
   - You can **check** how much space is left.  
5. The **Strainer** is responsible for **squeezing** fruits.  
   - Juicing one fruit yields an amount of juice equal to **50% of its volume**.  
   - Rotten apples cause an **exception** during squeezing.  
6. The **Juicer simulation** performs **100 consecutive actions**, where:
   - Every **9 squeezes**, an additional apple is added.
   - Each apple has a **volume between 1 and 5 liters**.
   - Each apple has a **20% chance** of being rotten.
   - Every action is **logged on screen**.

---

## Requirements

- PHP **8.1+**
- No external libraries required.

---

## Configuration Options

The juicer simulation can be customized by adjusting the `$config` array when creating a new `Juicer` instance.

Example:
```php
$config = [
    'juice_capacity' => 20,       // in liters – maximum juice tank capacity
    'container_capacity' => 8,    // in volume units – how many fruits fit in the container
    'prefilled' => 2,             // number of fruits initially added to the container
    'unit_to_liters' => 1.0       // conversion ratio, e.g. 1 unit = 0.8 liters
];

$juicer = new Juicer($config);
```

Each key has the following meaning:

| Key | Type | Description |
|-----|------|-------------|
| `juice_capacity` | `float` | Total juice tank capacity in liters |
| `container_capacity` | `int` | Maximum number of fruits the container can hold |
| `prefilled` | `int` | Number of fruits initially added before the simulation starts |
| `unit_to_liters` | `float` | Conversion ratio between fruit volume units and liters |

If no configuration is provided, default values are used:
```php
[
    'juice_capacity' => 20.0,
    'container_capacity' => 10,
    'prefilled' => 0,
    'unit_to_liters' => 1.0
]
```

---

## Running the Simulation

Clone the repository:
```bash
git clone https://github.com/vjosic/massdata-oop-test.git
cd massdata-oop-test
```

Run the script:
```bash
php index.php
```

---

## Author

**Vladimir Josić**  
📧 [vlado107@gmail.com](mailto:vlado107@gmail.com)  
GitHub: [vjosic](https://github.com/vjosic)