</main>
<!-- Footer-->
<!-- Min-height is set inline to match the height of the drawer footer-->
<footer class="py-4 mt-auto border-top" style="min-height: 74px">
    <div class="container-xl px-5">
        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between small">
            <div class="me-sm-2">Copyright &copy; MARTECH 2022</div>
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
<!-- Load demo bar charts-->
<script src="views/_assets/js/charts/andon-charts.js"></script>


<script>
    $(".tablahrxhr").click(function postinput(element, id) {
        var id = this.id;
        var object = element.target;
        var get_maquina = object.getAttribute('data-maquina');
        var get_items = object.getAttribute('data-item');
        var get_hr = object.getAttribute('data-hr');
        var get_id_wrapper = object.getAttribute('data-wrapper');
        var method = "POST";
        var url_update = "functions/horaxhora/update.php"
        var url_item_name = "functions/horaxhora/update_item.php"
        var url_read = "functions/horaxhora/read.php"
        var get_value = document.querySelector("#inputValue_" + get_id_wrapper).value;
        var get_plan = object.getAttribute('data-plan');

        console.log("ID>", id);
        console.log("VALUE>", get_value);
        console.log("ITEM>", get_items);
        console.log("PLAN>", get_plan);

        $.ajax({
            type: 'POST',
            url: url_update,
            data: ({
                "id": id,
                "hr": get_hr,
                "value": get_value,
                "item_name": get_items,
                "maquina": get_maquina,
                "plan": get_plan
            }),
        }).done(function(response) {
            console.log({response})
            $.ajax({
                type: method,
                url: url_read,
                data: ({
                    "id": id,
                    "hr": get_hr,
                    "item_name": get_items,
                    "maquina": get_maquina,
                    "plan": get_plan
                })
            }).done(function(response) {
                console.log({response})
                var set_response = document.querySelector('#id_new_quantity_' + id);
                var get_quantity = document.querySelector('#id_quantity_' + id).innerHTML;

                set_response.innerHTML = response;
                
            }).fail(function(e) {
                console.log("Error: ", e);
            })
        }).done(function(response) {
            $.ajax({
                type: method,
                url: url_item_name,
                data: ({
                    "id": id,
                    "hr": get_hr,
                    "value": get_value,
                    "item_name": get_items,
                    "maquina": get_maquina,
                })
            }).done(function(response) {
                console.log({response})
                var set_response = document.querySelector('#id_' + get_id_wrapper);
                set_response.innerHTML = response;
            }).fail(function(e) {
                console.log("Error: ", e);
            })
        })

    })
</script>
</body>

</html>