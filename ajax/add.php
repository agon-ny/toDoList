<?php

    include('../config.php');

    @$toDo = $_POST['toDo'];
    $userToken = $_COOKIE['user'];
    $error = false;

    $sql = database::connect()->prepare("INSERT INTO `tasks` VALUES (null,?,?) ");
    $sql->execute(array($userToken,$toDo));
    $response = array('case'=>'success', 'taskId' => database::connect()->lastInsertId(), 'task' => $toDo);
    
    return die(json_encode($response));