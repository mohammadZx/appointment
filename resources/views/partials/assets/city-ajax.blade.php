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

			if($(".selectpicker.city.add").data('value') != null){
				
				$.ajax({
					url: '/api/city-search',
					type: 'POST',
					dataType: 'json',
					data: {
					q: $(".selectpicker.city.add").data('value') 
					},
					success: function(data){
					html = ''
					$.each(data, function (key, value) {
						html += `<option value="${value.id}" ${$(".selectpicker.city.add").data('value') == value.id ? 'selected' : null} >${value.province.name} - ${value.name}</option>`
					});

					$(".selectpicker.city.add").html(html)

					$(".selectpicker.city.add")
			.selectpicker('refresh')
					}
				});


			}



			// Province

			var options = {
			preserveSelected: false,
			ajax: {
				url: "/api/province-search",
				type: "POST",
				dataType: "json",
				data: {
				q: "@php echo '{{{q}}}' @endphp"
				}
			},
			locale:{
				searchPlaceholder: "نام استان را جستجو کنید",
				statusSearching: "درحال جستجو",
				statusInitialized: "استان مورد نظر را جستجو کنید",
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
						text: data[i].name,
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

			$(".selectpicker.province")
			.selectpicker()
			.ajaxSelectPicker(options);


		})

	</script>