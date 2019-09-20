<?php

return [
	'production' => false,
	'google_analytic_code' => 'UA-23560239-19',
	'disqus_code' => 'staticpress-demo',
	'title' => 'Demo of StaticPress',
	'mainUrl' => 'https://comingsoon-demo.staticpress.io',
	'baseUrl' => 'https://comingsoon-demo.staticpress.io',
	'siteAuthor' => 'Hence Media Pvt. Ltd.',
	'site' => [
		'title' => 'Demo of StaticPress',
	],
	'collections' => [
		'settings' => [
			'path' => 'settings/{filename}',
			'extends' => '_layouts.master',
			'section' => '',
			'name' => function ($page) {
				return $page->getFilename();
			},
		],
	],
	'excerpt' => function ($page, $limit = 250, $end = '...') {
		return $page->isPost
			? str_limit_soft(content_sanitize($page->getContent()), $limit, $end)
			: null;
	},
    'url' => function ($page, $path) {
        return starts_with($path, 'http') ? $path : '/' . trimPath($path);
    },
];