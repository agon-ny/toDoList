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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/main.css">
    <title>ToDo-List</title>
</head>
<body>

    <section class="mainPage">
        <header>
            <div class="title">
                <h2>ToDo List :) </h2>
            </div>
        </header>


        <section class="btns">    
            <div class="seeList mainBtn">
                Show List
            </div>

            <div class="addToListBtn mainBtn">
                Add To List
            </div>

            <div class="doneTasksBtn mainBtn" >
                Completed Tasks
            </div>
        </section>

        <div class="addToList">
            <form method="POST" id="addToListForm" >
                <input type="text" name="toDo" placeholder="Today i need to..." >
                <input type="submit" value="Add" name="action" >
            </form>
        </div>

        <div class="list">
                <?php
                    $tasks = $trackUsers->getTasks();
                    if($tasks->rowCount() == 0){
                ?>
                    
                <?php
                    }else{
                    foreach($tasks as $key => $value){
                ?>
                    <div class="task" taskId="<?php echo $value['id'];?>" >
                        <span><?php echo $value['task']; ?></span>
                        <button class="markAsDone">Done!</button>
                        <button class="delete">Delete</button>
                    </div>
                <?php
                    }};
                ?>
        </div>

        
        <div class="completedList">
            <?php
                $completedTasks = $trackUsers->getCompletedTasks();
                foreach($completedTasks as $key => $value){
            ?>
            <div class="doneTasks" completedTaskId="<?php echo $value['id']; ?>" >
                <span><?php echo $value['task']; ?></span>
                <button class="deleteCompletedTask delete">Delete</button>
            </div>
            <?php
                };
            ?>

        </div>


        <p id="poweredBy">V1.1.0 Powered by <a href="https://github.com/SoloDv" target="_blank" >Solo</a></p>
    </section>
    
    

    <script src="resources/scripts/libs/jquery.js"></script>
    <script src="resources/scripts/main.js"></script>
    <script src="resources/scripts/ajax.js"></script>
</body>
</html>