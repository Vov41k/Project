<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\News;
use App\Subscribers;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send($id, $userName)
    {
        $subscribers       = Subscribers::all()->pluck('email');
        $news              = News::find($id);
        $subject           = "News";
        $title             = $news->title;
        $description_short = $news->deskription_short;
        $description       = $news->deskription;
        $image             = $news->image;

        foreach ($subscribers as $email) {
            Mail::send(new SendMail($subject, $title, $description_short, $description, $image, $email, $userName));
        }
        return redirect()->route('admin.news.index');

    }
}
