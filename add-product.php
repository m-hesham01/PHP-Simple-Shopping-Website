<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
               -webkit-appearance: none;
                margin: 0;
        }
 
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <title>Scandiweb Test - Add Product</title>
    <link href="bootstrap-5.3.1-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="inc/styles.css">

</head>
<body>
    <section>
        <div class="container-lg">
        <div class="mt-4">
            <div class="row my-3 border-bottom border-3 border-muted">
                <div class="col">
                    <h1 class="lead display-6 text-start">
                        Product Add
                    </h1>
                </div>
                <div class="col">
                    <div class="text-end">
                        <input type="submit" form="product_form" value="Save" class="btn btn-success">
                        <a href="view-products.php" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-8">
                    <form action="add-script.php" method="post" id="product_form">
                        <label for="sku" class="form-label">SKU</label>
                        <div class="input-group">
                            <input type="text" minlength="9" maxlength="9" class="form-control" id="sku" name="sku" required>
                            <span class="input-group-text">
                                <span class="tt" data-bs-placement="left" title="Enter a 9-character unique identifier for the product">
                                    <img src="bootstrap-icons-1.10.5\question-circle.svg">
                                </span>
                            </span>
                        </div>

                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>

                        <label for="price" class="form-label">Price($)</label>
                        <input type="number" class="form-control" id="price" name="price" step=".01" required>

                        <label for="productType" class="form-label">Product Type</label>
                        <select name="productType" id="productType" class="form-select" required>
                            <option value="" disabled selected hidden>Specify Product Type</option>
                            <option value="dvd">DVD</option>
                            <option value="furniture">Furniture</option>
                            <option value="book">Book</option>
                        </select>
                            <div id="show-dvd" class="optionDiv">
                                <label for="size" class="form-label">Size (MB)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="size" name="size">
                                    <span class="input-group-text">
                                        <span class="tt" data-bs-placement="left" title="Please, provide size in MB">
                                            <img src="bootstrap-icons-1.10.5\question-circle.svg">
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div id="show-furniture" class="optionDiv">
                                <label for="height" class="form-label">Height (CM)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="height" name="height">
                                    <span class="input-group-text">
                                        <span class="tt" data-bs-placement="left" title="Please, provide height in CM">
                                            <img src="bootstrap-icons-1.10.5\question-circle.svg">
                                        </span>
                                    </span>
                                </div>

                                <label for="width" class="form-label">Width (CM)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="width" name="width">
                                    <span class="input-group-text">
                                        <span class="tt" data-bs-placement="left" title="Please, provide width in CM">
                                            <img src="bootstrap-icons-1.10.5\question-circle.svg">
                                        </span>
                                    </span>
                                </div>

                                <label for="length" class="form-label">Length (CM)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="length" name="length">
                                    <span class="input-group-text">
                                        <span class="tt" data-bs-placement="left" title="Please, provide length in CM">
                                            <img src="bootstrap-icons-1.10.5\question-circle.svg">
                                        </span>
                                    </span>
                                </div>
                            </div>
                            
                            <div id="show-book" class="optionDiv">
                                <label for="weight" class="form-label">Weight (Kg)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="weight" name="weight" step=".01">
                                    <span class="input-group-text">
                                        <span class="tt" data-bs-placement="left" title="Please, provide weight in Kg">
                                            <img src="bootstrap-icons-1.10.5\question-circle.svg">
                                        </span>
                                    </span>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <p>
            <?php
            if (isset($_GET['missing_error'])) {
                $missing_error = urldecode($_GET['missing_error']);
                echo $missing_error;
            }
            if (isset($_GET['sku_error'])) {
                $sku_error = urldecode($_GET['sku_error']);
                echo $sku_error;
            }
            ?>
        <p>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
        $('#productType').on('change', function(){
            var demovalue = $(this).val(); 
            $("div.optionDiv").hide();
            $("#show-"+demovalue).show();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <script>
        const tooltips =document.querySelectorAll('.tt');
        tooltips.forEach(t=> {
            new bootstrap.Tooltip(t);
        })
    </script>
</body>
</html>


