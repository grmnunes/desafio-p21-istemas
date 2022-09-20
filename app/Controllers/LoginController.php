<?php
namespace app\Controllers;

use app\Models\User;

class LoginController
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index()
    {
        return view('login'); 
    }

    public function login()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($_POST['password']);
        $user = $this->user->getByEmail($email);

        if($user && password_verify($password, $user->password)) {

            $_SESSION['logged'] = true;
            $_SESSION['user'] = [
                'name' => $user->name,
                'email' => $user->email,
            ];
            
            return redirect('/', 'Login realizado com sucesso.' );
        }

        return redirect('/login', 'As credênciais informadas não correnpondem com os registros. Verifique os dados e tente novamente.');
    }
}