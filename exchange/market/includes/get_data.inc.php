<?php
function getUserData($conn, $username, $dataType){ 
    $sql = "SELECT * FROM users WHERE uid = '$username'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    if($dataType == "mf"){
        return $row['mf'];
    }else if($dataType == "mfAvailable"){
        return $row['mfAvailable'];
    }else if($dataType == "eur"){
        return $row['eur'];
    }else if($dataType == "eurAvailable"){
        return $row['eurAvailable'];
    }
}

function getBiggestBid($conn, $ticker){
    if($ticker=='mfeur'){
        $sql = "SELECT price FROM mfeurbids ORDER BY price DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['price'];
    }
}

function getSmallestAsk($conn, $ticker){
    if($ticker=='mfeur'){
        $sql = "SELECT price FROM mfeurasks ORDER BY price ASC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['price'];
    }
    
}

function getBuyAmount($conn, $ticker, $id){
    if($ticker=='mfeur'){
        $sql = "SELECT amountRP FROM mfeurbids WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['amountRP'];
    }
    
}
function getSellAmount($conn, $ticker, $id){
    if($ticker=='mfeur'){
        $sql = "SELECT amountRP FROM mfeurasks WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['amountRP'];
    }
}
function getBuyerName($conn, $ticker, $id){
    if($ticker=='mfeur'){
        $sql = "SELECT username FROM mfeurbids WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['username'];
    }
}
function getSellerName($conn, $ticker, $id){
    if($ticker=='mfeur'){
        $sql = "SELECT username FROM mfeurasks WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    return $row['username'];
    }
}
function getBuyOrderID($conn, $ticker){
    if($ticker=='mfeur'){
        $sql = "SELECT id FROM mfeurbids ORDER BY price DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['id'];
    }
}
function getSellOrderID($conn, $ticker){
    if($ticker=='mfeur'){
        $sql = "SELECT id FROM mfeurasks ORDER BY price ASC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['id'];
   }
}
?>