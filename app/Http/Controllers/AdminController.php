<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // change password page
    public function changePasswordPage()
    {
        return view('admin.account.changePassword');
    }

    //  chanege pssword
    public function changePassword(Request $request)
    {
        $this->passwordValidationCheck($request);
        // $currentUserId = Auth::user()->id;
        // $user=User::where('id',$currentUserId)->first(); or
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHashValue = $user->password;
        if (Hash::check($request->oldPassword, $dbHashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($data);
            Auth::logout();
            return redirect()->route('auth#LoginPage');
        }
        return back()->with(['notMatch' => 'The Old Password not Match. Try Again!']);
    }
    // change  admin role
    public function changeRole($id)
    {
        $account = User::where('id', $id)->first();
        return view('admin.account.changerole', compact('account'));
    }
    //  direct admin details page
    public function details()
    {
        return view('admin.account.detail');
    }

    // direct admin profile page
    public function edit()
    {
        return view('admin.account.edit');
    }

    // update account
    public function update($id, Request $request)
    {

        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);

        // for image

        if ($request->hasFile('image')) {
            $dbImage = User::where('id', $id)->first();
            $dbImage = $dbImage->image;
            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }
            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }
        User::where('id', $id)->update($data);
        return redirect()->route('admin#details')->with(['updateSuccess' => 'Admin Account Updated...']);
    }
    // admin list
    public function list()
    {
        $admin = User::when(request('key'), function ($query) {
            $query->orWhere('name', 'like', '%' . request('key') . '%')
                ->orWhere('name', 'like', '%' . request('key') . '%')
                ->orWhere('email', 'like', '%' . request('key') . '%')
                ->orWhere('phone', 'like', '%' . request('key') . '%')
                ->orWhere('address', 'like', '%' . request('key') . '%')
                ->orWhere('gender', 'like', '%' . request('key') . '%');
        })->where('role', 'admin')->paginate(3);
        $admin->append(request()->all());
        return view('admin.account.adminlist', compact('admin'));
    }
    // admin delete account
    public function delete($id)
    {
        User::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Admin Account Deleted...']);
    }
    // change role admin
    public function change($id, Request $request)
    {
        $data = $this->requestUserDate($request);
        User::where('id', $id)->update($data);
        return redirect()->route('admin#list');
    }
    private function requestUserDate($request)
    {
        return [
            'role' => $request->role
        ];
    }
    // request user data
    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address
        ];
    }
    // account validation check
    private function accountValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'image' => 'mimes:png,jpb,jpeg|file'
        ])->validate();
    }
    // PASSWORD VALIDATION CHECK
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword'
        ])->validate();
    }
}
