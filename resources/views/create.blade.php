@include('header')

{{-- Soon, this form must be able to validate the user role type (e.g., member or admin) --}}
<h1>Create Blog</h1>
<form action="{{route('post.store', 'PostController')}}" method="post">
    @csrf
    <table class="form-table">
        <colgroup>
            <col class="form-table-label"/>
            <col class="form-table-field"/>
        </colgroup>
        <tr>
            <td>
                <label for="create-title">Title: </label>
            </td>
            <td>
                <input class="input-text" type="text" id="create-title" name="create-title">
            </td>
        </tr>
        <tr>
            <td>
                <label for="create-content">Content: </label>
            </td>
            <td>
                <input class="input-text" type="text" id="create-content" name="create-content">
            </td>
        </tr>
        <tr>
            <td>
                <input class="small-button" type="submit" id="create-submit">
                <input class="small-button" type="reset" id="create-reset>">
            </td>
            
        </tr>
    </table>
</form>


@include('footer')