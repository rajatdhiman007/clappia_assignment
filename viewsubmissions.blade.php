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
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>C.No</th>
                        <th>Candidate Name</th>
                        <th>Experience(yrs)</th>
                        <th>Preferred Location</th>
                        <th>Joining Date</th>
                        <th>Skills</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($submissions as $key => $data)
                    <tr>
                        <td>{{$data->nsid}}</td>
                        <td>{{$data->cname}}</td>
                        <td>{{$data->cexp}}</td>
                        <td>{{$data->cjoblocation}}</td>
                        <td>{{$data->cjoindate}}</td>
                        <td>{{$data->skill}}</td>
                        <td>{{$data->gender}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>      
    </div>
</body>
</html>
