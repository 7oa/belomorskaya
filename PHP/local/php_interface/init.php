<?
function prnt($data){
	echo "<div style='font-size: 12px; line-height: 16px; background: #eee; border: 1px solid #999; padding: 10px; margin: 10px'><pre>";
	print_r($data);
	echo "</pre></div>";
}

@require_once 'include/autoload.php';
define("RE_SITE_KEY","6LdgEx0UAAAAANOnL5SvK6pQ0XWfoqJlbEUhw7Kl");
define("RE_SEC_KEY","6LdgEx0UAAAAACceSjgn5STCepqI15c2UlmxiQtW");