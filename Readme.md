# Simple ERP System

## Overview
This is a simplified version of an ERP (Enterprise Resource Planning) system implemented in a single PHP file. It integrates key business processes such as Inventory Management, HR Management, Finance, and Sales into one system. The system is designed using PHP, HTML, CSS, and Bootstrap.

## Features
- **Inventory Management**: Add and view items in inventory with quantities.
- **HR Management**: Manage employees by adding and viewing employee details like name, position, and salary.
- **Finance Management**: Track financial transactions by adding income/expense records.
- **Sales Management**: Record and view sales transactions including product details, quantity, and price.

## Requirements
- **Web Server**: A server with PHP support (e.g., Apache, Nginx, XAMPP, WAMP).
- **PHP**: Version 7.0 or higher.
- **SQLite**: The project uses SQLite for database management, which is included by default with PHP.

## Installation
1. **Download the Project:**
   - Download the `simple_erp.php` file from this repository.

2. **Setup the Project:**
   - Place the `simple_erp.php` file in your web server's root directory (e.g., `htdocs` for XAMPP).

3. **Access the Project:**
   - Open your web browser and navigate to `http://localhost/simple_erp.php`.

4. **Start Using:**
   - You can now start adding inventory items, employees, financial transactions, and sales records through the web interface.

## Usage
1. **Inventory Management:**
   - Fill in the "Item Name" and "Quantity" fields under the Inventory Management section.
   - Click the "Add Inventory" button to save the item.
   - The item will appear in the list below the form.

2. **HR Management:**
   - Fill in the "Employee Name", "Position", and "Salary" fields under the HR Management section.
   - Click the "Add Employee" button to save the employee's details.
   - The employee will appear in the list below the form.

3. **Finance Management:**
   - Fill in the "Description", "Amount", and "Type" (Income/Expense) fields under the Finance Management section.
   - Click the "Add Transaction" button to save the financial transaction.
   - The transaction will appear in the list below the form.

4. **Sales Management:**
   - Fill in the "Product", "Quantity", and "Price" fields under the Sales Management section.
   - Click the "Add Sale" button to save the sales record.
   - The sale will appear in the list below the form.

## Customization
- **UI Enhancements**: Modify the HTML and Bootstrap classes in the `simple_erp.php` file to enhance the user interface.
- **Database Management**: Extend the existing tables or add new ones by editing the SQLite queries in the PHP file.
- **Additional Features**: You can add more functionality like editing, deleting records, or integrating user authentication by modifying the PHP code.

## License
This project is licensed under the MIT License. See the `LICENSE` file for more information.

## Contact
For any inquiries or support, please contact [Your Name] at [Your Email].
