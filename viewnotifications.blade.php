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
            <form action="redviewsubmissions" id="myForm">
                <input type='hidden' name='abcdd' id="abcdd" value="">
            </form>
            <div style="max-width: 50%; margin-top: 10px;margin-left: 250px;">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Notification</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($getselected as $key => $data)
                    <tr id="rowid" onclick="red(this,{{$data->nid}}); ">
                        <td>A new candidate with skill in <b>{{$data->skill}}</b> was added!</td>
                        <td>
                            @if ($data->status == '0')
                            <h6>UNREAD</h6>
                            @elseif ($data->status == '1')
                            <h6>READ</h6>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>      
    </div>
    <script type="text/javascript">
        function red(el,id){
            var abc=id;
            $("table").on('click','tr',function(e){
                e.preventDefault();
                var id = abc;
                var $form = $('#myForm');
                $form.find('input').val(id);
                console.log("submitted"+abc);
                $form.submit();
            });
        }
    </script>
</body>
</html>
