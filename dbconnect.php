<?php
$host = '127.0.0.1';      // or 'localhost'
$db   = 'itblog_db';  // database name
$user = 'root';  // database username
$pass = '';  // database password
// $charset = 'utf8mb4';     // character set

$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Error mode
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch style
    // PDO::ATTR_EMULATE_PREPARES   => false,                  // Disable emulation
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Connected successfully!";
} catch (\PDOException $e) {
    // throw new \PDOException($e->getMessage(), (int)$e->getCode());
    echo "Connection failed: " . $e->getMessage();
}
?>

<!-- 

R  - SELECT * FROM tablename
C  - INSERT INTO tablename (column1, column2) VALUES (value1, value2)
U  - UPDATE tablename SET column1 = value1, column2 = value2 WHERE condition
D  - DELETE FROM tablename WHERE condition

-->