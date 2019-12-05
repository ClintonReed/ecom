<?php

//                                               HELPER FUNCTIONS


//Redirect custom function
function redirect($location)
{

    header("Location: $location ");
}
//Global sql function - connection to the database
function query($sql)
{

    global $connection;

    return mysqli_query($connection, $sql);
}
//Global confirm function - displays error txt if connection fails
function confirm($result)
{

    global $connection;

    if (!$result) {

        die("QUERY FAILED" . mysqli_error($connection));
    }
}
//Escape String - helps data going into the database avoid sql injection attacks
function escape_string($string)
{
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}
//Result function - mysql fetch array
function fetch_array($result)
{
    return mysqli_fetch_array($result);
}




//                                               GET PRODUCTS FUNCTIONS


//creates a function called get_products / the query selects all from products / confirms the query / the row displays product_price from the DB
function get_products()
{

    $query = query("SELECT * FROM products");

    confirm($query);

    while($row = fetch_array($query))
    {
        //The DELIMETER Allows you to use large sets of text with both double and single quotations - BE AWARE OF SPACING! 
        $product = <<<DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
            <div class="caption">
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a href="product.html">{$row['product_title']}</a>
                </h4>
                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">Add to cart</a>
            </div>
        </div>
    </div>
    DELIMETER;

    echo $product;
    }

}