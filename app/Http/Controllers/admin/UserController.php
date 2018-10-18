<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

	public function getProfile() 
    {
    	\Meta::set('title','پروفایل');

        return view('admin.profile');
    }

    public function getLogout()
    {
        \Auth::logout();
        
        return redirect('/user/login');
    }

    public function getManage(Request $request)
	{
		\Meta::set('title','مدیریت کاربران');

		$users = \App\User::orderBy('id', 'desc')->where('first_name', 'like', '%'.$request->name.'%')->orWhere('last_name', 'like', '%'.$request->name.'%')->paginate(self::PAGE_SIZE)->appends(['name' => $request->name]);
		
		return view('admin.manage')->withUsers($users);
	}

    public function postRole(Request $request)
	{
		$this->validate($request, [
			'role_id' => 'required|in:' . implode(",", \App\Models\Role::orderBy('id', 'asc')->pluck('id')->toArray()),
			'user_id' => 'required|in:' . implode(",", \App\User::orderBy('id', 'asc')->pluck('id')->toArray()),
		]);
		\App\User::where('id', $request->get('user_id'))->first()->roles()->sync([$request->get('role_id')], false);

		return redirect()->back();
	}

	public function postProfile(Request $request)
	{
		\Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric',
            'user_image' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:4000',
        ])->validate();
        \App\User::where('id', \Auth::id() )->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);

		$file = $request->files->get('user_image');
		if($file){
			$path = $file->getRealPath();
			$data = file_get_contents($path);
			$base64 = base64_encode($data);
			$image = new \App\Models\Image;
			$image->data = $base64;
			$image->description = 'user_profile';
			$image->original_name = $file->getClientOriginalName();
			$image->mime_type = $file->getMimeType();
			$image->size = $file->getSize();
			$image->save();
			$user_image = new \App\Models\UserImage;
			$user_image->user_id = \Auth::id();
			$user_image->image_id = $image->id;
			$user_image->save();
		}
        $request->session()->flash('alert-success', 'تغییرات شما با موفقیت انجام شد.');

		return redirect()->back();
	}
}
