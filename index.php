<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>To-Do List App</h1>

    <form action="add.php" method="POST">
        <input type="text" name="task" placeholder="Enter task..." required>
        <button type="submit">Add Task</button>
    </form>

    <ul>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <li>

                <?php if($row['status'] == 'completed') { ?>
                    <span class="completed">
                        <?php echo $row['task']; ?>
                    </span>
                <?php } else { ?>
                    <?php echo $row['task']; ?>
                <?php } ?>

                <div class="actions">

                    <?php if($row['status'] == 'pending') { ?>
                        <a href="complete.php?id=<?php echo $row['id']; ?>">Complete</a>
                    <?php } ?>

                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

                </div>

            </li>

        <?php } ?>

    </ul>

</div>

</body>
</html>