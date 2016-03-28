@extends('layout')

@section('content')
    <h1 class="title">The Welcome page goes here</h1>


<!--         <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div> -->

        <?php foreach ($people as $person) : ?>
            <li><?= $person;?></li>
        <?php endforeach; ?>
<br>
        @foreach ($people as $person)
            <li>{{$person}}</li>
        @endforeach     
@stop


