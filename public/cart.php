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

    if ($_SESSION['product_' . $_GET['remove']] < 1) {
        redirect("checkout.php");
    }
}


//deletes all items from the cart
if (isset($_GET['delete'])) {
    $_SESSION['product_' . $_GET['delete']] = 0;
    redirect("checkout.php");
}

?>