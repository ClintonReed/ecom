<!--Requires config.php file-->
<?php require_once("../resources/config.php"); ?>
<!--Includes header.php file-->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>



<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header>
        <h1>Shop</h1>
    </header>

    <hr>
    <!-- /.row -->

    <!-- Page Features -->
    <div class="row text-center">

    <?php
        get_products_in_shop_page();
    ?>

    </div>

    </div>
    <!-- /.row -->

    <hr>
    <!--Includes footer.php file-->
    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

<!-- /.container -->
