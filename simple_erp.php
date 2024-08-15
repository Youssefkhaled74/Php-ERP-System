<?php
// Simple Custom ERP System in one PHP file

// Database connection (for simplicity, using SQLite)
$db = new PDO('sqlite:erp_system.db');

// Create tables if they don't exist
$db->exec("CREATE TABLE IF NOT EXISTS inventory (id INTEGER PRIMARY KEY, item_name TEXT, quantity INTEGER)");
$db->exec("CREATE TABLE IF NOT EXISTS employees (id INTEGER PRIMARY KEY, name TEXT, position TEXT, salary REAL)");
$db->exec("CREATE TABLE IF NOT EXISTS finance (id INTEGER PRIMARY KEY, description TEXT, amount REAL, type TEXT)");
$db->exec("CREATE TABLE IF NOT EXISTS sales (id INTEGER PRIMARY KEY, product TEXT, quantity INTEGER, price REAL)");

// Add data to the tables (for demonstration purposes)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'Add Inventory') {
        $stmt = $db->prepare("INSERT INTO inventory (item_name, quantity) VALUES (?, ?)");
        $stmt->execute([$_POST['item_name'], $_POST['quantity']]);
    } elseif ($_POST['action'] == 'Add Employee') {
        $stmt = $db->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['name'], $_POST['position'], $_POST['salary']]);
    } elseif ($_POST['action'] == 'Add Transaction') {
        $stmt = $db->prepare("INSERT INTO finance (description, amount, type) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['description'], $_POST['amount'], $_POST['type']]);
    } elseif ($_POST['action'] == 'Add Sale') {
        $stmt = $db->prepare("INSERT INTO sales (product, quantity, price) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['product'], $_POST['quantity'], $_POST['price']]);
    }
}

// Fetch data for display
$inventory = $db->query("SELECT * FROM inventory")->fetchAll(PDO::FETCH_ASSOC);
$employees = $db->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_ASSOC);
$finance = $db->query("SELECT * FROM finance")->fetchAll(PDO::FETCH_ASSOC);
$sales = $db->query("SELECT * FROM sales")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple ERP System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Simple ERP System</h1>

    <!-- Inventory Management -->
    <h2>Inventory Management</h2>
    <form method="post">
        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <button type="submit" name="action" value="Add Inventory" class="btn btn-primary">Add Inventory</button>
    </form>
    <ul class="list-group mt-3">
        <?php foreach ($inventory as $item): ?>
            <li class="list-group-item"><?= htmlspecialchars($item['item_name']) ?> - Quantity: <?= htmlspecialchars($item['quantity']) ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- HR Management -->
    <h2 class="mt-5">HR Management</h2>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Employee Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" required>
        </div>
        <button type="submit" name="action" value="Add Employee" class="btn btn-primary">Add Employee</button>
    </form>
    <ul class="list-group mt-3">
        <?php foreach ($employees as $employee): ?>
            <li class="list-group-item"><?= htmlspecialchars($employee['name']) ?> - Position: <?= htmlspecialchars($employee['position']) ?> - Salary: $<?= htmlspecialchars($employee['salary']) ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Finance Management -->
    <h2 class="mt-5">Finance Management</h2>
    <form method="post">
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type (Income/Expense)</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <button type="submit" name="action" value="Add Transaction" class="btn btn-primary">Add Transaction</button>
    </form>
    <ul class="list-group mt-3">
        <?php foreach ($finance as $transaction): ?>
            <li class="list-group-item"><?= htmlspecialchars($transaction['description']) ?> - $<?= htmlspecialchars($transaction['amount']) ?> - Type: <?= htmlspecialchars($transaction['type']) ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Sales Management -->
    <h2 class="mt-5">Sales Management</h2>
    <form method="post">
        <div class="mb-3">
            <label for="product" class="form-label">Product</label>
            <input type="text" class="form-control" id="product" name="product" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" name="action" value="Add Sale" class="btn btn-primary">Add Sale</button>
    </form>
    <ul class="list-group mt-3">
        <?php foreach ($sales as $sale): ?>
            <li class="list-group-item"><?= htmlspecialchars($sale['product']) ?> - Quantity: <?= htmlspecialchars($sale['quantity']) ?> - Price: $<?= htmlspecialchars($sale['price']) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
