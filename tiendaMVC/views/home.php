<!-- <main class="fondo">

</main> -->
<?php
echo 'home';
if (isset($_SESSION['vista']))
    echo $_SESSION['vista'];
if (isset($_SESSION['controller']))
    echo $_SESSION['controller'];
?>