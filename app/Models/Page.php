<?php

namespace ezetablog\Models;

use ezetaFrame\core\ModeloBase;

class Page extends ModeloBase
{
    protected $table = 'pages';

    public function getBySlug($slug) {
        return $this->where('slug', '=', $slug)->fetchArray();
    }
}
