<?php

function Logo($title, $src)
{

    $html = '<div class="insight mb-5">
    <img src="' . $src . 'img/logo.png" alt="logo">
    <h3 class="m-2">
        <span class="text-primary">SCRIS</span>
        <span class="text-secondary">|</span>
        <span class="text-success">' . $title . '</span>
        <br>
        <p class="h5">
            SISTEMA DE CONTROL Y REGISTRO
        </p>
    </h3>
</div>';

    return $html;
}
