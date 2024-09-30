<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class ConfigGeneralController extends Controller {
    public function config() : View {
        $dataConfig = Config::all();

        foreach($dataConfig as $data) {
            $config[ $data['name'] ] = $data['content'];
        }

        return view('site.configs.config', [
            'config' => $config
        ]);
    }

    public function editAction(Request $r) {
        $data = $r->only(['title', 'subtitle', 'email', 'bgcolor', 'textcolor']);

        $validator = Validator::make($data, [
            'title' => 'required|string|max:100',
            'subtitle' =>'required|string|max:100',
            'email' =>'required|email|max:100',
            'bgcolor' =>'required|regex:/#[0-9a-fA-F]{6}/',
            'textcolor' =>'required|regex:/#[0-9a-fA-F]{6}/'
        ]);;

        if($validator->fails()) {
            return redirect(route('config.general'))
            ->withErrors($validator);
        }

        foreach($data as $item => $value) {
            Config::where('name', $item)->update([
                'content' => $value
            ]);
        }

        return redirect(route('config.general'))->with('success', 'Informações Atualizadas com Sucesso !');
    }
}
