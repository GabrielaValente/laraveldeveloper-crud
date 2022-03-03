<?php
namespace LaraDev\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserController extends Controller
{

    public function index()
    {
        $users = DB::select("SELECT * FROM users");
        return view('user/index')->with("users", $users);
    }
//---------------------------------------------------------------------------------------------------------------------------//
    public function show($id) //Funçao para mostrar as informações do usuário com mais detalhes = show.php.
    {

        // Consulta ao banco
        $users = DB::table('users')
            ->join('adresses', 'adresses.id', '=', 'users.adress_id')
            ->join('profiles','profiles.id','=', 'users.profile_id')
            ->where('users.id','=',$id)
            ->select('users.*', 'adresses.city as adress','profiles.name as profile')
            ->get();

        if (!empty($users)) { // "Se" for diferente do valor "vazio" quer dizer que tem registro, se houver registro mostre o registro(na view show.php)

            return view('user/show')->with('users', $users);
        } else { // // "se não" houver registro retorne para a página inicial de usuários.
            return redirect()->action('UserController@index');
        }
    }
//---------------------------------------------------------------------------------------------------------------------------//
    public function create() //Função para CRIAR um novo registro de cadastro de pessoas.
    {
        $adresses = DB::select("SELECT * FROM adresses");
        $profiles = DB::select("SELECT * FROM profiles");
        return view('user/create', compact("profiles","adresses"));
    }

    public function store(Request $request)
    {
        $user = [
            $request->name,
            $request->cpf,
            $request->email,
            $request->password,
            $request->adress_id,
            $request->profile_id
        ];

        DB::insert("INSERT INTO users (name, cpf, email, password, adress_id, profile_id)VALUES
                    (?, ?, ?, ?, ?, ?)", $user);

        return redirect()->action("UserController@index");
    }

//---------------------------------------------------------------------------------------------------------------------------//

    public function edit ($id) // Função para EDITAR o usuário/informações do usuário, está em edit.php
    {
        $user = DB::select(' SELECT * FROM users where id = ?', [$id]);
        $adresses = DB::select("SELECT * FROM adresses");
        $profiles = DB::select("SELECT * FROM profiles");

        if (!empty($user)) {
            return view("user/edit", compact("user","adresses","profiles"));

        } else {
            return redirect()->action('UserController@index');
        }

    }

    //---------------------------------------------------------------------------------------------------------------------------//

    public function update (Request $request, $id) // Função para atualizar/UPDATE as informações editadas/modificadas no banco de dados.
    {
        $user = [
            $request->name,
            $request->CPF,
            $request->email,
            $request->adress_id,
            $request->profile_id,
            $id
        ];

        DB::update("UPDATE users SET name = ?, CPF = ?, email = ?, adress_id = ?, profile_id = ?
                    WHERE id = ?", $user);

        return redirect()->action('UserController@index');

    }

//---------------------------------------------------------------------------------------------------------------------------//

    public function destroy ($id) // Função para remover registros do banco de dados.
    {
        $user = DB::select(' SELECT * FROM users where id = ?', [$id]);

        if(!empty($user)) { // "Se" houver registro, delete:
            DB::delete("DELETE FROM users WHERE id = ?", [$id]);
        }
                            // Após isso, retorne para página inicial.
        return redirect()->action('UserController@index');
    }

//---------------------------------------------------------------------------------------------------------------------------//
}
