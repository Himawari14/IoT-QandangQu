<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigLamp;

class ConfigLampController extends Controller
{   
    public function index(Request $request)
    {
        // Ambil pengaturan lampu dari database atau konfigurasi
        $lampSettings = [
            'device_id' => 1, // contoh ID perangkat
            'status' => 'off', // atau 'on'
            'off_time' => '23:00', // contoh waktu mati
            'on_time' => '05:00' // contoh waktu nyala
        ];
        return view('content/config/lamp/index', compact('lampSettings'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'device_id' => 'required|integer',
            'status' => 'required|in:on,off',
            'off_time' => 'required|date_format:H:i',
            'on_time' => 'required|date_format:H:i',
        ]);

        // Simpan pengaturan ke database atau file konfigurasi
        $device_id = $request->input('device_id');
        $status = $request->input('status');
        $off_time = $request->input('off_time');
        $on_time = $request->input('on_time');
        
        // Contoh penyimpanan ke database
        // LampSetting::updateOrCreate(['device_id' => $device_id], ['status' => $status, 'off_time' => $off_time, 'on_time' => $on_time]);

        return redirect('/config/lamp')->with('success', 'Pengaturan lampu diperbarui.');
    }
}