<div class="header">
            <x-nm-logo/>
            <div class="user">
            <form action="/logout" method="post">
                @csrf
                <button>logout</button>
            </form>
</div>
</div>