<x-nm-app page_title='{{ $username }}'>
    <div class="page-container">
        <x-nm-header username="{{$auth_user}}"/>
        <!-- <div class="user-community-title"><span>Your Communities</span></div>
        <div class="users-communities">
            <x-nm-user-community/>
        </div> -->
        <div id="account-delete-section">
            <form method="POST" action="/deluser">
                @csrf
                <button id="delete-account-btn">Delete Account</button>
            </form>
        </div>
    </div>
</x-nm-app>
