@extends('expense.expenselayouttry')
@section('content')

<div class="container1 ">
		<div class="form-box">
			
		        <img src="{{ asset('images/bf_logo(1)-Photoroom.png') }}" class="img">
	
			<h1>Expense Voucher</h1>
			<form class="form" action="{{ route('expense.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="input-group-prepend col-12">
		<div class="input-field">
			<i class="fa-solid fa-calendar-days"></i>
			<input type="date" id="date" name="date" placeholder="mm-dd-yyyy" value="" required>
		</div>
		<div class="input-field">
			<div class="select">
				<i class="fa-solid fa-list"></i>
					<select class="expense" name="expense" id="expense" required>
						<option value="" disabled selected>Expense Category</option>
						<option value="snail">Snails Purchase</option>
						<option value="telephone_and_internet">Telephone & Internet</option>
						<option value="transportation">Transportation</option>
						<option value="production_expense">Production Expense</option>
						<option value="sales_expense">Sales Expense</option>
						<option value="haulage">Goods Haulage</option> 
						<option value="food">Food & Meals</option>
						<option value="travel_expense">Travel Expense</option>
						<option value="PR">PR</option>
						<option value="others">Others</option>			
					</select>
			</div>
		</div>
		<div class="input-field">
			<i class="fa-solid fa-naira-sign"></i>
			<input type="text" id="amount_display" placeholder="0.00" required autocomplete="off">
			<input type="hidden" id="amount" name="amount">
		</div>
		<div class="input-field">
			<i class="fa-solid fa-comment-dots"></i>
			<input type="text" id="narration" name="narration" placeholder="Expense Narration" required>  
		</div>
		
		<div class="input-field">
			<div class="select">
				<i class="fa-solid fa-person"></i>
					<select class="beneficiary" name="beneficiary" id="beneficiary" required>
						<option value="" disabled selected>Spending Staff</option>
						<option value="roselyn">Roselyn</option>
						<option value="kingsley">Kingsley</option>		
					</select>
			</div>
		</div>

		<div class="input-field">
			<i class="fa-solid fa-receipt"></i>
			<input type="file" accept="image/*" capture="environment" name="image" id="image"> 
		</div>
	</div>
	<div class="submit">
		<button type="submit" name="save" id="save">Submit</button>
	</div>
</form>

<script>
const displayInput = document.getElementById('amount_display');
const hiddenInput = document.getElementById('amount');

displayInput.addEventListener('input', function(e) {
	// Remove all non-digits and non-decimal points
	let value = e.target.value.replace(/[^\d.]/g, '');
	
	// Allow only one decimal point
	const parts = value.split('.');
	if (parts.length > 2) {
		value = parts[0] + '.' + parts.slice(1).join('');
	}
	
	// Limit to 2 decimal places
	if (parts[1] && parts[1].length > 2) {
		value = parts[0] + '.' + parts[1].substring(0, 2);
	}
	
	// Store the clean numeric value
	hiddenInput.value = value;
	
	// Format for display with thousand separators
	if (value) {
		const [whole, decimal] = value.split('.');
		const formatted = whole.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
		e.target.value = decimal !== undefined ? formatted + '.' + decimal : formatted;
	}
});

// Format on blur to ensure 2 decimal places
displayInput.addEventListener('blur', function() {
	if (hiddenInput.value) {
		const num = parseFloat(hiddenInput.value);
		if (!isNaN(num)) {
			hiddenInput.value = num.toFixed(2);
			const [whole, decimal] = hiddenInput.value.split('.');
			const formatted = whole.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
			this.value = formatted + '.' + decimal;
		}
	}
});

// Remove formatting on focus for easier editing
displayInput.addEventListener('focus', function() {
	if (hiddenInput.value) {
		this.value = hiddenInput.value;
		this.select(); // Select all for easy replacement
	}
});
</script>
		</div>		
	</div>

@endsection