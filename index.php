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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.task-checkbox').change(function () {
                var taskId = $(this).siblings('.task-id').val();
                var isChecked = $(this).prop('checked');

                
                $.ajax({
                    type: 'POST',
                    url: 'check.php',
                    data: { checkbox: isChecked ? '1' : '0', id: taskId },
                    success: function (data) {
                        
                        if (isChecked) {
                            $(this).parent().appendTo('.completed-tasks');
                        } else {
                            
                            $(this).parent().remove();
                        }
                    },
                    error: function () {
                        alert('An error occurred while updating the task.');
                    }
                });
            });
        });
    </script>
</head>

<body>
    <main>
        <div class="current-tasks">
            <?php
            if ($result->num_rows > 0) {
                while ($row_current = $result->fetch_assoc()) {
                    if ($row_current["status"] == 0) { ?>
                         <p>
                            <input type="checkbox" class="task-checkbox" id="<?php echo $row_current["id"] ?>">
                            <label for="<?php echo $row_current["id"] ?>"><?php echo $row_current["task"] ?></label>
                            <input type="hidden" class="task-id" value="<?php echo $row_current["id"] ?>">
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
        </div>
        <div class="add-new-task">
            <form action="insert.php" method="post">
                <input type="text" name="task">
                <input type="submit" value="Submit">
            </form>
        </div>
    </main>
</body>

</html>

<!-- This is from ifty to learn git clone feature -->
