@include('header')

        <section id="content">
            <h1>Log In or Sign Up</h1>
            <p>Already had an account? Login.</p>
            <form action="{{route('user.store')}}" method="post" name="login-form" autocomplete="on">
                @csrf
                @method('PUT')
                <table class="form-table">
                    <colgroup>
                        <col class="form-table-label"/>
                        <col class="form-table-field"/>
                    </colgroup>
                    <tr>
                        <td>
                            <label for="login-email">Email: </label>
                        </td>
                        <td>
                            <input class="input-text" type="text" id="login-email" name="login-email"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="login-password">Password: </label>
                        </td>
                        <td>
                            <input class="input-text" type="password" id="login-password" name="login-password"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="small-button" type="submit">
                            <input class="small-button" type="reset">
                        </td>
                        
                    </tr>
                </table>
            </form>

            <p>Don't have an account? <a href="{{route('user.create')}}">Sign Up.</a></p>
        </section>

@include('footer')