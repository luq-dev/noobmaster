@props(['community_name'=>"Community Name"])

<div class="joined-communities">
<div>{{ $community_name }}</div>
<div>
    <form action="/delcomm">
        <button>Leave</button>
    </form>
    <br>
<a href=""><button>Visit</button></a>
</div>
</div>