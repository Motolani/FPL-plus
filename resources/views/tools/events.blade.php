@extends('layouts.header')
@section('tool-status', 'active')

@section('content')
@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-success" role="alert">
        {{ session('error') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="section-top-border col-10">
            <h3 class="mb-30">Table</h3>
            <table style="border: 2px solid #44024b; " class="table">
                <thead >
                   <th>Teams</th>
                   <th>GW1</th>
                   <th>GW2</th>
                   
                </thead>
        
                @foreach ( $teams as $team)
                    <tr>
                       <td style="border-right: 2px solid #44024b; "><img src="{{ asset('storage/club-logos/'.$team->img) }}" height="50px" alt="logo" title="logo">{{" ".$team->team}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection