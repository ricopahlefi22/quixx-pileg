<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Village;
use App\Models\Voter;
use App\Models\VotingPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MappingVoterController extends Controller
{
    function village(Request $request)
    {
        $data['title'] = 'Peta Pemilih';
        $data['village'] = Village::findOrFail(Crypt::decrypt($request->id));
        $data['districts'] = District::all();
        $data['votingPlaces'] = VotingPlace::where('village_id', $data['village']->id)->get();


        $data['coordinators_count'] = Voter::where('village_id', $data['village']->id)->where('level', true)->count();
        $data['registered_voters_count'] = Voter::where('village_id', $data['village']->id)->whereNotNull('coordinator_id')->count();
        $data['not_registered_voters_count'] = Voter::where('village_id', $data['village']->id)->whereNull('coordinator_id')->count();
        $data['voting_places_count'] = VotingPlace::where('village_id', $data['village']->id)->count();
        $data['voters_count'] = Voter::where('village_id', $data['village']->id)->count();

        return view('owner.mapping-voter.village', $data);
    }
}
