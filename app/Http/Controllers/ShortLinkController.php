<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Str;


class ShortLinkController extends Controller
{
    public function index(){
        
        $shortLinks = ShortLink::latest()->get();
        return view('shortenLink', compact('shortLinks'));
    }

    public function store(Request $request){
        $request->validate([
            'link'=>'required|url'
        ]);

        $input['link'] = $request->link;
        $input['code'] = Str :: random(6);

        ShortLink::create($input);

        return redirect('generate-shorten-link')->withSuccess('Shorten Link Generated Successfully.');
    }

    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();
        if ($find) {
            return redirect($find->link);
        } else {
        
            return redirect()->back()->with('error', 'Short link not found.');
        }
    }

    public function edit($id)
    {
        $shortLink = Shortlink::find($id);
        return view('edit', compact('shortLink'));
    }


    public function update(Request $request, $id)
    {
    $request->validate([
        'code' => 'required|min:6', // Adjust validation rules as needed
    ]);

    $shortLink = ShortLink::find($id);
    $shortLink->update([
        'code' => $request->code
    ]);

    return redirect()->route('shorten.link.index')->withSuccess('Shorten Link Updated Successfully');
    }



public function destroy($id)
{
    $shortLink = ShortLink::find($id);
    $shortLink->delete();
    return redirect()->route('shorten.link.index')->withSuccess('Shorten Link Deleted Successfully');
}


}


    

