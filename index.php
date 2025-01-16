<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Seed Marketplace - Sri Lanka</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <?php include 'func/functions.php'; ?>
    <?php renderHeader(); ?>

    <section class="hero-section">
        <div class="container">
            <h1>Grow Your Future</h1>
            <p>Find the perfect seeds for your soil, location, and conditions. Start your journey to an abundant harvest today!</p>
            <a href="#searchForm" class="btn btn-primary">Find Your Seeds</a>
        </div>
    </section>

    <div class="container" id="searchForm">
    <h2>Search for Seeds</h2>
    <form id="seedSearchForm" action="search.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="season">Season</label>
                <select class="form-control" id="season" name="season">
                    <option value="" selected>Choose...</option>
                    <option value="maha">Maha (Oct - Mar)</option>
                    <option value="yala">Yala (Apr - Sep)</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="landArea">Land Area (acres)</label>
                <input type="number" class="form-control" id="landArea" name="landArea" placeholder="e.g., 2" min="1">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="e.g., Colombo">
            </div>
            <div class="form-group col-md-6">
                <label for="soilCondition">Soil Condition</label>
                <select class="form-control" id="soilCondition" name="soilCondition">
                    <option value="" selected>Choose...</option>
                    <option value="loamy">Loamy</option>
                    <option value="sandy">Sandy</option>
                    <option value="clay">Clay</option>
                    <option value="saline">Saline</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cropType">Crop Type</label>
                <select class="form-control" id="cropType" name="cropType">
                    <option value="" selected>Choose...</option>
                    <option value="vegetables">Vegetables</option>
                    <option value="fruits">Fruits</option>
                    <option value="grains">Grains</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="quantity">Quantity (kg)</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="e.g., 50" min="1">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Find Seeds</button>
    </form>
    <div id="searchResults" class="mt-4"></div> <!-- Container for displaying search results -->
</div>


    <script>
document.getElementById('seedSearchForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('search.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const resultsContainer = document.getElementById('searchResults');
        resultsContainer.innerHTML = '';

        if (data.length > 0) {
            data.forEach(seed => {
                const seedCard = `
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">${seed.name}</h5>
                            <p class="card-text">${seed.description}</p>
                            <p><strong>Price:</strong> $${seed.price}/kg</p>
                        </div>
                    </div>
                `;
                resultsContainer.innerHTML += seedCard;
            });
        } else {
            resultsContainer.innerHTML = '<p>No seeds found matching your criteria.</p>';
        }
    })
    .catch(error => console.error('Error:', error));
});
    </script>

    <div class="container mt-4">
        <h2>Featured Seeds</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="seed-card">
                    <img src="Images/Tomato.png" alt="Tomato Seeds" class="seed-image">
                    <h5>Tomato Seeds</h5>
                    <p>High-quality seeds for abundant tomatoes. Perfect for year-round cultivation.</p>
                    <p><strong>Price:</strong> $15.00/kg</p>
                    <button class="btn btn-success btn-block">Add to Cart</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="seed-card">
                    <img src="Images/Carrot.png" alt="Carrot Seeds" class="seed-image">
                    <h5>Carrot Seeds</h5>
                    <p>Organic carrot seeds for nutritious harvests. Best for summer growth.</p>
                    <p><strong>Price:</strong> $12.00/kg</p>
                    <button class="btn btn-success btn-block">Add to Cart</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="seed-card">
                    <img src="Images/Pumpkin.png" alt="Pumpkin Seeds" class="seed-image">
                    <h5>Pumpkin Seeds</h5>
                    <p>Premium seeds for hearty pumpkins. Grow the perfect autumn crop!</p>
                    <p><strong>Price:</strong> $20.00/kg</p>
                    <button class="btn btn-success btn-block">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <?php renderFooter(); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
