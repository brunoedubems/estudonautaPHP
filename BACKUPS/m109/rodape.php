<?php
echo "<footer>";
echo "<p> Acessado por " . $_SERVER['REMOTE_ADDR'] . " em " . date('d/m/y') . " </p>";
echo "<p> Desenvolvido por Bruno Eduardo, usando PHP &copy; 2018 </p>";
echo "</footer>";

$banco->close();
