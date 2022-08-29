<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderCRUDController extends Controller
{
    // SHOW
    public function index()
    {
        # code...
        // $date['orders'] = Order::orderBy('id','desc');
        // return view('order.index',$data);
        $data['menus'] = Menu::latest()->paginate(100);
        return view('order.index',$data);

        // return view('order.index');
    }
    // Store
    public function store(Request $request)
    {
        $request->validate([
            'line_displayName'=>'required',
            'line_userId'=>'required',
            'line_thumbnailUrl'=>'required',
            'name'=>'required',
            'order_name'=>'required',
            'sweet_level'=>'required',
            'order_option'=>'required',
            'order_note'=>'required',
        ]);

        $order = new Order;
        $order->line_displayName = $request->line_displayName;
        $order->line_userId = $request->line_userId;
        $order->line_thumbnailUrl = $request->line_thumbnailUrl;
        $order->name = $request->name;
        $order->order_name = $request->order_name;
        $order->sweet_level = $request->sweet_level;
        $order->order_option = $request->order_option;
        $order->order_note = $request->order_note;

        $order->save();
        return redirect()->route('order.index')->with('status', 'ออเดอร์ของคุณถูกบันทึกแล้ว')->with('orderOutput_order', $order->order_name)->with('orderOutput_name', $order->name)->with('orderOutput_id', $order->id);
    }

    // ALL ORDER
    public function show()
    {
        $data['orders'] = Order::latest()->paginate(100);
        return view('order.show',$data);
    }


    public function print(Order $id)
    {
        //
        // $order = Order::find($id);
        $data['order'] = Order::find($id);
        // return view('posts.show',compact('post'));
        return view('order.print',$data);
    }

    // autoprint

    public function autoprint()
    {
        // $date['orders'] = Order::orderBy('id','desc');
        $data['orders'] = Order::latest()->paginate(1);
        return view('order.autoprint',$data);
        // return view('order.show');
    }
}
