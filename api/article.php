<?php
require('../helpers/database.php');
$conn = connect();

$result = $conn->query("SELECT * FROM Article WHERE id=$_GET[id]");
$row = $result->fetch_assoc();
echo "{\n"; 
echo "  \"title\": " . $row[title] . ",\n";
echo "  \"date\": " . $row[date] . ",\n";
echo "  \"content\": " . $row[content] . "\n";
echo "}\n";
?>
