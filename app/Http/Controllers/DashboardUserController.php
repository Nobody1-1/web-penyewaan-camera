<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Order;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class DashboardUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id',$user->id)->get();
        $totalOrders = Order::where('user_id',$user->id)->count(); 
        $cameras = Barang::all();
        return view('dashboard',compact('orders','cameras','totalOrders'));
    }

    public function storeOrder(Request $request,$id){
        $camera = Barang::find($id);
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'durasi' => 'required|integer|min:1'
        ]);
 
        
        try {
            $startDateTime = date('Y-m-d H:i', strtotime($request->start_date . ' ' . $request->start_time));
            $endDateTime = date('Y-m-d H:i', strtotime($request->start_date . ' ' . $request->start_time . " +{$request->durasi} hours"));
            $order = new Order();
            $order->barang_id = $camera->id;
            $order->user_id = Auth::user()->id;
            if($camera->jumlah > 0){
                $camera->jumlah = $camera->jumlah - 1;
            }
            $order->durasi = $request->durasi;
            $order->harga = $camera->harga * $request->durasi;
            $order->starts = $startDateTime;
            $order->ends = $endDateTime;

            $camera->save();
            $order->save();

            return redirect()->route('dashboard')->with('success', 'Order berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan saat menyimpan order: ' . $e->getMessage());
        }

        }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $camera = Barang::find($order->barang_id);
        $camera->jumlah = $camera->jumlah + 1;
        $camera->save();

        
        $order->delete();
        return redirect(route('dashboard'))->with('success', 'order berhasil dihapus!');
    }
}
