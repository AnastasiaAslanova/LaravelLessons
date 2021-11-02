@extends('layouts.app')
@section('content')
<form action="/weather_in_city">
    <select name="city" id="">
        <option value="Kiev">Kiev</option>
        <option value="Mariupol">Mariupol</option>
        <option value="Lviv">Lviv</option>
    </select>
    <input value="select city" type="submit" name=""/>

</form>
@endsection

