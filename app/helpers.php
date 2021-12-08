<?php

/**
 * Se debe especificar a composer que cargue este archivo, ya que no es una clase.
 * Si fuese una clase se cargaría automáticamente...
 * Además, se debe especificar a composer que debe cargar de nuevo el autocargador... -> composer dumpautoload
 */
function setActive($routeName)
{
    return request()->routeIs($routeName) ? 'active' : null;
}

function setActiveAriaCurrent($routeName)
{
    return request()->routeIs($routeName) ? 'aria-current="page"' : null;
}