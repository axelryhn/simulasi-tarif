<!DOCTYPE html>
<html lang="id">


<?= $header; ?>

<body>
    <div class="container-scroller">

        <?= $navbar; ?>

        <div class="container-fluid page-body-wrapper">

            <?= $menu; ?>

            <!-- page content start -->

            <?= $content; ?>

            <!-- page content end -->

            <?= $footer; ?>

        </div>
    </div>

    <?= $javascript; ?>
   



</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="assets/js/custom.js"></script>
</html>