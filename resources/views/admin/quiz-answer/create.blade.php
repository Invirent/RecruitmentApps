<?php
    $quiz_id = $_GET['quiz_id'] | "";
?>
@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            

            <div class="col-md">
                <div class="card">
                    <div class="card-header">Create New Quiz Answer</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/quizzes/'.(isset($quizanswer->quiz_id) ? $quizanswer->quiz_id : $quiz_id)) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/quiz-answer') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.quiz-answer.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
