@component('mail::message')
# {{$tarefa}}

Data limite para conclusão: {{$data_limite}}

@component('mail::button', ['url' => $url])
Clique para ver a tarefa!
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
