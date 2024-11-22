@extends('user.form_master')
@section('form-script')
    <script type="module" async="false">
        import {USER} from '/js/src/constants.js';
        window.loadFormContent();
    </script>
@endsection