<x-nm-app title="Game X">

<div class="page-container">
        <x-nm-header username="{{$auth_user}}"/>
        <div class="chat-container">
            <div class="chat-title"><span> {{ $community_name }}</span> Chat</div>
            <div class="chat">
                <x-nm-message/>
                <x-nm-message sender="Someguy"/>
            </div>
            <div class="message-input">
                <form action="" class="message-input-form">
                    <textarea name="message" id="message" placeholder="Be respectful.." rows="1"></textarea>
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>

    </div>

</x-nm-app>