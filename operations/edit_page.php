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
        }

        .task-buttons button {
            margin-right: 10px;
            background-color: #4CAF50;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
    </style>
</head>

<body>
    <div class="task-container">

        <form action="./handlers/edit_handle.php" method="post">
            <div class="create-task">
                <input type="hidden" value="<?php echo $_POST['task_id'] ?>" name="task_id">
                <input type="text" id="task-input" placeholder="Enter task name" name="task" value= "<?php echo $_POST['task_name']?>">
                <button>Edit Task Name</button>
            </div>
        </form>
        <?php 