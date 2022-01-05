<script type="module" src="views/_assets/js/material.js"></script>
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

    function buttonMinus() {
        click--;

        if (click < 0) {
            click = 0;
        }

        let getClick = document.getElementById("click");
        let buttonMinus = document.getElementById("buttonMinus");
        getClick.innerHTML = click;
        let snackbar = document.querySelector('#snackbarAlert');
        snackbar.labelText = "has been captured" + " " + click + " " + "parts";
    };
</script>
</body>

</html>
