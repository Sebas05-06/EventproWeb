<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Recinto;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario de demostración (cambiar la contraseña en producción)
        $admin = User::firstOrCreate(
            ['email' => 'admin@ejemplo.com'],
            ['name' => 'Administrador', 'password' => env('ADMIN_PASSWORD', 'password')]
        );

        $datos = [
            ['Sala Ejecutiva', 'Reuniones, capacitaciones y presentaciones de equipos pequeños.', 80, 500, false, [40, 25, 30]],
            ['Salón Real', 'Bodas, banquetes y ferias con espacio para montar a tu medida.', 300, 2200, true, [400, 250, 300]],
            ['Auditorio Central', 'Congresos y conciertos con butacas y escenario.', 450, 3200, false, [700, 400, 500]],
        ];

        foreach ($datos as [$nombre, $desc, $hora, $dia, $dest, $caps]) {
            $recinto = Recinto::firstOrCreate(
                ['nombre' => $nombre],
                ['descripcion' => $desc, 'tarifa_hora' => $hora, 'tarifa_dia' => $dia, 'destacado' => $dest]
            );

            if ($recinto->capacidades()->count() === 0) {
                foreach (['teatro', 'escuela', 'banquete'] as $i => $montaje) {
                    $recinto->capacidades()->create(['montaje' => $montaje, 'personas' => $caps[$i]]);
                }
            }
        }

        foreach ([
            ['Catering', 'por persona', 45],
            ['Decoración', 'por evento', 600],
            ['Soporte técnico', 'por hora', 200],
            ['Seguridad', 'por hora', 35],
        ] as [$nombre, $unidad, $precio]) {
            Servicio::firstOrCreate(['nombre' => $nombre], ['unidad' => $unidad, 'precio' => $precio]);
        }

        $cliente = Cliente::firstOrCreate(
            ['email' => 'contacto@cliente-ejemplo.com'],
            ['nombre' => 'Cliente de Ejemplo S.A.', 'tipo' => 'corporativo', 'telefono' => '000 000 0000']
        );

        if (Evento::count() === 0) {
            $evento = Evento::create([
                'titulo' => 'Congreso de Innovación',
                'tipo' => 'congreso',
                'cliente_id' => $cliente->id,
                'user_id' => $admin->id,
                'fecha_inicio' => now()->addMonth()->setTime(8, 0),
                'fecha_fin' => now()->addMonth()->setTime(18, 0),
                'asistentes' => 600,
                'estado' => 'confirmado',
            ]);
            $evento->recintos()->attach(Recinto::where('nombre', 'Auditorio Central')->first()->id, ['montaje' => 'teatro']);
            $evento->servicios()->attach(Servicio::where('nombre', 'Catering')->first()->id, ['cantidad' => 600]);
        }
    }
}
