let base_url = 'http://localhost/morpheus_bot/';

let form_data;
let text_input;

// adjust element scroll position
let messagediv = $('.chat-display');

messagediv.scrollTop(messagediv.prop("scrollHeight"));

$(function(){
    let id_counter = 1;
    $(document).on('submit','#msg_form',function(e){
        let messagediv = $('.chat-display');
        
        id_counter++;
        e.preventDefault();
        
        
        // get form data
        form_data = $(this).serialize();
        text_input = $('#text_input').val();
        
        if(text_input.length > 1 && text_input.trim() != ''){
            $('.chat-display').append('<div class="row"> \n'+
                        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div> \n'+
                        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 bub user"> \n'+
                            '<div class="row"> \n'+
                                '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"></div> \n'+
                                '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"> \n'+
                                    '<div class="user-avatar">Me <i class="mdi mdi-account"></i></div> \n'+
                                '</div> \n'+
                            '</div> \n'
                            +text_input+
                        '</div> \n'+
                    '</div>')
        
        
            // chat bot loader placeholder
            $('.chat-display').append('<div class="row" id="loader'+id_counter+'"> \n'+
                            '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 bub"> \n'+
                                 '<div class="row"> \n'+
                                    '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"> \n'+
                                        '<div class="bot-avatar"><i class="mdi mdi-robot"></i> Morph</div> \n'+
                                    '</div> \n'+
                                    '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"></div> \n'+
                                '</div> \n'+
                                'I\'m thinking... \n'+
                            '</div> \n'+
                            '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div> \n'+
                        '</div>')

            // adjust element scroll position
            messagediv.scrollTop(messagediv.prop("scrollHeight"));

            // send message to api
            $.post(
                base_url+'bot/Response/',
                form_data,
                function(data){
                    data = JSON.parse(data);

                    // remove placeholder loader
                    $('#loader'+id_counter).remove();

                    $('.chat-display').append('<div class="row"> \n'+
                            '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 bub"> \n'+
                                 '<div class="row"> \n'+
                                    '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"> \n'+
                                        '<div class="bot-avatar"><i class="mdi mdi-robot"></i> Morph</div> \n'+
                                    '</div> \n'+
                                    '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"></div> \n'+
                                '</div> \n'
                                +data.msg+
                            '</div> \n'+
                            '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div> \n'+
                        '</div>')

                    // clear input
                    $('#text_input').val('');

                    // adjust element scroll position
                    messagediv.scrollTop(messagediv.prop("scrollHeight"));
                }
            );   
        }
    })
})