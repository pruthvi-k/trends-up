<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FiveOne Socket.io</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Send message</div>
                <form action="sendmessage" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user" value="pruthvi">
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
    var socket = io.connect('http://localhost:8890');
    socket.on('message', function (data) {
        data = jQuery.parseJSON(data);
        $("#messages").append("<strong>" + data.user + ":</strong><p>" + data.message + "</p>");
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
                data: {'_token': token, 'message': msg, 'user': user},
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