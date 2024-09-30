<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller {
    public function index() : View {
        $pages = Page::paginate(5);

        return view('site.pages.page', ['pages' => $pages]);
    }

    public function create() : View {
        return view('site.pages.create');
    }

    public function store(Request $r) {
        $data = $r->only(['title', 'body']);
        $data['slug'] = Str::slug($data['title']);

        $validator = Validator::make($data, [
            'title' => 'required|string|max:100',
            'body' => 'nullable|string',
            'slug' => 'required|string|max:100|unique:pages',
            // 'image' => 'required|image'
        ]);

        if($validator->fails()) {
            return redirect(route('pages.create'))
            ->withErrors($validator);
        }
        
        // $imageExtension = $data['image']->getClientOriginalExtension();
        // $imageName = md5( $data['image']->getClientOriginalName() . strtotime('now') );

        // echo $imageExtension.' - '.$imageName;
        Page::create($data);
        return redirect(route('pages.index'));
    }

    public function show(string $id) {
        
    }

    public function edit(string $id) : View {
        $page = Page::find($id);

        if(!$page) {
            return view('site.page.edit')->with('error', 'Página Não Encontrada');
        }

        return view('site.pages.edit', ['page' => $page]);
    }

    public function update(Request $r, string $id) {
        $page = Page::find($id);

        $data = $r->only(['title', 'body']);

        if($page->title != $data['title']) {
            $data['slug'] = Str::slug($data['title']);

            $validator = Validator::make($data, [
                'title' => 'required|string|max:100',
                'body' => 'nullable|string',
                'slug' => 'required|max:100|string|unique:pages'
            ]);
        }else{
            $validator = Validator::make($data, [
                'title' => 'required|string|max:100',
                'body' => 'nullable|string',
            ]);
        }

        if($validator->fails()) {
            return redirect(route('pages.edit', ['page' => $page->id]))
            ->withErrors($validator);
        }

        $page->update($data);
        return redirect(route('pages.edit', ['page' => $page->id]))
        ->with('success', 'Informações Alteradas Com Sucesso !');

    }

    public function destroy(string $id) {
        Page::where('id', $id)->delete();
        return redirect(route('pages.index'));
    }
}
