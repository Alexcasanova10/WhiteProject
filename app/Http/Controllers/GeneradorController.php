<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use App\Models\Etiqueta;


class GeneradorController extends Controller
{
    public function imprimir(){
    $today = Carbon::now()->format('d/m/Y');
    $pdf = \PDF::loadView('ejemplo', compact('today'));
    return $pdf->download('ejemplo.pdf');
    }

    public function imprimirBD(){
       $etiquetas = Etiqueta::WHERE('estado_etiqueta')->get();
       $pdf=\PDF::loadview('ejemplobd', compact('etiquetas'));
       return $pdf->download('ejemplobd.pdf');
   }
   



}
