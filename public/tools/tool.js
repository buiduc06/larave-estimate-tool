$('.cell-input-price').on('change', function () {
  let context = $(this).parents('tr');
  formulaInput(context);
});


$('.cell-input-number').on('change', function () {
  let context = $(this).parents('tr');
  formulaInput(context);
});

$('.cell-checkbox-price').on('change', function () {
  let context = $(this).parents('tr');

  if ($(this).is(':checked') === true) {
    context.find('.cell-checkbox-price').prop('disabled', true);
    $(this).prop('disabled', false);
  } else {
    context.find('.cell-checkbox-price').prop('disabled', false);
  }

  formulaInput(context);
});


function disableOtherInput() {

}

function formulaInput(context) {
  let t_price = 0;
  let t_number = 0;

  // get price
  context.find('td').each(function (index, element) {
    let value = $(element).find('.cell-input-price').val();
    let number = $(element).find('.cell-input-number').val();

    if (typeof value != "undefined") {
      if ($(element).find('.cell-checkbox-price').is(':checked')) {
        t_price = value;
      }
    }

    // get number
    if (typeof number != "undefined") {
      t_number = number;
    }
  });

  context.find('.formula-input').val(t_number * t_price);
}
