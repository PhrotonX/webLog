@extends('user.form_master')
@if (Auth::check())
    @section('form-script')
        <script>
            document.addEventListener("DOMContentLoaded", (event) => {
            alert("Script Loaded!");
            var usernameField = document.getElementById("edit-username");
            usernameField.value = "{{Auth::user()->username}}";

            var handleField = document.getElementById("edit-handle");
            handleField.value = "{{Auth::user()->handle}}";

            var emailLabel = document.getElementById("edit-email-label");
            emailLabel.remove();

            //Add middleware to avoid security risk
            var emailField = document.getElementById("edit-email");
            emailField.remove();

            //Add middleware to avoid security risk
            var passwordLabel = document.getElementById("edit-password-label");
            passwordLabel.remove();

            //Add middleware to avoid security risk
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
            let birthyear = birthdate.slice(0, 3);
            let birthmonth = birthdate.slice(4, 5);
            let birthday = birthdate.slice(6, 7);

            birthYearField.value = birthyear;
            birthMonthField.value = birthmonth;
            birthDayField.value = birthday;
        });
        </script>
    @endsection
@else
    @section('content')
        <h1>Not logged in!</h1>
        <button onclick="navigate('{{route('user.login')}}')">Log in</button>
    @endsection
@endif

