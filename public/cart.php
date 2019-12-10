<!--Requires config.php file-->
<?php require_once("../resources/config.php"); ?>

<?php

//gets the request to add, and add's in increments of one to the product count
if (isset($_GET['add'])) {
    // creates a query that queries the database selects all product_id / sql escape string / gets the add function and confirms the query
    $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']) . " ");
    confirm($query);

    // pulls the information from the db in a fetch array, if the row quantity (product_quantity) is not equal to the session quantity increment the quantity by 1, if they try to go over the amount listed in the database send a message back that displays how many we have in stock.
    while ($row = fetch_array($query)) {
        if ($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {
            $_SESSION['product_' . $_GET['add']] += 1;
            redirect("checkout.php");
        } else {
            set_message("We only have " . $row['product_quantity'] . " " . "{$row['product_title']}" . " available!");
            redirect("checkout.php");
        }
    }

    //    $_SESSION['product_' . $_GET['add']] +=1;
    //    redirect("index.php");
}

// removes items from the users cart in increments of 1
if (isset($_GET['remove'])) {
    $_SESSION['product_' . $_GET['remove']]--;

    if ($_SESSION['product_' . $_GET['remove']] < 1); {
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
    
        redirect("checkout.php");
    } 
}


//deletes all items from the cart
if (isset($_GET['delete'])) {
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    
    redirect("checkout.php");
}


//cart function that queries the DB / pulls all products with product_id / confirms the query / displays the info in a fetch array using the delimeter code in the cart - users can add, remove, and delete products.
function cart()
{
    //total variable
    $total = 0;
    //item_quantity variable
    $item_quantity = 0;
    //the foreach statement uses the key and value for the associate array for this session
    foreach ($_SESSION as $name => $value) {
        // if the value is 0 it doesn't show anything in the cart
        if ($value > 0) {
            //the substring will be equal to name of product_(0,8), if it's not equal it won't show anything in the cart
            if (substr($name, 0, 8) == "product_") {

                $length = strlen($name) - 8;

                $id = substr($name, 8, $length);

                $query = query("SELECT * FROM products WHERE product_id = " . escape_string($id) . " ");
                confirm($query);

                while ($row = fetch_array($query)) {
                    $sub = $row['product_price'] * $value;
                    $item_quantity += $value;
                    $product = <<<DELIMETER
        
                <tr>
                <td>{$row['product_title']}</td>
                <td>&#36;{$row['product_price']}</td>
                <td>{$value}</td>
                <td>&#36;{$sub}</td>
                <td><a class='btn btn-warning' href="cart.php?remove={$row['product_id']}"><span class='glyphicon glyphicon-minus'></span></a>   
                <a class='btn btn-success' href="cart.php?add={$row['product_id']}"><span class='glyphicon glyphicon-plus'></span></a>    
                <a class='btn btn-danger' href="cart.php?delete={$row['product_id']}"><span class='glyphicon glyphicon-remove'></span></a> </td>
                </tr>
                DELIMETER;

                    echo $product;
                }

                $_SESSION['item_total'] = $total += $sub;
                $_SESSION['item_quantity'] = $item_quantity;
            }
        }
    }
}



?>