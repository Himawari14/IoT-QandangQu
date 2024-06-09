<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigHeater;

class ConfigHeaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Ambil pengaturan pemanas dari database atau konfigurasi
         $heaterSettings = [
            'mode' => 'manual', // atau 'automatic'
            'temperature_threshold' => 25 // contoh suhu threshold
        ];

        return view('content.config.heater.index',compact('heaterSettings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'mode' => 'required|in:automatic,manual',
            'temperature_threshold' => 'required|numeric',
        ]);
       $mode = $request->input('mode');
       $temperature_threshold = $request->input('temperature_threshold');

        return redirect('config/heater')->with('success', 'Pengaturan pemanas diperbarui.');
    }

}