<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class MappingResultController extends Controller
{
    function index()
    {
        if (Auth::guard('owner')->check()) {
            $data['title'] = 'Hasil Pemetaan Suara';
            $data['districts'] = District::all();
            $data['villages'] = Village::all();
            return view('owner.mapping-result.index', $data);
        }

        return abort(404);
    }

    function district(Request $request)
    {
        if (Auth::guard('owner')->check()) {
            $data['district'] = District::findOrFail(Crypt::decrypt($request->id));
            $data['title'] = 'Hasil Pemetaan Kecamatan ' . $data['district']->name;

            return view('owner.mapping-result.district', $data);
        }

        return abort(404);
    }

    function village(Request $request)
    {
        if (Auth::guard('owner')->check()) {
            $data['village'] = Village::findOrFail(Crypt::decrypt($request->id));
            $data['title'] = 'Hasil Pemetaan ' . $data['village']->name;

            return view('owner.mapping-result.village', $data);
        }

        return abort(404);
    }
}
