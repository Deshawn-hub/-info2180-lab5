<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$country = '';
if(isset($_GET['country']))
  {
    $country = htmlspecialchars($_GET['country']);
  }

  if ($country) {
    $query = "SELECT * FROM countries WHERE name LIKE :country";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':country', '%' . $country . '%', PDO::PARAM_STR);
} else {
   
    $stmt = $conn->query("SELECT * FROM countries");
}


$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1">
    <thead>
        <tr>
            <th>Country Name</th>
            <th>Continent</th>
            <th>Independence Year</th>
            <th>Head of State</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['continent']) ?></td>
                <td><?= htmlspecialchars($row['independence_year']) ?></td>
                <td><?= htmlspecialchars($row['head_of_state']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
