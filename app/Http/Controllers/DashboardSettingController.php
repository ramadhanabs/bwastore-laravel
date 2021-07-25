<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Category;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();

        return view('pages.dashboard-setting-store',[
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function account()
    {
        $user = Auth::user();
        return view('pages.dashboard-setting-account',[
            'user' => $user,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
