<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Visitor;
use App\Models\Page;
use App\Models\User;


class HomeAdminController extends Controller {
    public function home(Request $r) : View {
        $filterValue = $r->filter;
        if($filterValue > 60) {
            $filterValue = 60;
        }elseif(!$filterValue) {
            $filterValue = 30;
        }

        $dateLimit = date('Y-m-d H:i:s', strtotime("-$filterValue days"));
        $visits = Visitor::select('ip')->where('date_access', '>=', $dateLimit)->groupBy('ip')->get();
        $countVisits = count($visits);
        

        $hoursLimit = date('Y-m-d H:i:s', strtotime("-5 minutes"));
        $usersOnline = Visitor::select('ip')->where('date_access', '>=', $hoursLimit)->groupBy('ip')->get();
        $countUsersOnline = count($usersOnline);

        $countPages = Page::count();
        $countUsers =  User::count();

        
        $pagePieGraph = [];
        $visitsAll = Visitor::selectRaw('page, count(page) as c')
            ->where('date_access', '>=', $dateLimit)
            ->groupBy('page')
        ->get();

        foreach($visitsAll as $visit) {
            $pagePieGraph[ $visit['page'] ] = $visit['c'];
        }
        $pageLabels = json_encode( array_keys($pagePieGraph) );
        $pageValues = json_encode( array_values($pagePieGraph) );

        return view('admin.home', [
            'countVisits' => $countVisits,
            'countUsersOnline' => $countUsersOnline,
            'countPages' => $countPages,
            'countUsers' => $countUsers,
            'pageLabels' => $pageLabels,
            'pageValues' => $pageValues,
            'filterValue' => $filterValue,
        ]);
    }
}

