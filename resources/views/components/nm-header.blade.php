@props(['username'=>'username'])
<div class="header">
            <x-nm-logo/>
            <div class="user"><a href="/u/{{ $username }}" class="profile-link">{{ $username }}</a> &#x2022 
            <form action="/logout" method="post">
                @csrf
                <button>logout</button>
            </form>
</div>
</div>