<!--Requires config.php file-->
<?php require_once("../resources/config.php"); ?>

<!--Includes header.php file-->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>


<?php

process_transaction();

?>




<!-- Page Content -->
<div class="container">

    <h1 class="text-center">Thank you!</h1>

</div>
<!--Includes footer.php file-->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>