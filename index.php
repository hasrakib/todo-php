<?php include 'database.php';

// Query the database
$sql = "SELECT * FROM todov1";
$result = $conn->query($sql); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <div class="current-tasks">
            <?php
            if ($result->num_rows > 0) {
                while ($row_current = $result->fetch_assoc()) {
                    if ($row_current["status"] == 0) { ?>
                        <p><input type="checkbox" id="<?php echo $row_current["id"] ?>">
                            <label for="<?php echo $row_current["id"] ?>"><?php echo $row_current["task"] ?></label>
                        </p>
                <?php }
                } ?>
            <?php } else {
                echo "0 results";
            }
            // Close connection
            // $conn->close();
            ?>
        </div>
        <div class="completed-tasks">
            <?php
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row_completed = $result->fetch_assoc()) {
                    if ($row_completed["status"] == 1) { ?>
                        <p><?php echo $row_completed["task"] ?></label>
                        </p>
                <?php }
                } ?>
            <?php } else {
                echo "0 results";
            }

            // Close connection
            // $conn->close();
            ?>
            <button onclick="buttonClicked()">Add</button>
            <script>
                function buttonClicked() {
                     $sqlquerry = "INSERT INTO todov1 VALUES (NULL, '1', 'this is hard code')";
            $conn->query($sql);

                }
            </script>
        </div>
    </main>
</body>

</html>