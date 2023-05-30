<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Barang;
use App\Models\Sales_det;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    private function formatHargaIDR($harga)
    {
        return 'Rp. ' . number_format($harga, 0, ',', '.');
    }

    function formatPercentage($value)
    {
        return number_format($value) . '%';
    }

    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data_transaksi = Sales_det::whereHas('sales', function ($query) use ($katakunci) {
                $query->whereHas('customer', function ($query) use ($katakunci) {
                    $query->where('nama', 'like', '%' . $katakunci . '%');
                });
            })
                ->orWhereHas('barang', function ($query) use ($katakunci) {
                    $query->where('nama', 'like', '%' . $katakunci . '%');
                })
                ->orWhere('sales_id', 'like', '%' . $katakunci . '%')
                ->orWhere('barang_id', 'like', '%' . $katakunci . '%')
                ->orWhere('harga_bandrol', 'like', '%' . $katakunci . '%')
                ->orWhere('qty', 'like', '%' . $katakunci . '%')
                ->orWhere('diskon_pct', 'like', '%' . $katakunci . '%')
                ->orWhere('diskon_nilai', 'like', '%' . $katakunci . '%')
                ->orWhere('harga_diskon', 'like', '%' . $katakunci . '%')
                ->orWhere('total', 'like', '%' . $katakunci . '%')
                ->paginate(5);
        } else {
            $data_transaksi = Sales_det::with(['sales', 'barang'])->paginate(6);
        }

        if ($data_transaksi->isEmpty()) {
            $pesan = "Data tidak ditemukan.";
        } else {
            $pesan = null;
        }

        foreach ($data_transaksi as $transaksi) {
            $transaksi->harga_bandrol_formatted = $this->formatHargaIDR($transaksi->harga_bandrol);
            $transaksi->diskon_pct_formatted = $this->formatPercentage($transaksi->diskon_pct);
            $transaksi->diskon_nilai_formatted = $this->formatHargaIDR($transaksi->diskon_nilai);
            $transaksi->harga_diskon_formatted = $this->formatHargaIDR($transaksi->harga_diskon);
            $transaksi->total_formatted = $this->formatHargaIDR($transaksi->total);
        }

        return view('transaksi.index', compact('data_transaksi', 'pesan'));
    }

    public function create()
    {
        $salesData = Sales::all();
        $barangData = Barang::all();
        return view('transaksi.create', compact('salesData', 'barangData'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'sales_id' => 'required|exists:sales,id',
                'barang_id' => 'required|exists:barangs,id',
                'harga_bandrol' => 'required|numeric',
                'qty' => 'required|numeric',
                'diskon_pct' => 'required|numeric',
                'diskon_nilai' => 'required|numeric',
                'harga_diskon' => 'required|numeric',
                'total' => 'required|numeric',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transaksi = new Sales_det();

        $transaksi->sales_id = $request->sales_id;
        $transaksi->barang_id = $request->barang_id;
        $transaksi->harga_bandrol = $request->harga_bandrol;
        $transaksi->qty = $request->qty;
        $transaksi->diskon_pct = $request->diskon_pct;
        $transaksi->diskon_nilai = $request->diskon_nilai;
        $transaksi->harga_diskon = $request->harga_diskon;

        $transaksi->total = $request->total;

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil disimpan.');
    }

    public function edit($id)
    {
        $edit_transaksi = Sales_det::find($id);
        $edit_transaksi->formatharga = $this->formatHargaIDR($edit_transaksi->formatharga);
        $edit_transaksi->formatPercentage = $this->formatPercentage($edit_transaksi->formatPercentage);
        $barangs = Barang::all();
        $sales = Sales::all();

        return view('transaksi.edit', compact('edit_transaksi', 'barangs', 'sales'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'sales_id' => 'required|exists:sales,id',
                'barang_id' => 'required|exists:barangs,id',
                'harga_bandrol' => 'required|numeric',
                'qty' => 'required|numeric',
                'diskon_pct' => 'required|numeric',
                'diskon_nilai' => 'required|numeric',
                'harga_diskon' => 'required|numeric',
                'total' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transaksi = Sales_det::find($request->id);

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Data transaksi tidak ditemukan.');
        }

        $transaksi->sales_id = $request->sales_id;
        $transaksi->barang_id = $request->barang_id;
        $transaksi->harga_bandrol = $request->harga_bandrol;
        $transaksi->qty = $request->qty;
        $transaksi->diskon_pct = $request->diskon_pct;
        $transaksi->diskon_nilai = $request->diskon_nilai;
        $transaksi->harga_diskon = $request->harga_diskon;
        $transaksi->total = $request->total;

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil diupdate.');
    }

    public function show($id)
    {
        $detail_transaksi = Sales_det::find($id);
        $detail_transaksi->harga_bandrol_formatted = $this->formatHargaIDR($detail_transaksi->harga_bandrol);
        $detail_transaksi->diskon_pct_formatted = $this->formatPercentage($detail_transaksi->diskon_pct);
        $detail_transaksi->diskon_nilai_formatted = $this->formatHargaIDR($detail_transaksi->diskon_nilai);
        $detail_transaksi->harga_diskon_formatted = $this->formatHargaIDR($detail_transaksi->harga_diskon);
        $detail_transaksi->total_formatted = $this->formatHargaIDR($detail_transaksi->total);

        if ($detail_transaksi) {
            return view('transaksi.detail')->with('detail_transaksi', $detail_transaksi);
        } else {
            // Handle jika data tidak ditemukan
            return redirect()->route('transaksi.index')->with('error', 'Data Transaksi tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        $delete_transaksi = Sales_det::findOrfail($id);
        $delete_transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Berhasil delete data');
    }
}
