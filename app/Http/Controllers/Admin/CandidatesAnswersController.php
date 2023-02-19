<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\CandidatesAnswer;
use Illuminate\Http\Request;

class CandidatesAnswersController extends Controller
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
            $candidatesanswers = CandidatesAnswer::where('candidate_id', 'LIKE', "%$keyword%")
                ->orWhere('quiz_id', 'LIKE', "%$keyword%")
                ->orWhere('answer_choose_id', 'LIKE', "%$keyword%")
                ->orWhere('scored_answer', 'LIKE', "%$keyword%")
                ->orWhere('is_correct_answer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $candidatesanswers = CandidatesAnswer::latest()->paginate($perPage);
        }

        return view('admin.candidates-answers.index', compact('candidatesanswers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.candidates-answers.create');
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
        
        $requestData = $request->all();
        
        CandidatesAnswer::create($requestData);

        return redirect('admin/candidates-answers')->with('flash_message', 'CandidatesAnswer added!');
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
        $candidatesanswer = CandidatesAnswer::findOrFail($id);

        return view('admin.candidates-answers.show', compact('candidatesanswer'));
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
        $candidatesanswer = CandidatesAnswer::findOrFail($id);

        return view('admin.candidates-answers.edit', compact('candidatesanswer'));
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
        
        $candidatesanswer = CandidatesAnswer::findOrFail($id);
        $candidatesanswer->update($requestData);

        return redirect('admin/candidates-answers')->with('flash_message', 'CandidatesAnswer updated!');
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
        CandidatesAnswer::destroy($id);

        return redirect('admin/candidates-answers')->with('flash_message', 'CandidatesAnswer deleted!');
    }
}
