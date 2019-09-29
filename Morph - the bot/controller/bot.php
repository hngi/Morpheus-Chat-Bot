<?php
class Bot extends fh_ctrl{
    protected $kb,
                $logger,
                $user_name = NULL,
                $name_conf = NULL,
                $word = NULL,
                // user name error messages
                $user_name_err = array(
                    "I'm sorry i have still not gotten your name",
                    "You know i cannot continue without getting your name, i've got to get it",
                    'I really need your name to maintain a proper conversation'
                ),
                $catch_phrase_name = array(
                    "my name is",
                    "i am",
                    "call me",
                    "i would like you to call me",
                    "i like to be called"
                ),
                $name_conf_phrase = array(
                    "yes i do",
                    "yes",
                    "no",
                    "no i don't",
                    "no i do not"
                ),
                $qtn_catch_phrase = array(
                  "what is the meaning of",
                  "what is the definition of",
                  "define",
                  "can you define",
                  "tell me about",
                  "explain",
                  "juxtapose"
                ),
                $no_result = array(
                    "Sorry, i'm finding it hard getting the meaning of that word, but i'm currently learning new words every hour",
                    "I can't seem to find a meaning to that word",
                    "You seem to be smarter than me, but i'm currently learning new words by the hour"
                );
    
    function index(){
        $this->kb = inst('kb','model');
        $this->logger = inst('logger','model');
    }
    
