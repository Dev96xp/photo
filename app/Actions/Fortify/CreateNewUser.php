<?php

namespace App\Actions\Fortify;

use App\Models\Account;
use App\Models\Ids;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Http;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        // dd($input);
        // ReCAPTCHA    Parte[3/3]
        // $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        //         'secret' => '6Ldd3EgsAAAAALWi3LdNSYqtD9fxHyeOZiWyzAJe',
        //         'response' => $input['g-recaptcha-response'],
        //     ])->object();

        // if ($response->success && $response->score >= 0.7) {
        //     dd('El Usuario es Humano');
        // } else {
        //     dd('El Usuario es un Robot');
        // }


        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            // Agregando esta regla de validacion de recaptcha, a cada formulario este sera protegido por Google recaptcha
            'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha()],    //ReCAPTCHA    Parte[4/4]
        ])->validate();

        // B) Obtiene el nuevo ID de la tabla: ids, para el NUEVO usuario en la tabla: USERS (CLIENTE)
        $new_user_id = Ids::find(1); // Next id para: [users]

        // C) Crear usuario
        $user = User::create([      //Lo cambie para stripe, agregue $user
            'name' => $input['name'],
            'cus_id' => date('Y') . '-' . $new_user_id->nextid,     // Se genera nuevo id del usuario
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'city' => $input['city'],
            'state' => $input['state'],
            'zip' => $input['zip'],
            'phone' => $input['phone'],
            'store_id' => 2,   // Por defecto se asigna la tienda Online
            'password' => Hash::make($input['password']),
        ]);


        // D) Lo agregre para stripe
        //$user->createAsStripeCustomer();  //Lo agregre para stripe

        // E) Ahora le voy asignar un role a este ususario

        // usando lavarel permisos, en este caso le asigno el role :Customer
        // IMPORATNTE: ojo - Obviamente ya deberia existir el role Customer, por tal razon
        // hay que ejecutar primero los seeder de permisssion y roles
        $user->assignRole('Customer');


        // F) Crear una Cuenta dentro del sistema

        $new_acc_id = Ids::find(4); // Next id para: [Account]
        $new_account_Id = date('Y') . '-' . date('m') . date('d') . '-' . $new_acc_id->nextid;

        // OJO - importante declarar una cada variable como [ fillable] en el modelo Account
        //       de lo contrario los valores no seran guardados
        $account = Account::create([
            'name' => 'checking',
            'acc_id' => $new_account_Id,
            'user_id' => $user->id
        ]);

        // G)  ******** GET IP ADDRESS del cliente, *****************************
        // para autorizar el uso de la aplicacion, en ciertas zonas

        $resultado1 = 'Correcto IP Address';
        $resultado2 = 'Incorrecto IP Address';

        // Detecta el IP address del cliente, para autorizar el uso de la aplicacion, en ciertas zonas
        if (!empty($_SERVER["HTTP_CLIENT-IP"])) {
            $ipx = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ipx = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ipx = $_SERVER["REMOTE_ADDR"];
        }

        // Obtiene el ip y lo guarda
        $user->ipxes()->create([
            'name' => 'usuario registrado',
            'ip' => $ipx,
            'city' => 'open'
        ]);

        return $user;  //Lo agregre para stripe

    }
}
