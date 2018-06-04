<?php

namespace App\Console\Commands;

use App\Models\traits\ActiveUserHelper;
use App\Models\User;
use Illuminate\Console\Command;

class CalculateActiveUser extends Command
{

     use ActiveUserHelper;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larabbs:calculate-active-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成活跃用户';

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
     * @return mixed
     */
    public function handle(User $user)
    {
        //
        $this->info('开始计算...wait');

        $user->calculateAndCacheActiveUsers();

        $this->info('成功生成');
    }
}
