<?php
if (isset($_POST['submit'])) {
    echo ("plant: " . $_POST['plant'] . "<br />");
    echo ("site: " . $_POST['site'] . "<br />");
    echo ("machine: " . $_POST['machine'] . "<br />");
    echo ("capture: " . $_POST['capture'] . "<br />");
    echo ("problem: " . $_POST['problem'] . "<br />");
    echo ("no_part: " . $_POST['no_part'] . "<br />");
    echo ("no_order: " . $_POST['no_order'] . "<br />");
    echo ("describe: " . $_POST['describe'] . "<br />");
}
?>