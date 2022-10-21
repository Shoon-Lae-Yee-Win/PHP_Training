<?php

namespace App\Http\Controllers;

use App\Mail\ProductMail;
use App\Mail\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    /**
     * email send view.
     *
     * @return $this
     */
    public function mailView()
    {
        return view('mailView');
    }

    /**
     * save file and send mail.
     *
     * @return $this
     */
    public function mailSend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'attachment' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $path = public_path('uploads');
        $attachment = $request->file('attachment');

        $name = time() . '.' . $attachment->getClientOriginalExtension();

        // create folder
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        $attachment->move($path, $name);

        $filename = $path . '/' . $name;

        try {
            Mail::to($request->email)->send(new Notification($filename));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Mail sent successfully.');
    }

    /**
     * To send email
     */
    public function session()
    {
        Mail::to('shoonlaeyeewin1602@gmail.com')
            ->send(new ProductMail());
        return redirect()->route('product#show');
    }
}
