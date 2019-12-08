<!--Requires config.php file-->
<?php require_once("../resources/config.php"); ?>
<!--Includes header.php file-->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!--Includes side_nav.php file-->
        <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>

        <div class="col-md-9">

            <div class="row carousel-holder">

                <div class="col-md-12">
                    <!--include carousel.php-->
                    <?php include(TEMPLATE_FRONT . DS . "slider.php") ?>

                </div>

            </div>

            <div class="row">
                <!--Displays Products from the database using the get_products function-->
                <?php
                get_products();
                ?>

            </div>
            <!--Row Ends here-->

        </div>

    </div>

</div>
<!-- /.container -->

<!--Includes footer.php file-->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>