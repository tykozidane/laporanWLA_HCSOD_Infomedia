<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $auth = service('authentication');
        $userId = $auth->id();
        $authorize = service('authorization');
        if($authorize->inGroup('hcsod', $userId)){
            return redirect()->route('wla/dataemployee');
        } else {
            return redirect()->route('storage');
        }
    }
}
