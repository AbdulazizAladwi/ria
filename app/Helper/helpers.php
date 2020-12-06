<?php


use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Support\Str;

if ( !function_exists('authUser') )
{
    /*
     * Get authenticated user
     * @return object
     * */

    function authUser()
    {
        return auth()->user();
    }
}





if ( !function_exists('activeLink') )
{
    /*
     * Add active classes to active url
     * @param string $name
     * @return string
     */

    function activeLink($name=null,$tree=false)
    {



        if ( $tree and $name == 'setup' )
        {

            $setupArray = ['client-types','resources','teams','costs'];

            if ( in_array(request()->segment(1) ,$setupArray) )
            {
                return 'active selected';
            }
            return '';


        }

        if ( $tree and $name == 'reports' )
        {
            $reportArray = ['opportunity-report','activity-report','proposal-report','invoice-report'];

            if ( in_array(request()->segment(1) ,$reportArray) )
            {
                return 'active selected';
            }
            return '';


        }

        if ( !is_null($name) and request()->segment(1) == $name )
        {
            if ( $tree )
            {
                return 'current-page';
            }

            return 'active selected';
        }


    }


    function dashboard_setting()
    {
        return Setting::first();
    }

//    function roles()
//    {
//        $path = app_path('Models');
//
//        $results = scandir($path);
//        $actions = ['create', 'read', 'update', 'delete'];
//        for ($i = 2; $i<count($results); $i++){
//            for ($a = 0; $a<count($actions); $a++){
//                Permission::firstOrCreate([
//                    'name' =>  $actions[$a] . "_" . strtolower(Str::plural(substr($results[$i], 0, -4))),
//                    'guard_name'    => 'web'
//                ]);
//            }
//        }
//    }
//

}







