<?php
require('../helpers/database.php');
$conn = connect();

$result = $conn->query("SELECT * FROM Article WHERE id=$_GET[id]");
$row = $result->fetch_assoc();
?>
{
  "title": "<?=$row[title]?>",
  "date": "<?=$row[date]?>",
  "content": "<?=$row[content]?>"
}
