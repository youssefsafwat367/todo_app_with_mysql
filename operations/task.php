<?php session_start();
include('./fun/functions.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Task Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .task-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .task {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .task h3 {
            margin: 0;
        }

        .task-buttons {
            margin-top: 10px;
            display: inline-block;
        }

        .task-buttons button {
            margin-right: 10px;
            background-color: #4CAF50;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
        }

        .task-buttons button.update {
            background-color: #2196F3;
            display: inline-block;
        }

        .task-buttons button.delete {
            background-color: #FF0000;
            display: inline-block;
        }

        .create-task {
            margin-bottom: 20px;
        }

        .create-task input[type="text"] {
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .create-task button {
            background-color: #4CAF50;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #task-input {
            margin-left: 80px;
        }

        .errors {
            text-align: center;
            background-color: #FF0000;
            color: white;
        }
    </style>
</head>

<body>
    <div class="task-container">

        <form action="./handlers/task_handle.php" method="post">
            <div class="create-task">
                <input type="text" id="task-input" placeholder="Enter task name" name="task">
                <button>Create Task</button>
            </div>
        </form>
        <div class="errors">
            <?php
            if (isset($_SESSION['invalid_method'])) {
                echo ($_SESSION['invalid_method']);
                echo "<br/>";
            }
            unset($_SESSION['invalid_method']);

            if (isset($_SESSION['empty_task'])) {
                echo ($_SESSION['empty_task']);
                echo "<br/>";
            }
            unset($_SESSION['empty_task']);
            ?>
        </div>
        <?php
        $tasks = get_tasks_from_database("Localhost", "root", "", "tasks" , "tasks" );
        $tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
    
        ?>
        <style>
            .number_of_tasks{
                color: red;
                display: inline-block;
                font-size: 20px;
                font-weight: bold;
            }
        </style>
        <div class="number_of_tasks">
            <?php
            echo "the number of tasks is : " . count($tasks);
            ?>
        </div>
        <?php
        echo "<br/>";

        foreach ($tasks as $index) :
        ?>
            <br>
            <div class="task">
                <h3> <?php echo $index['task'] ?></h3>
                <form action="./handlers/delete_handle.php" method="post">
                    <div class="task-buttons">
                        <input type="hidden" value="<?php echo $index['id'] ?>" name="task_id">
                        <button class="delete">Delete</button>
                    </div>
                </form>
                <form action="./edit_page.php" method="post">
                    <div class="task-buttons" style="display:inline-block ;">
                        <input type="hidden" value="<?php echo $index['id'] ?>" name="task_id">
                        <input type="hidden" value="<?php echo $index['task'] ?>" name="task_name">

                        <button class="update">Edit</button>
                    </div>
                </form>
            </div>
        <?php
        endforeach;
        ?>


</body>

</html>