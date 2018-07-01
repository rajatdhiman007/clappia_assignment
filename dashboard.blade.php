@extends('/clappia/pannel')
<!doctype html>
<html lang="en">
<body style="max-width:100%;height:auto;">
    <div class="wrapper">
        <div class="main-panel">
            <nav  class="navbar navbar-default navbar-fixed">
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

            <div style="margin-right: 100px; margin-top: 40px;">
                <div >
                    <div style="margin-right: 90px; margin-top: 50px;">
                        <div style="border-style: double; width: 50%;margin-top: 50px;margin-bottom: 50px; margin-left: 310px;">       
                            <div style="margin-left: 40px; margin-top: 30px;position: center; border-width: 20px;padding-bottom: 50px;">
                                <form action="newsubmission" method="post">
                                    <label>Candidate Name*: <input type="text" name="cname" required></label><br>
                                    <label>Experience in years*: <input type="number" name="cexp" required></label><br>
                                    <label>Preferred job location:  
                                        <select name="cjoblocation" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" > 
                                            <option value="Bangalore">Bangalore</option>
                                            <option value="Hyderabad">Hyderabad</option>
                                            <option value="Pune">Pune</option>
                                            <option value="Gurgaon">Gurgaon</option>
                                        </select>
                                    </label><br>
                                    <label>Date when the candidate can join: <input type="date" name="cjoindate"></label><br>
                                    <label>
                                        Skills: <label><input type="checkbox" name="skill[]" value="java">Java</label><br>
                                        <label id="sp1"><input type="checkbox" name="skill[]" value="python">Python</label><br>
                                        <label id="sp1"><input type="checkbox" name="skill[]" value="html">HTML</label><br>
                                        <label id="sp1"><input type="checkbox" name="skill[]" value="css">CSS</label><br>
                                        <label id="sp1"><input type="checkbox" name="skill[]" value="angular">Angular</label><br>
                                    </label><br>
                                    <label>
                                        Gender: <label ><input type="radio" name="gender" value="male">Male</label><br>
                                        <label id="sp2"><input type="radio" name="gender" value="female">Female</label><br>
                                        <label id="sp2"><input type="radio" name="gender" value="other">Other</label><br>
                                    </label><br>
                                    <input type="hidden" name="name" value={{$name}}>
                                    <input type="reset" class="w3-button w3-grey" value="Reset" />
                                    <input type="submit" class="w3-button w3-green" value="Submit" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</body>
</html>
