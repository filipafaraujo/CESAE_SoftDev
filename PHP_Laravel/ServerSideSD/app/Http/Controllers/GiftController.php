<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GiftController extends Controller
{


        //exibe todas as prendas
        public function getGifts()
        {
            $gifts = $this->getAllGifts();
            return view('gifts.gift', compact('gifts'));
        }

        //procura por todas as prendas na bd
        protected function getAllGifts(){
            $gifts = Db::table('gifts')
                    ->join('users', 'users.id', '=', 'gifts.user_id')
                    ->select('gifts.*', 'users.name as username')
                    ->get();

            return $gifts;
        }


        //exibe uma prenda especifica
        public function showGift($id)
        {
            $gift = DB::table('gifts')
                ->join('users', 'users.id', '=', 'gifts.user_id')
                ->where('gifts.id', $id)
                ->select('gifts.*', 'users.name as username')
                ->first();

                return view('gifts.onegift', compact('gift'));


        }

        //apaga uma prenda
        public function deleteGiftFromDB($id) {
            DB::table('gifts')
            ->where('id', $id)
            ->delete();


        return redirect ()->route('gifts')->with('success', 'Prenda apagada com sucesso');
    }

        // cria uma prenda
        public function createGift(Request $request) {
            $request->validate([
                'giftName' => 'required|string|max:70',
                'valueExpected' => 'required|numeric|min:0',
                'valueSpent' => 'required|numeric|min:0',
                'user_id' => 'required|exists:users,id'
            ]);

            DB::table('gifts')->insert([
                'giftName' => $request->giftName,
                'valueExpected' => $request->valueExpected,
                'valueSpent' => $request->valueSpent,
                'user_id' => $request->user_id,
            ]);

            return redirect()->route('gifts')->with('success', 'Prenda criada com sucesso');
        }

        public function addGift(){
            $users = DB::table('users')
            ->select('users.name','users.id')
            ->get();


            return view('gifts.add_gifts', compact('users'))->with('success', 'Prenda criada com sucesso');
        }


           public function editGift($id) {
            $gift = DB::table('gifts')
            ->where('id', $id)
            ->first();

            $users = DB::table('users')->select('id','name')->get();
            return view('gifts.edit_gifts', compact('gift', 'users'));

           }

           //update gift
           public function updateGift(Request $request, $id) {

            $request->validate([
                'giftName' => 'required|string|max:70',
                'valueExpected' => 'required|numeric|min:0',
                'valueSpent' => 'required|numeric|min:0',
                'user_id' => 'required|exists:users,id'

            ]);

            DB::table('gifts')->where('id', $id)->update([
                'giftName' => $request->giftName,
                'valueExpected' => $request->valueExpected,
                'valueSpent' => $request-> valueSpent,
                'user_id' => $request->user_id,
            ]);

                return redirect()->route('gifts')->with('success', 'Prenda atualizada com sucesso');

    }
}
