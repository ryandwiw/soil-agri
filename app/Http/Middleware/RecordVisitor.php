<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecordVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // Contoh middleware
    public function handle($request, Closure $next)
    {
        $ipAddress = $request->ip();

        // Mencari pengunjung berdasarkan IP address
        $existingVisitor = Visitor::where('ip_address', $ipAddress)->first();

        if ($existingVisitor) {
            // Periksa selang waktu sejak kunjungan terakhir
            $lastVisitedAt = Carbon::parse($existingVisitor->updated_at);
            $currentDateTime = now();

            $intervalInMinutes = $lastVisitedAt->diffInMinutes($currentDateTime);

            // Jika selang waktu lebih besar dari 15 menit, catat kunjungan baru
            if ($intervalInMinutes > 15) {
                $existingVisitor->update(['updated_at' => $currentDateTime]);
            } else {
                // Jika selang waktu kurang dari 15 menit, tidak catat kunjungan
                return $next($request);
            }
        } else {
            // Jika belum ada kunjungan sebelumnya, catat kunjungan baru
            $visitor = new Visitor([
                'ip_address' => $ipAddress,
                'user_agent' => $request->header('User-Agent'),
            ]);

            $visitor->save();
        }

        return $next($request);
    }
}
