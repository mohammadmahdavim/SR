<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestController extends Controller
{

    public function test()
    {

     $users= User::all();

        return new JsonResodsurce(
            [
                'status' =>200,
                'data' => $users,
                'message' => 'successful',
                'url'=>\request()->getUri()

            ]
        );
    }


    public function index()
    {

//        generate user permissions
        $user = User::where('id', 1)->first();
        $teams = \Illuminate\Support\Facades\DB::table('users')->where('id', $user->id)
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('permission_role', 'permission_role.role_id', '=', 'role_user.role_id')
            ->join('permission_role_details', 'permission_role_details.permission_role_id', '=', 'permission_role.id')
            ->where('permission_roleable_type', 'like', '%' . 'TeamProfile' . '%')
            ->select('permission_roleable_id as id')
            ->pluck('id');
        $players = \Illuminate\Support\Facades\DB::table('users')->where('id', $user->id)
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('permission_role', 'permission_role.role_id', '=', 'role_user.role_id')
            ->join('permission_role_details', 'permission_role_details.permission_role_id', '=', 'permission_role.id')
            ->where('permission_roleable_type', 'like', '%' . 'User' . '%')
            ->select('permission_roleable_id as id')
            ->pluck('id');


        $permissions = [];

        foreach ($teams as $team) {
            $playerList = \App\Models\TeamProfileMember::where('team_profile_id', $team)
                ->whereIn('user_id', $players)
                ->pluck('user_id');
            $actions = [];
            foreach ($playerList as $player) {
                $detail = \App\Models\PermissionRoleDetail::where('permission_roleable_id', $player)
                    ->where(function ($query) {
                        $query->where('permission_roleable_type', 'like', '%' . 'Video' . '%')
                            ->orwhere('permission_roleable_type', 'like', '%' . 'Sensor' . '%')
                            ->orwhere('permission_roleable_type', 'like', '%' . 'Polar' . '%');
                    })
                    ->pluck('permission_roleable_type');
                $actions[$player] =
                    [
                        'action' => $detail
                    ];
            }

            $permissions['teams'][$team] =
                [
                    'players' => $actions
                ];
        }
// end generate user permissions

//  get user permission for playersList
        $playerList = [];
        foreach ($permissions['teams'] as $team) {
            foreach ($team as $players) {
                foreach ($players as $key => $player) {
                    $playerList[] = $key;
                }
            };
        }
        //  return $playerList;
//  get user permission for playersList


//  we have all highlight for all players of teamProfile where ['id'=>1] when user has permissions
        $teamId = 1;
        $events = \App\Models\Event::where(function ($query) use ($teamId) {
            $query->where('home_team_profile_id', $teamId)
                ->orwhere('away_team_profile_id', $teamId);
        })
            ->with('sections')
            ->with('sections.highlights')
            ->with('sections.highlights.detail')
            ->with('sections.highlights.detail.player')
            ->whereHas('sections', function ($query) use ($playerList) {
                return $query->whereHas('highlights', function ($highlight) use ($playerList) {
                    $highlight->whereHas('detail', function ($detail) use ($playerList) {
                        $detail->whereHas('player', function ($player) use ($playerList) {
                            $player->whereIn('id', $playerList);
                        });
                    });
                });
            })
            ->get();
// end

    }
}
