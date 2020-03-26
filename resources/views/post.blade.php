
@extends('layouts.apptemplate')
@section('content')
<form action="post" method="post">
    {{url('Posting')}}
    Item Name: <input type="text" name="name"><br>
    # of items: <input type="number" name="quantity"><br>
    Description: <input type="text" name="description"><br>
    Photo: <input type="photo" name="photo"><br>

    <input type="submit">
</form>

@endsection

