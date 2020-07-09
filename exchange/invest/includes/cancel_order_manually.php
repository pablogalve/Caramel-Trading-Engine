<?php

function cancel_order($conn, $ticker, $order_type, $order_id){
    if(isset($_POST['cancel_button'])){ //Cancel button has been pressed
        if($_POST['order_id']==$order_id){ //We detect which of all the buttons is the one that has been pressed
            //We check that the order_id is from the same user that is making the request
            
            
            deleteOrder($conn, $ticker, $order_type, $order_id);
        }        
    }
    
    
}
?>