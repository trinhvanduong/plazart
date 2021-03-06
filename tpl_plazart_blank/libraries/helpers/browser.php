<?php

/**
 * Plazart Framework
 * Author: Sonle
 * Version: 1.1
 * @copyright   Copyright (C) 2012 - 2013 TemPlaza.com. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */
 
// No direct access.
defined('_JEXEC') or die;
  
class TZBrowser {
  
  public $result;
  
  public function __construct() {
        jimport('joomla.environment.browser');
        jimport('joomla.base.object');
        $browser = JBrowser::getInstance();
        $this->result = new JObject();
        $this->result->set("tablet", false);
        $this->result->set('mobile', false);
        $userAgents = array(
            'googlebot','msnbot','w3c','yahoo','acme.spider', 'ahoythehomepagefinder', 'aleksika spider', 'ia_archiver', 'alkaline', 'emcspider', 'antibot', 'arachnophilia','architext', 'aretha', 'ariadne', 'arks', 'aspider', 'atn.txt', 'atomz', 'auresys', 'awbot', 'backrub', 'baiduspider', 'bigbrother', 'bjaaland', 'blackwidow', 'blogsphere', 'isspider', 'blogshares bot', 'blogvisioneye', 'blogwatcher', 'blogwise.com-metachecker', 'bloodhound', 'bobby', 'bordermanager', 'boris', 'bravobrian bstop', 'brightnet', 'bspider', 'bumblebee', 'catvschemistryspider', 'calif', 'cassandra', 'ccgcrawl', 'checkbot', 'christcrawler', 'churl', 'cj spider', 'cmc', 'collective', 'combine', 'computer_and_automation_research_institute_crawler', 'robi', 'conceptbot', 'coolbot', 'cosmixcrawler', 'crawlconvera', 'cscrawler', 'cusco', 'cyberspyder', 'cydralspyder', 'daviesbot', 'deepindex', 'denmex websearch', 'deweb', 'blindekuh', 'dienstspider', 'digger','webreader', 'cgireader', 'diibot', 'digout4u', 'directhit', 'dnabot', 'downes', 'download_express', 'dragonbot', 'dwcp', 'e-collector', 'e-societyrobot', 'ebiness', 'echo', 'eit', 'elfinbot', 'emacs', 'enterprise_search', 'esther', 'evliyacelebi', 'exabot', 'exactseek', 'exalead ng', 'ezresult', 'fangcrawl', 'fast-webcrawler', 'fastbuzz.com', 'faxobot', 'feedster crawler', 'felix', 'fetchrover', 'fido', 'fish', 'flurryv', 'fdse', 'fouineur', 'franklin locator', 'freecrawl', 'frontier', 'funnelweb', 'gaisbot', 'galaxybot', 'gama', 'gazz', 'gcreep', 'getbot', 'puu', 'geturl', 'gigabot', 'gnodspider', 'golem', 'googlebot', 'gornker', 'grapnel', 'griffon', 'gromit', 'grub-client', 'hambot', 'hatena antenna', 'havindex', 'octopus', 'hometown', 'htdig', 'htmlgobble', 'pitkow', 'hyperdecontextualizer', 'finnish', 'irobot', 'iajabot', 'ibm', 'illinois state tech labs', 'imagelock', 'incywincy', 'informant', 'infoseek', 'infoseeksidewinder', 'infospider', 'ilse', 'ingrid', 'slurp', 'inspectorwww', 'intelliagent', 'cruiser', 'internet ninja', 'myweb', 'internetseer', 'iron33', 'israelisearch', 'javabee', 'jbot', 'jcrawler', 'jeeves', 'jennybot', 'jetbot', 'jobo', 'jobot', 'joebot', 'jumpstation', 'justview', 'katipo', 'kdd', 'kilroy', 'fireball', 'ko_yappo_robot', 'labelgrabber.txt', 'larbin', 'legs', 'linkidator', 'linkbot', 'linkchecker', 'linkfilter.net url verifier', 'linkscan', 'linkwalker', 'lockon', 'logo_gif', 'lycos', 'mac finder', 'macworm', 'magpie', 'marvin', 'mattie', 'mediafox', 'mediapartners-google', 'mercator', 'mercubot', 'merzscope', 'mindcrawler', 'moget', 'momspider', 'monster', 'mixcat', 'motor', 'mozdex', 'msiecrawler', 'msnbot', 'muscatferret', 'mwdsearch', 'my little bot', 'naverrobot', 'naverbot', 'meshexplorer', 'nederland.zoek', 'netresearchserver', 'netcarta', 'netcraft', 'netmechanic', 'netscoop', 'newscan-online', 'nextopiabot', 'nhse', 'nitle blog spider', 'nomad', 'gulliver', 'npbot', 'nutch', 'nzexplorer', 'obidos-bot', 'occam', 'sitegrabber', 'openfind', 'orb_search', 'overture-webcrawler', 'packrat', 'pageboy', 'parasite', 'patric', 'pegasus', 'perlcrawler', 'perman', 'petersnews', 'pka', 'phantom', 'piltdownman', 'pimptrain', 'pioneer', 'pipeliner', 'plumtreewebaccessor', 'polybot', 'pompos', 'poppi', 'iconoclast', 'pjspider', 'portalb', 'psbot', 'quepasacreep', 'raven', 'rbse', 'redalert', 'resumerobot', 'roadrunner', 'rhcs', 'robbie', 'robofox', 'francoroute', 'robozilla', 'roverbot', 'rules', 'seochat', 'safetynetrobot', 'scooter', 'search_au', 'searchprocess', 'searchspider', 'seekbot', 'semanticdiscovery', 'senrigan', 'sgscout', 'shaggy', 'shaihulud', 'sherlock-spider', 'shoutcast', 'sift', 'simbot', 'ssearcher', 'site-valet', 'sitespider', 'sitetech', 'slcrawler', 'slysearch', 'smartspider', 'snooper', 'solbot', 'soziopath', 'space bison', 'spanner', 'speedy', 'spiderbot', 'spiderline', 'spiderman', 'spiderview', 'spider_monkey', 'splatsearch.com', 'spry', 'steeler', 'suke', 'suntek', 'surveybot', 'sven', 'syndic8', 'szukacz', 'tach_bw', 'tarantula', 'tarspider', 'techbot', 'technoratibot', 'templeton', 'teoma_agent1', 'teradex', 'jubii', 'northstar', 'w3index', 'perignator', 'python', 'tkwww', 'webmoose', 'wombat', 'webfoot', 'wanderer', 'worm', 'timbobot', 'titan', 'titin', 'tlspider', 'turnitinbot', 'ucsd', 'udmsearch', 'ultraseek', 'unlost_web_crawler', 'urlck', 'vagabondo', 'valkyrie', 'victoria', 'visionsearch', 'voila', 'voyager', 'vspider', 'vwbot', 'w3m2', 'wmir', 'wapspider', 'appie', 'wallpaper', 'waypath scout', 'corev', 'web downloader', 'webbandit', 'webbase', 'webcatcher', 'webcompass', 'webcopy', 'webcraftboot', 'webfetcher', 'webfilter', 'webgather', 'weblayers', 'weblinker', 'webmirror', 'webquest', 'webrace', 'webreaper', 'websnarf', 'webspider', 'wolp', 'webstripper', 'webtrends link analyzer', 'webvac', 'webwalk', 'webwalker', 'webwatch', 'wz101', 'wget', 'whatuseek', 'whowhere', 'ferret', 'wired-digital', 'wisenutbot', 'wwwc', 'xenu link sleuth', 'xget', 'cosmos', 'yahoo', 'yandex', 'zao', 'zeus', 'zyborg'
        );
        $is_IE6 = preg_match('/msie\s(5\.[5-9]|[6]\.[0-9]*).*(win)/i', $browser->
            getAgentString()) && !preg_match('/msie\s([7-9]\.[0-9]*).*(win)/i', $browser->
            getAgentString());
        $fb_crawler = preg_match('/facebook/i', $browser->getAgentString());
        $w3c_validator = preg_match('/w3c/i', $browser->getAgentString());
        // check if facebook crawler
        if ($fb_crawler) {
            $this->result->set('browser', 'facebook');
            $this->result->set('mobile', false);
            $this->result->set('css3', true);
        } else {
            switch ($browser->getBrowser()) {
                case 'mozilla':
                    $this->result->set('browser', 'ff');
                    break;
                case 'opera':
                	if(preg_match('/opera\smobi/i', $browser->getAgentString())) {
                		$this->result->set('browser', 'handheld');
                		$this->result->set('mobile', true);
                	} else {
                    	$this->result->set('browser', 'opera');
                    	$this->result->set('mobile', false);
                    	$this->result->set('css3', true);
                    }
                    break;
                case 'safari':
                case 'konqueror':
                    if (preg_match('/chrome/i', $browser->getAgentString())) {
                        $this->result->set('browser', 'chrome');
                    } else {
                        if (preg_match('/android/i', $browser->getAgentString())) {
                            $this->result->set('browser', 'android');
                            if(preg_match('/mobile/i', $browser->getAgentString())) {
                            	$this->result->set('mobile', true);
                            } else {
                            	$this->result->set('tablet', true);
                            }
                        } else {
                            if (preg_match('/iphone/i', $browser->getAgentString())) {
                                $this->result->set('browser', 'iphone');
                                $this->result->set('mobile', true);
                            } else {
                                if (preg_match('/ipad/i', $browser->getAgentString())) {
                                    $this->result->set('browser', 'ipad');
                                    $this->result->set('tablet', true);
                                } else {
                                	if (preg_match('/safari/i', $browser->getAgentString())) {
                                	    $this->result->set('browser', 'safari');
                                	} else {
	                                    if (preg_match('/safari/i', $this->result->browser) || preg_match('/chrome/i', $this->result->browser)) {
	                                        $this->result->set('mobile', false);
	                                        $this->result->set('css3', true);
	                                    } else {
	                                        $this->result->set('mobile', true);
	                                        $this->result->set('css3', false);
	                                    }
                                    }
                                }
                            }
                        }
                    }
                    break;
                    
                case 'msie':
                    if (preg_match('/iemobile/i', $browser->getAgentString())) {
                    	$this->result->set('mobile', true);
                    	$this->result->set('browser', 'handheld');
                    } else {
	                    if ($is_IE6) {
	                        $this->result->set('browser', 'ie6');
	                        $this->result->set('css3', false);
	                    } else {
	                        if (preg_match('/msie\s[7]/i', $browser->getAgentString()))
	                            $this->result->set('browser', 'ie7');
	                        else
	                            if (preg_match('/msie\s[8]/i', $browser->getAgentString()))
	                                $this->result->set('browser', 'ie8');
	                            else
	                                if (preg_match('/msie\s[9]/i', $browser->getAgentString()))
	                                    $this->result->set('browser', 'ie9');
	                        $this->result->set('css3', true);
	                    }
	                    $this->result->set('mobile', false);
                    }
                    break;                
                case '':
                    
                    foreach($userAgents as $item)
                    {
                     if(preg_match('/'.$item.'/i', $browser->getAgentString())){
                        $this->result->set('browser', 'ff');
                        $this->result->set('mobile', false);
                        $this->result->set('css3', true);
                        break;
                     } else {
                        $this->result->set('browser', 'handheld');
                        $this->result->set('mobile', true);
                        $this->result->set('css3', false);  
                     } 
                    }
                	break;
            }
        }

        return $this->result;
    }
}

// EOF