<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">

        <?php
            //creates a query to select all data from categories
            $query = "SELECT * FROM categories";
            //Sends the query to the page
            $send_query = mysqli_query($connection, $query);
            //If the query fails displays a message
            if(!$send_query) {

                die("QUERY FAILED" . mysqli_error($connection));
            }
            //Fetchs the information in an array
            while($row= mysqli_fetch_array($send_query)) {
            //Displays the information from cat_title
                echo "<a href = '' class='list-group-item'>{$row['cat_title']}</a>";

            }


        ?>

    </div>
</div>