@extends('/clappia/pannel')
<!doctype html>
<html lang="en">
<body style="max-width:100%;height:auto;">
    <div class="wrapper">
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">                
                        <a class="navbar-brand" href="#">Welcome <b>{{$name}}</b></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="loginclappia">
                                    <p>Log out</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div style="max-width: 100%; margin-top: 10px;">
                {{-- <button type="button" name="add" id="add_data" class="w3-button w3-teal" data-toggle="modal"; data-target="#myModal" style="margin-left: 10px;margin-bottom: 10px;">+ Add new notification</button> --}}
                <div>
                <form method="post" action="addnotification">
                  <label>Skill: <select name="nskill" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> 
                    <option value="">--Select--</option>
                    <option value="java">Java</option>
                    <option value="python">Python</option>
                    <option value="html">HTML</option>
                    <option value="css">CSS</option>
                    <option value="angular">Angular</option>
                </select>
            </label>
            <label>Email: <select name="nemail" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> 
                <option value="">--Select--</option>
                @foreach($getemails as $key => $data)
                <option value={{$data->email}}>{{$data->email}}</option>
                @endforeach
            </select>
        </label>
        <input type="submit" class="btn" value="Add" name="submit"  />
        
    </form>
                <div id="display_result" >
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>N.No</th>
                                <th>Skill</th>
                                <th>User to be notified</th>
                                <th>User email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getnotifications as $key => $data)
                            <tr>
                                <td>{{$data->nid}}</td>
                                <td>{{$data->skill}}</td>
                                <td>{{$data->nname}}</td>
                                <td>{{$data->nemail}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>      
            </div>
            <!-- Modal -->

</div>
</div>
</div>
</body>
</html>
