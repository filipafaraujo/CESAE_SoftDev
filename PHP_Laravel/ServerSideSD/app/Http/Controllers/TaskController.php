<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

   /* public function getTasks(){
        $tasks = [
        ['name' => 'Rita', 'task' => 'estudar Laravel'],
        ['name' => 'João', 'task' => 'estudar Mysql'],
        ];

        $availableTasks = ['SQL', 'JS', 'Java', 'POO'];
        return view('tasks', compact('tasks', 'availableTasks'));*/


         public function getTasks(){

        $tasks = $this->getAllTasks();


        return view('tasks.tasks', compact('tasks'));
    }


        protected function getAllTasks(){
            $tasks = Db::table('tasks')
                    ->join('users', 'users.id', '=', 'tasks.user_id')
                    ->select('tasks.*', 'users.name as username')
                    /*->select('id','name','description', 'due_at', 'status', 'user_id')*/
                    ->get();

            return $tasks;
        }

        public function viewTask($id){
            $tasks = DB::table('tasks')
            ->join('users', 'tasks.user_id', 'users.id')
            ->where('tasks.id', $id)
            ->select('tasks.*', 'users.name as username')
            ->first();

           // $tasks = DB::table('tasks')
            //->where('id', $id)
            //->first();

            return view('tasks.view_tasks', compact('tasks')); //blade tasks.blade.php
        }

        public function deleteTaskFromDB($id){
            DB::table('tasks')
            ->where('id', $id)
            ->delete();

            return back;

        }

        public function createTask(Request $request) {
            $request->validate([
                'name' => 'required|string|max:50',
                'descricao' => 'required|string|max:75',
                'users_id' => 'required|min:8'

            ]);

            Task::insert([
                'name' => $request->name,
                'descricao' => $request->descricao,
                'users_id' => Hash::make($request ->username),
        ]);

        return redirect ()->route('tasks.add')->with('success', 'Tarefa adicionada com sucesso');

    }

        public function addTask(){
            $users = DB::table('users')->get();
            return view('tasks.add_tasks', compact('users'));
           }

}
