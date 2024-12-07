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
            margin: 0;
        }
        .navbar {
            background-color: #388E3C;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #C8E6C9 !important;
        }
        header {
            background-color: #388E3C;
            color: white;
            padding: 30px 0;
            text-align: center;
        }
        header h1 {
            font-family: 'Lora', serif;
            font-size: 36px;
            margin: 0;
        }
        .container {
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .seed-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .seed-card h3 {
            color: #388E3C;
            font-family: 'Lora', serif;
        }
        .btn-primary {
            background-color: #388E3C;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2E7D32;
        }
        footer {
            background-color: #eeeeee;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
            margin-top: 20px;
        }
        .footer a {
            color: #388E3C;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="index.html">SeedSync</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Seeds</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.html">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>

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

<footer>
    &copy; 2024 SeedSync Marketplace. All rights reserved.
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
