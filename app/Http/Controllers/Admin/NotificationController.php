<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function markRead($id,$order_id)
    {
        auth()->user()->notifications()->where('id', $id)->firstOrFail()->markAsRead();
        return redirect()->route('service-order.show',$order_id);
    }

}
