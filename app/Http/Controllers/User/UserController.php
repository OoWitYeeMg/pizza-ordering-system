<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function home()
    {
        $pizza = Product::orderBy('created_at', 'desc')->get();
        $category = Category::get();
        return view('user.main.home', compact('pizza', 'category'));
    }
    // change password page
    public function changePassword()
    {
        return view('user.main.password.change');
    }
    // change password
    public function changePasswordPage(Request $request)
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
    // filter pizza
    public function filter($categoryId)
    {
        $pizza = Product::where('category_id', $categoryId)->orderBy('created_at', 'desc')->get();
        $category = Category::get();
        return view('user.main.home', compact('pizza', 'category'));
    }
    // user account change
    public function accountChangePage()
    {
        return view('user.account.account');
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
        return back()->with(['updateSuccess' => 'User Account Updated...']);
    }
    // direct pizza details
    public function pizzaDetails($pizzaId)
    {
        $pizza = Product::where('id', $pizzaId)->first();
        $pizzaList = Product::inRandomOrder()->limit(4)->get();
        return view('user.main.details', compact('pizza', 'pizzaList'));
    }
    // carts pizza
    public function pizzaCarts($cartId)
    {
        $cart = Product::where('id', $cartId)->first();
        return view('user.main.cart', compact('cart'));
    }

    // request user data
    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
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
