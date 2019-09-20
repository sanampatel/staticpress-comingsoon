@extends('_layouts.master')

@section('content')
	<div class="bg-g1 size1">
		<div class="box uk-text-center uk-container uk-container-xsmall">
			<h3 class="l1-txt1">
				Coming soon
			</h3>
			<p class="txt-center l1-txt2 p-b-60">
				Our website is under construction
			</p>
			<div id="vue-search" class="uk-padding-large uk-padding-remove-horizontal">
				<search deadline="{{ $settings->setting->date }}"></search>
			</div>
			<footer class="uk-margin-large-top uk-text-small uk-light">
				@ 2019 Coming Soon Template. Designed by <span><a class="uk-light hm-link" href="https://staticpress.io">StaticPress</a></span>
			</footer>
		</div>
	</div>
@endsection