<?php
include 'conf/dbconf.php';
include 'func/functions.php';

renderHeader();

// Initialize variables
$searchResults = [];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $season = $_POST['season'] ?? '';
    $landArea = $_POST['landArea'] ?? '';
    $location = $_POST['location'] ?? '';
    $soilCondition = $_POST['soilCondition'] ?? '';
    $cropType = $_POST['cropType'] ?? '';
    $quantity = $_POST['quantity'] ?? '';

    $query = "SELECT * FROM seeds WHERE 1 = 1";

    // Append conditions based on user input
    if (!empty($season)) $query .= " AND season = '$season'";
    if (!empty($soilCondition)) $query .= " AND soil_condition = '$soilCondition'";
    if (!empty($cropType)) $query .= " AND category = '$cropType'";

    // Execute query
    $result = mysqli_query($connect, $query);
    if ($result) {
        $searchResults = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Error in search query: " . mysqli_error($connect);
    }
}

// Close the connection
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Online Seed Marketplace</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container mt-4">
    <h2>Search Results</h2>
    <div class="row">
        <?php
        if (empty($searchResults)) {
            echo '<p>No seeds match your search criteria.</p>';
        } else {
            foreach ($searchResults as $seed) {
                echo '<div class="col-md-4">';
                echo '<div class="seed-card">';
                echo '<img src="' . $seed['image_url'] . '" alt="' . $seed['name'] . '" class="seed-image">';
                echo '<h5>' . $seed['name'] . '</h5>';
                echo '<p>' . $seed['description'] . '</p>';
                echo '<p><strong>Price:</strong> $' . $seed['price'] . '/kg</p>';
                echo '<button class="btn btn-success btn-block">Add to Cart</button>';
                echo '</div></div>';
            }
        }
        ?>
    </div>
</div>

<?php renderFooter(); ?>

</body>
</html>
