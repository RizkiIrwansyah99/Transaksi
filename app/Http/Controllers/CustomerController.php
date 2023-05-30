<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data_customer = Customer::where('customers.kode', 'like', '%' . $katakunci . '%')
                ->orWhere('customers.nama', 'like', '%' . $katakunci . '%')
                ->orWhere('customers.no_telp', 'like', '%' . $katakunci . '%')
                ->paginate(5)
                ->onEachSide(2)
                ->fragment('barang');
        } else {
            $data_customer = Customer::paginate(5)->onEachSide(2)->fragment('customer');
        }

        if ($data_customer->isEmpty()) {
            $pesan = "Data tidak ditemukan.";
        } else {
            $pesan = null;
        }

        return view('customer.index', compact('data_customer', 'pesan'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'no_telp' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'no_telp.required' => 'Nomor Telpon tidak boleh kosong',
            ]
        );
        $customer = [
            'nama' => $request->nama,
            'no_telp' => $request->harga,
        ];


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $lastProduct = Customer::orderBy('id', 'desc')->first();
        if ($lastProduct) {
            $lastCode = $lastProduct->kode;
            $lastNumber = substr($lastCode, strrpos($lastCode, '-') + 1);
            $newNumber = intval($lastNumber) + 1;
        } else {
            $newNumber = 1;
        }

        $customerCode = 'CS-' . $newNumber;

        $customer = new Customer();
        $customer->nama = $request->nama;
        $customer->no_telp = $request->no_telp;
        $customer->kode = $customerCode;
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Data customer berhasil disimpan.');
    }

    public function show($id)
    {
        $detail_customer = Customer::find($id);
        return view('customer.detail')->with('detail_customer', $detail_customer);
    }

    public function edit($id)
    {
        $edit_customer = Customer::find($id);
        return view('customer.edit', compact('edit_customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'no_telp.required' => 'Nomor tlp wajib diisi',
        ]);

        $detail_customer = Customer::findOrfail($id);
        if (!$detail_customer) {
            return redirect()->back();
        }

        $detail_customer->nama = $request->nama;
        $detail_customer->no_telp = $request->no_telp;
        $detail_customer->save();

        return redirect()->route('customer.index')->with('success', 'Berhasil update data');
    }

    public function destroy($id)
    {
        $delete_cs = Customer::findOrfail($id);
        $delete_cs->delete();
        return redirect()->route('customer.index')->with('success', 'Berhasil delete data');
    }
}
