<?php
// Use Redirect;
use Illuminate\Support\Facades\Redirect;
Route::get('loginclappia', function()
{
	$flag_update=DB::table('user_details')->update(['flag' => 0]);
	// return View::make('/JPEG_project/login');
	return View::make('/clappia/loginscreen');
});

Route::get('dashboard', function()
{
	$na=DB::table('user_details')->where('flag','=','1')->get();
	$name=$na[0]->name;
	return View::make('/clappia/dashboard')->with('name',$name);
});

Route::get('viewsubmissions', function()
{
	header("viewsubmissions");
	$na=DB::table('user_details')->where('flag','=','1')->get();
	$name=$na[0]->name;
	$submissions=DB::table('new_submissions')->get();

	// dd($name);
	return View::make('/clappia/viewsubmissions')->with('submissions',$submissions)->with('name',$name);
});

Route::get('redviewsubmissions',function()
{
	$nid=$_GET['abcdd'];
	// dd($submittedID);
	$na=DB::table('user_details')->where('flag','=','1')->get();
	$name=$na[0]->name;
	$submissions=DB::table('new_submissions')->get();
	$submissions=DB::table('new_submissions')->get();
	$abc=DB::table('notifications')->where('nid',$nid)->update(['status' => '1']);
	return View::make('/clappia/viewsubmissions')->with('submissions',$submissions)->with('name',$name);
	
});

Route::get('configurenotifications', function()
{
	$na=DB::table('user_details')->where('flag','=','1')->get();
	$name=$na[0]->name;
	$getemails=DB::table('user_details')->get();
	$getnotifications=DB::table('notifications')->get();
	return View::make('/clappia/configurenotifications')->with('getnotifications',$getnotifications)->with('name',$name)->with('getemails',$getemails);
});

Route::post('addnotification', function()
{
	$na=DB::table('user_details')->where('flag','=','1')->get();
	$name=$na[0]->name;
	$getemails=DB::table('user_details')->get();
	$nskill=Input::get('nskill');
	$nemailid=Input::get('nemail');
	// $nno=DB::table('user_details')->select('nid')->where('nemail','=',$nemail)->get();
	$nn=DB::table('user_details')->select('name')->where('email','=',$nemailid)->get();
	$nname=$nn[0]->name;
	// dd($nname);
	// $check=DB::table('notifications')->where('nemail','=',$nemailid and'nname','=',$nname)->get();
	// dd($check);
	// if(!$check)
	$addnew=DB::table('notifications')->insert(array('nname' => $nname ,'skill' => $nskill,'nemail' => $nemailid, 'status'=>'0'));
	$getnotifications=DB::table('notifications')->get();
	// dd($getnotifications);
	return View::make('/clappia/configurenotifications')->with('getnotifications',$getnotifications)->with('name',$name)->with('getemails',$getemails);
	// return $getnotifications;
});

Route::get('viewnotifications', function()
{
	$na=DB::table('user_details')->where('flag','=','1')->get();
	$name=$na[0]->name;
	$email=$na[0]->email;
	$skill11=DB::table('new_submissions')->select('skill')->get();
	$skill22=DB::table('notifications')->select('skill')->get();
	$getselected=DB::table('notifications')->where('nemail','=',$email)->get();
	// dd($getselected);
	return View::make('/clappia/viewnotifications')->with('name',$name)->with('getselected',$getselected);
});

Route::post('login_control_clappia', function()
{
	$email=Input::get('email');
	$password=Input::get('password');
	$check = DB::table('user_details')->where('email', '=', $email)->where('password','=', $password)->get();
	if(!$check)
	{
		$message = "Wrong username or password!!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		return View::make('/clappia/loginscreen');  
	}
	else
	{
		$flag_update=DB::table('user_details')->where('email', $email)->update(['flag' => 1]);
		$nameclappia= DB::table('user_details')->where('email', $email)->select('name')->get();
		$name=$nameclappia[0]->name;
       	// dd($name);
		View::make('/clappia/pannel')->with('name',$name);
		return View::make('/clappia/dashboard')->with('name',$name);	
	}
});

Route::post('newsubmission', function()
{
	$name=Input::get('name');
	$cname=Input::get('cname');
	$cexp=Input::get('cexp');
	$cjoblocation=Input::get('cjoblocation');
	$cjoindate=Input::get('cjoindate');
	$skill=Input::get('skill');
	$gender=Input::get('gender');
	// dd($email);
	$insertnew=DB::table('new_submissions')->insert(array('cname' => $cname ,'cexp' => $cexp,'cjoblocation' => $cjoblocation,'cjoindate' => $cjoindate,'skill'=>json_encode($skill),'gender'=>$gender));
	$casts = ['skill' => 'json'];
    // dd($name);
	if ($insertnew) 
	{
		$message = "Candidate data saved successfully!!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	return View::make('/clappia/dashboard')->with('name',$name);
});

?>