<?php
function getUserData($conn, $username, $dataType){ 
    $sql = "SELECT * FROM users WHERE uid = '$username'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    
    switch($dataType)
    {
        case "mf":
            return $row['mf'];
            break;
        case "eur":
            return $row['eur'];
            break;
        default:
            echo 'Internal error. Contact support with subject: Error MF001';
            break;
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
function getBuyAmountEUR($conn, $ticker, $id){
    if($ticker=='mfeur'){
        $sql = "SELECT amountEUR FROM mfeurbids WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['amountEUR'];
    }
}
function getSellAmountEUR($conn, $ticker, $id){
    if($ticker=='mfeur'){
        $sql = "SELECT amountEUR FROM mfeurasks WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['amountEUR'];
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