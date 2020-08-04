alert('Hello, Custom JS');

function showTable()
	{
		var menuString = localStorage.getItem('menulist');
		if(menuString)
		{
			$('#voucher-div').show();
			var menuArray = JSON.parse(menuString);
			var total = 0;
			var tbodyData = '';//for html code
			var tfootData = '';//for html code
			if(menuArray != 0)
			{
				//looping localstorage
				$.each(menuArray,function(i,v)
				{
					var name = v.name;
					var price = v.price;
					var qty = v.qty;
					var subtotal = price * qty;
					total += subtotal;

				tbodyData += `<tr>
						<td>
							${name}
						<span class="font-weight-lighter d-block">
						${price}
						</span>
						</td>

						<td>
						<button class="btn btn-secondary btn-sm plusBtn"
						data-id="${i}"> + </button>
						<span class="mx-2">${qty}</span>
						<button class="btn btn-secondary btn-sm minusBtn"
						data-id="${i}">-
						</button>
						</td>

						<td>
						${subtotal}</td>

						<td>
						<button class="btn btn-danger 
						btn-sm removeBtn" data-id="${i}">
						X
						</button>
						</td>
						</tr>`;
				});

				tfootData += `<tr>
								<td colspan="4">
								  <button class="btn btn-light 
								  btn-block" id="checkoutBtn">
								    Check Out
								    </button>
								</td>
							</tr>`;

				 $('tbody').html(tbodyData);
				 $('tfoot').html(tfootData);

			}
			else
			{
				//array is empty
				$('#voucher-div').hide();
			}
		}
		else
		{
			$('#voucher-div').hide();
		}
	}