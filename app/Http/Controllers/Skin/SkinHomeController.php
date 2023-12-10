<?php

namespace App\Http\Controllers\Skin;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkinHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $skins = Auth::user()
            ->gamejolt->skins()
            ->get();

        return view('skin.index')->with('skins', $skins);
    }
}
