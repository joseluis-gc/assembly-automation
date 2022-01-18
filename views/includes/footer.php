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
<!--  Load Chart.js via CDN-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.0-beta.10/chart.min.js" crossorigin="anonymous"></script>
<!--  Load Chart.js customized defaults-->
<script src="views/_assets/js/charts/chart-defaults.js"></script>
<!--  Load chart demos for this page-->
<script src="views/_assets/js/charts/demos/chart-pie-demo.js"></script>
<script src="views/_assets/js/charts/demos/dashboard-chart-bar-grouped-demo.js"></script>
<!-- Load Simple DataTables Scripts-->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="views/_assets/js/datatables/datatables-simple-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Load Chart.js via CDN-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.0-beta.10/chart.min.js" crossorigin="anonymous"></script>
<!-- Load Chart.js customized defaults-->
<script src="views/_assets/js/charts/chart-defaults.js"></script>
<!-- Load demo bar charts-->
<script src="views/_assets/js/charts/andon-charts.js"></script>


<script>
    $(".tablahrxhr").click(function postinput(){

        var maquina = $(this).data("maquina");
        var hora = $(this).data("hr");
        var value = $(this).closest("td.hourcell").find("input[name='value']").val();
        //var hr_output = $(this).closest("td.hourcell").find("div.hr_output").html();

        var div_id = $(this).closest('td').find('.hr_output').attr('id');


        //update db
        $.ajax({
            type: 'POST',
            url: 'functions/horaxhora/update.php',
            data: ({
                "maquina" : maquina,
                "hr" : hora,
                "value" : value
            }),
        }).done(function(responseData) {
            console.log(responseData);

            //alert("maquina"+maquina+"hora"+hora+"value"+value);
            alert("Se insertaron " + value + " Piezas")
            $('.hourcell').find("input[name='value']").val('');


            /**read ajax method */
            alert(div_id);

            //read db
            $.ajax({
                type: 'POST',
                url: 'functions/horaxhora/read.php',
                data: ({
                    "maquina" : maquina,
                    //              "hr_output" : hr_output,
                    "hr" : hora
                }),
            }).done(function(responseData) {

                console.log(responseData);

                alert(responseData);
                $('#'+div_id).html(responseData);



            }).fail(function() {
                console.log('Failed');
            });





            /**read ajax method end */




        }).fail(function() {
            console.log('Failed');
        });




    });

</script>



</body>
</html>
