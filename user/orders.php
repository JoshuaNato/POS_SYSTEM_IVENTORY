<?php 
	include("../server/connection.php");
	include('../user/add.php');
	include '../set.php';
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dreams POS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .category-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            cursor: pointer;
            text-align: center;
        }
        .category-card.active {
            background-color: #6f42c1;
            color: white;
        }
        .product-card img {
            max-width: 100%;
            border-radius: 8px;
        }
        .order-list {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
        }
        .product-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

    
        .pay-button, .pay-later-button {
            background-color: #0b3c5d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .pay-button:hover, .pay-later-button:hover {
            background-color: #094a7a;
        }
        
    
        .pay-button, .pay-later-button {
            background-color: #0b3c5d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .pay-button:hover, .pay-later-button:hover {
            background-color: #094a7a;
        }

        .green-button {
        background-color: green;
        color: white; /* Optional: change text color */
        border: none; /* Optional: remove border */
    }

    </style>
</head>
<body>
<div class="mb-3">
               <img class="img-fluid m-2" src="milk.jpg" style="width: 150px; height: auto;">
            </div>
    <div class="container-fluid">
        <div class="row mt-4">
            <!-- Categories Section -->
            <div class="col-md-8">
                <h3>Categories</h3>
                <p>Manage your purchases</p>
                <div class="d-flex gap-2 mb-4">
                    <?php
                    $categories = ['All Time Favorite', 'Blockbuster', 'Premium',];
                    foreach ($categories as $category) {
                        echo "<div class='category-card'>" . $category . "</div>";
                    }
                    ?>
                </div>

                <!-- Product Card -->
                <div class="product-card">
                    <img src="intea.jfif" alt="Water Melon">
                    <h5>Water Melon</h5>
                    <p>35.00</p>
                </div>
            </div>

            <!-- Order List Section -->
            <div class="col-md-4">
                <div class="order-list">
                    <h4>Order List</h4>
                    <p>Transaction ID: #65565</p>
                    <button class="btn btn-success mb-3">+ Add Customer</button>

                    <select class="form-select mb-2">
                        <option>Walk-in Customer</option>
                    </select>
                    <select class="form-select mb-2">
                        <option>Select Product</option>
                    </select>
                    <button class="btn btn-primary w-100 mb-3">Scan Barcode</button>

                    <h5>Total Items: 4</h5>
                    <div class="product-item">
                        <span>Water Melon</span>
                        <span>35.00</span>
                    </div>
                    <button class="btn btn-danger w-100">Clear All</button>
                </div>
            </div>
        </div>
    </div>


    <div class="button-container">
        <button class="pay-button">Pay</button>
        <button class="pay-later-button">Pay Later</button>
    </div>
</div>

<!-- Button with arrow icon -->
<button class="btn m-2 p-2" id="sidebar_button" onclick="window.location.href='../main.php'">
    <i class="fas fa-arrow-left"></i> Back
</button>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>










<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>

</body>
</html>