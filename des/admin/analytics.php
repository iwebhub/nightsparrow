<?php include('inc/header.php'); ?>
<div class="cont">
	<div class="more"><button class="more-themes">Get raw results</button><button class="more-themes">Export CSV data</button></div>
	<p class="input-desc">Analytics for:</p>
	<input type="text" name="name" value="" id="search" class="search" placeholder="Analytics for..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Analytics for...'" title="today, yesterday...">
	<div class="analytics-wrapper ">
		<div class="single s-u">
			<h1>20,215</h1>
			<p class="key">Past 30 days</p>
		</div>
		<div class="single s-u">
			<h1>4,231</h1>
			<p class="key">Yesterday</p>
		</div>
		<div class="single s-u">
			<h1>1,215</h1>
			<p class="key">Today</p>
		</div>
		<div class="single s-u">
			<h1>215</h1>
			<p class="key">Last 6 hours</p>
		</div>

		<div class="single-list">
			<h3>All views by page</h3>
			<p class="row">/about <span>2,345 views</span></p>
			<p class="row">/contact <span>2,634 views</span></p>
			<p class="row">/credits <span>4,331 views</span></p>
			<p class="row">/users <span>1,355 views</span></p>
			<p class="row">/settings <span>224,245 views</span></p>
		</div>
		<div class="single-list">
			<h3>All views by page in last 24 hours</h3>
			<p class="row">/about <span>2,345 views</span></p>
			<p class="row">/contact <span>2,634 views</span></p>
			<p class="row">/credits <span>4,331 views</span></p>
			<p class="row">/users <span>1,355 views</span></p>
			<p class="row">/settings <span>224,245 views</span></p>
		</div>
	</div>
</div>
<?php include('inc/footer.php'); ?>