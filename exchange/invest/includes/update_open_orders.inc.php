<?php

function create_open_order($conn, $order_id, $price, $amount_RP, $date, $username, $ticker, $type){
    $sql = "INSERT INTO open_orders (order_id, price, amount_RP, date, username, ticker, order_type) 
    VALUES ('$order_id', '$price', '$amount_RP', '$date', '$username', '$ticker', '$type')";
    $result = $conn->query($sql);
}

function modify_open_order(){

}

function delete_open_order($conn, $order_id){
    $sql = "DELETE FROM open_orders WHERE id='$order_id'";
    $result = $conn->query($sql);
}