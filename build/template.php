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
	id="starships"
	<?php echo get_block_wrapper_attributes(); ?>>
	<div id="starshipName" class="row">
		<h3>Name</h3>
	</div>
	<div id="starshipClass" class="row">
		<h3>Class</h3>
	</div>
	<div id="starshipCrews" class="row">
		<h3>Crews</h3>
	</div>
	<div id="starshipCredits" class="row">
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
//console.log( "I'm loaded!" );

let starshipNames = document.getElementById("starshipName");
let starshipClasses = document.getElementById("starshipClass");
let starshipCrews = document.getElementById("starshipCrews");
let starshipCredits = document.getElementById("starshipCredits");

let promise1 = new Promise(function (resolve, reject) {
	let xhr = new XMLHttpRequest(),
		method = "GET",
		url = "https://swapi.dev/api/starships/";

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
	for (let starshipName in value.results) {
		starshipNames.innerHTML += `<div class="item">${value.results[starshipName].name}</div>`;
	}
	for (let starshipClass in value.results) {
		starshipClasses.innerHTML += `<div class="item">${value.results[starshipClass].starship_class}</div>`;
	}
	for (let starshipCrew in value.results) {
		starshipCrews.innerHTML += `<div class="item">${value.results[starshipCrew].crew}</div>`;
	}
	for (let starshipCredit in value.results) {
		starshipCredits.innerHTML += `<div class="item">${value.results[starshipCredit].cost_in_credits}</div>`;
	}
	//console.log(value);
});
</script>