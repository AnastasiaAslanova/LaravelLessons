@extends('layouts.app')
@section('content')
    <p>
        City: {{ $city }}<br/>
        Temprature: {{ $main['temp'] }}<br/>
        Humidity: {{  $main['humidity'] }}<br/>
        Pressure: {{ $main['pressure'] }}<br/>
        Wind: {{ round($wind['speed'], Weather::DEFAULT_PRECISION) }}
    </p>
@endsection
