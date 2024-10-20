@extends('user.form_master')
@if (Auth::check())
    @section('form-additional-fields')
        <tr>
            <td>
                <label for="{{$routeType}}-description">Description:</label>
            </td>
            <td>
                <input class="input-text" type="text" id="{{$routeType}}-description" name="{{$routeType}}-description"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="{{$routeType}}-profile-picture">Profile Picture:</label>
            </td>
            <td>
                <input type="file" id="{{$routeType}}-profile-picture" name="{{$routeType}}-profile-picture"/>
            </td>
        </tr>
    @endsection
    @section('form-script')
        <script type="module" async="false">
            import {USER} from '/js/src/constants.js';

            //window.addEventListener(USER.EVENT.FORM_LOADED, (event) => {
            function preloadFromData(){
                var usernameField = document.getElementById("edit-username");
                usernameField.value = "{{Auth::user()->username}}";

                var handleField = document.getElementById("edit-handle");
                handleField.value = "{{Auth::user()->handle}}";

                var emailLabel = document.getElementById("edit-email-label");
                emailLabel.remove();

                //@TODO: Add middleware to avoid security risk from unwanted user input.
                var emailField = document.getElementById("edit-email");
                emailField.remove();

                //@TODO: Add middleware to avoid security risk from unwanted user input.
                var passwordLabel = document.getElementById("edit-password-label");
                passwordLabel.remove();

                //@TODO: Add middleware to avoid security risk from unwanted user input.
                var passwordField = document.getElementById("edit-password");
                passwordField.remove();

                var firstNameField = document.getElementById("edit-firstname");
                firstNameField.value = "{{Auth::user()->firstname}}";
                
                var middleNameField = document.getElementById("edit-middlename");
                middleNameField.value = "{{Auth::user()->middlename}}";

                var lastNameField = document.getElementById("edit-lastname");
                lastNameField.value = "{{Auth::user()->lastname}}";

                var countryField = document.getElementById("edit-country");
                countryField.value = "{{Auth::user()->country}}";

                var birthYearField = document.getElementById("edit-birthyear");
                var birthMonthField = document.getElementById("edit-birthmonth");
                var birthDayField = document.getElementById("edit-birthday");

                let birthdate = "{{Auth::user()->birthdate}}";
                birthdate = birthdate.toString();
                let birthyear = birthdate.slice(0, 4);
                let birthmonth = birthdate.slice(5, 7);
                let birthday = birthdate.slice(8, 10);

                birthYearField.value = birthyear;
                birthMonthField.value = birthmonth;

                let gender = "{{Auth::user()->gender}}";

                birthDayField.value = birthday;

                if(gender == 'M'){
                    document.forms["edit-form"]["edit-gender-male"].checked = true;
                }else{
                    document.forms["edit-form"]["edit-gender-female"].checked = true;
                }
            }

            window.loadFormContent().then(preloadFromData);
         // });
        </script>
    @endsection

    @section('form-additional-buttons')
        <input class="small-button" onclick="history.back()" type="button" id="{{$routeType}}-cancel" name="{{$routeType}}-cancel" value="Cancel"/>
    @endsection
@else
    @section('content')
        <h1>Not logged in!</h1>
        <button onclick="navigate('{{route('user.login')}}')">Log in</button>
    @endsection
@endif