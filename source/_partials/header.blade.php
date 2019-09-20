<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ $page->title }} | {{ $page->site->title }}</title>
	<meta name="robots" content="noindex, nofollow">
	<meta name="keywords" content="{{ $page->seokeywords ?? $page->seokeywords }}">
	<meta name="description" content="{{ $page->seodescription ?? $page->seodescription }}">
	
	<meta property="og:title" content="{{ $page->title}} | {{ $page->site->title }}"/>
	<meta property="og:type" content="website" />
	<meta property="og:url" content="{{ $page->getUrl() }}"/>
	<meta property="og:keywords" content="{{ $page->sitekeywords }}" />
	<meta property="og:description" content="{{ $page->sitedescription }}" />

	<link rel="home" href="{{ $page->baseUrl }}">
	<link rel="icon" href="/favicon.ico">
	<link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

	<!-- UIKIT -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/css/uikit.min.css" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/js/uikit-icons.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/fuse.js/3.4.5/fuse.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
	
	{{-- Custom CSS --}}
	<link rel="stylesheet" href="{{ $page->mainUrl }}/asset/build/css/main.css">

	<style type="text/css">
		.bg-g1 {
			@if($settings->setting->bgimg)
				background: url({{ $page->mainUrl }}/images/{{ basename($settings->setting->bgimg) }});	
			@elseif($settings->setting->bgcolor)
				background: {{ $settings->setting->bgcolor }};
			@endif
		}	
		.size1 {
			width: 100%;
			min-height: 100vh;
			justify-content: center;
			align-items: center;
			display: flex;
			background-size: cover;
		}
	</style>
</head>
<body>
	
	@include('_partials.nav')