<?php

    include('../config.php');

    @$completedTaskId = $_POST['completedTaskId'];
    @$action = $_POST['action'];
    @$taskId = $_POST['taskId'];
    $userToken = $_COOKIE['user'];
    $error = false;

    if ($action == 'removeCompletedTask') {
        $sql = database::connect()->prepare("DELETE FROM `completed_tasks` WHERE `id` = ? AND `userToken` = ? ");
        $sql->execute(array($completedTaskId,$userToken));
        $response = array('case'=>'success');
    }

    $sql = database::connect()->prepare("DELETE FROM `tasks` WHERE `id` = ? AND `userToken` = ? ");
    $sql->execute(array($taskId,$userToken));
    $response = array('case'=>'success');

    return die(json_encode($response));