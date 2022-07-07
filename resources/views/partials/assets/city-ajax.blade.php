<script>
		jQuery(function($){
		var options = {
			preserveSelected: false,
			ajax: {
				url: "/api/city-search",
				type: "POST",
				dataType: "json",
				data: {
				q: "@php echo '{{{q}}}' @endphp"
				}
			},
			locale:{
				searchPlaceholder: "نام شهر یا استان را جستجو کنید",
				statusSearching: "درحال جستجو",
				statusInitialized: "شهر مورد نظر را جستجو کنید",
				statusNoResults: "محلی یافت نشد. دوباره امتحان کنید"
			},
			preprocessData: function(data) {
				var i,
				l = data.length,
				array = [];
				if (l) {
				for (i = 0; i < l; i++) {
					array.push(
					$.extend(true, data[i], {
						text: data[i].province.name + " - " + data[i].name,
						value: data[i].id,
						'data': {
							'lat': data[i].lat,
							'lon': data[i].lon
                    	},
					})
					);
				}

				}
				return array;


			}
			};

			$(".selectpicker.city")
			.selectpicker()
			.ajaxSelectPicker(options);
		})

	</script>