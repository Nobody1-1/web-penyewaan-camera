<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Payment;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;



class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[
            'totalCamera' => Barang::count(),
            'totalPenyewaan' => Order::count(),
            'orders' => Order::with(['barang','user'])->get(),
            'users' => User::whereHas('orders')->count(),
        ]);
    }
    public function pelanggan(){
        return view('admin.pelanggan',[
            'users' => User::where('usertype','user')->get(),
        ]);

    }
    public function camera(){
        return view('admin.camera',[
            'barangs' => Barang::all(),
        ]);

    }
    public function penyewaan(){
        $orders = Order::with(['payment', 'user', 'barang'])->get();

        

        return view('admin.penyewaan', [
            'orders' => $orders,
            'cameras' => Barang::all(),
            'users' => User::where('usertype','user')->get(),
            
        ]);

    }
    public function payment($id)
    {
        $order = Order::find($id);
        
        $camera = Barang::find($order->barang_id);
        $payment = new Payment();
        $payment->no_invoice = $id . '/' . Carbon::now()->timestamp;
        $payment->user_id = $order->user_id;
        $timeNow = Carbon::now('Asia/Jakarta');
        $end = Carbon::parse($order->ends,'Asia/Jakarta');
        $terlambat = $end->diffInHours($timeNow, false);
        $order->denda = $terlambat * $camera->harga;
        if ($terlambat > 0) {
            $payment->total = $order->denda + $order->harga;
        } else {
            $payment->total = $order->harga;
        }
        $payment->save();

        $order->status = 'Selesai';
        $order->payment_id = $payment->id;

        $order->save();
        return redirect()->route('admin.penyewaan')->with('success', 'Order berhasil disimpan.');
    }
    
    public function storePenyewaan(Request $request)
    {
        $camera = Barang::find($request->barang_id);
        $startDateTime = date('Y-m-d H:i', strtotime($request->start_date . ' ' . $request->start_time));
        $endDateTime = date('Y-m-d H:i', strtotime($request->start_date . ' ' . $request->start_time . " +{$request->durasi} hours"));
        $order = new Order();
        $order->barang_id = $request->barang_id;
        if($order->jumlah > 0){
            $order->jumlah = $order->jumlah - 1;

        }
        $order->user_id = $request->user_id;
        $order->durasi = $request->durasi;
        $order->harga = $camera->harga * $request->durasi;
        $order->starts = $startDateTime;
        $order->ends = $endDateTime;
        $order->save();
        return redirect()->route('admin.penyewaan')->with('success', 'Order berhasil disimpan.');
    }
    public function exportOrdersPdf()
    {
        $orders = Order::with('user', 'barang','payment')->get();

        $pdf = Pdf::loadView('admin.orders_pdf', compact('orders'));

        return $pdf->download('orders.pdf');
    }
}
