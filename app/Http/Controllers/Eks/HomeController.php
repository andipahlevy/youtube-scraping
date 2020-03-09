<?php

namespace App\Http\Controllers\Eks;
use App\Http\Controllers\Controller;
use App\Providers\Master;
use Illuminate\Support\Facades\Cache;
use App\Models\SiteMap;
use App\Jobs\AddSitemap;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
	{
		// Cache::flush();die;
		$Master = new Master;
		
		if (Cache::has('ytrendd')){
			$RestAPI = Cache::get('ytrend');
		} else {
			$RestAPI = Cache::rememberForever('ytrend', function () use($Master) {
				return  $Master->setEndpoint('youtube/trends')->get();
			});
		}
		// dd($RestAPI);
		$data['api'] = $RestAPI;
		return view('eks.welcome', compact('data'));
	}

    public function find($q)
	{
		// Cache::flush();die;
		$q = str_replace('-',' ',urldecode($q));
		$Master = new Master;
		
		if (Cache::has($q)){
			$RestAPI = Cache::get($q);
		} else {
			$RestAPI = Cache::rememberForever($q, function () use($Master, $q) {
				$output =  $Master->setEndpoint('youtube/search')
						->setQuery([
							'q'=>$q
						])
						->get();
				return $output;
			});
		}
		$data['api'] = $RestAPI;
		$cond = [
			'loc'	=> url($q)
		];
		$save = [
			'lastmod'	=> date('Y-m-d H:i:s'),
			'changefreq'	=> 'monthly',
			'priority'	=> '0.5',
		];
		dispatch((new AddSitemap($cond, $save))->onQueue('low'));
		return view('eks.welcome', compact('data','q'));
	}
	
	public function detail($id,$title)
	{
		// Cache::flush();die;
		
		$title1 = str_replace(
			['*sls*'],
			[' '],
			$title
		);
		
		$title2 = str_replace(
			['*sls*'],
			['/'],
			$title
		);
		
		$q = $title1;
		
		$q = str_replace('-',' ',urldecode($q));
		$Master = new Master;
		
		if (Cache::has($q)){
			$RestAPI = Cache::get($q);
		} else {
			$RestAPI = Cache::rememberForever($q, function () use($Master, $q) {
				$output =  $Master->setEndpoint('youtube/search')
						->setQuery([
							'q'=>$q
						])
						->get();
				return $output;
			});
		}
		$data['api'] = $RestAPI;
		$cond = [
			'loc'	=> url($q)
		];
		$save = [
			'lastmod'	=> date('Y-m-d H:i:s'),
			'changefreq'	=> 'monthly',
			'priority'	=> '0.5',
		];
		dispatch((new AddSitemap($cond, $save))->onQueue('low'));
		return view('eks.welcome', compact('data','q','id','title2'));
	}
	
	public function sitemap()
	{
		$content = "<?xml version='1.0' encoding='UTF-8'?>"."\n";
		$content .= "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>"."\n";

		$content .= "
		<url>
		 <loc>".url()."</loc>
		 <lastmod>2020-03-05T18:00:15+00:00</lastmod>
		 <changefreq>daily</changefreq>
		</url>
		<url>
		 <loc>".url('sitemap/xml')."</loc>
		 <lastmod>2020-03-05T18:00:15+00:00</lastmod>
		 <changefreq>daily</changefreq>
		</url>";
		
		$sm = SiteMap::all();
		foreach($sm as $row)
		{
		 $content .= "<url>";
		 $content .= "<loc>".$row['loc']."</loc>";
		 $content .= "<lastmod>".$row['lastmod']."</lastmod>";
		 $content .= "<changefreq>monthly</changefreq>";
		 $content .= "</url>";
		}

		$content .= "</urlset>";
		
		$response = Response::create($content, 200);
		$response->header('Content-Type', 'text/xml');
        $response->header('Cache-Control', 'public');
        $response->header('Content-Description', 'File Transfer');
        // $response->header('Content-Disposition', 'attachment; filename=sitemap.xml');
        $response->header('Content-Transfer-Encoding', 'binary');
        return $response;
	}
}
