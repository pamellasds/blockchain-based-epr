<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Hash;
use App\Register;
use App\Observation;
use App\VitalSign;
use App\Diagnostic;
use App\Test;
use App\MedicationAdministrator;
use App\User;
use App\Patient;
use App\Questionnaire;
use App\Item;
use App\Access;
use Illuminate\Support\Facades\File;
use Sabberworm\CSS\Value\Size;
use SebastianBergmann\Environment\Console;

class InternalRegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        User $user,
        Patient $patient,
        Register $register,
        Observation $observation,
        Diagnostic $diagnostic,
        Test $test,
        VitalSign $vitalSign,
        MedicationAdministrator $medicationAdministrator,
        Questionnaire $questionnaire,
        Access $access,
        Item $item
    ) {

        $this->middleware('auth');
        $this->register = $register;
        $this->user = $user;
        $this->patient = $patient;
        $this->observation = $observation;
        $this->vitalSign = $vitalSign;
        $this->diagnostic = $diagnostic;
        $this->test = $test;
        $this->medicationAdministrator = $medicationAdministrator;
        $this->medicationAdministrator = $medicationAdministrator;
        $this->questionnaire = $questionnaire;
        $this->access = $access;
        $this->item = $item;
    }


    public function registerAnamnese()
    {
        return view('register-anamnese');
    }

    public function registerObservation()
    {
        return view('register-observation');
    }


    public function registerMedication()
    {
        return view('register-medication');
    }

    public function registerDiagnostic(Request $request)
    {
        return view('register-diagnostic');
    }

    public function patients()
    {
        $registers =
            $this->patient
            ->join('medical_accesses', 'medical_accesses.id_patiente', '=', 'user_patient.id')
            ->where('id_doctor', auth()->user()->id)
            ->groupBy('medical_accesses.id_patiente')
            ->get();

        return view('patients', compact('registers'));
    }

    public function registers()
    {
        $registers =
            $this->register
            ->join('user_patient', 'user_patient.id', '=', 'register.user_patient_id')
            ->join('medical_accesses', 'medical_accesses.id_register', '=', 'register.id')
            ->where('id_doctor', auth()->user()->id)
            ->distinct()
            ->get();
        return view('registers', compact('registers'));
    }

    public function registersPatientEspecific(Request $request)
    {
        $registros =
            $this->register
            ->join('user_patient', 'user_patient.id', '=', 'register.user_patient_id')
            ->select('user_patient.id AS pacient_id', 'user_patient.*', 'register.*')
            ->where('user_patient.user_id',  auth()->user()->id)->get();

        foreach ($registros as $registro) {
            $acessos =
                $this->access
                ->join('user_ps', 'medical_accesses.id_doctor', '=', 'user_ps.user_id')
                ->where('medical_accesses.id_register', $registro->id)
                ->groupBy('user_ps.id')
                ->get();
            $registro->acessos = $acessos;
        }
        
        $idPatient = auth()->user()->id;
        return view('registers-patient-especific', compact('registros', 'idPatient'));
    }


    public function sendRegisterAnamnese(Request $request)
    {


        $pacient = $this->patient->where('cpf',  $request->get('idPatient'))->first();
        $rs1 = $this->register->create([
            'register_type' => '1',
            'user_patient_id' => $pacient['id'],
            'user_id' => auth()->user()->id
        ]);

        $rs2 = $this->questionnaire->create([
            'status' => 1,
            'register_id' => $rs1['id'],
            'id_patient' => $pacient['id'],
            'period_start' => date("Y-m-d"),
            'period_end' => date("Y-m-d"),
            'id_ee' => ''
        ]);


        for ($i = 0; $i < 14; $i++) {
            $this->item->create([
                'questionnaire_response_id' => $rs2['id'],
                'question' => ($i + 1),
                'anwser' =>  $request->post()['anwser' . ($i + 1)]
            ]);
        }

        $idPatient = $pacient['id'];
        $idUser = auth()->user()->id;
        $periodStart = date("Y-m-d");

        $pdf = PDF::loadview('pdf.observation', compact('idPatient', 'idUser', 'periodStart'));

        $path = storage_path('app/public/anamneses/' . $rs2['id'] . '.pdf');
        $pdf->save($path);

        $base64 = base64_encode(File::get($path));
        $url = 'https://medicalrecord-ms.herokuapp.com/insert_register/';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            '{
            "idRegister":"' . $rs1['id'] . '",
            "idPatient":"' . $idPatient . '",
            "idPS":"' . $idUser . '",
            "media_base64": "' . $base64 . '"
        }'
        );
        $exec = curl_exec($ch);
        curl_close($ch);

        $this->access->create([
            'id_register' => $rs1['id'],
            'id_patiente' => $idPatient,
            'id_doctor' => $idUser
        ]);

        $message = 'Registro enviado com  sucesso!';
        return view('register-anamnese', compact('message'));
    }

    public function sendRegisterObservation(Request $request)
    {

        $pacient = $this->patient->where('cpf',  $request->get('idPatient'))->first();
        $rs1 = $this->register->create([
            'register_type' => '2',
            'user_patient_id' => $pacient['id'],
            'user_id' => auth()->user()->id
        ]);

        $rs2 = $this->observation->create([
            'status' => 1,
            'register_id' => $rs1['id'],
            'id_patient' => $pacient['id'],
            'period_start' => date("Y-m-d"),
            'period_end' => date("Y-m-d")
        ]);


        for ($i = 0; $i < 5; $i++) {
            if (array_key_exists('vital_' . $i, $request->post())) {
                if ($request->post()['vital_' . $i] != "") {
                    $this->vitalSign->create([
                        'observation_id' => $rs2['id'],
                        'value' => $request->post()['vitalvalue_' . $i],
                        'period_start' =>  $request->get('data-register'),
                        'body_site' => $request->post()['intvital_' . $i],
                        'method' => $request->post()['vital_' . $i]
                    ]);
                }
            }
        }

        $idPatient = $pacient['id'];
        $idUser = auth()->user()->id;
        $periodStart = date("Y-m-d");

        $pdf = PDF::loadview('pdf.observation', compact('idPatient', 'idUser', 'periodStart'));

        $path = storage_path('app/public/observations/' . $rs2['id'] . '.pdf');
        $pdf->save($path);

        $base64 = base64_encode(File::get($path));


        $url = 'https://medicalrecord-ms.herokuapp.com/insert_register/';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            '{
            "idRegister":"' . $rs1['id'] . '",
            "idPatient":"' . $idPatient . '",
            "idPS":"' . $idUser . '",
            "media_base64": "' . $base64 . '"
        }'
        );
        $exec = curl_exec($ch);
        curl_close($ch);

        $this->access->create([
            'id_register' => $rs1['id'],
            'id_patiente' => $idPatient,
            'id_doctor' => $idUser
        ]);


        $message = 'Registro enviado com  sucesso!';
        return view('register-observation', compact('message'));
    }


    public function sendRegisterDiagnostic(Request $request)
    {
        $pacient = $this->patient->where('cpf',  $request->get('idPatient'))->first();
        $rs1 = $this->register->create([
            'register_type' => '3',
            'user_patient_id' => $pacient['id'],
            'user_id' => auth()->user()->id
        ]);

        $rs2 = $this->diagnostic->create([
            'status' => 1,
            'register_id' => $rs1['id'],
            'id_patient' => $pacient['id'],
            'period_start' => date("Y-m-d"),
            'period_end' => date("Y-m-d")
        ]);


        for ($i = 0; $i < 5; $i++) {
            if (array_key_exists('diagnosticName_' . $i, $request->post())) {
                if ($request->post()['diagnosticName_' . $i] != "") {
                    $this->test->create([
                        'diagnostic_report_id' => $rs2['id'],
                        'test_name' => $request->post()['diagnosticName_' . $i],
                        'value' =>  $request->post()['diagnosticValue_' . $i]
                    ]);
                }
            }
        }


        $idPatient = $pacient['id'];
        $idUser = auth()->user()->id;
        $periodStart = date("Y-m-d");

        $pdf = PDF::loadview('pdf.observation', compact('idPatient', 'idUser', 'periodStart'));

        $path = storage_path('app/public/diagnostics/' . $rs2['id'] . '.pdf');
        $pdf->save($path);

        $base64 = base64_encode(File::get($path));


        $url = 'https://medicalrecord-ms.herokuapp.com/insert_register/';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            '{
            "idRegister":"' . $rs1['id'] . '",
            "idPatient":"' . $idPatient . '",
            "idPS":"' . $idUser . '",
            "media_base64": "' . $base64 . '"
        }'
        );
        $exec = curl_exec($ch);
        curl_close($ch);

        $this->access->create([
            'id_register' => $rs1['id'],
            'id_patiente' => $idPatient,
            'id_doctor' => $idUser,
            'base_code' => ''
        ]);

        $message = 'Registro enviado com  sucesso!';
        return view('register-diagnostic', compact('message'));
    }


    public function sendRegisterMedication(Request $request)
    {
        $pacient = $this->patient->where('cpf',  $request->get('idPatient'))->first();
        $rs1 = $this->register->create([
            'register_type' => '4',
            'user_patient_id' => $pacient['id'],
            'user_id' => auth()->user()->id
        ]);

        $rs2 = $this->medicationAdministrator->create([
            'register_id' => $rs1['id'],
            'status' => 1,
            'period_start' => date("Y-m-d"),
            'period_end' => date("Y-m-d"),
            'dousage_text' => $request->get('remedio'),
            'dousage_route' => $request->get('observacao'),
            'dousage_method' => $request->get('metodo'),
            'dousage_rate' => $request->get('dose')
        ]);


        $idPatient = $pacient['id'];
        $idUser = auth()->user()->id;
        $periodStart = date("Y-m-d");

        $pdf = PDF::loadview('pdf.observation', compact('idPatient', 'idUser', 'periodStart'));

        $path = storage_path('app/public/medications/' . $rs2['id'] . '.pdf');
        $pdf->save($path);

        $base64 = base64_encode(File::get($path));


        $url = 'https://medicalrecord-ms.herokuapp.com/insert_register/';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            '{
            "idRegister":"' . $rs1['id'] . '",
            "idPatient":"' . $idPatient . '",
            "idPS":"' . $idUser . '",
            "media_base64": "' . $base64 . '"
        }'
        );
        $exec = curl_exec($ch);
        curl_close($ch);

        $this->access->create([
            'id_register' => $rs1['id'],
            'id_patiente' => $idPatient,
            'id_doctor' => $idUser
        ]);

        $message = 'Registro enviado com  sucesso!';
        return view('register-diagnostic', compact('message'));
    }
}
