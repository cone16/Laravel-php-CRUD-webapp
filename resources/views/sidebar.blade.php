@if (isset($switch))
    @if ($switch == 'ADD_ENTRY')
        <div class="sidebar-island">
            <h3>Add Driver</h3><br>
            <form class="bg-dark"
                action="{{ action('App\Http\Controllers\f1ContentCRUDControllers\addToDBController@addDBEntry') }}"
                name="inputform" method="post" class="form-inline my-2 my-lg-0">
                @csrf
                <label for="inputform">Driver Id: </label>
                <input id="input-field" class="form-control mr-sm-2" type="text" name="driver_id" placeholder="john_doe"
                    required></input>
                <br>
                <label for="inputform">URL:</label>
                <input id="input-field" class="form-control mr-sm-2" type="url" name="url"
                    placeholder="www.wiki.com/john_doe" required></input>
                <br>
                <label for="inputform">First Name:</label>
                <input id="input-field" class="form-control mr-sm-2" type="text" name="given_name" placeholder="john"
                    required></input>
                <br>
                <label for="inputform">Last Name:</label>
                <input id="input-field" class="form-control mr-sm-2" type="text" name="family_name" placeholder="doe"
                    required></input>
                <br>
                <label for="inputform">Birthday:</label>
                <input id="input-field" class="form-control mr-sm-2" type="date" name="date_of_birth"
                    placeholder="20.02.2022" required></input>
                <br>
                <label for="inputform">Nationality:</label>
                <input id="input-field" class="form-control mr-sm-2" type="text" name="nationality"
                    placeholder="american" required></input>
                <br>
                <br>
                <div class="col-12">
                    <button id="add-button" class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    @elseif ($switch === 'EDIT')
        <div class="sidebar-island">
            <form class="dark" data-bs-theme="dark"
                action="{{ action('App\Http\Controllers\f1ContentCRUDControllers\editDBController@saveChangesToDB') }}"
                name="inputform" method="post" class="form-inline my-2 my-lg-0">
                @csrf
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        @foreach ($dataArray as $entry)
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-theme="light" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $entry['id'] }}"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    {{ $entry['id'] }}&nbsp;&nbsp;{{ $entry['driverId'] }}
                                </button>
                            </h2>
                            <div id="collapseOne{{ $entry['id'] }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample{{ $entry['id'] }}">
                                <div class="accordion-body">
                                    @csrf
                                    <!-- hidden field to count and transfer the id's-->
                                    <input type="hidden" type="text" name="id[]" value="{{ $entry['id'] }}">
                                    <p style="color: white">ID: {{ $entry['id'] }}</p>
                                    <br>
                                    <!-- driverId -->
                                    <label for="driver-id" id=" {{ $entry['id'] }}">Driver Id: </label>
                                    <input id="driver-id input-field-white" class="form-control mr-sm-2" type="text"
                                        name="driver-id[]" style="color: white;"
                                        placeholder="{{ $entry['driverId'] }}"></input>
                                    <br>
                                    <!-- url -->
                                    <label for="url" id=" {{ $entry['id'] }}">URL:</label>
                                    <input id="url input-field-white" class="form-control mr-sm-2" type="text"
                                        name="url[]" style="color: white;" placeholder="{{ $entry['url'] }}"></input>
                                    <br>
                                    <!-- givenName -->
                                    <label for="given-name" id=" {{ $entry['id'] }}">First Name:</label>
                                    <input id="given-name input-field-white" class="form-control mr-sm-2" type="text"
                                        name="given-name[]" style="color: white;"
                                        placeholder="{{ $entry['givenName'] }}"></input>
                                    <br>
                                    <!-- familyName-->
                                    <label for="family-name" id=" {{ $entry['id'] }}">Last Name:</label>
                                    <input id="family-name input-field-white" class="form-control mr-sm-2"
                                        type="text" name="family-name[]" style="color: white;"
                                        placeholder="{{ $entry['familyName'] }}"></input>
                                    <br>
                                    <!-- dateOfBirth -->
                                    <label for="date-of-birth" id=" {{ $entry['id'] }}">Birthday:</label>
                                    <input id="date-of-birth input-field-white" class="form-control mr-sm-2"
                                        type="text" name="date-of-birth[]" style="color: white;"
                                        placeholder="{{ $entry['dateOfBirth'] }}"></input>
                                    <br>
                                    <!-- nationality -->
                                    <label for="nationality" id=" {{ $entry['id'] }}">Nationality:</label>
                                    <input id="nationality input-field-white" class="form-control mr-sm-2"
                                        type="text" name="nationality[]" style="color: white;" value=""
                                        placeholder="{{ $entry['nationality'] }}"></input>
                                    <br>
                                    <p style="color: white">Please edit carefully. After the 'tab' on the 'Save'
                                        button<br>
                                        the Data goes directly to the Database and will be permanently<br>
                                        changed!</p><br>
                                </div>
                            </div>
                        @endforeach
                    </div><br>
                    <div class="btn-outline-success my-2 my-sm-0" style="display: flex; justify-content: flex-end">
                        <button id="edit-button" class="btn btn-primary" type="submit">Applicate</button>
                    </div>
                </div>
            </form>
        </div>
    @elseif($switch === 'DEFAULT')
        <div class="sidebar-island" style="display: none">
            <script>
                document.getElementsByClassName('sidebar')[0].style.display = 'none';
                document.getElementsByClassName('content')[0].style.width = '100%';
                document.getElementsByClassName('content')[0].style.transition = 'width 4s';
            </script>
        </div>
    @endif
@endif
