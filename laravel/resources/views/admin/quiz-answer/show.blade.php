@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">QuizAnswer {{ $quizanswer->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/quiz-answer') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/quiz-answer/' . $quizanswer->id . '/edit') }}" title="Edit QuizAnswer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/quizanswer' . '/' . $quizanswer->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete QuizAnswer" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $quizanswer->id }}</td>
                                    </tr>
                                    <tr><th> Answer </th><td> {{ $quizanswer->answer }} </td></tr><tr><th> Is Correct </th><td> {{ $quizanswer->is_correct }} </td></tr><tr><th> Randomize Sequence </th><td> {{ $quizanswer->randomize_sequence }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
