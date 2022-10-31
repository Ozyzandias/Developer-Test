<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class Auth extends Controller
{
    public function index()
    {
        $images = DB::table('images')
        ->where('tst_Status', '=', 1)
        ->take(20)
        ->get();

        return view('index', [
          'images' => $images,
      ]);
    }
    public function moderation()
    {
        $images = DB::table('images')
        ->where('tst_Status', '=', '2')
        ->get();
        return view('moderation', [
          'images' => $images,
        ]);
    }
    public function favorites()
    {
        $images = DB::table('ts_fav')
        ->join('images', 'ts_fav.ID_Image', '=', 'images.ID_Image')
        ->where('ID_User', '=', Session::get('ID_User'))
        ->get();

        return view('favorites', [
          'images' => $images,
        ]);
    }
    public function approve(Request $request)
    {
        DB::table('images')
        ->where('ID_Image', '=', $request -> id_image)
        ->update([
            'tst_Status' =>1,
        ]);
        return redirect()->back();
    }
    public function addFav(Request $request)
    {
        $id = explode("-", $request->id_image);
        if (session()->has('ID_User')) {
            $check = DB::table('ts_fav')
            ->where('ID_Image', '=', $id[0])
            ->where('ID_User', '=', Session::get('ID_User'))
            ->get();

            if (count($check) > 0) {
                return ('done');
            } else {
                DB::table('ts_fav')->insert([
                'ID_Image' => $id[0],
                'ID_User' => Session::get('ID_User'),
                ]);

                DB::table('images')
                ->where('ID_Image', '=', $id[0])
                ->update([
                  'tst_Counter' => DB::raw('tst_Counter+1'),
                ]);
            }
            return ('done');
        } else {
            return ('error');
        }
    }
    public function removeFav(Request $request)
    {
        DB::table('ts_fav')
        ->where('ID_Image', '=', $request->id_image)
        ->where('ID_User', '=', Session::get('ID_User'))
        ->delete();

        DB::table('images')
        ->where('ID_Image', '=', $request->id_image)
        ->update([
          'tst_Counter' => DB::raw('tst_Counter-1'),
        ]);
        return redirect()->back();
    }
    public function signup(Request $request)
    {
        $this -> validate($request, [
            'user' => 'required|email',
            'password' => 'required',
            'reppassword' => 'required|same:password',
        ]);

        if (session()->has('ID_User')) {
            $request->session()->flush();
        } else {
        }
        $email = $request->user;
        $password = $request->password;
        $reppassword = $request->reppassword;
        if (is_null($email) || is_null($password) || $email == '' || $password == '') {
            return redirect()->back();
        } else {
            $userLogin = DB::table('ts_users')
            ->where('tst_email', '=', $email)
            ->get();
            if (count($userLogin) > 0) {
                return redirect()->back()->with('error', 'found');
            } else {
                $pwh = Hash::make($request->password);
                if ($request->admin == 'admin') {
                    $admin = 1;
                } else {
                    $admin = 2;
                }
                DB::table('ts_users')->insert([
                  'tst_email' => $request->user,
                  'tst_pwd' => $pwh,
                  'tst_role' => $admin,
              ]);
                $userLogin = DB::table('ts_users')
                ->where('tst_email', '=', $email)
                ->get();
                Session::put('ID_User', $userLogin[0]->ID_User);
                Session::put('tst_email', $userLogin[0]->tst_email);
                Session::put('tst_role', $userLogin[0]->tst_role);
                return redirect()->route('home');
            }
        }
    }
    public function login(Request $request)
    {
        $this -> validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request -> email;
        $password = $request -> password;

        if (session()->has('ID_User')) {
            $request->session()->flush();
        } else {
        }

        if (is_null($email) || is_null($password) || $email == '' || $password == '') {
            return redirect()->back();
        } else {
            $userLogin = DB::table('ts_users')
                ->where('tst_email', '=', $email)
                ->get();
            if (count($userLogin) === 0) {
                return redirect()->back()->with('error', 'not_found');
            } else {
                if (Hash::check($password, $userLogin[0]-> tst_pwd)) {
                    Session::put('ID_User', $userLogin[0]->ID_User);
                    Session::put('tst_email', $userLogin[0]->tst_email);
                    Session::put('tst_role', $userLogin[0]->tst_role);
                    return redirect()->route('home');
                } else {
                    return redirect()->back();
                }
            }
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->back();
    }
}
