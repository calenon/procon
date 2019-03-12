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
        <div id='container'style="position:absolute;top: 10%; left: 40%;height:90%;width:20%;display:block;">
              <h1 style="margin-left:23px;">Manage Currencies</h1>
              <p style="margin-left:23px; display: inline;">From:</p>
              <p style="margin-left:50px; display: inline;">To:</p>
              <p style="margin-left:72px; display: inline;">Ratio:</p>
            <div id='mydata'>
            <!-- Display all the data from the currencies database-->
            @foreach ($currencies as $key => $value)
            <div id="{{$value['id'].'container'}}">
              <input type="checkbox" id="{{$value['id']}}" class= "checkbox">
              <input type="text"  value="{{$value['currencyFrom']}}" defaultValue="{{$value['currencyFrom']}}" id="{{$value['id'].'currencyFrom'}}" class="{{$value['id'].'class'}} Letters" style="height:40px;width:86px" readonly>
              <input type="text"  value="{{$value['currencyTo'] }}" defaultValue="{{$value['currencyTo'] }}" id="{{$value['id'].'currencyTo'}}" class="{{$value['id'].'class'}} Letters" style="height:40px;width:86px" readonly>
              <input type="text"  value="{{$value['ratio'] }}" defaultValue="{{$value['ratio'] }}" id="{{$value['id'].'ratio'}}" class="{{$value['id'].'class'}} Numeric"style="height:40px;width:86px" readonly>
              <br><br>
            </div>
            @endforeach
            </div>
            <div id= "buttons" style="margin-left:23px">
              <input type="button" id="button_edit" value="Edit"style="height:46px;width:91px;">
              <input type="button" id="button_delete" value="Delete"style="height:46px;width:91px;">
              <input type="button" id="button_Add" value="Add" class="toggle" style="height:46px;width:91px;">
            </div>
       </div>
       <div id='container_add'style="position:absolute;top: 10%; left: 40%;height:90%;width:40%;display:none;">
             <h1 style="margin-left:23px;">Insert New </h1>
             <p style="margin-left:23px; display: inline;">From:</p>
             <p style="margin-left:50px; display: inline;">To:</p>
             <p style="margin-left:72px; display: inline;">Ratio:</p>
           <div id="small_container"  style="margin-left:23px;">
             <input type="text" id="insert_currencyFrom_input" class="Letters" style="height:40px;width:86px">
             <input type="text" id="insert_currencyTo_input" class="Letters" style="height:40px;width:86px">
             <input type="text" id="insert_ratio_input" class="Numeric" style="height:40px;width:86px">
             <input type="button" id="button_Insert" value="Insert"style="height:46px;width:91px;">
             <input type="button" id="button_Back" value="Back" class="toggle" style="height:46px;width:91px;">
           </div>
       </div>

    </body>
</html>
<script src="{{ URL::asset('/js/Validate_inputs.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('/js/Insert_btn.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('/js/Add_btn.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('/js/Edit_btn.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('/js/delete_btn.js') }}" type="text/javascript" ></script>
