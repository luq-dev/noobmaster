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
            <div>
                <p>
                    Don't have an account?
                    <a href="/signup">create one</a>
                </p>
            </div>
        </div>
    </div>
</x-nm-app>