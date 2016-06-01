$(document).ready(function(){
    var StripeBilling = {
        init: function () {
            this.form = $('#billing-form');
            this.submitButton = this.form.find("input[type=submit]");
            this.submitButtonValue= this.submitButton.val();

            var stripeKey = $('meta[name="publishable-key"]').attr('content');

            Stripe.setPublishableKey(stripeKey);

            this.bindEvents();
        },

        bindEvents: function(){

            this.form.on('submit', $.proxy(this.sendToken, this));
        },

        sendToken: function(event){
            this.submitButton.val('Palaukite...').prop('disabled', true);
            Stripe.createToken(this.form, $.proxy(this.stripeResponseHandler, this));
            event.preventDefault();
            //alert('Iki cia good');
        },
        stripeResponseHandler: function(status, response){
            if(response.error){
                console.log(response.error);
                this.form.find('.payment-errors p').show().text(response.error.message);
              flashMessage(response.error.message);
              return this.submitButton.prop('disabled', false).val(this.submitButtonValue);
            }
            $('<input>',{
                type: 'hidden',
                name: 'stripeToken',
                value: response.id
            }).appendTo(this.form)

            this.form[0].submit();
        }


    };

    StripeBilling.init();
});