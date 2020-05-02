<?php


namespace ezetablog\Controllers;

use ezetablog\Models\Page;

class PagesController
{
    static public function show(String $slug) {
        $pageModel = new Page();
        if ($slug) {
            $page = $pageModel->getBySlug($slug);
        } else {

        }
    }
}
