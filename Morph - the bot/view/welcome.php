<div class="container chat-container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <div class="all-words">
                <div class="chat-header">
                    <h4>Words I Know</h4>
                </div>
                <div class="words-added-container">
                    <?php if(!empty($words)): ?>
                            <?php foreach($words as $word): ?>
                                    <p><?php print ucfirst($word['qtns']) ?></p>
                            <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="chat-header">
                <a href="#"><img src="https://res.cloudinary.com/gfellah45/image/upload/v1569591397/malebot_m3bxxc.png" alt="chat logo"></a>
                    <div class="tag">
                        <h3>Morph</h3>
                        <p class="status">Online</p> 
                    </div>
            </div>
            
            <div class="chat-area">
                <div class="chat-display">
                    <?php if(empty(call_sess('user_name'))): ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 bub">
                                 <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="bot-avatar"><i class="mdi mdi-robot"></i> Morph</div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"></div>
                                </div>
                                <?php print $bot_intro[0] ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 bub">
                                 <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="bot-avatar"><i class="mdi mdi-robot"></i> Morph</div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"></div>
                                </div>
                                Ok, I think that's enough intro, now you know my name, can I get yours, type in your name in the textbox below.
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
                        </div>
                    <?php endif ?>
                </div>
                
                <div class="text-area">
                    <form id="msg_form">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10 unset-padding">
                                <input type="text" placeholder="Type a text..." class="form-control" name="text_input" id="text_input" style="background-color:#E0F8EA; color:rgba(0, 0, 0, 0.7); border-radius: 10px;" />
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 unset-padding">
                                <button type="submit" class="btn btn-warning btn-block" style="background-color:#42B883; border-radius: 100px; "><i class="mdi mdi-send" style="color: #ffffff;"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
    </div>
</div>