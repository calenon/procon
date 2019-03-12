<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta charset="utf-8">


        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
      <div id='container'style="position:absolute;top: 10%; left: 43%;height:90%;width:50%;display:block;">
            <h1 style="margin-left:45px;">Calculator</h1>
            <select id="Select_From" style="height:46px;width:116px;background-color: #DCDCDC" >
            <option value="" disabled selected>Select Currency</option>
            <!-- Display all the available currency conversion options-->
            @foreach ($options as $options)
            <option value="{{$options}}">{{$options}}</option>
            @endforeach
            </select>
            <input type="text" id="input_Value" value="" placeholder="Type Amount" class="Numeric" style="height:40px;width:116px"><br><br>
            <input type="button" id="button_go" value="Convert"style="height:46px;width:86px;margin-left:75px;" > <br><br>
            <select id="Select_To" style="height:46px;width:116px;background-color: #DCDCDC" >
            </select>
            <input type="text" id="output_Value" placeholder="converted Amount"style="height:40px;width:116px" readonly>
            <br><br>
            <span id="result"></span>
     </div>
    </body>
</html>

<script type="text/javascript">var currencies = {!!json_encode($currencies)!!};</script>
<script src="{{ URL::asset('/js/Dynamic_Select_option.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('/js/Validate_inputs.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('/js/Calculate_btn.js') }}" type="text/javascript" ></script>
