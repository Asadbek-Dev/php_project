<?php
include 'constants.php';
function getCategoryList($page){
     include 'dbconnect.php';
     $offset=($page-1)*LIMIT;
     $sql="select * from category limit :offset, :limit";
     $state=$conn->prepare($sql);
     $state->bindValue(":limit", LIMIT, PDO::PARAM_INT);
     $state->bindValue(":offset", $offset, PDO::PARAM_INT);
     $state->execute();
     $result=$state->fetchAll(PDO::FETCH_ASSOC);
     return $result;
 }
 function addCategory($title){
     include  'dbconnect.php';
     $sql_insert='insert into category (title) values(:title)';
     $state=$conn->prepare($sql_insert);
     $state->bindValue(":title",$title);
     $state->execute();

 }
 function getPagination(){
     include 'dbconnect.php';
     $sql="select * from category";
     $state=$conn->prepare($sql);
     $state->execute();
    $total_rows = $state->rowCount();
    return  ceil($total_rows/LIMIT);
 }
 function getCategoryById($id){
     include 'dbconnect.php';
     $sql="select * from category where id=:id";
     $state=$conn->prepare($sql);
     $state->bindValue(":id",$id, PDO::PARAM_INT);
     $state->execute();
     return $state->fetch(PDO::FETCH_ASSOC);
 }
function updateCategory($id, $title)
{
    include 'dbconnect.php';
    $sql="update category set title=:title where id=:id";
    $state=$conn->prepare($sql);
    $state->bindValue(":id",$id, PDO::PARAM_INT);
    $state->bindValue(":title",$title);
    $state->execute();
}