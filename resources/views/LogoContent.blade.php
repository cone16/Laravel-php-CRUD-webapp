@extends('layouts.master')

@section('content')
    <div class="window">
        <div class="main-container">
            <div></div>
            <div class="logo-container">
                <h1 class="logo">LuLeCon's F1 Driver Index</h1>
                <p class="text">This is a simple <span style="color: lightgreen">(C)</span>reate <span
                        style="color: lightblue">(R)</span>ead <span style="color: orange;">(U)</span>pdate <span
                        style="color:red">(D)</span>elete App
                    hope you enjoy it.</p><br>

                <a id="loginbutton" class="btn btn-info lg"
                    href="{{ $url = action('App\Http\Controllers\f1ContentCRUDControllers\loadDBController@loadDBContent') }}">ENTER</a>
            </div>
            <div></div>
        </div>
    </div>
@endsection
