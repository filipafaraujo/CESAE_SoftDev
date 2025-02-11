<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /*public function allUsers(){
        return view('users.all_users');
    }*/

    public function allUsers(){
        $cesaeInfo = $this -> getCesaeInfo();
        $contacts = $this -> getContacts();


        //pesquisa quando existe o campo preenchido
        // $search =null;

        // if(request()->query('search')){
            // $search = request()->query('search');
        // }else{
            // $search=null;
        // }

        //o ternário é colocar a parte da pesquisa de cima numa linha
        $search = request()->query('search')? request()->query('search') : null;
        //variável que é o searchh que pergunta se eu tenho a query search, se tiver atribui, se não tiver fica null

        $contactPerson= Db::table('users')->where('name','Maria')->first();
        $this->deleteUser(8);


        //função para inserir um user na bd. corre quando chamamos a rota cuja função presente função estã associada
        //$this->insertUserIntoDB();

        $this ->updateUserAtDb();
        $allUsers = $this->getAllUsersFromDB($search);

        return view('users.all_users', compact('cesaeInfo', 'contacts', 'allUsers', 'contactPerson'));
    }


    public function addSara(){
        DB::table('users')->insert([
            'name' => 'Sara',
            'email' => 'sara@gmail.com',
            'password' => 'Sara1234!'
        ]);
    }

    public function addUsers(){
        return view('users.add_users');
    }


    private function getCesaeInfo(){
        $cesaeInfo = [
                'name' => 'Cesae',
                'address' => 'Rua Ciríaco Cardoso 186, 4150-212 Porto',
                'email' => 'cesae@cesae.pt'
        ];
        return $cesaeInfo;
    }

    protected function getContacts() {
        $contacts = [
        ['id' => 1, 'name' => 'Filipa', 'phone' => '912345678'],
        ['id' => 2, 'name' => 'Sara', 'phone' => '916351289'],
        ['id' => 3, 'name' => 'Bruno', 'phone' => '913687452'],
        ];

        return $contacts;
    }

    public function insertUserIntoDB(){
        DB::table('users')
        ->insert([
            'name'=> 'Ana',
            'email'=> 'Ana@gmail.com',
            'password'=> 'password_456!',
        ]);

        return response()->json('utilizador inserido');
    }

    public function updateUserAtDb() {

        Db::table('users')
        ->where('id',3)

        ->update([
            'address' => 'Rua Nova de Bruno',
            'updated_at' => now(),
        ]);
    }

    protected function getAllUsersFromDB($search){
        $users = Db::table('users');

        if($search){
            $users = $users
            ->where('name', 'like', "%{$search}%" )
            ->orWhere('email', $search);

        }

        $users=$users->select('name','email','password', 'id', 'photo')
                ->where('updated_at', null)
                ->get();

        return $users;
    }

    protected function deleteUser($id){
        Db::table('users')
        ->where('id', $id)
        ->delete();
    }

    public function viewUser($id){
        $user = DB::table('users')
        ->where('id', $id)
        ->first();

        return view('users.view_user', compact('user'));
    }

    public function deleteUserFromDB($id){
        DB::table('tasks')->where('user_id', $id)->delete(); //Undefined constant "App\Http\Controllers\back"
        DB::table('users')
        ->where('id', $id)
        ->delete();

        return back;

    }

    public function createUsers(Request $request) {

        // é um update se tiver id
        if(isset($request->id)){

    $request->validate([
            'name' => 'required|string|min:3',
            'address' => 'max:100',
            'nif' => 'max:15',
            'photo' => 'image'
        ]);

        $photo = null;

        if($request ->hasFile('photo')){
            $photo = Storage::putFile('userPhotos',
            $request->photo);
        }

        User::where('id', $request->id)
        ->update([
                'name' => $request -> name,
                'nif' => $request -> nif,
                'address' => $request -> address,
                'photo' => $photo
            ]);

            return redirect()->route('users.show')->with('message', 'User actualizado com sucesso');

        }else{

         $request->validate([
            'name' => 'required|string|min:3',
             'email' => 'required|email|unique:users',
             'password' => 'required|min:8'
         ]);

        }

        User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request ->password),
        ]);

        return redirect ()->route('users.show')->with('message', 'User adicionado com sucesso');
    }


    // public function createUsers(Request $request) {
        // $request->validate([
            // 'name' => 'required|string|min:3',
            // 'email' => 'required|email|unique:users',
            // 'password' => 'required|min:8'
        // ]);

        // User::insert([
                // 'name' => $request->name,
                // 'email' => $request->email,
                // 'password' => Hash::make($request ->password),
        // ]);

        // return redirect ()->route('users.show')->with('message', 'User adicionado com sucesso');
    // }
}

