<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Article;
use App\Notifications\NewArticles;

class NewArticlesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:new_articles {users?*} {--time=7}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = $this->argument('users')
            ? User::findOrFail($this->argument('users'))
            : User::all()
        ;

        $articles = Article::latest()->get();
        $articles = $articles->filter->days($this->option('time'))->filter->isPublished();

        $users->map->notify(new NewArticles($articles));
    }
}
