<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // префиксы для view
    protected $prefix_view = '';

    public function render(string $view, $data = [], $mergeData = [])
    {
        $viewFile = !empty($this->prefix_view) ? $this->prefix_view .'.'. $view : $view;
        return view($viewFile, $data, $mergeData);
    }

}
