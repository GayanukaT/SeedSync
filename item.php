<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pumpkin Seeds - SeedSync Marketplace</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #eaf7e6;
            color: #333;
        }
        .navbar {
            background-color: #388E3C;
        }
        .navbar-brand, .navbar-nav .nav-link {
			padding-left: 25px;
            color: green;
        }
        .navbar-nav .nav-link:hover {
            color: #000;
        }
        .hero-section {
            background-image: url('Images/Banner.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        .hero-section h1 {
            font-family: 'Lora', serif;
            font-size: 48px;
			color: green;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .hero-section p {
            font-size: 18px;
            margin: 20px 0;
			color: green;
        }
        .hero-section .btn {
            font-size: 18px;
            padding: 10px 20px;
        }
        .container {
            margin-top: 30px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-family: 'Lora', serif;
            color: #388E3C;
            margin-bottom: 20px;
        }
        .form-control {
            border: 1px solid #388E3C;
            background-color: #f0f4f0;
        }
        .form-control:focus {
            box-shadow: 0 0 3px rgba(56, 142, 60, 0.5);
            border-color: #388E3C;
        }
        .seed-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #fff;
        }
        .seed-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
        .seed-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .btn-primary, .btn-success {
            background-color: #388E3C;
            border: none;
        }
        .btn-primary:hover, .btn-success:hover {
            background-color: #2E7D32;
        }
        .footer {
            background-color: #388E3C;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<?php include 'func/functions.php'; ?>
<?php renderHeader(); ?>

<header>
    <h1>Pumpkin Seeds</h1>
    <p>Your trusted source for premium quality seeds.</p>
</header>

<div class="container">
    <div class="row">
        <!-- Left Column -->
        <div class="col-md-6">
            <div class="seed-card">
                <h3>Price</h3>
                <p><strong>$15.00 per kg</strong></p>
            </div>
            <div class="seed-card">
                <h3>Released Varieties</h3>
                <ul>
                    <li>Pathma</li>
                    <li>A.N.K.</li>
                    <li>Local Strains</li>
                    <li>Butternut</li>
                </ul>
            </div>
            <div class="seed-card">
                <h3>Climatic Requirements</h3>
                <p>Suitable for dry and intermediate zones, up to 500m elevation. Ideal for Yala season for pumpkins, both Maha and Yala for squash.</p>
            </div>
            <div class="seed-card">
                <h3>Soil Requirements</h3>
                <p>Rich in humus with a pH range of 5.5 to 7.5.</p>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-6">
            <div class="seed-card">
                <h3>Seed Requirement</h3>
                <p>1 kg per hectare.</p>
            </div>
            <div class="seed-card">
                <h3>Land Preparation</h3>
                <ul>
                    <li>Plough to 20-30 cm depth, harrow for fine tilth.</li>
                    <li>Planting holes: 30x30x30 cm.</li>
                    <li>Add 5 kg of organic matter per hole, mix with soil, and heap to 10 cm above ground.</li>
                </ul>
            </div>
            <div class="seed-card">
                <h3>Planting Instructions</h3>
                <ul>
                    <li>Local Strains & A.N.K.: 4 seeds per hole, spaced 10 cm apart.</li>
                    <li>Butternut: 2 seeds/hill (high germination) or 3 seeds/hill (low germination).</li>
                    <li>Seedlings can be raised in polythene bags for adverse weather.</li>
                </ul>
            </div>
            <div class="seed-card">
                <h3>Fertilizer Application</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fertilizer</th>
                            <th>Basal (kg/ha)</th>
                            <th>Top Dressing (kg/ha)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Urea</td>
                            <td>75</td>
                            <td>75 (4 & 8 weeks after planting)</td>
                        </tr>
                        <tr>
                            <td>TSP</td>
                            <td>200</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>MOP</td>
                            <td>60</td>
                            <td>60 (4 & 8 weeks after planting)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button class="btn btn-primary">Customize Your Order</button>
        <button class="btn btn-success">Buy Now</button>
    </div>
</div>

<?php renderFooter(); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