    function Response(){
        $this->data['text_input'] = strtolower(clean_data($this->post('text_input')));
        
        shuffle($this->user_name_err);
        
        shuffle($this->no_result);
        
        try{
            if(!empty($this->data['text_input'])){
                // check if user has defined their name
                if(empty(call_sess('user_name'))){
                    if(empty(call_sess('tmp_name'))){
                        // loop through the catch phrases for defining name
                        for($i=0;$i<=count($this->catch_phrase_name)-1;$i++){
                            if(strpos($this->data['text_input'],$this->catch_phrase_name[$i]) !== FALSE){
                                // get user name from the phrase
                                $this->user_name = explode($this->catch_phrase_name[$i],$this->data['text_input'])[1];
                            }
                        }
                        
                        $this->sess('tmp_name',empty($this->user_name) ? $this->data['text_input'] : $this->user_name);
                    
                        print json_encode(
                            array(
                              "error" => 0,
                              "msg" => "
                                        Ok, do you want me to call you <b>".ucfirst(call_sess('tmp_name'))."</b>?
                                        <br />
                                        You can reply by saying <b>'Yes i do'</b> or <b>'Yes'</b> to confirm your name or 'No i don't' or 'No' to change it.
                                        "
                            )
                        );
                    }
                    else{
                        // check for confirmation
                        if(in_array(strtolower($this->data['text_input']),$this->name_conf_phrase)){
                            $this->name_conf = $this->data['text_input'];
                            
                            if(strpos($this->data['text_input'],'no') !== FALSE){
                                // remove temp name
                                $this->remove_sess('tmp_name');
                                
                                print json_encode(
                                    array(
                                      "error" => 0,
                                      "msg" => "Ok, i'm not gonna save that, what would you like me to call you then?"
                                    )
                                );
                            }
                            else if(strpos($this->data['text_input'],'yes') !== FALSE){
                                // save user name
                                $this->sess('user_name',call_sess('tmp_name'));
                                
                                print json_encode(
                                    array(
                                      "error" => 0,
                                      "msg" => "
                                                Now, i have your name as <b>".ucfirst(call_sess('tmp_name'))."</b>?
                                                <br />
                                                So, what word would you like me to help you with?
                                                <br />
                                                You can ask me the meaning of any word, try saying:
                                                <br /><br />
                                                <div class='well'>
                                                    <b>'Define stupid'</b> or <b>'What is the meaning of lazy'<b>
                                                </div>
                                                "
                                    )
                                );
                                
                                // save user name to log
                                $data = array(
                                    'user_names' => call_sess('tmp_name'),
                                    'date_time_accessed' => now()
                                );
                                $this->logger->storeRow($data);
                                
                                // remove temp name
                                $this->remove_sess('tmp_name');
                            }
                        }
                        else{
                            print json_encode(
                                    array(
                                      "error" => 0,
                                      "msg" => "
                                                I can't seem to figure that out ".call_sess('user_name')."...<br />
                                                Would you like me to save your name as <b>".ucfirst(call_sess('tmp_name'))."</b>
                                                "
                                    )
                                );
                        }
                    }
                }
                // IF MORPH HAS YOUR NAME
                else{
                    // loop through the catch phrases for defining a word
                    for($i=0;$i<=count($this->qtn_catch_phrase)-1;$i++){
                        if(strpos($this->data['text_input'],$this->qtn_catch_phrase[$i]) !== FALSE){
                            // get user name from the phrase
                            $this->word = explode($this->qtn_catch_phrase[$i],$this->data['text_input'])[1];
                        }
                    }   

                    $this->word = trim(!empty($this->word)?$this->word:$this->data['text_input']);
                    
                    // check db for word
                    $param['where'] = array('qtns' => $this->word);
                    $db_res = $this->kb->getRow($param);
                    
                    if(empty($db_res)){
                        print json_encode(
                                array(
                                  "error" => 0,
                                  "msg" => $this->no_result[0]
                                )
                            );
                    }
                    else{
                        // check if antonyms is defined for word
                        if(!empty($db_res['anto'])){
                            $anto_str = NULL;
                            if(strpos($db_res['anto'],',') !== FALSE){
                                // loop through antonyms
                                $anto_arr = array_filter(explode(',',$db_res['anto']));
                                for($i=0;$i<=count($anto_arr)-1;$i++){
                                    $anto_str .= '<li>'.$anto_arr[$i].'</li>';
                                }
                            }
                            else{
                                $anto_str = '<li>'.$db_res['anto'].'</li>';
                            }
                            
                            $anto = '<br /><b>Antonyms</b>    
                                    <br />
                                    <ul>
                                    '.$anto_str.'
                                    </ul>';
                        }
                        else{
                            $anto = NULL;
                        }
                        
                        // check if synonyms is defined for word
                        if(!empty($db_res['syno'])){
                            $syno_str = NULL;
                            if(strpos($db_res['syno'],',') !== FALSE){
                                // loop through synonyms
                                $syno_arr = array_filter(explode(',',$db_res['syno']));
                                for($i=0;$i<=count($syno_arr)-1;$i++){
                                    $syno_str .= '<li>'.$syno_arr[$i].'</li>';
                                }
                            }
                            else{
                                $syno_str = '<li>'.$db_res['syno'].'</li>';
                            }
                            $syno = '<br /><b>Synonyms</b>    
                                    <br />
                                    <ul>
                                    '.$syno_str.'
                                    </ul>';
                        }
                        else{
                            $syno = NULL;
                        }
                        
                        // check if examples is defined for word
                        if(!empty($db_res['exam'])){
                            $exam_str = NULL;
                            if(strpos($db_res['exam'],'|') !== FALSE){
                                // loop through examples
                                $exam_arr = array_filter(explode('|',$db_res['exam']));
                                for($i=0;$i<=count($exam_arr)-1;$i++){
                                    $exam_str .= '<li><i>"'.$exam_arr[$i].'"</i></li>';
                                }
                            }
                            else{
                                $exam_str = '<li><i>"'.$db_res['exam'].'"</i></li>';
                            }
                            $exam = '<br /><b>Examples</b>    
                                    <br />
                                    <ul>
                                    <i>'.$exam_str.'</i>
                                    </ul>';
                        }
                        else{
                            $exam = NULL;
                        }
                        
                        
                        print json_encode(
                                array(
                                  "error" => 0,
                                  "msg" => "Here is a result for you ".call_sess('user_name')."<br /><b>".ucfirst($this->word)."</b>
                                            <br />
                                            ".$db_res['ans'].$anto.$syno.$exam
                                )
                            );
                    }
                }   
            }
        }
        catch(Exception $e){
            print json_encode(
                array(
                    "error" => 1,
                    "msg" => $e->getMessage()
                )  
            );
        }
        
        $this->ajax();
    }
}