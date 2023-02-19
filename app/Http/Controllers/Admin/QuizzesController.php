<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizzesController extends Controller
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
            $quizzes = Quiz::where('sequence', 'LIKE', "%$keyword%")
                ->orWhere('question', 'LIKE', "%$keyword%")
                ->orWhere('required', 'LIKE', "%$keyword%")
                ->orWhere('is_scored_answer', 'LIKE', "%$keyword%")
                ->orWhere('template_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quizzes = Quiz::latest()->paginate($perPage);
        }

        return view('admin.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.quizzes.create');
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
        
        $quiz = Quiz::create($requestData);

        return redirect(('admin/quiz-template/'.$quiz->template_id))->with('flash_message', 'Quiz added!');
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
        $quiz = Quiz::findOrFail($id);

        return view('admin.quizzes.show', compact('quiz'));
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
        $quiz = Quiz::findOrFail($id);

        return view('admin.quizzes.edit', compact('quiz'));
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
        
        $quiz = Quiz::findOrFail($id);
        $quiz->update($requestData);



        return redirect(('admin/quiz-template/'.$quiz->template_id))->with('flash_message', 'Quiz updated!');
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
        Quiz::destroy($id);

        return redirect('admin/quizzes')->with('flash_message', 'Quiz deleted!');
    }
}
