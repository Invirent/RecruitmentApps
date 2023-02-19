<?php
    use Illuminate\Support\Facades\DB; 

    $Answers = DB::select("
        SELECT *
        FROM quiz_answers answer
        Where answer.quiz_id = $quiz->id
    ");
?>
@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Quiz {{ $quiz->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/quiz-template/'.$quiz->template_id) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/quizzes/' . $quiz->id . '/edit?template_id='.$quiz->template_id) }}" title="Edit Quiz"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/quizzes' . '/' . $quiz->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Quiz" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th> Sequence </th>
                                        <td> {{ $quiz->sequence }} </td>
                                    </tr>
                                    <tr>
                                        <th> Question </th>
                                        <td> {{ $quiz->question }} </td>
                                    </tr>
                                    <tr>
                                        <th> Required </th>
                                        <td> {{ $quiz->required }} </td>
                                    </tr>
                                    <tr>
                                        <th> Is Scored Answer </th>
                                        <td> {{ $quiz->is_scored_answer }} </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6>Quizzes Answers</h6>
                            <table class="table">
                                <tr>
                                    <th>Answer</th>
                                    <th>Is Correct Answers</th>
                                    <th>Actions</th>
                                </tr>
                            @foreach($Answers as $answer)
                                <tr>
                                    <td>{{$answer->answer}}</td>
                                    <td>{{$answer->is_correct}}</td>
                                    <td>
                                        <a href="{{ url('/admin/quiz-answer/' . $answer->id . '/edit?quiz_id='.$quiz->id) }}" title="Edit Quiz Answer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <form method="POST" action="{{ url('admin/quiz-answer' . '/' . $answer->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete QuizAnswer" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td colspan="3">
                                        <a href="/admin/quiz-answer/create?quiz_id={{ $quiz->id }}" title="Add New Quiz"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
