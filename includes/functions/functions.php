<?php

//Function getCount use it for get Numbers of rows in any table
function getCount($tbl,$where=NULL)
{
    global $cnx;
    $query = "SELECT * FROM $tbl $where";
    $stmt = $cnx->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count;
}

//function get_From use it for Selected rows or clomumns from any table
function get_From($select="*",$tbl,$where=NULL)
{
    global $cnx;
    $query = "SELECT $select FROM $tbl $where";
    $stmt = $cnx->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}

//function use it for get current page title
function getTitle()
{
    global $active;
    if(isset($active))
    {
        echo $active;
    }
    else
    {
        echo 'Default';
    }
}
//function use it for Check Element if exist or not
function checkItem($table,$champ,$val)
{
    global $cnx;
    if(gettype($val)=="string")
    {
        $stmt = $cnx->prepare("SELECT * FROM $table WHERE $champ='$val'");
    }
    else
    {
        $stmt = $cnx->prepare("SELECT * FROM $table WHERE $champ=$val");
    }
    $stmt->execute();
    return $stmt->rowCount()>0?true:false;
}

function delete($table,$where=null)
{
    global $cnx;
    $query = "DELETE FROM $table $where";
    $stmt = $cnx->prepare($query);
    if($stmt->execute())
    {
        return true;
    }
    else
    {
        return false;
    }
}
function insert($table,$champs,$values)
{
    global $cnx;
    $query = "INSERT INTO $table($champs) VALUES($values)";
    $stmt = $cnx->prepare($query);
    if($stmt->execute())
    {
        return true;
    }
    else
    {
        return false;
    }
}
function update($table,$update)
{
    global $cnx;
    $query = "UPDATE $table $update";
    $stmt = $cnx->prepare($query);
    if($stmt->execute())
    {
        return true;
    }
    else
    {
        return false;
    }
}