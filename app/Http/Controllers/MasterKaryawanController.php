<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KaryawanImport;
use App\Models\MasterKaryawan;

class MasterKaryawanController extends Controller
{
    public function index()
    {
        $karyawans = MasterKaryawan::all();
        return view('master-karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('master-karyawan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_nik' => 'required|unique:master_karyawan',
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'insentif' => 'required|numeric',
        ]);

        // Create a new Karyawan record
        MasterKaryawan::create($validatedData);

        return redirect()->route('master-karyawan.index')->with('success', 'Karyawan created successfully!');
    }

    public function edit(MasterKaryawan $karyawan)
    {
        return view('master-karyawan.edit', compact('karyawan'));
    }
    
    public function update(Request $request, MasterKaryawan $karyawan)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'kode_nik' => 'required',
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'insentif' => 'required|numeric',
        ]);
    
        // Update the existing Karyawan record
        $karyawan->update($validatedData);
    
        // Redirect back with success message
        return redirect()->route('master-karyawan.index')->with('success', 'Karyawan updated successfully!');
    }
    
    public function destroy(MasterKaryawan $karyawan)
    {
        // Delete the Karyawan record
        $karyawan->delete();
    
        // Redirect back with success message
        return redirect()->route('master-karyawan.index')->with('success', 'Karyawan deleted successfully!');
    }
    
    public function import(Request $request)
    {
        // Validate the file
        $request->validate([
            'file' => 'required|mimes:csv,xlsx',
        ]);
    
        // Import the file data into the Karyawan table
        Excel::import(new KaryawanImport, $request->file('file'));
    
        // Redirect back with success message
        return redirect()->route('master-karyawan.index')->with('success', 'Karyawan data imported successfully!');
    }
}    
