<script type="module" src="views/_assets/js/material.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var click = 0;
    url = "localhost";
    method: "POST";

    function getSnackbar() {
        click++;
        let getClick = document.getElementById("click");

        getClick.innerHTML = click || 0;
        let snackbar = document.querySelector('#snackbarAlert');
        snackbar.labelText = "has been captured" + " " + click + " " + "parts";
        snackbar.show();

        $.ajax({
            url: url,
            method: method,
            data: "",
            success: function(data) {
                //code
            },
            error: function(error) {
                console.log("error" + error);
            }
        });
    };
    $(document).ready(function() {
        edit();
    });

    function edit(element) {
        $("input[name*='input_check_edit']").on('change', function(e) {
            e.preventDefault();
            var inputChecked = document.getElementById("input_value");
            var buttonSave = document.getElementById("button_save");

            inputChecked.disabled = !this.checked;
            !this.checked ? inputChecked.style.backgroundColor = "transparent" : inputChecked.style.backgroundColor = "#E7F2F8";
            !this.checked ? inputChecked.style.color = "black" : inputChecked.style.color = "green";
            buttonSave.disabled = !this.checked;
        });
    }
</script>
</body>

</html>