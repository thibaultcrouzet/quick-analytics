<?php
/**
 * Quick Analytics setup
 *
 * @package Quick Analytics
 * @since   1.0.0
 */
 
if( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Setup plugin.
 */
class Quick_Analytics_Public {

	/**
	 * Only instance of object.
	 *
	 * @var Quick_Analytics
	 */
	private static $instance = null;

	/**
	 * Creates or returns an instance of this class.
	 *
	 * @since 1.0.0
	 * @return  Quick_Analytics A single instance of this class.
	 */
	public static function get_instance() {

		if ( null === self::$instance ) {

			self::$instance = new self;

		}

		return self::$instance;

	}

	/**
	 * Initiate plugin.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {

		// Scripts Analytics.
		if ( ! is_admin() ) {

			add_action( 'after_setup_theme', array( $this, 'add_scripts' ) );

		}

	}
	
	/**
	 * Hook in scripts to configured action
	 *
	 * @since 1.0.2
	 */
	public function add_scripts() {

		$settings = get_option( 'quick_analytics' );

		if ( $settings && isset( $settings['position'] ) ) {

			if ( defined( 'TB_FRAMEWORK_VERSION' ) && 'body' === $settings['position'] ) {

				add_action( 'quick_analytics_before', array( $this, 'scripts' ), 2 );

			} elseif ( 'head' === $settings['position'] ) {

				add_action( 'wp_head', array( $this, 'scripts' ), 2 );

			} elseif ( 'footer' === $settings['position'] ) {

				add_action( 'wp_footer', array( $this, 'scripts' ), 1000 );

			}
		}
	}		
	
	/**
	 * Scripts analytics.
	 *
	 * @since 1.0.0
	 */
	public function scripts() {

		$settings = get_option( 'quick_analytics' );

		if (!current_user_can('edit_theme_options') || (current_user_can('edit_theme_options') && $settings['exclude_admin'] == false)){

			//Google
			if ( ! empty( $settings['google_id'] ) ) {

				$google_id = esc_attr( $settings['google_id'] );

				// Generate ga() JS code.
				$google_analytics = "analytics('create', '{$google_id}', 'auto');\n";

				if ( ! empty( $settings['google_anonymize'] ) ) {

					$google_analytics .= "analytics('set', 'anonymizeIp', true);\n";

				}

				$google_analytics .= "analytics('send', 'pageview');\n";

?>
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','analytics');
<?php echo wp_kses( $google_analytics, array() ); ?>
</script>
<!-- End Google Analytics -->
<?php

			}
		
			//Yandex
			if ( ! empty( $settings['yandex_id'] ) ) {

				$yandex_id = esc_attr( $settings['yandex_id'] );

				// Generate ga() JS code.
				$yandex_analytics = "id:{$yandex_id},";

				if ($settings['yandex_click_map']) {

					$yandex_analytics .= "clickmap:true,";
			
				}

				if ($settings['yandex_track_links']) {

					$yandex_analytics .= "trackLinks:true,";

				}			
			
				if ($settings['yandex_accurate_track_bounce']) {

					$yandex_analytics .= "accurateTrackBounce:true,";

				}	
			
				if ($settings['yandex_webvisor']) {

					$yandex_analytics .= "webvisor:true,";

				}
					
?>
<!-- Yandex Metrika -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter<?php echo $yandex_id; ?> = new Ya.Metrika2({
                	<?php echo $yandex_analytics; ?>
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/<?php echo $yandex_id; ?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- End Yandex Metrika -->
<?php
			}
		
			//Mixpanel
			if ( ! empty( $settings['mixpanel_token'] ) ) {

				$mixpanel_token = esc_attr( $settings['mixpanel_token'] );

?>
<!-- Mixpanel -->
<script type="text/javascript">(function(e,a){if(!a.__SV){var b=window;try{var c,l,i,j=b.location,g=j.hash;c=function(a,b){return(l=a.match(RegExp(b+"=([^&]*)")))?l[1]:null};g&&c(g,"state")&&(i=JSON.parse(decodeURIComponent(c(g,"state"))),"mpeditor"===i.action&&(b.sessionStorage.setItem("_mpcehash",g),history.replaceState(i.desiredHash||"",e.title,j.pathname+j.search)))}catch(m){}var k,h;window.mixpanel=a;a._i=[];a.init=function(b,c,f){function e(b,a){var c=a.split(".");2==c.length&&(b=b[c[0]],a=c[1]);b[a]=function(){b.push([a].concat(Array.prototype.slice.call(arguments,
0)))}}var d=a;"undefined"!==typeof f?d=a[f]=[]:f="mixpanel";d.people=d.people||[];d.toString=function(b){var a="mixpanel";"mixpanel"!==f&&(a+="."+f);b||(a+=" (stub)");return a};d.people.toString=function(){return d.toString(1)+".people (stub)"};k="disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
for(h=0;h<k.length;h++)e(d,k[h]);a._i.push([b,c,f])};a.__SV=1.2;b=e.createElement("script");b.type="text/javascript";b.async=!0;b.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"file:"===e.location.protocol&&"//cdn4.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn4.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn4.mxpnl.com/libs/mixpanel-2-latest.min.js";c=e.getElementsByTagName("script")[0];c.parentNode.insertBefore(b,c)}})(document,window.mixpanel||[]);
mixpanel.init(<?php echo $mixpanel_token; ?>);</script>
<!-- End Mixpanel -->
<?php

			}
			
			//Kissmetrics
			if ( ! empty( $settings['kissmetrics_key'] ) ) {

				$kissmetrics_key = esc_attr( $settings['kissmetrics_key'] );

?>
<!-- Kissmetrics -->
<script type="text/javascript">var _kmq = _kmq || [];
var _kmk = _kmk || <?php echo $kissmetrics_key; ?>;
function _kms(u){
  setTimeout(function(){
    var d = document, f = d.getElementsByTagName('script')[0],
    s = d.createElement('script');
    s.type = 'text/javascript'; s.async = true; s.src = u;
    f.parentNode.insertBefore(s, f);
  }, 1);
}
_kms('//i.kissmetrics.com/i.js');
_kms('//scripts.kissmetrics.com/' + _kmk + '.2.js');
</script>
<!-- End Kissmetrics -->
<?php

			}		
		
			//Woopra
			if ( ! empty( $settings['woopra_domain'] ) ) {

				$woopra_domain = esc_attr( $settings['woopra_domain'] );

?>
<!-- Woopra -->
<script>
  (function(){
    var t,i,e,n=window,o=document,a=arguments,s="script",r=["config","track","identify","visit","push","call","trackForm","trackClick"],c=function(){var t,i=this;for(i._e=[],t=0;r.length>t;t++)(function(t){i[t]=function(){return i._e.push([t].concat(Array.prototype.slice.call(arguments,0))),i}})(r[t])};for(n._w=n._w||{},t=0;a.length>t;t++)n._w[a[t]]=n[a[t]]=n[a[t]]||new c;i=o.createElement(s),i.async=1,i.src="//static.woopra.com/js/w.js",e=o.getElementsByTagName(s)[0],e.parentNode.insertBefore(i,e)
  })("woopra");

  woopra.config({
      domain: '<?php echo $woopra_domain; ?>'
  });
  woopra.track();
</script>
<!-- End Woopra -->
<?php

			}		

			//Gauges
			if ( ! empty( $settings['gauges_site_id'] ) ) {

				$gauges_site_id = esc_attr( $settings['gauges_site_id'] );

?>		
<!-- Gauges -->
<script type="text/javascript">
  var _gauges = _gauges || [];
  (function() {
    var t   = document.createElement('script');
    t.type  = 'text/javascript';
    t.async = true;
    t.id    = 'gauges-tracker';
    t.setAttribute('data-site-id', '<?php echo $gauges_site_id; ?>');
    t.setAttribute('data-track-path', 'https://track.gaug.es/track.gif');
    t.src = 'https://d2fuc4clr7gvcn.cloudfront.net/track.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(t, s);
  })();
</script>
<!-- End Gauges -->
<?php

			}		
	
			//Heap
			if ( ! empty( $settings['heap_app_id'] ) ) {

				$heap_app_id = esc_attr( $settings['heap_app_id'] );

?>	
<!-- Heap -->	
<script type="text/javascript">
    window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","resetIdentity","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
    heap.load("<?php echo $heap_app_id; ?>");
</script>
<!-- End Heap -->	
<?php

			}			
		
			//GoSquared
			if ( ! empty( $settings['gosquared_token'] ) ) {

				$gosquared_token = esc_attr( $settings['gosquared_token'] );

?>		
<!-- GoSquared -->	
<script>
  !function(g,s,q,r,d){r=g[r]=g[r]||function(){(r.q=r.q||[]).push(
  arguments)};d=s.createElement(q);q=s.getElementsByTagName(q)[0];
  d.src='//d1l6p2sc9645hc.cloudfront.net/tracker.js';q.parentNode.
  insertBefore(d,q)}(window,document,'script','_gs');

  _gs('<?php echo $gosquared_token; ?>');
</script>
<!-- End GoSquared -->	
<?php

			}	
		
		
			//Statcounter
			if ( ! empty( $settings['statcounter_project'] ) && ! empty( $settings['statcounter_security'] ) ) {

				$statcounter_project = esc_attr( $settings['statcounter_project'] );
				$statcounter_security = esc_attr( $settings['statcounter_security'] );

?>		
<!-- Statcounter -->
<script type="text/javascript">
var sc_project=<?php echo $statcounter_project; ?>; 
var sc_invisible=1; 
var sc_security="<?php echo $statcounter_security; ?>"; 
var sc_https=1; 
</script>
<script type="text/javascript"
src="https://www.statcounter.com/counter/counter.js" async></script>
<noscript><div class="statcounter"><a title="Web Analytics"
href="http://statcounter.com/" target="_blank"><img class="statcounter"
src="//c.statcounter.com/<?php echo $statcounter_project; ?>/0/<?php echo $statcounter_security; ?>/1/" alt="Web
Analytics"></a></div></noscript>
<!-- End Statcounter -->
<?php

			}			
		
		}		
		
	}

}
