<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>

<div class="container">
    <input type="hidden" id="update_count_message" value="0"/>

    <div id="new_count_message"></div>
    <div class="row">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="user" value="pruthvi">
        <textarea class="form-control msg"></textarea>
        <br/>
        <input type="button" value="Send" class="btn btn-success send-msg">

        <div class="col-lg-8 col-lg-offset-2">
            <div id="messages"></div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {

        $(document).on("click", ".send-msg", function () {

            var dataString = {
                id: $(this).attr('id')
            };
//            $(".send-msg").click(function (e) {

            var token = $("input[name='_token']").val();
            var user = $("input[name='user']").val();
            var msg = $(".msg").val();
            if (msg != '') {
                $.ajax({
                    type: "POST",
                    url: '{!! URL::to("send") !!}',
                    dataType: "json",
                    data: {'_token': token, 'message': msg, 'user': user},
                    success: function (data) {
                        socket.emit('update_count_message', {
                            update_count_message: $('#update_count_message').val()
                        });

                        socket.emit('new_message', {'message': msg, 'user': user}
                        );

                        $(".msg").val('');
                    }
                });
            } else {
                alert("Please Add Message.");
            }
//            })
        });
    });
    var socket = io.connect('http://localhost:8899');
    socket.on('new_count_message', function (data) {

        $("#new_count_message").html(data.new_count_message);

    });
    socket.on('update_count_message', function (data) {
        $("#new_count_message").html(parseInt(data.update_count_message) + 1);

    });
    socket.on('new_message', function (data) {
        console.log('data', data);
        $("#messages").append("<strong>" + data.user + ":</strong><p>" + data.message + "</p>");
    });
</script>