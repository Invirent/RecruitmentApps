<?php
    use Illuminate\Support\Facades\DB; 

    $Quizzes = DB::select("
        SELECT *
        FROM quizzes quiz
        Where quiz.template_id = $quiztemplate->id
    ");
?>
@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Quiz Template {{ $quiztemplate->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/quiz-template') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/quiz-template/' . $quiztemplate->id . '/edit') }}" title="Edit QuizTemplate"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/quiztemplate' . '/' . $quiztemplate->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete QuizTemplate" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $quiztemplate->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> {{ $quiztemplate->description }} </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6>Quizzes List</h6>
                            <table class="table">
                                <tr>
                                    <th>Sequence</th>
                                    <th>Quiz</th>
                                    <th>Required</th>
                                    <th>Is Scored Answer</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($Quizzes as $quiz)
                                <tr>
                                    <td>{{ $quiz->sequence }}</td>
                                    <td>{{ $quiz->question }}</td>
                                    <td>{{ $quiz->required }}</td>
                                    <td>{{ $quiz->is_scored_answer }}</td>
                                    <td>
                                        <a href='/admin/quizzes/{{$quiz->id}}' title='View Quiz'><button class='btn btn-info btn-sm'><i class='fa fa-eye' aria-hidden='true'></i> View</button></a>
                                        <a href='/admin/quizzes/{{$quiz->id}}/edit?template_id={{ $quiztemplate->id }}' title='Edit Quiz'><button class='btn btn-primary btn-sm'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button></a>
                                        <form method='POST' action='/admin/quizzes/{{$quiz->id}}' accept-charset='UTF-8' style='display:inline'>
                                        <input name='_method' type='hidden' value='DELETE'>
                                        <input name='_token' type='hidden' value='{{ csrf_token() }}'>
                                        <button type='submit' class='btn btn-danger btn-sm' title='Delete Quiz' onclick='return confirm(&quot;Confirm delete?&quot;)'><i class='fa fa-trash-o' aria-hidden='true'></i> Delete</button>
                                        </form>
                                    </td>
                                <tr>
                                    @endforeach
                                <tr>
                                    <td colspan="5">
                                        <a href="/admin/quizzes/create?template_id={{ $quiztemplate->id }}" title="Add New Quiz"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>
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
