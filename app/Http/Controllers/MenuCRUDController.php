<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuCRUDController extends Controller
{
    //
    // SHOW
    public function index()
    {
        $data['menus'] = Menu::latest()->paginate(100);
        return view('menu.index',$data);
    }


    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $menu = new Menu;
        $menu->name = $request->name;

        $menu->save();
        return redirect()->route('menu.index')->with('status', 'บันทึกเมนูเรียบร้อย');
    }

    // Delete
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index');
    }
}
