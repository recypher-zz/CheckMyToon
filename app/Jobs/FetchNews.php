<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\News;

class FetchNews implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $news_log = 'news_log.txt';

        $request = Http::get('https://lodestonenews.com/news/topics?locale=na');
        $news = json_decode($request->body());

        foreach($news as $article){

            $uniqueid = $article->id;
            $url = $article->url;
            $title = $article->title;
            $timestamp = $article->time;
            $image = $article->image;
            $description = $article->description;

            if(!News::where('uniqueid', '=', $article->id)->exists()){
                file_put_contents($news_log, date("H:i:s") . ' Did not find article ' . $article->id . ' in database, pushing it up.' . PHP_EOL, FILE_APPEND);
                
                $newArticle = new News;

                $newArticle->uniqueid = $uniqueid;
                $newArticle->url = $url;
                $newArticle->title = $title;
                $newArticle->timestamp = $timestamp;
                $newArticle->image = $image;
                $newArticle->description = $description;

                $newArticle->save();
            }

            file_put_contents($news_log, date("H:i:s") . ' Found the article ' . $article->id . ' in database, skipping it....' . PHP_EOL, FILE_APPEND);
        }
    }
}
