<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\QuizTemplate;
use Illuminate\Http\Request;

class QuizTemplateController extends Controller
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
            $quiztemplate = QuizTemplate::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quiztemplate = QuizTemplate::latest()->paginate($perPage);
        }

        return view('admin.quiz-template.index', compact('quiztemplate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.quiz-template.create');
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
        
        QuizTemplate::create($requestData);

        return redirect('admin/quiz-template')->with('flash_message', 'QuizTemplate added!');
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
        $quiztemplate = QuizTemplate::findOrFail($id);

        return view('admin.quiz-template.show', compact('quiztemplate'));
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
        $quiztemplate = QuizTemplate::findOrFail($id);

        return view('admin.quiz-template.edit', compact('quiztemplate'));
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
        
        $quiztemplate = QuizTemplate::findOrFail($id);
        $quiztemplate->update($requestData);

        return redirect('admin/quiz-template')->with('flash_message', 'QuizTemplate updated!');
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
        QuizTemplate::destroy($id);

        return redirect('admin/quiz-template')->with('flash_message', 'QuizTemplate deleted!');
    }
}
