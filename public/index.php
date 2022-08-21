<?php
require_once 'plantillas/head.php';
require_once 'plantillas/logo.php';
$array_styles = array('index.css', 'cargando.css');
echo Head('', 'SCRIS | Login', $array_styles);
//include_once 'plantillas/cargando.html';
?>
<div class="container p-5">
    <form action="packages/events/login.php" class="form p-5" method="post">
        <?php echo Logo('Login', '') ?>
        <div class="form-group">
            <input type="password" name="pin" class="form-control" id="pin" placeholder="Pin" autofocus>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Iniciar Sesión</button>
    </form>
</div>

?>
<script>
    <?php include_once 'js/index.js';
    ?>
</script>
</body>

</html>