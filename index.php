<?php
    include('config.php');
    $trackUsers = new trackUsers;
    $trackUsers->addUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/main.css">
    <title>ToDo-List</title>
</head>
<body>
    
    <div class="addToListBtn">
        <button>Add To List</button>
    </div>

    <div class="seeList">
        <button>See the list</button>
    </div>

    <div class="doneTasks">
        <button>Done Tasks</button>
    </div>

    <div class="addToList">
        <form method="POST" id="addToListForm" >
            <input type="text" name="toDo" placeholder="Today i need to..." >
            <input type="submit" value="Add" name="action" >
        </form>
    </div>

    <div class="list">
        <?php
            $tasks = $trackUsers->getTasks();
            foreach($tasks as $key => $value){
        ?>
            <div class="task" taskId="<?php echo $value['id'];?>" >
                <span><?php echo $value['task']; ?></span>
                <button class="markAsDone">Mark as Done!</button>
                <button class="delete">Delete task</button>
            </div>
        <?php
            };
        ?>
    </div>
    
    <div class="completedList">
        <?php
            $completedTasks = $trackUsers->getCompletedTasks();
            foreach($completedTasks as $key => $value){

        ?>
        <div class="doneTasks" completedTaskId="<?php echo $value['id']; ?>" >
            <span><?php echo $value['task']; ?></span>
            <button class="deleteCompletedTask">Delete task</button>
        </div>
        <?php
            };
        ?>

    </div>
    

    <script src="resources/scripts/libs/jquery.js"></script>
    <script src="resources/scripts/main.js"></script>
    <script src="resources/scripts/ajax.js"></script>
</body>
</html>