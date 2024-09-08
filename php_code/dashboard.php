<?php 
    require "db.php";
    $query = "SELECT * FROM visitor ORDER BY `id` DESC LIMIT 30;";
    $stmt = $conn->prepare($query);

    try {
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage();
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>IP</th>
            <th>ISP</th>
            <th>COUNTRY</th>
            <th>TIMEZONE</th>
            <th>DATETIME</th>
        </tr>
    </thead>
<?php 
    foreach ($res as $row) {
        echo "<tr>";
        foreach ($row as $col) {
            echo "<td>{$col}</td>";
        }
        echo "</tr>";
    };
?>
</table>
</html>