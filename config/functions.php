<?php
include "../config/connection.php";

function select($table, $conditions, $what = '*'){

    $whereArr = [];
    foreach ($conditions as $field => $value){
        $whereArr[] = $field . "='".$value."'";
    }

    $whereStr = implode(' AND ',$whereArr);

    $sql = "SELECT $what FROM $table WHERE $whereStr";
    $result = query($sql);
    $data = mysqli_fetch_assoc($result); // Todo fetch all

    return $data;
}

function insert($table,$data){
    $fieldsArr = [];
    $valuesArr = [];
    foreach ($data as $fields => $value){
        $fieldsArr[] = "`" . $fields . "`";
        $valuesArr[] = "'" . $value . "'";
    }

    $fields = implode(',',$fieldsArr);
    $values = implode(',',$valuesArr);

    $sql = "INSERT INTO $table ($fields) VALUES ($values)";

    return query($sql);
}

function update($table, $data, $conditions){
//Todo
}

function delete(){
//Todo
}

function upload(){
//Todo
}

function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}