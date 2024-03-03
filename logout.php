<?php
session_start();
session_destroy();
echo "<script>location.href = './zip/index.html'</script>";
?>