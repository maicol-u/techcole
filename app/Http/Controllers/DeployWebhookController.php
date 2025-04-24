<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class DeployWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Verificación por token (seguridad básica)
        if ($request->header('X-Deploy-Token') !== env('DEPLOY_TOKEN')) {
            Log::warning('Intento de deploy sin token válido.');
            abort(403, 'Unauthorized');
        }

        Log::info('Webhook de deploy recibido.');

        // Activar modo mantenimiento
        Artisan::call('down');

        // Ejecutar el script de deploy
        exec('cd ' . base_path() . ' && git pull origin main');
        exec('composer install --no-dev --optimize-autoloader');
        exec('php artisan migrate --force');
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:cache');

        // Salir del modo mantenimiento
        Artisan::call('up');

        Log::info('Deploy completado exitosamente.');

        return response()->json(['message' => 'Deploy ejecutado correctamente.']);
    }
}
