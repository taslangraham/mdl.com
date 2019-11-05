@extends('layouts.dashboard')

@section('content')
    
    <div class="container">
        <div class='row'>
            <div class='col-md-4'></div>
            <div class='col-md-4'>
                <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                <form accept-charset="UTF-8" action="{{route('stripe.payment')}}" class="require-validation"
                      data-cc-on-file="false"
                      data-stripe-publishable-key="pk_test_fvxpG4QYCclS5FhjBF3vDqB700QIXl354W"
                      id="payment-form" method="post">
                    {{ csrf_field() }}
                    
                    <div>
                        <div class="form-group">
                            <h1 class="label-primary">Card Details</h1>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label>
                                <input required class='form-control' size='4' type='text'>
                            </div>
                        </div>
                        
                        <div class='form-row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label>
                                <input required autocomplete='off' class='form-control card-number' size='20'
                                       type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-4 form-group cvc required'>
                                <label class='control-label'>CVC</label>
                                <input
                                        required
                                        autocomplete='off' class='form-control card-cvc'
                                        placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-4 form-group expiration required'>
                                <label class='control-label'>Expiration</label>
                                <input
                                        required
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>
                            </div>
                            <div class='col-xs-4 form-group expiration required'>
                                <label class='control-label'> </label>
                                <input
                                        required
                                        class='form-control card-expiry-year' placeholder='YYYY'
                                        size='4' type='text'>
                            </div>
                        </div>
                        
                        
                        <div class='form-row'>
                            <div class='col-xs-12 form-group required'>
                                <h1 class='control-label label-primary'>Address Details</h1>
                                <input type="checkbox" value="sameAddressCheckbox" id="sameAddressCheckbox">
                                same as home address
                                
                                <input type="text" required placeholder="Street" name='street'
                                       class="form-control  @error('street') is-invalid @enderror" id='street'>
                                <br>
                                @error('street')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" required placeholder="Town/City" name="town"
                                       class="form-control  @error('town') is-invalid @enderror" id="town">
                                @error('town')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <input type="text" required placeholder="Parish" name="parish"
                                       class="form-control  @error('PARISH') is-invalid @enderror" id="parish">
                                @error('parish')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>
                        </div>
                        
                        <div class='form-row'>
                            <div class='col-md-12'>
                                <div class='form-control total btn btn-info'>
                                    Total: <span class='amount'>{{'$ '. number_format($total,2) .'JMD'}}</span>
                                </div>
                            </div>
                        </div>
                    
                    
                    </div>
                    
                    
                    <div class='form-row'>
                        <div class='col-md-12 form-group'>
                            <button class='form-control btn btn-primary submit-button'
                                    type='submit' style="margin-top: 10px;">Pay »
                            </button>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try
                                again.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class='col-md-4'></div>
        </div>
    </div>


@endsection

@section('scripts')
    
    <script>


        const checkBoxOnChange = () => {
            $('#sameAddressCheckbox').change(function () {
                let street = document.getElementById('street');
                let town = document.getElementById('town');
                let parish = document.getElementById('parish');
                if (this.checked) {
                    street.value = "{{Auth::user()->street}}";
                    town.value = "{{Auth::user()->town}}";
                    parish.value = "{{Auth::user()->parish}}"

                } else {
                    street.value = "";
                    town.value = "";
                    parish.value = "";
                }
            });
        }
        checkBoxOnChange();
    </script>
    
    <script>
        const loadPayBtn = () => {
            $("#submitDiv").html(`<button class='form-control btn btn-success submit-button'
            type='submit' style='margin-top: 10px;'>Pay » </button>`);
        };

        $(document).ready(() => {
            loadPayBtn();
        });
    </script>
    
    
    <script>
        $(function () {
            $('form.require-validation').bind('submit', function (e) {
                var $form = $(e.target).closest('form'),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault(); // cancel on first error
                    }
                });
            });
        });
        $(function () {
            var $form = $("#payment-form");
            $form.on('submit', function (e) {

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        })
    </script>


@endsection