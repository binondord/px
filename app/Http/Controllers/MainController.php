<?php

namespace App\Http\Controllers;

use App\Facades\Sanitize;
use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    protected $request;
    protected $sharedData;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->site_config = config('config');

        $route = $request->route();
        $segments = $request->segments();
        $routeParameters = !is_null($route) ? $route->parameters() : [];
        $site = config('site');

        $site_env = getenv('LARAVEL_ENV');

        $configVars = array(
            'title',
            'site_name',
            'site_domain',
            'state',
            'view',
            'asset_dir',
            'pluginurl',
            'meta_description',
            'meta_keywords',
            'version',
            'logo_desktop',
            'logo_mobile',
            'site_first_word',
        );

        $configData = array();
        foreach($configVars as $config_var)
        {
            $configData[$config_var] = config($site_env.'.config.'.$config_var);
        }

        $layoutDir = 'sites.'.$configData['view'];
        $assetPath = '/assets/'.$configData['asset_dir'].'/';

        $agent = config('agent');
        $isMobile = false;

        $mobileLayoutDir = $layoutDir . '.mobile';
        $mobileAssetPath = $assetPath . 'mobile/';
        if($agent['device'] == "m"){
            $isMobile = true;
        }

        $configData['layoutDir'] = $layoutDir;
        $configData['assetPath'] = $assetPath;
        $configData['mobileLayoutDir'] = $mobileLayoutDir;
        $configData['mobileAssetPath'] = $mobileAssetPath;
        $configData['isMobile'] = $isMobile;
        $configData['site_env'] = $site_env;

        array_walk($routeParameters, function(&$routeParameter, $key){
            $routeParameter = Sanitize::clean($routeParameter, $key);
            return $routeParameter;
        });

        $version = array_key_exists('version',$routeParameters) ? $routeParameters['version'] : $configData['version'];
        $configData['viewPath'] = $layoutDir.'.'.$version.'.';
        $configData['mobileViewPath'] = $mobileLayoutDir.'.'.$version.'.';
        $configData['adminViewPath'] = $layoutDir.'.admin.'.$version.'.';

        $data = [
            'site',
            'params',
            'routeParameters',
            'segments',
            'site_env',
            'configData',
            'version'
        ];

        /**
         * Data available for all controllers
         */
        $this->sharedData = compact($data);

        /**
         * Set global variables available to all views
         */

        $globalData = [
            'meta_description',
            'meta_keywords',
            'title'
        ];

        foreach($globalData as $global){
            view()->share($global, $configData[$global]);
        }
        view()->share('site',$site);
        view()->share('version',$version);
        view()->share('layoutDir',$layoutDir);
        view()->share('assetPath',$assetPath);
        view()->share('mobileLayoutDir',$mobileLayoutDir);
        view()->share('mobileAssetPath',$mobileAssetPath);
        view()->share('isMobile',$isMobile);
    }

    /**
     * Detects presence of mobile template otherwise defaults to desktop version
     *
     * @param $blade string
     * @return \Illuminate\View\View
     */
    public function view($blade, $variables=array())
    {

        $sharedData = $this->sharedData;
        $viewPath = array_get($sharedData, 'configData.viewPath');
        $layoutDir = array_get($sharedData, 'configData.layoutDir');
        $assetPath = array_get($sharedData, 'configData.assetPath');
        $mobileLayoutDir = array_get($sharedData, 'configData.mobileLayoutDir');
        $mobileAssetPath = array_get($sharedData, 'configData.mobileAssetPath');

        $mobileViewPath = array_get($sharedData, 'configData.mobileViewPath');
        $adminViewPath = array_get($sharedData, 'configData.adminViewPath');
        $isMobile = array_get($sharedData, 'configData.isMobile');

        switch($blade)
        {
            case 'home':
            case 'step':
            case 'checkout':
                $bodyStyle = $blade;
                break;
            default:
                $bodyStyle = 'home';
                break;
        }

        view()->share('style',$bodyStyle);

        foreach($variables as $key=>$variable){
            view()->share($key,$variable);
        }

        if($isMobile){
            $viewFile = $mobileViewPath;
            $viewFile .= '.'.$blade;
            if(!view()->exists($viewFile)){
                $viewFile = $viewPath . '.'.$blade;
                view()->share('layoutDir',$layoutDir);
                view()->share('assetPath',$assetPath);
            }else{
                view()->share('layoutDir',$mobileLayoutDir);
                view()->share('assetPath',$mobileAssetPath);
            }
            if(in_array('admin', $this->request->segments()))
            {
                $viewFile = $adminViewPath.$blade;
                $staticserver = !empty($this->site_config['static']) ? $this->site_config['static'] : url('lib', [], \Custom::secureUrl());
                view()->share('staticserver',$staticserver);
            }
        }else{
            if(in_array('admin', $this->request->segments()))
            {
                $viewFile = $adminViewPath.$blade;
                $staticserver = !empty($this->site_config['static']) ? $this->site_config['static'] : url('lib', [], \Custom::secureUrl());
                view()->share('staticserver',$staticserver);
            }else{
                $viewFile = $viewPath.$blade;
            }
        }

        return view($viewFile);
    }
}
