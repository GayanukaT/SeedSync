<?php
require 'conf/dbconf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $season = $_POST['season'] ?? '';
    $landArea = $_POST['landArea'] ?? '';
    $location = $_POST['location'] ?? '';
    $soilCondition = $_POST['soilCondition'] ?? '';
    $cropType = $_POST['cropType'] ?? '';
    $quantity = $_POST['quantity'] ?? '';

    $sql = "SELECT * FROM seeds WHERE 1=1";
    $params = [];

    if (!empty($season)) {
        $sql .= " AND season = ?";
        $params[] = $season;
    }
    if (!empty($soilCondition)) {
        $sql .= " AND soil_condition = ?";
        $params[] = $soilCondition;
    }
    if (!empty($cropType)) {
        $sql .= " AND category = ?";
        $params[] = $cropType;
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
}
?>
