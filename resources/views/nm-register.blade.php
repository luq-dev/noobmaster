<x-nm-app page_title="Sign Up">
<div class="form-container">
    <div class="entry-form">
        <x-nm-logo/>
        <form action="/register" method="POST" class="form-details">
            @csrf
            <input type="text" name="username" placeholder="Username" id="">
            <input type="email" name="email" placeholder="Email" id="username">
            <input type="password" name="password" placeholder="Password" id="password">
            <input type="date" name="dob" id="" required>
            <x-nm-submit-btn value="Sign Up"/>
        </form>
                <ul style="color: red;list-style: none;padding:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
        <div>
            <p>
                Already have an account?
                <a href="/login">Log In</a>
            </p>
        </div>
    </div>
</div>
</x-nm-app>