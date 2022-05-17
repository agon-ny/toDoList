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

    <div class="addToListDiv">
        <form method="POST" id="addToListForm" >
            <input type="text" name="toDo" placeholder="Today i need to..." >
            <input type="submit" value="Add" name="action" >
        </form>
    </div>

    <script src="resources/scripts/libs/jquery.js"></script>
    <script src="resources/scripts/main.js"></script>
    <script src="resources/scripts/ajax.js"></script>
</body>
</html>