<?php
include 'conf/dbconf.php';
include 'func/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $season = $_POST['season'];
    $soil_condition = $_POST['soil_condition'];
    $description = $_POST['description'];
    $image_url = $_FILES['image']['name'];
    $target_dir = "Images";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $stmt = $connect->prepare("INSERT INTO seeds (name, category, price, season, soil_condition, description, image_url) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsdss", $name, $category, $price, $season, $soil_condition, $description, $image_url);

    if ($stmt->execute()) {
        echo "New seed added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Seeds - Online Seed Marketplace</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php renderHeader(); ?>

<div class="container mt-4">
    <h2>Add New Seed</h2>
    <form method="POST" action="add_seed.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Seed Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category">
        </div>
        <div class="form-group">
            <label for="price">Price (per kg)</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="season">Season</label>
            <select class="form-control" id="season" name="season" required>
                <option value="maha">Maha (Oct - Mar)</option>
                <option value="yala">Yala (Apr - Sep)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="soil_condition">Soil Condition</label>
            <select class="form-control" id="soil_condition" name="soil_condition" required>
                <option value="loamy">Loamy</option>
                <option value="sandy">Sandy</option>
                <option value="clay">Clay</option>
                <option value="saline">Saline</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Seed Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Seed</button>
    </form>
</div>

<?php renderFooter(); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
