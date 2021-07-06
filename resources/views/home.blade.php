@extends('layouts.appHome')

@section('content')
    @if ($msg = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Command sent</strong>
        </div>
        {{-- {{ \Session::flush() }} --}}
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        {{-- {{ \Session::flush() }} --}}
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard (DISCONNECTION AND RECONNECTION RTU)</div>
                    <form class="col" style="margin-top:10px">
                        <select id="houselist" name="houselist" class="form-control select2">
                            <option value="none" selected="selected">Select house to start operation</option>

                            @foreach ($houseData as $data)
                                <option value='{{ $data->serial_number }}'>{{ $data->name }}</option>
                            @endforeach
                        </select>
                        {{-- </form> --}}

                    <div class="card-body">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h1 class="card-title" id='selecthouse'>Select house to get status</h1><br>

                            </div>
                        </div>
                        <div id="clientview" style=" display: none">
                            <div style="margin-bottom: 30px">
                                <div class="row " style="text-align: center; margin-bottom: 30px; ">
                                    <div class="col-md-4 col-sm-6 ">
                                        <h5>Red Phase Voltage</h5>
                                        <div class="blue-square-container ">
                                            <div id="R_volt" class="blue-square circlered ">207V
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 ">
                                        <h5>Yellow Phase Voltage</h5>
                                        <div class="blue-square-container ">
                                            <div id="Y_volt" class="blue-square circleyellow ">206V</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 ">
                                        <h5>Blue Phase Voltage</h5>
                                        <div class="blue-square-container ">
                                            <div id="B_volt" class="blue-square circleblue ">220V</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row " style="text-align: center; margin-bottom: 40px; ">
                                    <div class="col-md-4 col-sm-6 ">
                                        <h5>Red Phase Current</h5>
                                        <div class="blue-square-container ">
                                            <div id="R_Amp" class="blue-square circlered ">28.7A
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 ">
                                        <h5>Yellow Phase Current</h5>
                                        <div class="blue-square-container ">
                                            <div id="Y_Amp" class="blue-square circleyellow ">33.6A</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 ">
                                        <h5>Blue Phase Current</h5>
                                        <div class="blue-square-container ">
                                            <div id="B_Amp" class="blue-square circleblue ">66A</div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row " style="text-align: center">

                                    <div class="col-md-6 col-sm-6 ">
                                        <h5>Current Month Energy Purchase</h5>
                                        <div class="blue-square-container ">
                                            <div class="rcorners2" id="buy">
                                                650000.000
                                                <span style="font-size: 20px"> kWh</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-6 ">
                                        <h5>Current Month Energy Used Accumulation</h5>
                                        <div class="blue-square-container ">
                                            <div class="rcorners2" id="used">
                                                50000.000
                                                <span style="font-size: 20px"> kWh</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row " style="text-align: center">


                                </div>

                            </div>
                            <form>
                                {{ csrf_field() }}
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h1 class="card-title" id='selecthouse'>Control</h1><br>
                                        <input id='serialnumber' name="serialnumber" value="" type="hidden">
                                        <input id='housename' name="housename" value="" type="hidden">
                                    </div>
                                </div>

                                <div class="row" style="text-align: center; ">
                                    <div class="col-md-6">
                                        <h6><b>CONTROL</b></h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><b>FEEDBACK</b></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row" style="text-align: center; ">
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="row " type="checkbox" checked data-toggle="toggle"
                                                            data-width="200" id="ctrlbutA" data-on="Connected"
                                                            data-off="Disconnected" data-height="20" data-onstyle="success"
                                                            data-offstyle="danger">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div id="radio1" class="icheck-success d-inline">
                                                            <input type="radio" name="f1" checked id="radio1">
                                                            <label for="radio1">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center"><button id="clickaction" class="btn btn-dark" type="button">Take
                                        action</button></div>
                                {{--
                            </form> --}}

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
