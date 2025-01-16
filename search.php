<?php
require 'conf/dbconf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $season = $_POST['season'] ?? '';
    $soilCondition = $_POST['soilCondition'] ?? '';
    $cropType = $_POST['cropType'] ?? '';

    $sql = "SELECT * FROM seeds WHERE 1=1";

    if (!empty($season)) {
        $sql .= " AND season = ?";
    }
    if (!empty($soilCondition)) {
        $sql .= " AND soil_condition = ?";
    }
    if (!empty($cropType)) {
        $sql .= " AND category = ?";
    }

    $stmt = $connect->prepare($sql);

    $types = '';
    $params = [];
    if (!empty($season)) {
        $types .= 's';
        $params[] = $season;
    }
    if (!empty($soilCondition)) {
        $types .= 's';
        $params[] = $soilCondition;
    }
    if (!empty($cropType)) {
        $types .= 's';
        $params[] = $cropType;
    }

    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $results = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($results);
}
?>