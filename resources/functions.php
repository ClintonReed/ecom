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


/*******************************************************************FRONT END FUNCTIONS****************************************************************************** */

//GET PRODUCTS FUNCTIONS


//creates a function called get_products / the query selects all from products / confirms the query / the row displays product_price from the DB
function get_products()
{

    $query = query("SELECT * FROM products");

    confirm($query);

    while ($row = fetch_array($query)) {
        //The DELIMETER Allows you to use large sets of text with both double and single quotations - BE AWARE OF SPACING! 
        $product = <<<DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
            <div class="caption">
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
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


function get_categories()
{
    //creates a query to select all data from categories
    $query = query("SELECT * FROM categories");

    // confirm function
    confirm($query);

    while ($row = mysqli_fetch_array($query)) {

        //The DELIMETER Allows you to use large sets of text with both double and single quotations - BE AWARE OF SPACING! 
        $categories_links = <<<DELIMETER

<a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;

        echo $categories_links;
    }
}



//creates a function called get_products_in_cat_page / the query selects all from products where the produc / confirms the query / the row displays product_price from the DB
function get_products_in_cat_page()
{

    $query = query("SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " ");

    confirm($query);

    while ($row = fetch_array($query)) {
        //The DELIMETER Allows you to use large sets of text with both double and single quotations - BE AWARE OF SPACING! 
        $product = <<<DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{$row['product_image']}">
                <div class="caption">
                    <h3>{$row['product_title']}</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <p>
                        <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                    </p>
                </div>
            </div>
        </div>

    DELIMETER;

        echo $product;
    }
}







function get_products_in_shop_page()
{

    $query = query("SELECT * FROM products");

    confirm($query);

    while ($row = fetch_array($query)) {
        //The DELIMETER Allows you to use large sets of text with both double and single quotations - BE AWARE OF SPACING! 
        $product = <<<DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{$row['product_image']}">
                <div class="caption">
                    <h3>{$row['product_title']}</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <p>
                        <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                    </p>
                </div>
            </div>
        </div>

    DELIMETER;

        echo $product;
    }
}



/*******************************************************************BACK END FUNCTIONS****************************************************************************** */
