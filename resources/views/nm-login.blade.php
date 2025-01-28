<x-nm-app>
    <div class="form-container">
        <div class="entry-form">
            <div>
            <x-nm-logo/>
            </div>
            <form action="/loginh" method="POST" class="form-details">
                @csrf
                <input type="text" name="email" placeholder="Email" id="username" required>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <x-nm-submit-btn value="login"/>
            </form>
                <ul style="color: red;list-style: none;padding:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            <div>
                <p>
                    Don't have an account?
                    <a href="/signup">create one</a>
                </p>
            </div>
        </div>
    </div>
</x-nm-app>