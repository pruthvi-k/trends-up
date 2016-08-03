<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FiveOne Socket.io</title>
</head>
<body>
<div class="container">

    <li class="login page">
        <div class="form">
            <h3 class="title">What's your nickname?</h3>
            <input class="usernameInput" name="user" type="text" maxlength="14"/>
            <button onclick="setUsername()">Go</button>
        </div>
    </li>

    <div class="row chat page">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <input class="toUser" id="toUser" type="text"/>

                <div class="panel-heading">Send message</div>
                <form action="sendmessage" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{--<input type="text" name="user" id="user" value="pruthvi">--}}
                    <textarea class="form-control msg"></textarea>
                    <br/>
                    <input type="button" value="Send" class="btn btn-success send-msg">
                </form>
            </div>
            <div id="messages"></div>
        </div>
    </div>
</div>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
    $(".chat.page").hide();

    // Sets the client's username
    function setUsername() {
        socket.emit('add user', $(".usernameInput").val());
//        $(".usernameInput").val('');
        $(".login.page").hide();
        $(".chat.page").show();
    }


    var socket = io.connect('http://localhost:8899');

    socket.on("test-channel:Focalworks\\ChatApp\\Events\\ChatMessage", function (data) {
        console.log('data from test channel', data);
        var user = data.user;
        if (data.self) {
            user = "you";
        }
        $("#messages").append("<strong>" + user + ":</strong><p>" + data.message + "</p>");
    });


    $(".send-msg").click(function (e) {
        e.preventDefault();
        var token = $("input[name='_token']").val();
        var user = $("input[name='user']").val();
        var msg = $(".msg").val();
        if (msg != '') {
            $.ajax({
                type: "POST",
                url: '{!! URL::to("sendmessage") !!}',
                dataType: "json",
                data: {'_token': token, 'message': msg, 'user': user, 'to': $(".toUser").val()},
                success: function (data) {
                    $(".msg").val('');
                }
            });
        } else {
            alert("Please Add Message.");
        }
    })
</script>
@yield('footer')
</body>
</html>