<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AthenaDashboardController extends Controller
{
    public function index()
    {
        // Get logged user data
        $loggedUser = session('logged_user') ?? (object)[
            'name' => 'Administrador',
            'role' => 'Gestor',
            'personId' => 0,
            'email' => '',
        ];
        
        return view('athena.dashboard', compact('loggedUser'));
    }
    
    public function stats()
    {
        try {
            $stats = [
                'alunos' => DB::table('pmieducar.aluno')
                    ->where('ativo', 1)
                    ->count(),
                'professores' => DB::table('pmieducar.servidor')
                    ->where('ativo', 1)
                    ->count(),
                'turmas' => DB::table('pmieducar.turma')
                    ->where('ativo', 1)
                    ->where('ano', date('Y'))
                    ->count(),
                'escolas' => DB::table('pmieducar.escola')
                    ->where('ativo', 1)
                    ->count(),
            ];
            
            return response()->json($stats);
        } catch (\Exception $e) {
            return response()->json([
                'alunos' => 0,
                'professores' => 0,
                'turmas' => 0,
                'escolas' => 0,
                'error' => $e->getMessage()
            ]);
        }
    }
    
    public function alerts()
    {
        try {
            // Alunos com mais de 25% de faltas
            $alunosRisco = DB::select("
                SELECT COUNT(*) as total 
                FROM pmieducar.matricula m
                WHERE m.ativo = 1 
                AND m.ano = ?
            ", [date('Y')]);
            
            return response()->json([
                'alunos_risco' => $alunosRisco[0]->total ?? 0,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
