<?php

    include('../config.php');

    $taskId = $_POST['taskId'];
    $userToken = $_COOKIE['user'];
    $error = false;

    $sqlGet = database::connect()->prepare("SELECT * FROM `tasks` WHERE `id` = ? AND `userToken` = ? ");
    $sqlGet->execute(array($taskId,$userToken));
    $task = $sqlGet->fetch()['task'];

    $sqlRemove = database::connect()->prepare("DELETE FROM `tasks` WHERE `id` = ? AND `userToken` = ? ");
    $sqlRemove->execute(array($taskId,$userToken));

    $sqlAdd = database::connect()->prepare("INSERT INTO `completed_tasks` VALUES(null,?,?) "); 
    $sqlAdd->execute(array($userToken,$task));

    $response = array('case'=>'success', 'completedTaskId' => database::connect()->lastInsertId(), 'task' => $task);

    return die(json_encode($response));