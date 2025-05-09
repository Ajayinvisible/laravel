<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        $company = Company::all();
        return view('about', [
            'company' => $company
        ]);
    }

    public function saveData(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:100',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|string',
            'logo' => 'image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);
        //database instance and save with image
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $logo = $request->logo;
        if ($logo) {
            $fileName = time() . "." . $logo->getClientOriginalExtension();
            $logo->move('images', $fileName);
            $company->logo = "images/" . $fileName;
        }
        $company->save();
        toast("Company created success", "success");
        return redirect('/');
    }

    public function destroy($id){
        $company = Company::find($id);
        $company->delete();
        toast("Company deleted success", "success");
        return redirect()->back();
    }
}
