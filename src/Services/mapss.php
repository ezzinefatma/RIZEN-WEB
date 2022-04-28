<?php
if (isset($_POST['submit'])) {
    $address = $_POST['address'];
    $addressGps = str_replace(" ","+",$address);
    ?>

<?php } ?>