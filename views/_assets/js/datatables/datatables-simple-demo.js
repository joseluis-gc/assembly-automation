
let datatableSimple;

window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        datatableSimple = new simpleDatatables.DataTable(datatablesSimple);
    }
});


function exportCSV(file_name)
{
    console.log("Entering exportCSV");

    datatableSimple.export({
        type: "csv",
        filename: file_name
    });
}