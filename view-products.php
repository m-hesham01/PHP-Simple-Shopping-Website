<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Scandiweb Test - View Products</title>
    <link href="bootstrap-5.3.1-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>

</head>
<body>
    <div class="container-lg">
        <div class="mt-4">
            <div class="row my-3 border-bottom border-3 border-muted">
                <div class="col">
                    <h1 class="lead display-6 text-start">
                         Product List
                    </h1>
                </div>
                <div class="col">
                    <div class="text-end">
                        <a href="add-product.php" class="btn btn-success">Add</a>
                        <input id="delete-product-btn" name="delete-product-btn" type="submit" form="list-form" value="Mass Delete" class="btn btn-danger">
                    </div>
                </div>
            </div>
            
            <div class="my-3 bg-light">
                <form action="delete-script.php" method="post" id="list-form">
                    <?php
                        include_once 'inc/GetObject.php';
                        $select = new GetObject();
                        $result = $select->get_products();
                        $count = 0;
                        for($i = 0; $i < count($result); $i+=4){?>
                            <div class="row align-items-center justify-content-center">
                                <?php
                                    for($j = $i;  $j < min($i + 4, count($result)); $j++) {
                                        $row = $result[$j];
                                        ?>
                                        <div class="col-lg-2 m-4">
                                            <div class="card text-center">
                                                <input class="delete-checkbox" type="checkbox" name="selected_ids[]" value="<?= $row['SKU']; ?>">
                                                <div class="card-body py-2">
                                                    <p class="card-title"><?= $row['SKU']; ?></p>
                                                    <p class="card-title"><?= $row['name']; ?></p>
                                                    <p class="card-title"><?= $row['price']; ?></p>
                                                    <p class="card-title"><?= $row['size']; ?></p>
                                                    <p class="card-title"><?= $row['dimensions']; ?></p>
                                                    <p class="card-title"><?= $row['weight']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $count++;
                                    }
                                ?>
                            </div>
                        <?php } ?>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>