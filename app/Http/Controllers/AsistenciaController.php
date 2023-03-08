<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Practicante;
use Illuminate\Http\Request;
use DateTimeImmutable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\Token;
use Illuminate\Support\Str;

/**
 * Class AreaController
 * @package App\Http\Controllers
 */
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1(Request $request)
    {
        $fechaInicio=$request->has('fechaInicio')?trim($request->get('fechaInicio')):'';
        $fechaFin=$request->has('fechaFin')?trim($request->get('fechaFin')):'';
        $dni=$request->has('dni')?trim($request->get('dni')):'';
        $fecha = date('y-m-d');
        $asistencias = Asistencia::with('practicante')
                        ->where(function($query) use ($fechaInicio, $fechaFin, $dni, $fecha) {
                            if($fechaInicio != ''){
                                $query->where('entrada', '>=', $fechaInicio);
                            }
                            if($fechaFin != ''){
                                $query->where('entrada', '<=', $fechaFin);
                            }
                            if($dni != ''){
                                $query->whereHas('practicante', function ($query) use ($dni) {
                                    $query->whereRaw('dni = ?', [$dni]);
                                });
                            }
                            /* if($fechaInicio == '' && $fechaFin == '' && $dni == ''){
                                $query->where('entrada', '>=', $fecha);
                            } */
                        })
                        ->get();
        
        return view('asistencia.reporte', compact('asistencias', 'fechaInicio','fechaFin','dni'));
    }

    public function marcarentrada(Request $request) {
        if (!preg_match('/^[0-9]{8}$/', $request->dni)) {
            return view('asistencia.index1', ['mensaje' => 'El formato del DNI no es válido']);
        }
        $practicante = Practicante::where('dni', $request->dni)->first();
    
        if(!$practicante) {
            return view('asistencia.index1',['mensaje'=>'No se encontró el practicante']);
        }
    
        $ultima_asistencia = $practicante->asistencias()->orderBy('entrada', 'desc')->first();
        $fecha_actual = \Carbon\Carbon::now();

        if($ultima_asistencia && date('Y-m-d', strtotime($ultima_asistencia->entrada)) === date('Y-m-d')) {
            return view('asistencia.index1',['mensaje'=>'Ya se marcó la entrada hoy']);
        } else {
            $asistencia = new Asistencia();
            $asistencia->entrada = $fecha_actual;
            $asistencia->practicante_id = $practicante->id;
            $asistencia->save();
    
            return view('asistencia.index1',['mensaje'=>'Asistencia completada']);
        }
        
    }

    public function marcarsalida(Request $request)
    {
        if (!preg_match('/^[0-9]{8}$/', $request->dni)) {
            return view('asistencia.index1', ['mensaje' => 'El formato del DNI no es válido']);
        }

        $practicante = Practicante::where('dni', $request->dni)->first();

        if (!$practicante) {
            return view('asistencia.index1', ['mensaje' => 'No se encontró el practicante']);
        }

        $ultima_entrada = $practicante->asistencias()->orderBy('entrada', 'desc')->first();

        if ($ultima_entrada && date('Y-m-d', strtotime($ultima_entrada->entrada)) === date('Y-m-d')) {
            $fecha_actual = \Carbon\Carbon::now();
            if ($ultima_entrada->salida) {
                return view('asistencia.index1', ['mensaje' => 'Ya se marcó la salida']);
            } else {
                $ultima_entrada->salida = $fecha_actual;
                $ultima_entrada->save();
                return view('asistencia.index1', ['mensaje' => 'Salida completada']);
            }
        } else {
            return view('asistencia.index1', ['mensaje' => 'No se marco la entrada']);
        }
    }

    public function generarreporte(Request $request)
    {
        //
        $fechaInicio=$request->has('fechaInicio')?trim($request->get('fechaInicio')):'';
        $fechaFin=$request->has('fechaFin')?trim($request->get('fechaFin')):'';
        $dni=$request->has('dni')?trim($request->get('dni')):'';

        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Setiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        ];
        
        $practicante=Practicante::where('dni', $dni)->first();
        
        $asistencias=$practicante->asistencias()->select(
            DB::raw('YEAR(created_at) as anio'),
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('DAY(created_at) as dia'),
            'entrada',
            'salida'
        )->whereBetween('created_at', [$fechaInicio, $fechaFin])
        ->orderBy('created_at')
        ->get()
        ->groupBy('anio')
        ->map(function ($asistencias) {
            return $asistencias->groupBy('mes');
        });
        $daynames = [
            'Domingo',
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sábado',
        ];
        

        //return $asistencias;
        $pdf=Pdf::loadView('asistencia.generarreporte', compact('asistencias', 'meses', 'practicante','daynames'));

        return $pdf->stream('reporte.pdf');
    }


    // public function generartoken( )
    // {
    //      $token = Token::first();
    //      if($token===null){
    //         $token=new Token();
    //      }
    //      $token->token=Str::random(8);

    //     $token->save();
    //     return redirect()->route('inicio');
    // }
    
}
