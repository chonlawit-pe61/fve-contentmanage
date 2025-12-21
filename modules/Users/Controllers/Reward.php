<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Users\Models\AboutModel;
use Modules\Users\Models\CommonModel;
use Modules\Users\Models\NewsModel;
use Modules\Users\Models\RewardModel;

class Reward extends BaseController
{
    public function __construct() {}

    public function reward_detail($id = '')
    {
        $RewardModel = new RewardModel();
        $data['reward'] = $RewardModel->rewardDetail($id);
        $data['date_thai'] = $this->Date_thai;
        return view('Modules\Users\Views\reward\reward_detail.php', $data);
    }
}
