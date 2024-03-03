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
	
	</div>
	<button id="btn">Load more</button>

	<?php
	if ( isset( $attributes['message'] ) ) {
		/**
		 * The wp_kses_post function is used to ensure any HTML that is not allowed in a post will be escaped.
		 * @see https://developer.wordpress.org/reference/functions/wp_kses_post/
		 * @see https://developer.wordpress.org/themes/theme-security/data-sanitization-escaping/#escaping-securing-output
		 */
		echo wp_kses_post( $attributes['message'] );
	}
	?>
</div>
<script>
console.log( "I'm loaded!" );

let sidelinesData = document.getElementById("sidelinesName");

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
	let numArticles = value.length;
	let indexArticles = 0;
	for (indexArticles = 0; indexArticles < 4; indexArticles++) {
		sidelinesData.innerHTML += `<div class="item"><img src="${value[indexArticles].urlToImage}" /><div class="article-sidelines"><p class="sidelines-author">${value[indexArticles].author}</p><h3 class="sidelines-title">${value[indexArticles].title}</h3><span class="sidelines-publishedAt">${value[indexArticles].publishedAt}</span></div></div>`;
		//console.log(value[i].author);
	}
	
	console.log(value);
	console.log(indexArticles);
	
	const button = document.getElementById("btn");

	button.addEventListener("click", (event) => {
		console.log(indexArticles);
		if (indexArticles <= numArticles) {
			indexArticles++;
			sidelinesData.innerHTML += `<div class="item"><img src="${value[indexArticles].urlToImage}" /><div class="article-sidelines"><p class="sidelines-author">${value[indexArticles].author}</p><h3 class="sidelines-title">${value[indexArticles].title}</h3><span class="sidelines-publishedAt">${value[indexArticles].publishedAt}</span></div></div>`;
		}
		else {
			return;
		}
	});

	
});
</script>