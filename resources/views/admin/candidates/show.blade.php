<?php
    use Illuminate\Support\Facades\DB;
    $jobs = DB::table('jobs')->get()->where('id', $candidate->job_id);

    $url_base = Config::get('app.url', 'http://localhost:8000');
    $url = $url_base . '/candidate?access_key=' . $candidate->access_key;

    $CandidateAnswer = DB::select(
        'SELECT 
            al.id as id,
            al.candidate_id as candidate_id,
            al.quiz_id as quiz_id,
            al.answer_choose_id as answer_choose_id,
            quiz.sequence as sequence,
            quiz.question as question,
            quiz.is_scored_answer as is_scored_answer,
            answer.answer as answer,
            answer.is_correct as is_correct
        FROM candidates_answers al 
        LEFT JOIN quizzes quiz ON al.quiz_id = quiz.id
        LEFT JOIN quiz_answers answer ON al.answer_choose_id = answer.id
        where al.candidate_id = ?
        ORDER BY quiz.sequence ASC
        ',
        [$candidate->id]
    );

?>

<script>
    function copyLink() {
        var copyText = document.getElementById("url_value");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        alert("Url Copied: \n" + copyText.value);
  } 
</script>

@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">Candidate {{ $candidate->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/candidates') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/candidates/' . $candidate->id . '/edit') }}" title="Edit Candidate"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <form method="POST" action="{{ url('admin/candidates' . '/' . $candidate->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Candidate" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $candidate->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Age </th>
                                        <td> {{ $candidate->age }} </td>
                                    </tr>
                                    <tr>
                                        <th> Gender </th>
                                        <td> {{ $candidate->gender }} </td>
                                    </tr>
                                    <tr>
                                        <th>Birth Date</th>
                                        <td> {{ $candidate->birthdate }} </td>
                                    </tr>
                                    <tr>
                                        <th> Email </th>
                                        <td> {{ $candidate->email }} </td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td> {{ $candidate->phone_number }} </td>
                                    </tr>
                                    <tr>
                                        <th> Jobs </th>
                                        <td> 
                                            @foreach($jobs as $job)
                                                {{ $job->job_name }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> URL </th>
                                        <td>
                                            <input type="text" id="url_value" value="{{ $url }}" readonly> 
                                            <button class="btn btn-success btn-sm" onclick="copyLink()"><i class="fa fa-clipboard"></i> Copy URL</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6>Answers</h6>
                            <table class="table">
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Correct</th>
                                </tr>
                                @foreach($CandidateAnswer as $answer)
                                    <tr>
                                        <td>{{ $answer->question }}</td>
                                        <td>{{ $answer->answer }}</td>
                                        @if($answer->is_scored_answer == 1)
                                            <td><input type="checkbox" value="{{ ($answer->is_correct) }}" disabled></td>
                                        @else
                                            <td><input type="checkbox" value="0" disabled></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
