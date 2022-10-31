<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use File;
use Session;

class Images extends Controller
{
    public function upload(Request $request)
    {
        $this -> validate($request, [
            'title' => 'required',
            'description' => 'required',
            'imginput' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $NewImageName = $randomString.'.'.$request->imginput->extension();
        $DBPath = 'storage/'.$randomString;
        $Path = public_path($DBPath);

        if (!File::isDirectory($Path)) {
            File::makeDirectory($Path, 0777, true, true);
        } else {
            return back()->with('status', 'error');
        }
        $request->imginput->move($Path, $NewImageName);

        if (session()->has('ID_User')) {
            DB::table('images')->insert([
                'tst_name' => $DBPath.'/'.$NewImageName,
                'tst_Description' => $request -> description,
                'tst_Title' => $request -> title,
                'tst_Counter' => 0,
                'tst_author' => SESSION('tst_email'),
                'tst_Status' => 1,
            ]);
            return back()->with('status', 'success');
        } else {
            DB::table('images')->insert([
              'tst_name' => $DBPath.'/'.$NewImageName,
              'tst_Description' => $request -> description,
              'tst_Title' => $request -> title,
              'tst_Counter' => 0,
              'tst_author' => 'Null'.
              'tst_Status' => 2,
          ]);
            return back()->with('status', 'success');
        }
    }
}
