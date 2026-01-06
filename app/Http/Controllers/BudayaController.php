<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location; // Import library pelacak lokasi

class BudayaController extends Controller
{
    
    public function index(Request $request)
    {
        // 1. Ambil IP Pengunjung
        $ip = $request->ip(); 
        
        // 2. Lacak Informasi Lokasi (Negara, Kota, dll)
        // Catatan: Di localhost akan mengembalikan 'false', tes dengan IP asli
        $locationInfo = Location::get($ip);

        // 3. Kirim data ke View (welcome.blade.php)
        return view('welcome', [
            'location' => $locationInfo
        ]);
    }
}