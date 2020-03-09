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
        // Cache::flush();
    }

    public function index()
	{
		$Master = new Master;
		
		if (Cache::has('ytrend')){
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
		$q = str_replace(['+','-'],[' ',' '],urldecode($q));
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
			'loc'	=> url(urlencode($q))
		];
		$save = [
			'lastmod'	=> date('Y-m-d H:i:s'),
			'changefreq'	=> 'monthly',
			'priority'	=> '0.5',
		];
		dispatch((new AddSitemap($cond, $save))->onQueue('low'));
		return view('eks.welcome', compact('data','q'));
	}
	
	public function detail($title, $id,$desc, $meta)
	{
		$urlTitle = $title;
		$urlDesc = $desc;
		$title = urldecode($title);
		$met = explode('^nl',base64_decode($meta));
		
		$desc = str_replace(
			['*sls*','*hstag*','*nl*'],
			['/','#','</br>'],
			base64_decode($desc)
		);
		
		$q = $title;
		
		$q = str_replace('+',' ',urldecode($q));
		$Master = new Master;
		
		if (Cache::has($q)){
			$RestAPI = Cache::get($q);
		} else {
			$RestAPI = Cache::rememberForever($q, function () use($Master, $title) {
				$output =  $Master->setEndpoint('youtube/search')
						->setQuery([
							'q'=>$title
						])
						->get();
				return $output;
			});
		}
		$data['api'] = $RestAPI;
		$cond = [
			'loc'	=> url('video/'.$id.'/'.$urlTitle.'/'.$urlDesc)
		];
		$cond2 = [
			'loc'	=> url($urlTitle)
		];
		$save = [
			'lastmod'	=> date('Y-m-d H:i:s'),
			'changefreq'	=> 'monthly',
			'priority'	=> '0.5',
		];
		dispatch((new AddSitemap($cond, $save))->onQueue('low'));
		dispatch((new AddSitemap($cond2, $save))->onQueue('low'));
		return view('eks.welcome', compact('data','q','id','title','desc', 'met'));
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
		 $locc = preg_replace('/&(?!#?[a-z0-9];)/', '&amp;', $row['loc']);
		 $content .= "<url>";
		 $content .= "<loc>".str_replace(' ','+',$locc)."</loc>";
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
