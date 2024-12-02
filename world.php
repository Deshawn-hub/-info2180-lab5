<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = '';
$lookup = isset($_GET['lookup']) ? $_GET['lookup'] : '';  //hi i love this course thank you 

if (isset($_GET['country'])) {
    $country = htmlspecialchars($_GET['country']);
}

if ($lookup === 'cities' && $country) {
   
    $query = "
        SELECT cities.name AS city_name, cities.district, cities.population
        FROM cities
        JOIN countries ON cities.country_code = countries.code
        WHERE countries.name LIKE :country
        ORDER BY cities.name;
    ";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':country', '%' . $country . '%', PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    echo '<table border="1" class="styledtable">';
    echo '<thead><tr><th>City Name</th><th>District</th><th>Population</th></tr></thead>';
    echo '<tbody>';
    if ($results) {
        foreach ($results as $row) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['city_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['district']) . '</td>';
            echo '<td>' . htmlspecialchars($row['population']) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="3">No cities found for this country.</td></tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    // this Queries the database  to get countries
    if ($country) {
        $query = "SELECT * FROM countries WHERE name LIKE :country";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':country', '%' . $country . '%', PDO::PARAM_STR);
    } else {
        $stmt = $conn->query("SELECT * FROM countries");
    }
    
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Displa country results in an HTML table
    echo '<table border="1" class="styledtable">';
    echo '<thead><tr><th>Country Name</th><th>Continent</th><th>Independence Year</th><th>Head of State</th></tr></thead>';
    echo '<tbody>';
    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['continent']) . '</td>';
        echo '<td>' . htmlspecialchars($row['independence_year']) . '</td>';
        echo '<td>' . htmlspecialchars($row['head_of_state']) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
?>
