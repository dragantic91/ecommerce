<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/23/2017
 * Time: 6:08 PM
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Jobs\SendContactEmail;
use App\Models\Database\Page;
use App\Models\Database\PageUberUns;
use App\Models\Database\PageWirKaufen;
use App\Models\Database\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display the specified page.
     */
    public function show($slug)
    {
        $page = Page::where('slug', '=', $slug)->first();

        return view('front.page.show')->with('page', $page);
    }

    public function about()
    {
        $page = Page::where('slug', '=', 'about-us')->first();

        return view('front.page.about')->with('page', $page);
    }

    public function wirKaufen()
    {
        $page = Page::where('slug', '=', 'wir-kaufen')->first();

        return view('front.page.wirKaufen', compact('page'));
    }

    public function sendWirEmail(Request $request)
    {
        $data = $request->all();

        $images = $request->image;

        $image_number = count($images);
        if ($image_number > 5){
            return redirect()->back()->with('notificationError', __('front.image1-5'));
        }
        for ($i = 0; $i < $image_number; $i++){
            $this->validate($request, [
                'image.' . $i => 'mimes:jpeg,jpg,png|max:2048'
            ]);
        }

        $names = [];
        foreach ($images as $image){
            $names[] = time() . $image->getClientOriginalName();
            $name = time() . $image->getClientOriginalName();
            Storage::putFileAs(
                'email', $image, $name
            );
        }

        $contactForm = ([
            'name' => $data['name'],
            'phone' => $data['tel'],
            'email' => $data['email'],
            'message' => $data['mess'],
            'image' => $names,
        ]);

        $page = Page::where('slug', '=', 'wir')->first();

        dispatch(new SendContactEmail($contactForm));

        foreach ($names as $name){
            Storage::delete('/email/' . $name);
        }

        return redirect()->route('wir-kaufen')
            ->with('page', $page)
            ->with('notificationText', __('front.email-success-sent'));
    }

    public function contact()
    {
        $page = Page::where('slug', '=', 'contact')->first();

        return view('front.page.contact')->with('page', $page);
    }

    public function sendContactEmail(Request $request)
    {
        $data = $request->all();
        $contactForm = ([
            'name' => $data['name'],
            'phone' => $data['tel'],
            'email' => $data['email'],
            'message' => $data['mess'],
        ]);

        $page = Page::where('slug', '=', 'contact')->first();

        dispatch(new SendContactEmail($contactForm));
        return redirect()->route('contact')
            ->with('page', $page)
            ->with('notificationText', __('front.email-success-sent'));
    }

    public function subscribe(Request $request){

        $this->validate($request, [
           'email' => 'required|unique:subscribers,email',
        ]);

        Subscriber::create($request->all());
        return redirect()->back()
            ->with('notificationText', __('front.subscribe-success-sent'));
    }
}