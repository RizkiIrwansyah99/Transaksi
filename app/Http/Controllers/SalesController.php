<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    private function formatHargaIDR($harga)
    {
        return 'Rp. ' . number_format($harga, 0, ',', '.');
    }

    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data_sales = Sales::whereHas('customer', function ($query) use ($katakunci) {
                $query->where('nama', 'like', '%' . $katakunci . '%');
            })
                ->orWhere('sales.kode', 'like', '%' . $katakunci . '%')
                ->orWhere('sales.tanggal', 'like', '%' . $katakunci . '%')
                ->orWhere('sales.customer_id', 'like', '%' . $katakunci . '%')
                ->orWhere('sales.subtotal', 'like', '%' . $katakunci . '%')
                ->orWhere('sales.diskon', 'like', '%' . $katakunci . '%')
                ->orWhere('sales.ongkir', 'like', '%' . $katakunci . '%')
                ->orWhere('sales.total_bayar', 'like', '%' . $katakunci . '%')
                ->paginate(5);
        } else {
            $data_sales = Sales::with('customer')->paginate(5);
        }

        if ($data_sales->isEmpty()) {
            $pesan = "Data tidak ditemukan.";
        } else {
            $pesan = null;
        }

        foreach ($data_sales as $sales) {
            $sales->subtotal_formatted = $this->formatHargaIDR($sales->subtotal);
            $sales->diskon_formatted = $this->formatHargaIDR($sales->diskon);
            $sales->ongkir_formatted = $this->formatHargaIDR($sales->ongkir);
            $sales->total_bayar_formatted = $this->formatHargaIDR($sales->total_bayar);
        }

        return view('sales.index', compact('data_sales', 'pesan'));
    }

    public function create()
    {
        $customerData = Customer::all();
        return view('sales.create', compact('customerData'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'tanggal' => 'required|date',
                'customer_id' => 'required|exists:customers,id',
                'subtotal' => 'required|numeric',
                'diskon' => 'required|numeric',
                'ongkir' => 'required|numeric',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back();
        }

        $subtotal = $request->subtotal;
        $diskon = $request->diskon;
        $ongkir = $request->ongkir;

        $lastSales = Sales::orderBy('id', 'desc')->first();
        if ($lastSales) {
            $lastCode = $lastSales->kode;
            $lastNumber = substr($lastCode, strrpos($lastCode, '-') + 1);
            $newNumber = intval($lastNumber) + 1;
        } else {
            $newNumber = 1;
        }

        $salesCode = 'SL-' . $newNumber;

        $sales = new Sales();
        $sales->kode = $salesCode;
        $sales->tanggal = $request->tanggal;
        $sales->customer_id = $request->customer_id;

        $sales->subtotal = $subtotal;
        $sales->diskon = $diskon;
        $sales->ongkir = $ongkir;

        $totalBayar = $subtotal - $diskon + $ongkir;

        $sales->total_bayar = $totalBayar;

        $sales->save();

        return redirect()->route('sales.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        $detail_sales = Sales::find($id);
        $detail_sales->subtotal_formatted = $this->formatHargaIDR($detail_sales->subtotal);
        $detail_sales->diskon_formatted = $this->formatHargaIDR($detail_sales->diskon);
        $detail_sales->ongkir_formatted = $this->formatHargaIDR($detail_sales->ongkir);
        $detail_sales->total_bayar_formatted = $this->formatHargaIDR($detail_sales->total_bayar);

        if ($detail_sales) {
            return view('sales.detail')->with('detail_sales', $detail_sales);
        } else {
            // Handle jika data tidak ditemukan
            return redirect()->route('sales.index')->with('error', 'Data Customer tidak ditemukan.');
        }
    }


    public function edit($id)
    {
        $edit_sales = Sales::find($id);
        $edit_sales->formatharga = $this->formatHargaIDR($edit_sales->formatharga);
        $customers = Customer::all();

        return view('sales.edit', compact('edit_sales', 'customers'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'tanggal' => 'nullable|date',
                'customer_id' => 'required|exists:customers,id',
                'subtotal' => 'required|numeric',
                'diskon' => 'required|numeric',
                'ongkir' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back();
        }

        $sales = Sales::find($request->id); // Menemukan sales berdasarkan ID

        if (!$sales) {
            return redirect()->back()->with('error', 'Data sales tidak ditemukan.');
        }

        $sales->tanggal = $request->tanggal;
        $sales->customer_id = $request->customer_id;
        $sales->subtotal = $request->subtotal;
        $sales->diskon = $request->diskon;
        $sales->ongkir = $request->ongkir;

        $totalBayar = $request->subtotal - $request->diskon + $request->ongkir;
        $sales->total_bayar = $totalBayar;

        $sales->save();

        return redirect()->route('sales.index')->with('success', 'Data sales berhasil diupdate.');
    }

    public function destroy($id)
    {
        $delete_sales = Sales::findOrfail($id);
        $delete_sales->delete();
        return redirect()->route('sales.index')->with('success', 'Berhasil delete data');
    }
}
