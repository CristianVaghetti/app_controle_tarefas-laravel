@component('mail::message')
<h1>Antiga tarefa</h1>
{{$tarefa}}
<br>
<br>
Antiga data limite para conclusão: {{$data_limite}}
<br>
<br>
<h1>Nova tarefa</h1>
{{$nova_tarefa}}
<br>
<br>
Nova data limite para conclusão: {{$nova_data_limite}}

@component('mail::button', ['url' => $url])
Clique para ver a tarefa!
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
