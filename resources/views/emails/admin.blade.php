@component('mail::message')

Hey admin, in the past 48 hours, you have received {{ $total_answers  }} answers to your text questions, that’s a lot to read.
And list the last 5 in the email.

Here are five last question answers

@if( count($question_answers) > 0 ):
    <table>
        <thead>
        <tr>
            <th>Question Type</th>
            <th>Question name</th>
            <th>Question Answer</th>
        </tr>
            
        </thead>
        <tbody>
        <tr>
            <td>{{ $qc->type  }}</td>
            <td>{{ $qc->name  }}</td>
            <td>{{ $qc->answer  }}</td>
        </tr>
        </tbody>
    </table>

    @foreach( $question_answers as $qc )



    @endforeach
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
