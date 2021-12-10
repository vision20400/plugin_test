<?php
namespace JTaylor\PluginTest\XePlugin\PluginTest;

use XeFrontend;
use XePresenter;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        $title = 'PluginTest plugin';

        // set browser title
        XeFrontend::title($title);

        // load css file
        XeFrontend::css(Plugin::asset('assets/style.css'))->load();

        // output
        return XePresenter::make('plugin_test::views.index', ['title' => $title]);
    }
}
