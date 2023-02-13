<?php

namespace App\Console\Commands;

use App\Models\PostModel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PublishPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish scheduled post for premium users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = PostModel::where('active','0')->where('published_at','<=',Carbon::now())->update(['active'=>'1']);
        // dd($posts);
        // if($posts){
            return $this->info('Successfully published scheduled posts.');
        // }
        // return Command::SUCCESS;
    }
}
