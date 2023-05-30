<?php

namespace App\Http\Controllers;


use App\Models\Barang;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    private function formatHargaIDR($harga)
    {
        $data_barang = 'Rp. ' . number_format($harga, 0, ',', '.');
        return $data_barang;
    }

    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data_barang = Barang::where('barangs.kode', 'like', '%' . $katakunci . '%')
                ->orWhere('barangs.nama', 'like', '%' . $katakunci . '%')
                ->orWhere('barangs.harga', 'like', '%' . $katakunci . '%')
                ->paginate(5)
                ->onEachSide(2)
                ->fragment('barang');
        } else {
            $data_barang = Barang::paginate(5)->onEachSide(2)->fragment('barang');
        }
        foreach ($data_barang as $barang) {
            $barang->harga_formatted = $this->formatHargaIDR($barang->harga);
        }

        if ($data_barang->isEmpty()) {
            $pesan = "Data tidak ditemukan.";
        } else {
            $pesan = null;
        }

        return view('barang.index', compact('data_barang', 'pesan'));
    }


    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'harga' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'harga.required' => 'Harga tidak boleh kosong',
            ]
        );
        $barang = [
            'nama' => $request->nama,
            'harga' => $request->harga,
        ];


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $lastProduct = Barang::orderBy('id', 'desc')->first();
        if ($lastProduct) {
            $lastCode = $lastProduct->kode;
            $lastNumber = substr($lastCode, strrpos($lastCode, '-') + 1);
            $newNumber = intval($lastNumber) + 1;
        } else {
            $newNumber = 1;
        }

        $productCode = 'BRG-' . $newNumber;

        $barang = new Barang();
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->kode = $productCode;

        $barang->save();
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil disimpan.');
    }

    public function show($id)
    {
        $detail_barang = Barang::find($id);
        $detail_barang->harga_formatted = $this->formatHargaIDR($detail_barang->harga);
        return view('barang.detail')->with('detail_barang', $detail_barang);
    }

    public function edit($id)
    {
        $edit_barang = Barang::find($id);
        $edit_barang->harga = $this->formatHargaIDR($edit_barang->harga);
        return view('barang.edit', compact('edit_barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'nama' => 'required',
            'harga' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'harga.required' => 'Harga wajib diisi',
        ]);

        $data_barang = [
            'nama' => $request->nama,
            'harga' => $request->harga,
        ];

        $data_barang = Barang::findOrfail($id);
        if (!$data_barang) {
            return redirect()->back();
        }

        $harga = str_replace(['Rp', '.', ','], '', $request->harga);
        $data_barang->nama = $request->nama;
        $data_barang->harga = $harga;
        $data_barang->save();

        return redirect()->route('barang.index')->with('success', 'Berhasil update data');
    }

    public function destroy($id)
    {
        $data = Barang::findOrfail($id);
        $data->delete();
        return redirect()->route('barang.index')->with('success', 'Berhasil delete data');
    }
}
