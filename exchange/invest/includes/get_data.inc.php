<?php
function getBiggestBid($conn, $ticker){
    if($ticker=='pgeur'){
        $sql = "SELECT price FROM secondary_market_pgeur_bid ORDER BY price DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['price'];
    }
}

function getSmallestAsk($conn, $ticker){
    if($ticker=='pgeur'){
        $sql = "SELECT price FROM secondary_market_pgeur_ask ORDER BY price ASC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['price'];
    }    
}

function getBuyAmount_RP($conn, $ticker, $id){
    if($ticker=='pgeur'){
        $sql = "SELECT amount_RP FROM secondary_market_pgeur_bid WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['amount_RP'];
    }
}

function getSellAmount_RP($conn, $ticker, $id){
    if($ticker=='pgeur'){
        $sql = "SELECT amount_RP FROM secondary_market_pgeur_ask WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['amount_RP'];
    }
}

function getBuyerName($conn, $ticker, $id){
    if($ticker=='pgeur'){
        $sql = "SELECT username FROM secondary_market_pgeur_bid WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['username'];
    }
}

function getSellerName($conn, $ticker, $id){
    if($ticker=='pgeur'){
        $sql = "SELECT username FROM secondary_market_pgeur_ask WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    return $row['username'];
    }
}

function getBuyOrderID($conn, $ticker){
    if($ticker=='pgeur'){
        $sql = "SELECT id FROM secondary_market_pgeur_bid ORDER BY price DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['id'];
    }
}

function getSellOrderID($conn, $ticker){
    if($ticker=='pgeur'){
        $sql = "SELECT id FROM secondary_market_pgeur_ask ORDER BY price ASC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['id'];
   }
}
?>