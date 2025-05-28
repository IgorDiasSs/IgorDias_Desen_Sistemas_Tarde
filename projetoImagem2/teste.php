<?php
if (function_exists('imagecreatetruecolor')) {
    echo "GD habilitado e funcionando!";
} else {
    echo "Função imagecreatetruecolor() indisponível. GD ainda não está habilitado.";
}
?>
