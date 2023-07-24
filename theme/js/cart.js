function addToCart(productId)
{
	var quantityElementId = "product_quantity" + productId;
	var quantityElement = document.getElementById(quantityElementId);
	var quantity = quantityElement.value;
	
	var formId = "add-cart-form" + productId;
	
	$.ajax
	({
		url: "cart-action-add.php",
		type: "POST",
		contentType: false,
		cache: false,
		processData:false,
		data: new FormData(document.getElementById(formId)),
		success: function(data)
		{
			if(data == 0)
			{
				alert("Cart Updated Successfully");
				//location.reload();
				//update span id :: cart-product-count
				var cookies = { };
				var cartCookie = document.cookie;
				var targetCookie = null;
				if (cartCookie && cartCookie != '') {
					var split = cartCookie.split(';');
					for (var i = 0; i < split.length; i++) {
						var name_value = split[i].split("=");
						name_value[0] = name_value[0].replace(/^ /, '');
						if( name_value[0].localeCompare("shopping_cart") == 0 )
						{
							//alert(name_value[0]);
							cookies[decodeURIComponent(name_value[0])] = decodeURIComponent(name_value[1]);
							targetCookie = name_value[1];
						}
					}
				}
				Object.size = function(obj) {
					var size = 0, key;
					for (key in obj) {
						if (obj.hasOwnProperty(key)) size++;
					}
					return size;
				};
				//alert(targetCookie);
				var cookieString = JSON.stringify(targetCookie);
				//alert ((cookieString.match(/item_id/g) || []).length);
				document.getElementById("cart-product-count").innerHTML = ((cookieString.match(/item_id/g) || []).length);
			}
			else
			{
				alert("Error" + data);
				waitingDialog.hide();
			}
		},
		error: function()
		{
			alert("Oops something went wrong. Please try later.");
			waitingDialog.hide();
		}
	});
	
}

function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}