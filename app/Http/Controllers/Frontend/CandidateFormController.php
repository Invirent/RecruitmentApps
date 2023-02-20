<?php
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateFormController extends Controller
{
    public function openForm($access_key){
        $data = Candidate::get()->where("access_key", $access_key)->first();
        if($data){
            return view("frontend.candidate-form", compact("data"));
        }
        else{
            return redirect("/login");
        }
    }

    public function storeAnswer(Request $request){
        foreach ($request as $key => $value) {
            echo "$key => $value";
        }
    }

}