<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  ...$roles
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     *  @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Pastikan pengguna sudah login
        if (!$request->user()) {
            return redirect('/login');
        }

        // Cek apakah peran pengguna ada dalam daftar peran yang diizinkan
        if (in_array($request->user()->role, $roles)) {
            // Lanjutkan permintaan jika peran sesuai
            return $next($request);
        }

        // Tambahkan kondisi untuk setiap peran dan alihkan sesuai kebutuhan
        switch ($request->user()->role) {
            case 'admin':
                return redirect()->route('welcome'); // Pengalihan untuk admin
                break;
            case 'pegawai':
                return redirect()->route('dashboardpegawai'); // Pengalihan untuk pegawai
                break;
            case 'helpdesk':
                return redirect()->route('dashboardhelpdesk');  // pengalihan untuuk helpdesk 
                break;
            default:
                return redirect('/login'); // Alamat pengalihan default jika tidak ada peran yang cocok
                break;
        }
    }
}
