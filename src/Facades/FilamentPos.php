<?php

namespace IbrahimBougaoua\FilamentPos\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IbrahimBougaoua\FilamentPos\FilamentPos
 */
class FilamentPos extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \IbrahimBougaoua\FilamentPos\FilamentPos::class;
    }
}
