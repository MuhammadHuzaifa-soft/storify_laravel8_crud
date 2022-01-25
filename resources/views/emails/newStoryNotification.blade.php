@component('mail::message')
# Introduction

Story added with title of {{$title}}.

@component('mail::button', ['url' => route('dashboard.index')])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
