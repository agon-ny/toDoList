<?php

class trackUsers
{

    public function addUser() {
        if(!isset($_COOKIE['user'])){
            $userToken = uniqid();
            setcookie('user', $userToken, time() + (60*60*24), "/");
            $sql = database::connect()->prepare("INSERT INTO `users` VALUES(null,?) ");
            $sql->execute(array($userToken));
        }
    }

    public function getTasks() {
        $tasks = database::connect()->prepare("SELECT * FROM `tasks` WHERE `userToken` = ? ");
        $tasks->execute(array($_COOKIE['user']));
        return $tasks;
    }

    public function getCompletedTasks() {
        $tasks = database::connect()->prepare("SELECT * FROM `completed_tasks` WHERE `userToken` = ? ");
        $tasks->execute(array($_COOKIE['user']));
        return $tasks;
    }

}