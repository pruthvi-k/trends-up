<html>
<head>
    <title>Modal Example</title>
    <link rel="stylesheet" href="{{url('/js/chatApp/chat.css')}}">
</head>
<body>
<button id="trigger" class="trigger-button chat-window" type="button">Launch Modal</button>

<button class="chat-window" data-username="pruthvi" type="button">User A</button>

<button class="chat-window" data-username="nishi" type="button">User B</button>

<div id="content">
    <h1>Look at me!</h1>

    <p>I'm a modal window.</p>
</div>

<script src="{{url('/js/chatApp/window.js')}}" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>