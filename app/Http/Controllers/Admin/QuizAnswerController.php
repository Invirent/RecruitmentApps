<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\QuizAnswer;
use Illuminate\Http\Request;

class QuizAnswerController extends Controller
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
            $quizanswer = QuizAnswer::where('answer', 'LIKE', "%$keyword%")
                ->orWhere('is_correct', 'LIKE', "%$keyword%")
                ->orWhere('randomize_sequence', 'LIKE', "%$keyword%")
                ->orWhere('quiz_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quizanswer = QuizAnswer::latest()->paginate($perPage);
        }

        return view('admin.quiz-answer.index', compact('quizanswer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.quiz-answer.create');
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
        
        $quizanswer = QuizAnswer::create($requestData);

        return redirect('admin/quizzes/'.$quizanswer->quiz_id)->with('flash_message', 'QuizAnswer added!');
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
        $quizanswer = QuizAnswer::findOrFail($id);

        return view('admin.quiz-answer.show', compact('quizanswer'));
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
        $quizanswer = QuizAnswer::findOrFail($id);

        return view('admin.quiz-answer.edit', compact('quizanswer'));
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
        
        $quizanswer = QuizAnswer::findOrFail($id);
        $quizanswer->update($requestData);

        return redirect('admin/quizzes/'.$quizanswer->quiz_id)->with('flash_message', 'QuizAnswer updated!');
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
        QuizAnswer::destroy($id);

        return redirect('admin/quiz-answer')->with('flash_message', 'QuizAnswer deleted!');
    }
}
