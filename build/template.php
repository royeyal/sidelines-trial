<?php
/**
 * All of the parameters passed to the function where this file is being required are accessible in this scope:
 *
 * @param array    $attributes     The array of attributes for this block.
 * @param string   $content        Rendered block output. ie. <InnerBlocks.Content />.
 * @param WP_Block $block_instance The instance of the WP_Block class that represents the block being rendered.
 */
?>
<div
	id="sidelines"
	<?php echo get_block_wrapper_attributes(); ?>>
	<div id="sidelinesName" class="row">
		<h3>Name</h3>
	</div>
	<div id="sidelinesClass" class="row">
		<h3>Class</h3>
	</div>
	<div id="sidelinesCrews" class="row">
		<h3>Crews</h3>
	</div>
	<div id="sidelinesCredits" class="row">
		<h3>Credits</h3>
	</div>

	<?php
	if ( isset( $attributes['message'] ) ) {
		/**
		 * The wp_kses_post function is used to ensure any HTML that is not allowed in a post will be escaped.
		 * @see https://developer.wordpress.org/reference/functions/wp_kses_post/
		 * @see https://developer.wordpress.org/themes/theme-security/data-sanitization-escaping/#escaping-securing-output
		 */
		//echo wp_kses_post( $attributes['message'] );
	}
	?>
</div>
<script>
console.log( "I'm loaded!" );

let sidelinesNames = document.getElementById("sidelinesName");
let sidelinesClasses = document.getElementById("sidelinesClass");
let sidelinesCrews = document.getElementById("sidelinesCrews");
let sidelinesCredits = document.getElementById("sidelinesCredits");

let promise1 = new Promise(function (resolve, reject) {
	let xhr = new XMLHttpRequest(),
		method = "GET",
		url = "https://336e1140-02c8-4b86-9ce2-bf4f0c8ed910.mock.pstmn.io/articles";

	xhr.open(method, url, true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			// readyState === Done / status === OK
			resolve(JSON.parse(xhr.responseText));
		}
	};
	xhr.send();
});

promise1.then(function (value) {
	for (let sidelinesName in value.results) {
		sidelinesNames.innerHTML += `<div class="item">${value.results[sidelinesName].author}</div>`;
	}
	for (let sidelinesClass in value.results) {
		sidelinesClasses.innerHTML += `<div class="item">${value.results[sidelinesClass].title}</div>`;
	}
	for (let sidelinesCrew in value.results) {
		sidelinesCrews.innerHTML += `<div class="item">${value.results[sidelinesCrew].publishedAt}</div>`;
	}
	for (let sidelinesCredit in value.results) {
		sidelinesCredits.innerHTML += `<div class="item">${value.results[sidelinesCredit].id}</div>`;
	}
	console.log(value);
});
</script>