<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Patient;
use App\healthcareProfessional;
use App\Register;
use App\Access;

class ApiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct(
        Register $register, 
        Patient $patient,
        Access $access,
        healthcareProfessional $healthcareProfessional,
        User $user
        )
    {
        $this->user = $user;
        $this->register = $register;
        $this->patient = $patient;
        $this->access = $access;
        $this->healthcareProfessional = $healthcareProfessional;
    }

    public function getPatient(Request $request)
    {
        $patient = $this->patient
        ->where('cpf',  $request->query('cpf'))->first();

        return response()->json([
            'patient' => $patient
        ]);

    }

    public function getProfissional(Request $request)
    {
        $profissional = $this->healthcareProfessional
        ->where('cpf',  $request->query('cpf'))->first();

        return response()->json([
            'profissional' => $profissional
        ]);

    }


    public function autorizarAcesso(Request $request)
    {

        $result = $this->access->create([
            'id_register' => $request->post('idRegister'),
            'id_patiente' => $request->post('idPatient'),
            'id_doctor' => $request->post('idUser')
        ]);

        return response()->json([
            $result
        ]);

    }

    public function removerAcesso(Request $request)
    {
        $result = $this->access
        ->where('id_register', $request->post('idRegister'))
        ->delete();


        return response()->json([
            'status' => $result
        ]);
    }

}
