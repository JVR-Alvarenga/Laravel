<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class RoutesController extends Controller {
    public function route($slug) {
        $page = Page::where('slug', $slug)->first();

        if(!$page) {
            abort(404);
        }

        return view('site.pagesCreated.index', ['page' => $page]);
    }
}
