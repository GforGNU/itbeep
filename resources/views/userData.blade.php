<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>itbeep</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div><img style="width:15rem; margin-left:auto; margin-right:auto; margin-top:2rem; display:block; " src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fmoustasharktc.com%2FContent%2FSettings%2Fimages%2Fimage-f8e03def-1ad8-4eeb-91ea-0fac41f366a1.png&f=1&nofb=1">
    </div>

<form action="{{ action('DataController@store') }} " method="POST" >
@csrf
    <div class="col-md-4 mx-auto text-left mt-4">
        <div class="form-group" >
            <label for="exampleInputEmail1">Name</label>
            <input  name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mobile</label>
            <input  name="mobile" class="form-control" id="exampleInputPassword1" placeholder="Enter mobile">
        </div>
        <button type="button" class="btn pr-4 pl-4" style="background-color:#23b1a5 !important; color:#fff;" data-toggle="modal" data-target="#myModal">Next</button>
    </div>


  <!-- Modal1 -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal1 content -->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Services</h4>
        </div>
        <div class="modal-body">
        @foreach($services as $service)
         <button type="button" class = "btn pr-4 pl-4" style="background-color:#ececec !important; color:black; " id="{{$service->service_name}}" value="0" name="{{$service->service_name}}" onClick="choose(this.id)" >{{$service->service_name}}</button>
        @endforeach
        <input id="servicehid1" type="hidden" name="service_one" value="0" />
        <input id="servicehid2" type="hidden" name="service_two" value="0" />
        <input id="servicehid3" type="hidden" name="service_three" value="0" />
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" data-toggle="modal" data-target="#myModal2" class="btn btn-default" >Next</button>
        </div>

    <!-- Modal2 -->
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">

            <!-- Modal2 content -->
            <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Level of Interest</h4>
                    </div>

                    <div class="modal-body">
                        @foreach($interests as $interest)
                        <button type="button" class = "btn pr-4 pl-4" style="background-color:#ececec !important; color:black; " id="{{$interest->interest_level}}" value="0" name="interest_level" onClick="choose2(this.id)" >{{$interest->interest_level}}</button>
                        @endforeach
                        <input id="interesthid" type="hidden" name="interest_level" value="level_one" />

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-default" >submit</button>
                    </div>
                    </div>
        
            </div>
        </div> 
</form>


<div class="container">
@if(count($errors)>0)

<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    </ul>
</div>
@endif

@if(\Session::has('success'))
    <div class="alert alert-success">
    <p>{{\Session::get('success')}}</p>
    </div>
@endif
</div>





<script type="text/javascript">
        function choose(id) {
            let service1 = document.getElementById("service_one").value;
            let service2 = document.getElementById("service_two").value;
            let service3 = document.getElementById("service_three").value;
            if ( id == 'service_one' && service1 == 0) {
                document.getElementById("service_one").value = 1;
                document.getElementById("servicehid1").value = 1;
                document.getElementById("service_one").style = "background-color:#23b1a5 !important; color:#fff;";
            }else if( id == 'service_one' && service1 == 1){
                document.getElementById("service_one").value = 0;
                document.getElementById("servicehid1").value = 0;
                document.getElementById("service_one").style = "background-color:#ececec !important; color:black;";
            }
            if ( id == 'service_two' && service2 == 0) {
                document.getElementById("service_two").value = 1;
                document.getElementById("servicehid2").value = 1;
                document.getElementById("service_two").style = "background-color:#23b1a5 !important; color:#fff;";
            }else if( id == 'service_two' && service2 == 1){
                document.getElementById("service_two").value = 0;
                document.getElementById("servicehid1").value = 0;
                document.getElementById("service_two").style = "background-color:#ececec !important; color:black;";
            }
            if ( id == 'service_three' && service3 == 0) {
                document.getElementById("service_three").value = 1;
                document.getElementById("servicehid3").value = 1;
                document.getElementById("service_three").style = "background-color:#23b1a5 !important; color:#fff;";
            }else if( id == 'service_three' && service3 == 1){
                document.getElementById("service_three").value = 0;
                document.getElementById("servicehid1").value = 0;
                document.getElementById("service_three").style = "background-color:#ececec !important; color:black;";
            }}




            function choose2(id) {

            if ( id == 'level_one' ) {
                document.getElementById("interesthid").value = "level_one";
                document.getElementById("level_one").style = "background-color:#23b1a5 !important; color:#fff;";
                document.getElementById("level_two").style = "background-color:#ececec !important; color:black;";
                document.getElementById("level_three").style = "background-color:#ececec !important; color:black;";
            }
            if ( id == 'level_two') {
                document.getElementById("interesthid").value = "level_two";
                document.getElementById("level_two").style = "background-color:#23b1a5 !important; color:#fff;";
                document.getElementById("level_one").style = "background-color:#ececec !important; color:black;";
                document.getElementById("level_three").style = "background-color:#ececec !important; color:black;";
            }
            if ( id == 'level_three' ) {
                document.getElementById("interesthid").value = "level_three";
                document.getElementById("level_three").style = "background-color:#23b1a5 !important; color:#fff;";
                document.getElementById("level_two").style = "background-color:#ececec !important; color:black;";
                document.getElementById("level_one").style = "background-color:#ececec !important; color:black;";
            }}
</script>






    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>