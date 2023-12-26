@extends('layouts.master')

@section('content')
    @yield('messages')
    <div class="island">
        @if (!isset($dataArray))
            <p style="text-align: center;">No data found!</p>
        @else
            <div class="table-island">
                <table id="table" class="table table-striped table-dark">
                    <form name="checkform"
                        action="{{ action('App\Http\Controllers\f1ContentCRUDControllers\editDBController@editDBEntry') }}"
                        method="post" accept-charset="UTF-8">
                        @csrf
                        <thread class="thead-dark">
                            <tr class="btn-container">
                                <a class="btn btn-outline-success my-2 my-sm-0" name="add-entry" type="button"
                                    value="submit-checked" for="checkform" id="btn"
                                    href="{{ action('App\Http\Controllers\f1ContentCRUDControllers\addToDBController@addDBEntryField') }}">Add
                                </a>
                                <button class="btn btn-outline-success my-2 my-sm-0" name="submit_edit" type="submit"
                                    value="submit-checked" for="checkform" id="btn">Edit
                                </button>
                                <button class="btn btn-outline-success my-2 my-sm-0" name="submit_delete" type="submit"
                                    value="submit-checked" for="checkform" id="btn">Delete
                                </button>
                                <a class="btn btn-outline-success my-2 my-sm-0" name="refresh" value="refresh"
                                    id="btn"
                                    href="{{ $url = action('App\Http\Controllers\f1ContentCRUDControllers\loadDBController@loadDBContent') }}">Refresh</a>
                            </tr>
                            <tr style="height: 3rem; font-size: 14px;">
                                <th>Opt.</th>
                                <th># ID</th>
                                <th>Driver ID</th>
                                <th>Wiki URL</th>
                                <th>Name</th>
                                <th>Family Name</th>
                                <th>Birthday</th>
                                <th>Nationality</th>
                            </tr>
                        </thread>
                        @if (is_string($dataArray) === false)
                            @foreach ($dataArray as $entry)
                                <tr>
                                    <th><input class="form-check-input" for="checkform" type="checkbox" value="0"
                                            id="{{ $entry['id'] }}" name="checkbox[{{ $entry['id'] }}]"
                                            style="margin-left: 1rem; transform: scale(140%)"></th>
                                    <th>{{ $entry['id'] }}</th>
                                    <th>{{ $entry['driverId'] }}</th>
                                    <th><a href="{{ $entry['url'] }}">
                                            <p class="truncate-url">{{ $entry['url'] }}</p>
                                        </a></th>
                                    <th>{{ $entry['givenName'] }}</th>
                                    <th>{{ $entry['familyName'] }}</th>
                                    <th>{{ str_replace('-', '.', date('d-m-Y', strtotime($entry['dateOfBirth']))) }}</th>
                                    <th>{{ $entry['nationality'] }}</th>
                                </tr>
                            @endforeach
                        @endif
                    </form>
                </table>
            </div>
        @endif
        @if (isset($dataLoaded) && !isset($dataArray))
            <p>{{ $dataLoaded }}</p>
        @endif
    </div>
@endsection
