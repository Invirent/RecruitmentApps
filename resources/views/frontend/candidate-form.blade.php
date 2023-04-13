<?php
    use Illuminate\Support\Facades\DB;
    $CompanyData = DB::table('companies')->get();

    $access_key = $_GET['access_key'];
    $candidate = DB::table('candidates')->get()->where('access_key', $access_key)->first();
    $CandidateQuiz = DB::select('
        SELECT 
            quiz.id as id,
            quiz.template_id as template_id,
            quiz.sequence as sequence,
            quiz.question as question,
            quiz.is_scored_answer as is_scored_answer
        FROM quizzes quiz
        LEFT JOIN quiz_templates template ON quiz.template_id = template.id
        LEFT JOIN jobs job ON template.id = job.default_template_id
        WHERE job.id = ?
        ORDER BY quiz.sequence ASC
    ', [$candidate->job_id]);

    $CandidateAnswerSelection = DB::select('
        SELECT *
        FROM quiz_answers answer
    ');

    if (isset($_SESSION["submitted"]) && $_SESSION["submitted"] == 1) {
        header("Location: /submitted");
        exit();
    }

    foreach($CompanyData as $Company){
      $CompanyData = $Company;
      break;
    };

    $logo = null;

    if (isset($CompanyData->company_logo) && $CompanyData->company_logo != null){
      $logo = asset('storage/'.$CompanyData->company_logo);
    }

    if (!isset($logo) || $logo == null){
      $logo = asset('template/dist/img/icon-gaji.jpg');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Form</title>
    <style>
        .form-page-head{
          margin-top: 50px;
        }

        .border{
          border: black 1px solid;
        }

        .form-page{
          background-color: #0f7bb1;
          padding: 20px;
          border-radius: 5px;
          border: black 1px solid;
        }

        .form-color {
            background-color: #6ad13d;
            padding: 20px;
            border-radius: 5px;
            border: black 1px solid;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0f7bb1;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="{{ $logo }}" class="img-fluid" alt="logo" style="height: 50px;">
        </a>
      </div>
    </nav>
    <div class="container-fluid form-page-head">
        <div class="row mx-0 justify-content-center">
          <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0 px-xxl-3 ">
            <div class="form-page">
            <div class="form-color">
              <h4>Hello {{ $candidate->name }}, please complete the question.</h4>
            </div>
            <form
              method="POST"
              class="w-100 rounded-1 p-4 border bg-white"
              action="{{ url("/candidate/store") }}"
              enctype="multipart/form-data"
            >
                {{ csrf_field() }}
                <input type="hidden" name="access_key" value="{{ $access_key }}">
                <input type="hidden" name="job_id" value="{{ $candidate->job_id }}">
                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
            @foreach($CandidateQuiz as $quiz)
              <label class="d-block mb-4">
                <span class="form-label d-block">{{ $quiz->question }}</span>
                <select required name="quiz_{{ $quiz->id }} " class="form-select">
                    @foreach($CandidateAnswerSelection as $answer)
                        @if($answer->quiz_id == $quiz->id)
                            <option type="radio" value="{{ $answer->id }}">{{ $answer->answer }}</option>
                        @endif
                    @endforeach
                </select>
              </label>
            @endforeach
      
              <div class="mb-3">
                <input type="submit" class="btn btn-primary px-3 rounded-3" value="Submit" />
              </div>
            </form>
          </div>
        </div>
        </div>
      </div>
      
</body>
</html>