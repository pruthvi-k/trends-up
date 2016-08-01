{{--<label>Image File:</label>--}}
{{--<input type="file" id="imageLoader" name="imageLoader"/>--}}
{{--<canvas id="imageCanvas"></canvas>--}}
{{--<script src="{{url('js/hotspot.js')}}"></script>--}}

<html>
<head>

    <title>X, Y Coordinates using JQuery</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
<div>
    <div><h1>HotSpot</h1></div>

    <div id="imgSpot">
        <img style="-webkit-user-select: none" src="{{url('images/exterior_2.png')}}"/>

        <div class="hotspotText"><textarea class="spot-text"></textarea>
            <button>Done</button>
        </div>
    </div>

    <div style="padding-top:20px;">
        <div id="coord" class="spot-list"></div>
    </div>

    <div id="jsonContainer"></div>


</div>
</body>
<style>
    .spot {
        min-height: 6px;
        min-width: 6px;
        max-height: 20px;
        max-width: 20px;
        background-color: red;
        z-index: 9999;
    }

    #imgSpot {
        width: auto;
        float: left;
        position: relative;
    }

    .hotspotText {
        position: absolute;
    }
</style>
<script>


    $(document).ready(function () {
        $(".hotspotText").hide();
        hotspot = [];
        spotListArea = $('.spot-list');
        $('img').click(function (e) {
            var offset = $(this).offset();
            var X = (e.pageX - offset.left);
            var Y = (e.pageY - offset.top);
//            $('#coord').text('X: ' + X + ', Y: ' + Y);
            createSpot(X, Y);
            console.log('spot', hotspot);
        });

        function createSpot(x, y) {
//            $.each(latitudes, function(index, value) {
            hotspot.push({'x': x, 'y': y});
            index = hotspot.length;

            var el = "<li>" + index + "  == X: " + x + ", Y: " + y + " <span data-index=" + index + " class='remove_spot_button'> - </span> </li> ";
            spotListArea.append(el);

            $(".hotspotText").css({top: y, left: x});
            $(".hotspotText").show();
            $("<div data-index='" + index + "' class='spot'>" + index + "</div>").appendTo($("#imgSpot")).css({
                position: 'absolute',
                top: y,
                left: x
            });

            spots = {"height": $('img').height(), "width": $('img').width(), "hotspot": hotspot};

        }

        $(".hotspotText button").on("click", function () {

        });

        function addSpot() {
            var txt = $(".hotspotText textarea").val();
            $("#jsonContainer").html(JSON.stringify(spots));
            $(".hotspotText textarea").val('');
            $(".hotspotText").hide();
        }

        $('.spot-list').on('click', '.remove_spot_button', function () {
            hotspot.splice($(this).data("index") - 1, 1);
            $(this).parent('li').remove()
        })


    });
</script>
</html>