<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use App\Models\college;
use App\Models\sbo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class SboController extends Controller
{
    function index(Request $request){
        try {
            $user = $request->session()->get('user');
            $college = college::where('acronym', $user->college)->first();
            $candidate = candidate::where('college_id', $college->college_id)->get();
            $sbo_id = "ORG42357";

            $candidateArray = [];
        foreach($candidate as $candidateData){
            if($candidateData->organization_id == $sbo_id){
                $candidateArray[] = $candidateData;
            }
        }
        return view('SBO_Vote.index', compact('candidateArray', 'college', 'user'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Server Error(500)');
        }
        
    }

    function vote(Request $request){
        try {
            $user = $request->session()->get('user');

            $validationRules = [
                'governor' => 'exists:candidates,student_id',
                'vice_governor' => 'exists:candidates,student_id',
                'secretary' => 'exists:candidates,student_id',
                'associate_secretary' => 'exists:candidates,student_id',
                'treasurer' => 'exists:candidates,student_id',
                'associate_treasurer' => 'exists:candidates,student_id',
                'auditor' => 'exists:candidates,student_id',
                'public_relation_officer' => 'exists:candidates,student_id',
            ];
            
            // Add validation rule only for the representative that matches the user's year level
            if ($user->year_level == 2) {
                $validationRules['second_rep'] = 'exists:candidates,student_id';
            } elseif ($user->year_level == 3) {
                $validationRules['third_rep'] = 'exists:candidates,student_id';
            } elseif ($user->year_level == 4) {
                $validationRules['fourth_rep'] = 'exists:candidates,student_id';
            }
            
            $validator = Validator::make($request->all(), $validationRules);
            
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'manghilabot pajud ka ha');
            }

            $checkSBO = sbo::where('student_id', $user->student_id)->first();

            if($checkSBO){
                $checkSBO->delete();
            }

            $sbo = new sbo();
            $sbo->student_id = $user->student_id;
            $sbo->name = $user->name;
            $sbo->governor = $request->governor;
            $sbo->vice_governor = $request->vice_governor;
            $sbo->secretary = $request->secretary;
            $sbo->associate_secretary = $request->associate_secretary;
            $sbo->treasurer = $request->treasurer;
            $sbo->associate_treasurer = $request->associate_treasurer;
            $sbo->auditor = $request->auditor;
            $sbo->public_relation_officer = $request->public_relation_officer;
            
            // Set only the representative field that matches the user's year level
            if ($user->year_level == 2) {
                $sbo->{'2nd_year_rep'} = $request->second_rep;
            } elseif ($user->year_level == 3) {
                $sbo->{'3rd_year_rep'} = $request->third_rep;
            } elseif ($user->year_level == 4) {
                $sbo->{'4th_year_rep'} = $request->fourth_rep;
            }
            $sbo->save();
            
            return redirect()->route('ssc.index');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Server Error(500)');
        }
    }
}
