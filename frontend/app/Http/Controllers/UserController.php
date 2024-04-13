<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Patient;
use App\Register;
use App\feedback;

class Result
{
    public $Identifier;
    public $date;
    public $UniversityDegree;
    public $SpecialtyCertificate;
}

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct(
        Register $register, 
        feedback $feedback, 
        Patient $patient,
        User $user
        )
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->register = $register;
        $this->feedback = $feedback;
        $this->patient = $patient;
    }



    public function index()
    {
        if (auth()->user()->type == null)
            return view('no-access');

        return view('home');
    }

    public function search()
    {
        if (auth()->user()->type == null)
            return view('no-access');

        return view('search');
    }

    public function feedback()
    {
        return view('feedback');
    }

    public function perfil()
    {
        $auth = $this->user->all()->where('id', auth()->user()->id)->first();
        return view('perfil', compact('auth'));
    }

    public function editPerfil(Request $request)
    {
        try {
            $this->validarCPF($request->post()['identifier']);
            $res1 = $this->user->where('id', auth()->user()->id)->update([
                'name' => $request->post()['name'],
                'birth_day' => $request->post()['birth_day'],
                'identifier' => $request->post()['identifier'],
                'gender' => $request->post()['gender'],
                'identifier' => preg_replace('/[^0-9]+/i', '', $request->post()['identifier']),
                'postal_code' => preg_replace('/[^0-9]+/i', '', $request->post()['cep']),
                'city' => $request->post()['city'],
                'state' => $request->post()['state'],
            ]);
            if ($res1) {
                return redirect('perfil')->with('mensagem', 'Data successfully registered');
            } else
                return redirect('perfil')->with('mensagem2', 'Registration failed!');
        } catch (\Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function noAccess()
    {
        return view('no-access');
    }

    public function registerPS()
    {
        return view('register-ps');
    }


    public function editUser(Request $request)
    {

        if (auth()->user()->type == null)
            return view('no-access');

        if (auth()->user()->type == 1) {

            $database = $this->crm->where('identifier', $request->get('identifier'))->update([
                'name' => $request->get('name'),
                'city' => $request->get('city'),
                'state' => $request->get('state')
            ]);

            return redirect('user?id=' . $request->get('identifier'))->with('message', 'Register saved correctly');;
        }

        if (auth()->user()->type == 2) {

            $database = $this->hei->where('identifier', $request->get('identifier'))->update([
                'name' => $request->get('name'),
                'city' => $request->get('city'),
                'state' => $request->get('state')
            ]);

            return redirect('user?id=' . $request->get('identifier'))->with('message', 'Register saved correctly');;
        }

        if (auth()->user()->type == 3) {

            $database = $this->se->where('identifier', $request->get('identifier'))->update([
                'name' => $request->get('name'),
                'city' => $request->get('city'),
                'state' => $request->get('state')
            ]);

            return redirect('user?id=' . $request->get('identifier'))->with('message', 'Register saved correctly');;
        }
    }

    public function registerFeedback(Request $request)
    {

        if (auth()->user()->type == null)
            return view('no-access');

        $rs = $this->feedback->create([
            'user_id' => auth()->user()->id,
            'title' => $request->get('title'),
            'text' => $request->get('text')
        ]);

        $message = 'Feedback sent successfully';
        return view('feedback', compact('message'));
    }

    function validarCPF($cpf)
    {
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);
        if (strlen($cpf) != 11) {
            throw new \Exception('CPF inválido');
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new \Exception('CPF inválido');
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                throw new \Exception('CPF inválido');
            }
        }
        return;
    }
}
