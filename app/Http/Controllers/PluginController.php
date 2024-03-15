<?php

namespace App\Http\Controllers;

use App\Models\PluginModel;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public static function fetchAllPlugin(){
        return PluginModel::get();
    }

    // Plugin page
    public function show_plugin_page(){
        $plugins = self::fetchAllPlugin();
        $companyPlugins = PluginModel::where('plugin', '!=', 'pages')->orderBy('id', 'desc')->get();
        if(Auth()->user()->role != 0){
            return view('backend.pages.plugins', compact('plugins', 'companyPlugins'));
        } else{
            return redirect('/dashboard');
        }
    }

    // Activate plugin
    public function activate_plugin($id){
        $plugin = PluginModel::findOrFail($id);
        $plugin->update(['status' => 1]);
        return redirect()->back();
    }

    // Activate plugin
    public function deactivate_plugin($id){
        $plugin = PluginModel::findOrFail($id);
        $plugin->update(['status' => 0]);
        return redirect()->back();
    }
}
