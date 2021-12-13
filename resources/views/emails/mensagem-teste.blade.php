@component('mail::message')
# Introdução

Corpo da mensagem

- Item 1
- Item 2
- Item 3


@component('mail::button', ['url' => ''])
Texto do botão 1
@endcomponent
@component('mail::button', ['url' => ''])
Texto do botão 2
@endcomponent

Valeu,<br>
{{ config('app.name') }}
@endcomponent
