</main>
<!-- Footer-->
<!-- Min-height is set inline to match the height of the drawer footer-->
<footer class="py-4 mt-auto border-top" style="min-height: 74px">
    <div class="container-xl px-5">
        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between small">
            <div class="me-sm-2">Copyright &copy; Your Website 2021</div>
            <div class="d-flex ms-sm-2">
                <a class="text-decoration-none" href="#!">Privacy Policy</a>
                <div class="mx-1">&middot;</div>
                <a class="text-decoration-none" href="#!">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- Load Bootstrap JS bundle-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- Load global scripts-->
<script type="module" src="views/_assets/js/material.js"></script>
<script src="views/_assets/js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--  Load Chart.js customized defaults-->
<script src="views/_assets/js/charts/chart-defaults.js"></script>
<!--  Load chart demos for this page-->
<script src="views/_assets/js/charts/demos/chart-pie-demo.js"></script>
<script src="views/_assets/js/charts/demos/dashboard-chart-bar-grouped-demo.js"></script>
<!-- Load Simple DataTables Scripts-->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="views/_assets/js/datatables/datatables-simple-demo.js"></script>
<!-- Load Chart.js via CDN-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.0-beta.10/chart.min.js" crossorigin="anonymous"></script>
<!-- Load Chart.js customized defaults-->
<script src="views/_assets/js/charts/chart-defaults.js"></script>
<!-- Load demo bar charts-->
<script src="views/_assets/js/charts/andon-charts.js"></script>


<script>
    $(".tablahrxhr").click(function postinput(id) {
        console.log(this.id)

        var pn = document.getElementsByClassName('pn_now');
        var number_item = $(this).data("item");
        var maquina = $(this).data("maquina");
        var hora = $(this).data("hr");
        var value = $(this).closest("td.hourcell").find("input[name='value']").val();
        var div_id = $(this).closest('td').find('.hr_output').attr('id');
        var div_id2 = $(this).closest('td').find('.hr_output2').attr('id');
        var id_item = $(this).closest('td').find('.pn_now').attr('id');
        var data = document.querySelector(".pn_now").innerHTML;

        console.log({div_id2})

        $.ajax({
            type: 'POST',
            url: 'functions/horaxhora/update.php',
            data: ({
                "maquina": maquina,
                "hr": hora,
                "value": value,
                "id": id_item,
                "number_item": number_item
            }),
        }).done(function(responseData) {
            $('.hourcell').find("input[name='value']").val('');
            $.ajax({
                type: 'POST',
                url: 'functions/horaxhora/read.php',
                data: ({
                    "maquina": maquina,
                    "hr": hora,
                    "id": id_item,
                    "number_item": number_item
                }),
            }).done(function(responseData) {
                $('#' + div_id).html(responseData);

            }).fail(function() {
                console.log('Failed');
            });
        }).fail(function() {
            console.log('Failed');
        }).done(function() {
            $.ajax({
                type: 'POST',
                url: 'functions/horaxhora/update_item.php',
                data: ({
                    "maquina": maquina,
                    "id": id_item,
                    "number_item": number_item
                }),
            }).done(function(data) {
                $('#' + id_item).html(data);
            }).fail(function() {
                console.log('Failed');
            });
        })
    });  
</script>
</body>

</html>