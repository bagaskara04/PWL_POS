<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $user = UserModel::firstWhere('level_id', 1);
        // return view('user',['data' => $user] );

        // $user = UserModel::findOr(21, ['username', 'nama'], function(){
        //     abort(404);
        // });
        // return view('user',['data' => $user] );

        $user = UserModel::where('username', 'manager9')->firstOrFail();
        return view('user',['data' => $user] );

    }
}
