<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . "/header.php"); ?>


    <div class="row">
        <h1 class="page-header">
            All Orders

        </h1>

      <h3 class="bg-success"><?php display_message() ?></h3>  
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead>

                <tr>
                    <th>Id</th>
                    <th>Amount</th>
                    <th>Transaction</th>
                    <th>Status</th>
                    <th>Currency</th>
                </tr>
            </thead>
            <tbody>
                <?php display_orders(); ?>
            </tbody>
        </table>
    </div>

<!-- /#page-wrapper -->

<?php include(TEMPLATE_BACK . "/footer.php"); ?>