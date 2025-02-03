<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Multiplication Table Generator</h2>
        
        <form method="POST" class="form-inline justify-content-center">
            <div class="form-group mb-2 mr-3">
                <label for="mul" class="sr-only">Enter the table you want:</label>
                <input type="number" id="mul" name="mul" class="form-control" placeholder="Table number" required>
            </div>
            <div class="form-group mb-2 mr-3">
                <label for="limit" class="sr-only">Enter the range of the table:</label>
                <input type="number" id="limit" name="limit" class="form-control" placeholder="Range" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>

        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mul = isset($_POST['mul']) ? intval($_POST['mul']) : 1;
            $limit = isset($_POST['limit']) ? intval($_POST['limit']) : 1;

            if ($limit > 0 && $mul > 0) {
                echo "<div class='text-center mt-4 table-container'>";
                echo "<h4>Multiplication Table for $mul:</h4>";
                echo "<ul class='list-group d-inline-block'>";
                for ($i = 1; $i <= $limit; $i++) {
                    echo "<li class='list-group-item'>$mul x $i = " . ($mul * $i) . "</li>";
                }
                echo "</ul>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-danger mt-4 text-center'>Please enter valid positive numbers.</div>";
            }
        }
        ?>

    </div>
</body>
</html>
