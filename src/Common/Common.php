<?php

namespace Danil\Common;

use Danil;
use Danil\Application;

class Common
{
    public static function getPageNumber ($posts) {
        return ceil(count($posts) / 10);
    }
}