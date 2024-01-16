<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Models\User;

class UserController extends Controller
{
    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }

    public function addProductToFacebookPixel(){


        // Empty
        // DB::table('_pro_excel')->delete();
        ProExcel::truncate();
        // $Products = Product::whereNotNull('fb_pixels');
        $Products = DB::table('product')->whereNotNull('code')->whereNotNull('fb_pixels')->get();
        // $Products = DB::table('product')->where('code','MVH-S325BT')->get();
        // foreach ($Products as $key => $value) {
        //     echo $value->id;
        //     echo "<br>";
        // }
        // var_dump($Products);
        // die();
        foreach($Products as $ProAdd){

                $ProductUrl = "http://crystalcaraudio.com/product/$ProAdd->slung";
                $ImageURL = "http://crystalcaraudio.com//uploads/product/$ProAdd->fb_pixels";
                $ProExcel  = new ProExcel;
                $ProExcel->code = $ProAdd->code;
                $ProExcel->google_product_category = $ProAdd->google_product_category;
                $ProExcel->title = $ProAdd->name;
                $ProExcel->description = $ProAdd->meta;
                $ProExcel->availability = $ProAdd->stock;
                $ProExcel->condition = "new";
                $ProExcel->price = $ProAdd->price;
                $ProExcel->link = $ProductUrl;
                $ProExcel->image_link = $ImageURL;
                $ProExcel->brand = $ProAdd->brand;
                $ProExcel->save();

        }



        return redirect()->route('exporting');
    }

    public function emptyProductToFacebookPixel(){
        DB::table('_pro_excel')->delete();
        Session::flash('message', "Table Has been cleared");
        return Redirect::back();
    }

}
