<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUspageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus= AboutUs::latest()->paginate(5);
        return view('aboutus.index',compact('aboutus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'description' => 'required',
            'img'=> 'required'
        ]);

        // Movie::create($request->all());
        $file=$request->file('img');
        if($file->isvalid())
        {
            $destinationpath='aboutuimg/';
            $image=date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->move($destinationpath,$image);
        }
        $aboutus=new AboutUs();
        $aboutus->description=$request->get('description');
        $aboutus->img=$image;
        $aboutus->save();
        return redirect()->route('aboutus.index')
            ->with('success', 'About us created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutus)
    {
        return view('aboutus.show',compact('aboutus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutus)
    {
        return view('aboutus.edit',compact('aboutus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $aboutus)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $aboutus=AboutUs::find($aboutus);
        $file=$request->file('img');
        if($file->isvalid())
        {
            $destinationpath='aboutuimg/';
            $image=date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->move($destinationpath,$image);
        }
        $aboutus->description=$request->get('description');
        $aboutus->img=$image;
        $aboutus->save();

        return redirect()->route('aboutus.index')
            ->with('success', 'Aboutus updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutus)
    {
       //$aboutus->delete();
        AboutUs::where('id',$aboutus)->delete();
        return redirect()->route('aboutus.index')
            ->with('success', 'Aboutus deleted successfully');
    }
}
