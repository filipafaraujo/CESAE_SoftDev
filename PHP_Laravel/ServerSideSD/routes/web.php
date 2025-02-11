<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


/*Route::get('/home', function(){
    return "<a href = ".route('users.show')." >Clica aqui para veres todos os utilizadores </a>";
}) -> name ('home');


Route::get('/users', function(){
    return '<h1>Aqui vês todos os users</h1>';
}) -> name ('users.show');

Route::get('/hello/{name}', function($name){
    return '<h1>Hello</h1>'.$name;
});

Route::fallback(function(){
    return "<a href = ".route('home')." >Estás perdido, volta aqui</a>";
});*/


/*Route::get('/home', function(){
    return view('home');
}) -> name ('home');*/

//Route home
Route::get('home', [HomeController::class, 'index']) -> name('home'); //o que chamo no browser, dentro do controlador, dentro do codigo

//Route dashboard
Route::get('/dashboard', [DashboardController::class, 'showUser'])->name('backoffice')->middleware('auth');


//Route tarefas
// Route::get('tasks', [TaskController::class, 'getTasks']) ->name('tasks');

Route::get('tasks', [TaskController::class, 'getTasks']) ->name('tasks')->middleware('auth');
Route::get('/view-tasks/{id}', [TaskController::class, 'viewTask']) ->name('tasks.view');
Route::get('/delete-tasks/{id}', [TaskController::class, 'deleteTaskFromDB']) ->name('tasks.delete');

Route::get('/add-tasks', [TaskController::class, 'addTask'])->name('tasks.add');
Route::post('/create-tasks', [TaskController::class, 'createTask'])->name('tasks.create');



//Mostrar todas as prendas
Route::get('gifts', [GiftController::class, 'getGifts']) ->name('gifts'); //OK
//Mostrar uma prenda
Route::get('/view-gifts/{id}', [GiftController::class, 'showGift'])->name('onegift'); //OK
//Apagar uma prenda
Route::get('/delete-gifts/{id}', [GiftController::class, 'deleteGiftFromDB'])->name('gifts.delete'); //ok

//Adicionar prenda
Route::get('/add-gifts', [GiftController::class, 'addGift'])->name('gifts.add'); //OK

//editar prenda, formulario
Route::get('/edit-gifts/{id}', [GiftController::class, 'editGift'])->name('gifts.edit'); //OK

//criar prenda, formulario
Route::post('/create-gifts', [GiftController::class, 'createGift'])->name('gifts.create'); //OK

//atualizar prenda
Route::post('/update-gifts/{id}', [GiftController::class, 'updateGift'])->name('gifts.update'); //OK

//rota users
//rota para no futuro carregar uma tabela com todos os users
/*Route::get('/users', function(){ //browser
    return view('users.all_users'); // view
}) -> name ('users.show'); //nome da rota*/
Route::get('/users', [UserController::class, 'allUsers']) -> name('users.show');

// rota que vai carregar uma blade com toda a info do user
//registado no browser, chamada no giftcontroller view user
Route::get('/users/{id}', [UserController::class, 'viewUser']) -> name('users.view');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUserFromDB']) -> name('users.delete');

/*Route::get('/add_users', function() {
    return view('users.add_users');
}) -> name ('users.add');*/

Route::get('/add-users', [UserController::class, 'addUsers']) -> name('users.add');
Route::post('/create-users', [UserController::class, 'createUsers'])->name('users.create');


Route::fallback(function(){
    return "<a href=". route('home')." >estás perdido volta aqui</a>";
});

/*ou
//rota fallback: cai aqui quando não encontra nenhuma rota com o url solicitado no frontend
Route::fallback(function(){
    return view('fallback');
});*/


//rota com paramentros
Route::get('/hello/{name}', function($name){
    return '<h1>Hello</h1>'.$name;
});

//Notas:
//os nomes das rotas servem para se identificar as mesmas dentro do código com uma "key", como por exemplo para chamar no href

//rotas de aprendizagem
//chama directamente a função inserir user na bd
//Route::get('/insert-user', [UserController:: class, 'insertUserIntoDB'])->name('users.insert');
