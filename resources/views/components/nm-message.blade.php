@props(
    [
        'sender'=>'userX',
        'message'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ex neque consequatur ea maxime cupiditate deleniti tempore? Aspernatur, facere repudiandae.',
        'sent_date'=>'Dec 8, 2024',
        'sent_time'=>'21:44'
    ]
)

<div class="message-body">
<div class="username"> {{ $sender }} </div>
<div class="message"> {{ $message }} </div>
<div class="date-time">
<span class="date"> {{ $sent_date }} </span> &#x2022 <span class="time">{{ $sent_time }} </span>
</div>
</div>