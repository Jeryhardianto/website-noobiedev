<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center">
    NOOBIEDEV <?= VERSION ?>
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?=BASEURL ?>/assets/backend/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?=BASEURL ?>/assets/backend/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?=BASEURL ?>/assets/backend/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=BASEURL ?>/assets/backend/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?=BASEURL ?>/assets/backend/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?= BASEURL ?>/assets/backend/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= BASEURL ?>/assets/backend/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= BASEURL ?>/assets/backend/dist/js/custom.min.js"></script>

<script src="<?= BASEURL ?>/assets/backend/js/bootstrap-datepicker.js"></script>
<!--This page JavaScript -->
<!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="<?= BASEURL ?>/assets/backend/libs/flot/excanvas.js"></script>
<script src="<?= BASEURL ?>/assets/backend/libs/flot/jquery.flot.js"></script>
<script src="<?= BASEURL ?>/assets/backend/libs/flot/jquery.flot.pie.js"></script>
<script src="<?= BASEURL ?>/assets/backend/libs/flot/jquery.flot.time.js"></script>
<script src="<?= BASEURL ?>/assets/backend/libs/flot/jquery.flot.stack.js"></script>
<script src="<?= BASEURL ?>/assets/backend/libs/flot/jquery.flot.crosshair.js"></script>
<script src="<?= BASEURL ?>/assets/backend/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="<?= BASEURL ?>/assets/dist/js/pages/chart/chart-page-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
    integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script src="<?= BASEURL ?>/assets/backend/js/image-preview.js"></script>
<script src="<?= BASEURL ?>/assets/backend/js/sweetalert2.all.min.js"></script>
<?php
FlasherAlert::flashA();
?>

<script>
$(document).ready(function() {
    var jk = $('#jk').val();
    $("#jeniskelamin").val(jk);

    var jk2 = $('#jk2').val();
    $("#jeniskelamin2").val(jk2);

    var agama = $('#agamaX').val();
    $("#agama").val(agama);

    var agama2 = $('#agamaX').val();
    $("#agama2").val(agama2);

    var status = $('#statusX').val();
    $("#status").val(status);
    // console.log(level);
});

$(document).ready(function() {
    var statusSN = $("#statusSN").val();
    if (statusSN == '3') {
        $("#ket").show();
    } else {
        $("#ket").hide();
    }

});


$("#datepicker-autoclose").datepicker({
    dateFormat: "yy-mm-dd",
    autoclose: true,
    todayHighlight: true,
});
</script>

</script>
<script>
$(document).ready(function() {
    $('#exa5').DataTable();
    $('#exa6').DataTable();

});
</script>

</body>

</html>