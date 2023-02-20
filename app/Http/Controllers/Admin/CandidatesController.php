<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Candidate;
use App\Models\Quiz;
use App\Models\QuizAnswer;

use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $candidates = Candidate::where('name', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
                ->orWhere('gender', 'LIKE', "%$keyword%")
                ->orWhere('birthdate', 'LIKE', "%$keyword%")
                ->orWhere('phone_number', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('job_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $candidates = Candidate::latest()->paginate($perPage);
        }

        return view('admin.candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $key = bin2hex(random_bytes(32));
        $requestData = $request->all();

        $requestData['access_key'] = $key;

        Candidate::create($requestData);

        return redirect('admin/candidates')->with('flash_message', 'Candidate added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $candidate = Candidate::findOrFail($id);

        return view('admin.candidates.show', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);

        return view('admin.candidates.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $candidate = Candidate::findOrFail($id);
        $candidate->update($requestData);

        return redirect('admin/candidates')->with('flash_message', 'Candidate updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Candidate::destroy($id);

        return redirect('admin/candidates')->with('flash_message', 'Candidate deleted!');
    }

    public static function storeAnswer(Request $request){
        $access_key = $request->get('access_key');
        $candidate = DB::table('candidates')->get()->where('access_key', $access_key)->first();
        $CandidateQuiz = DB::select('
            SELECT 
                quiz.id as id
            FROM quizzes quiz
            LEFT JOIN quiz_templates template ON quiz.template_id = template.id
            LEFT JOIN jobs job ON template.id = job.default_template_id
            WHERE job.id = ?
            ORDER BY quiz.sequence ASC
        ', [$candidate->job_id]);
        foreach ($CandidateQuiz as $value) {
            $quiz_id = $value->id;
            $key = 'quiz_'.$quiz_id;
            $selected_answer = $request->get($key);
            
            $is_scored_answer = Quiz::get()->where("id", $quiz_id)->first()->is_scored_answer;
            $answer_status = 0;
            if($is_scored_answer == 1){
                $answer_status = QuizAnswer::get()->where("id", $selected_answer)->first()->is_correct_answer ?? 0;
            }
            DB::table('candidates_answers')->insert([
                'candidate_id' => $candidate->id,
                'quiz_id' => $quiz_id,
                'answer_choose_id' => $selected_answer,
                'scored_answer' => $is_scored_answer,
                'is_correct_answer' => $answer_status,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        };
        $_SESSION["submitted"] = true;
        return redirect('/submitted') ->with('flash_message', 'Candidate answer submitted!');
    }
}
