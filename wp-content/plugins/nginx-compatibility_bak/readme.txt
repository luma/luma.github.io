=== nginx Compatibility ===
Contributors: vladimir_kolesnikov
Donate link: http://blog.sjinks.pro/feedback/
Tags: nginx, pretty permalinks, FastCGI
Requires at least: 2.5
Tested up to: 2.9
Stable tag: 0.2.2

The plugin makes WordPress more friendly to nginx.

== Description ==

The plugin solves two problems:

1. When WordPress detects that FastCGI PHP SAPI is in use, it
[disregards the redirect status code](http://blog.sjinks.pro/wordpress/510-wordpress-fastcgi-and-301-redirect/)
passed to `wp_redirect`. Thus, all 301 redrects become 302 redirects
which may not be good for SEO. The plugin overrides `wp_redirect` when it detects
that nginx is used.
1. When WordPress detects that `mod_rewrite` is not loaded (which is the case for nginx as
it does not load any Apache modules) it falls back to [PATHINFO permalinks](http://codex.wordpress.org/Using_Permalinks#PATHINFO:_.22Almost_Pretty.22)
in Permalink Settings page. nginx itself has built-in support for URL rewriting and does not need
PATHINFO permalinks. Thus, when the plugin detects that nginx is used, it makes WordPress think
that `mod_rewrite` is loaded and it is OK to use pretty permalinks.

The plugin does not require any configuration. It just does its work.
You won't notice it — install and forget.

**WARNING:** nginx must be configured properly to support permalinks.

== Installation ==

1. Upload `nginx-compatibility` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress. The plugins comes in two flavors: PHP4 (experimental) and PHP5. Please activate
the flavor that matches your PHP version.
1. That's all :-)

== nginx Configuration ==

**nginx 0.7.32 and higher:**

`
server {
    server_name mysite.com;

    root /path/to/blog;

    index index.php;

    location / {
        try_files $uri $uri/ @wordpress;
    }

    location @wordpress {
        fastcgi_pass ...;
        fastcgi_param SCRIPT_FILENAME $document_root/index.php;
        include /etc/nginx/fastcgi_params;
        fastcgi_param SCRIPT_NAME /index.php;
    }

    location ~ \.php$ {
        try_files $uri @wordpress;
        fastcgi_index index.php;
        fastcgi_pass ...;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include /etc/nginx/fastcgi_params;
    }
}
`

**Older versions:**

`
server {
    server_name mysite.com;

    root /path/to/blog;

    index index.php;

    location / {
        log_not_found off;
        error_page 404 = @wordpress;
    }

    location @wordpress {
        fastcgi_pass ...;
        fastcgi_param SCRIPT_FILENAME $document_root/index.php;
        include /etc/nginx/fastcgi_params;
        fastcgi_param SCRIPT_NAME /index.php;
    }

    location ~ \.php$ {
        if (!-e $request_filename) {
            rewrite ^(.+)$ /index.php break;
            break;
        }

        fastcgi_index index.php;
        fastcgi_pass ...;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include /etc/nginx/fastcgi_params;
    }
}
`

Of course, do not forget to replace `...` in `fastcgi_pass` with the address/socket
php-cgi is listening on and replace /path/to/blog with the actual path.

Also please note that the path in `SCRIPT_NAME` should be relative to the `DOCUMENT_ROOT` (`root` directive).
Thus, if your WordPress blog resides in `http://example.com/blog/`, `root` is set to `/path.to/example.com`,
`SCRIPT_NAME` in `location @wordpress` will be `/blog/index.php`.

**Need help with configuring nginx?** Contact me: vkolesnikov at odesk dot com, I will help you.

== Frequently Asked Questions ==

None yet. Be the first to ask.

== Changelog ==

= 0.2.2 =
* Better HTTPS handling
* Updated "nginx Configuration" section
* Fixed a bug with multiple calls to `wp_redirect()` (props KeRNel_x86)

= 0.2.1 =
* Code refactoring using [PHP code optimization methods](http://blog.sjinks.pro/php/651-php-code-beauty-impacts-performance-part-2/ "PHP Code Beauty Impacts Performance")
* Supported WP versions: 2.5-2.9

= 0.2 =
* Added experimental PHP4-compatble version of the plugin

= 0.1.1 =
* Added status code check to `wp_redirect`

= 0.1 =
* First public release

== Screenshots ==

None
