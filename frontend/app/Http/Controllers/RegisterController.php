<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Register;
use App\User;
use App\patient;
use App\HealthcareProfessional;
use App\Institution;
use App\Laboratory;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        User $user,
        Patient $patient,
        HealthcareProfessional $healthcareProfessional,
        Institution $Institution,
        Laboratory $Laboratory,
        Register $register
    ) {
        $this->user = $user;
        $this->patient = $patient;
        $this->healthcareProfessional = $healthcareProfessional;
        $this->Institution = $Institution;
        $this->Laboratory = $Laboratory;
        $this->register = $register;
    }


    public function index()
    {
        return view('home');
    }


    public function registerPS()
    {
        return view('register-ps');
    }

    public function registerIs()
    {
        return view('register-is');
    }

    public function registerLm()
    {
        return view('register-lm');
    }

    public function sendRegister(Request $request)
    {

        $rs0 = $this->user->create([
            'email' => $request->get('email'),
            'telefone' => $request->get('telefone'),
            'password' => Hash::make($request->get('password')),
            'type' => 1
        ]);

        $rs1 = $this->patient->create([
            'user_id' => $rs0['id'],
            'nome' => $request->get('nome'),
            'cpf' => $request->get('cpf'),
            'rg' => $request->get('rg'),
            'contactRelationship' => "",
            'contactName' => "",
            'contactStreet' => "",
            'contactNumber' => "",
            'contactCity' => "",
            'addressNumber' => $request->get('numero'),
            'addressContry' => $request->get('pais'),
            'addressCity' => $request->get('cidade'),
            'addressCEP' => $request->get('cep'),
            'addressState' => $request->get('estado'),
            'maritalStatus' => $request->get('estado-civil'),
            'gender' => $request->get('genero'),
            'birthDate' => $request->get('data-nasc'),
            'language' => "pt"
        ]);

        return redirect('login');
    }

    public function sendRegisterPs(Request $request)
    {

        $rs0 = $this->user->create([
            'email' => $request->get('email'),
            'telefone' => $request->get('telefone'),
            'password' => Hash::make($request->get('password')),
            'type' => 2
        ]);

        $rs1 = $this->healthcareProfessional->create([
            'user_id' => $rs0['id'],
            'nome' => $request->get('name'),
            'cpf' => $request->get('cpf'),
            'rg' => $request->get('rg'),
            'contactRelationship' => "",
            'contactName' => "",
            'contactStreet' => "",
            'contactNumber' => "",
            'contactCity' => "",
            'addressNumber' => $request->get('numero'),
            'addressContry' => $request->get('pais'),
            'addressCity' => $request->get('cidade'),
            'addressCEP' => $request->get('cep'),
            'addressState' => $request->get('estado'),
            'maritalStatus' => $request->get('estado-civil'),
            'gender' => $request->get('genero'),
            'birthDate' => $request->get('data-nasc'),
            'qualificationIdentifier' => $request->get('numero-registro'),
            'qualificationName' => $request->get('profissao'),
            'qualificationDate' => $request->get('data-registro'),
            'speciality' => $request->get('especialidade')
        ]);

        return redirect('login');
    }


    public function sendRegisterIs(Request $request)
    {

        $rs0 = $this->user->create([
            'email' => $request->get('email'),
            'telefone' => "",
            'password' => Hash::make($request->get('password')),
            'type' => 3
        ]);

        $rs1 = $this->Institution->create([
            'user_id' => $rs0['id'],
            'nome_js' => $request->get('name'),
            'nr_cnpj' => $request->get('cnpj'),
            'addressNumber' => $request->get('numero'),
            'addressContry' => $request->get('pais'),
            'addressCity' => $request->get('cidade'),
            'addressCEP' => $request->get('cep'),
            'addressState' => $request->get('estado'),
            'nr_inscricao_conselho' => $request->get('rg'),
            'nome_responsavel' => $request->get('profissao'),
            'nr_cpf_responsavel' => $request->get('cpf')
        ]);

        return redirect('login');
    }


    public function sendRegisterLm(Request $request)
    {

        $rs0 = $this->user->create([
            'email' => $request->get('email'),
            'telefone' => "",
            'password' => Hash::make($request->get('password')),
            'type' => 4
        ]);

        $rs1 = $this->Laboratory->create([
            'user_id' => $rs0['id'],
            'nome_js' => $request->get('name'),
            'nr_cnpj' => $request->get('cnpj'),
            'addressNumber' => $request->get('numero'),
            'addressContry' => $request->get('pais'),
            'addressCity' => $request->get('cidade'),
            'addressCEP' => $request->get('cep'),
            'addressState' => $request->get('estado'),
            'nr_inscricao_conselho' => $request->get('rg'),
            'nome_responsavel' => $request->get('profissao'),
            'nr_cpf_responsavel' => $request->get('cpf')
        ]);

        return redirect('login');
    }
}
