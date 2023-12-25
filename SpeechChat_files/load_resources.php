var scope = {"google_drive":"a988de52","twitch":"bb9648e6","youtube":"51d1b91c","beam":"b5a60b5e","slapi":""};

function onLoadResourceComplete()
{
	if(typeof window._loaded === 'undefined')
		window._loaded = 2;
	else
		window._loaded |= 2

	document.getElementById('version-div').innerHTML = '1806170430';

	if(typeof onLoadComplete === 'function')
		onLoadComplete();
}

var load_remain = 1; // main.09efe2cc.css
function onLoadResource()
{
	if(--load_remain === 0)
		onLoadResourceComplete();
}

function loadPage(url, onload)
{
	var xhr = new XMLHttpRequest();
	xhr.onload = onload;
	xhr.open('GET', url);
	xhr.send();
}

loadPage('main.09efe2cc.css', function(e)
{
	document.getElementsByTagName('body')[0].insertAdjacentHTML('beforeend', this.responseText);

	// fix cloudflare email address obfuscation
	!function(t,r,e,n,c,a,f){function h(t,r,e,n){for(e="",n="0x"+t.substr(r,2)|0,r+=2;r<t.length;r+=2)e+=String.fromCharCode("0x"+t.substr(r,2)^n);return e}try{for(c=t.getElementsByTagName("a"),f="/cdn-cgi/l/email-protection#",n=0;n<c.length;n++)try{(r=(a=c[n]).href.indexOf(f))>-1&&(a.href="mailto:"+h(a.href,r+f.length))}catch(t){}}catch(t){}}(document);

	// banners
	window.last_banner_time = 0;
	window.getBanner = function()
	{
		if(document.getElementById('remove-ads-checkbox').checked) return;

		if(Date.now() - window.last_banner_time >= 300000) {
			window.last_banner_time = Date.now();
			loadPage('get_banner.php', function() {
				document.getElementById('banner-2-div').innerHTML = this.responseText;
			});
		}
		
		if(window.google_ad_refreshed_slot && window.googletag) {
			window.googletag.pubads().refresh([window.google_ad_refreshed_slot]);
			window.google_ad_refreshed_slot = null;
		}
	}

	// show user count
	var node = document.createElement('div');
	node.className = 'total-users';
	node.innerHTML = "<span class='statistics-title'>Total users:</span><span class='statistics-content'>472328</span><br><span class='statistics-title'>Users online today:</span><span class='statistics-content'>6898</span>";
	document.getElementById('login-google_drive-div').appendChild(node);

	onLoadResource();
});