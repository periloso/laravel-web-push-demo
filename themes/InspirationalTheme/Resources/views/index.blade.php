@extends('inspirationaltheme::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from theme: {!! config('inspirationaltheme.name') !!}
    </p>
@stop
