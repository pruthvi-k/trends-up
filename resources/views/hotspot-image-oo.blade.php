{{--<label>Image File:</label>--}}
{{--<input type="file" id="imageLoader" name="imageLoader"/>--}}
{{--<canvas id="imageCanvas"></canvas>--}}
{{--<script src="{{url('js/hotspot.js')}}"></script>--}}

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>X, Y Coordinates using JQuery</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"
            integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    {{--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"/>--}}
    {{--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"/>--}}
    {{--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>--}}
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<script>
    var base_url = '{{url('/')}}';
</script>
<div>
    <div><h1>HotSpot</h1></div>

    <div id="imgSpot">
        <img style="-webkit-user-select: none" src="{{url('images/exterior_2.png')}}"/>

        <div class="overlay" style="display: none"></div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="hotspotPopup">
            <form name="hotspotForm" id="hotspotForm">

                <input type="hidden" name="x" class="form-control" id="x" placeholder="x">
                <input type="hidden" name="y" class="form-control" id="y" placeholder="y">

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-offset-2 col-sm-10">
                    <textarea type="text" name="description" class="form-control" id="description"
                              placeholder="Description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="type" class="col-sm-2 control-label">Type</label>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input name="type" type="radio" value="video"> Video
                            </label>
                            <label>
                                <input name="type" type="radio" value="image"> Image
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Image</label>

                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="text" name="image" class="form-control"
                               value="image/exterior/popups/Driving_Pleasur/dual_pathsuspention.png" id="image"
                               placeholder="Image">
                    </div>
                </div>

                <div class="form-group">
                    <label for="video" class="col-sm-2 control-label">Video</label>

                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="text" name="video" class="form-control" value="/video/exterior/power_steering.mp4"
                               id="video" placeholder="Video">
                    </div>
                </div>

                <div class="form-group">
                    <label for="titleOnLeft" class="col-sm-2 control-label">Title on left</label>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input name="titleOnLeft" type="radio" value="true"> Yes
                            </label>
                            <label>
                                <input name="titleOnLeft" type="radio" value="false"> No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fuel_type" class="col-sm-2 control-label">Fuel Type</label>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input name="fuel_type" type="radio" value="Petrol"> Petrol
                            </label>
                            <label>
                                <input name="fuel_type" type="radio" value="Diesel"> Diesel
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-default" id="spot_text_btn">Submit</button>
                        <button type="button" class="btn btn-default cancel" id="cancel">Cancel</button>
                    </div>
                </div>
            </form>

            {{--<form>--}}

            {{--<textarea class="spot-text" name="title" id="title"></textarea>--}}
            {{--<label><input type="radio" value="Petrol" name="fuel">Petrol</label>--}}
            {{--<label><input type="radio" value="Diesel" name="fuel">Diesel</label>--}}
            {{--<input type="button" id="spot_text_btn" value="Done"/>--}}
            {{--title: "ePAS with Speed Sensitivity & Active Return",--}}
            {{--titleOnLeft: "true",--}}
            {{--description: "",--}}
            {{--type: "video",--}}
            {{--image: "",--}}
            {{--video: "/video/exterior/power_steering.mp4",--}}
            {{--fuel_type: "petrol"--}}
            {{--</form>--}}
        </div>
    </div>


    <button type="button" class="btn btn-default" id="create_json">Create JSON</button>
    <button type="button" class="btn btn-default" id="spot_json">Plot Spots</button>


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

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.85);
        z-index: 999;
        color: white;
        display: inline-block;
    }

    #imgSpot {
        width: auto;
        float: left;
        position: relative;
    }

    .hotspotPopup {
        z-index: 9999;
        position: absolute;
        top: 2%;
        /*left: 40%;*/
        background-color: white;
        width: 70%;

    }
</style>
<script>

    function HotSpot() {
//        this.x = "";
//        this.y = "";
//        this.title = "";
        this.spotList = [];
    }

    HotSpot.prototype = {
        construct: HotSpot,
        add: function () {
//            this.spotList.push({"x": this.x, "y": this.y, "title": this.title})
//            console.log(this.spotList);
        },

        remove: function (index) {
            this.spotList.splice(index - 1, 1);
        },

        prompt: function () {
            $(".hotspotPopup").show();//.html(this.popupHtml).fadeIn();
        },


        addSpot: function (x, y, form) {
            console.log('form data', form);
            this.spotList.push(form);
            console.log('spotlist', this.spotList);
        }
    };

    $(document).ready(function () {
        $(".hotspotPopup").hide();
        s = new HotSpot();
        var X, Y;
        $('img').click(function (e) {
            var offset = $(this).offset();
            X = (e.pageX - offset.left);
            Y = (e.pageY - offset.top);
            $('#x').val(X);
            $('#y').val(Y);
            $('.overlay').toggle();
            $(".hotspotPopup").slideDown();
        });

        $("#spot_text_btn").on("click", function () {
            s.addSpot(X, Y, $('#hotspotForm').serializeObject());
            plotSpots(s.spotList);
            $('.overlay').toggle();
            $('#hotspotForm')[0].reset();
            $(".hotspotPopup").fadeOut();
            return false;
        });

        $(".cancel").on("click", function () {
            $('.overlay').toggle();
            $('#hotspotForm')[0].reset();
            $(".hotspotPopup").fadeOut();
            return false;
        });

        $("#create_json").on('click', function () {

            data = s.spotList;
            console.log('post dat', data);
            $.ajax({
                type: "POST",
                url: base_url + "/hotspot",
                data: {
                    "data": data, "main_image": "/image/exterior/main/exterior_1.png",
                    "image_width": 1200,
                    "image_height": 530,
                    "image_ratio": 2.26,
                },
                success: function (data) {
                    $(".spot-list").html(data);
                }
            });

//            console.log(s.spotList);
//            plotSpots(s.spotList);
        });

        $("#spot_json").on('click', function () {
            $.getJSON(base_url + "/get/hotspot", function (res) {
                console.log(res.data);
                plotSpots(res.data.hotspot);
            })

        });

    })

    function plotSpots(data) {
        var index = 0;
        $.each(data, function () {
            console.log(index, this);
            index++;
            $("<div onClick='removeSpot(" + index + ", this)' class='spot'>" + index + "</div>").appendTo($("#imgSpot")).css({
                position: 'absolute',
                top: parseInt(this.y),
                left: parseInt(this.x)
            });
        })

    }

    function removeSpot(index, el) {
        el.remove();
        s.remove(index);
        console.log('spotlist', s.spotList);
    }
    $.fn.serializeObject = function () {
        var o = {};
        var data = this.serializeArray();
        $.each(data, function () {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
    $(function () {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
    });


</script>
</html>