<?php
    use Illuminate\Support\Facades\DB;
    $template = DB::table('quiz_templates')->where('id', $job->default_template_id)->first();
?>

@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            

            <div class="col-md">
                <div class="card">
                    <div class="card-header">Job {{ $job->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/jobs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/jobs/' . $job->id . '/edit') }}" title="Edit Job"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/jobs' . '/' . $job->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Job" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $job->id }}</td>
                                    </tr>
                                    <tr><th> Job Name </th><td> {{ $job->job_name }} </td></tr>
                                    <tr>
                                        <th> Default Template </th>
                                        <td> {{ $template->name }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
