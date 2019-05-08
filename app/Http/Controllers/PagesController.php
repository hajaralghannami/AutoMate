<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;

class PagesController extends Controller
{
    public function indexpage()
    {
        return view('indexpage');

    }

    public function vpc()
    {
        $templates = Template::where('title', 'Create VPC')->get();
        return view('vpc')->with('templates', $templates);


    }

    public function ec2()
    {
        return view('ec2');

    }


    public function about()
    {

        $templates = Template::where('title', 'Create VPC')->get();
        return view('about')->with('templates', $templates);



    }

    public function contact()
    {
        return view('contact');

    }


    public function history(Request $request)
    {
        //Create Template
        $newtemplate = new Template;
        $newtemplate->title = $request->input('title');
        $newtemplate->body = $request->input('body');
        $newtemplate->save();

        return view('history');

    }


}
