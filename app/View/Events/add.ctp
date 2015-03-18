<?php  echo $this->Html->css('users/add');?>    
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script> 
<div style="margin-bottom:20px"></div>
<?php   
    echo $this->Form->create($model=false,array(
                                        'controller' => 'events',
                                        'action' => 'add',
                                        'type'=>'file',
                                        'role'=>'form',
                                        'id'=>'eventform',
                                        'class'=>'form-horizontal'  
                                        )
    );
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Choose Location</h4>
      </div>
      <div class="modal-body">
        <div id="map-canvas" class="box box-primary" style="height: 400px; width: 100%;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->
<div class="col-md-9 form-container">
    <div class="panel panel-info" id="commercial">
        <div class="panel-heading">
            <b>Commercial</b>                           
        </div>
        <div class="panel-body">
            <div class="row">
                <div class='form-group col-md-6'>
                    <label class="control-label col-sm-6 margin_left" style="" >Event Type</label>
                    <div class="col-sm-6">
                        <?php 
                        echo $this->Form->input(
                            'data.offer',
                            array('label' => false,
                                'class'=>'form-control input-sm',
                                'required'=>true,
                                'id'=>'offer',
                                'tabindex'=>'1',
                                'options' => array('Event'=>'Event',
                                                    'Offer'=>'Offer'
                                                ),
                                'empty' =>"Choose One",
                                'style'=>'padding-left:4px;'
                            )
                        );
                        ?>
                    </div>
                    <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Choose if you are adding event or offer </div> 
                    </a>
                </div>
                <div class='form-group col-md-6'>
                    <label class="control-label col-sm-4 margin_left">Plan</label>
                    <div class="col-sm-6">
                        <?php 
                        echo $this->Form->input(
                            'data.plan',
                            array('label' => false,
                                'class'=>'form-control input-sm',
                                'required'=>true,
                                'id'=>'plan',
                                'tabindex'=>'2',
                                'options' => array('Gold'=>'Gold',
                                            'Diamond'=>'Diamond'
                                            ),
                                'empty' =>"Choose One",
                                'style'=>'padding-left:4px;'
                            )
                        );
                        ?>
                    </div>
                      <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Whether the organizer has asked for Gold / Diamond Plan.</div> 
                    </a>
                </div>
            </div>
            <div class="row">                                   
                <div class="form-group col-md-6">
                    <label class="control-label col-sm-6 margin_left" style="">Amount Received</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon rupee" >
                                <?php echo $this->Html->image('rupee.png',array('style'=>'width:15px; height:15px')); ?>    
                            </span>
                            <input name="data[data][amount]" id="amount" type="text" class="form-control input-sm" tabindex ='3'>
                        </div>                          
                    </div>
                      <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Amount you received from organizer. Leave blank if not given</div> 
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-info" id="event_details">
        <div class="panel-heading">
           <b>Event Details</b> 
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label class="control-label col-sm-3" style="margin-left:0;">Event Name</label>
                    <div class="col-sm-7 pad-left-11 pl-15">
                        <input name="data[data][event_name]" type="text" class="form-control input-sm" tabindex ='4' id="event_name" maxlength="50" autocomplete="off" required="required">         
                    </div>
                      <a class="tip2" href="#"> 
                            <span class="fa fa-info-circle"></span> 
                            <div class="msg">Enter event name - Ex: Jaipur Gharana Exhibition</div> 
                        </a>
                    <div class="col-sm-3 charDisp" id="event_name_char_disp">
                        <small>
                            <span id="event_name_char">50</span>
                            <span>&nbsp;Characters left</span>
                        </small> 
                    </div>                               
                </div>             
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="">
                        <label class="desc control-label col-sm-3">One line Description</label>
                        <div class="col-sm-7 pad-left-11" >
                            <input name="data[data][oneline_description]" type="text" class="form-control input-sm" id="oneline_description" tabindex ='5' title="Enter oneline description" maxlength="62" required="required">              
                        </div>
                          <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Short and sweet event description : Ex - The best shawls from Jaipur</div> 
                    </a>
                        <div class="col-sm-3 charDisp" id="oneline_description_char_disp">
                            <small>
                                <span id="oneline_description_char">62</span>
                                <span>&nbsp;Characters left</span>
                            </small> 
                        </div>                           
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="">
                        <label class="control-label col-sm-3 desc desc-detail">Detail Description</label>
                        <div class="col-sm-7 pad-left-11" >
                            <textarea class="form-control input-sm" id="event_description" title="Enter event description" name="data[data][event_description]" tabindex ='6' style="resize: vertical; margin-top: 0px; margin-bottom: 5px; height: 68px;" rows="3" required="required"></textarea>
                        </div>
                          <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Details about events - Product details, History, Ticket prices, any rules / regulations</div> 
                    </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <label class="control-label col-sm-3 margin_left">Category</label>
                    <div class="col-md-9" id='getcategory' style='padding: 0 0 0 6px;'> 
                        <center>
                        <?php 
                        echo $this->Html->image('ajax-loader.gif',array('id'=>'catloader')
                        ); 
                        ?> 
                        </center>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                        <label class="control-label col-sm-6 p-0" style="margin-left:0;">Start Date</label>
                        <div class="input-group date col-sm-6" id="start" style="padding-left: 11px;">  
                            <input name="data[data][start_date]" type="text"  class="form-control input-sm" tabindex ='8' required id="start_date" aria-describedby="start_date_btn">
                            <span class="input-group-btn" id="start_date_btn">
                                <button class="btn default btn-sm picker" type="button">
                                    <i class="fa fa-calendar" ></i>
                                </button>
                            </span>                             
                        </div>
                    </div>
                    <div class="form-group col-sm-6 start-time">
                        <label class="control-label col-sm-5 p-0" style="margin-left:0;">Start Time</label>
                        <div class="input-group time col-sm-6" style="padding-left: 12px;">
                       <input type="text" name="data[data][start_time]" id="start_time" class="form-control input-sm disTime" required="required" readonly
                       aria-describedby="start_time_btn">
                         <span class="input-group-btn">
                                    <button class="btn default btn-sm picker" type="button" id="start_time_btn">
                                        <i class="fa fa-clock-o"></i>
                                    </button>
                                </span> 


                        </div>
                    </div>
                  <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Choose when the event starts and at what time it starts</div> 
                    </a>
                </div>
                <div class="col-sm-12">                        
                </div>              
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                        <label class="control-label col-sm-6 p-0" style="margin-left:0;">End Date</label>
                        <div class="input-group date col-sm-6" id="end" style="padding-left: 11px;">
                            <input name="data[data][end_date]" type="text" class="form-control input-sm" id="end_date" tabindex ='10' aria-describedby="end_date_btn">
                                <span class="input-group-btn" id="end_date_btn">
                                    <button class="btn default btn-sm picker" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 end-time">
                        <label class="control-label col-sm-5">End Time</label>
                            <div class="input-group time col-sm-6" style="padding-left: 12px;">
                                <input name="data[data][end_time]" type="text" class="input-sm form-control disTime" tabindex ='11' id="end_time" required="required" readonly>
                                 <span class="input-group-btn">
                                    <button class="btn default btn-sm picker" type="button" id="end_time_btn">
                                        <i class="fa fa-clock-o"></i>
                                    </button>
                                </span>
                            </div>
                    </div> 
                      <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Choose when event ends and what time it closes.<br /> If it is one day event, leave end date blank.</div> 
                    </a>
                </div>
                <div class="col-sm-12">                        
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <label class="control-label col-sm-3 " style="margin-left:0;">Venue</label> 
                    <div class="col-sm-7 pad-left-11">
                        <input name="data[data][venue]" type="text" id="venue" class="form-control input-sm" autocomplete="off" maxlength="32" tabindex ='12' required="required">
                    </div>
                      <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Exact venue of event. Ex : Chitnavis Centre, Near Hislop College</div> 
                    </a>
                    <div class="col-sm-3 charDisp" id="venue_char_disp">
                        <small>
                            <span id="venue_char">32</span>
                            <span>&nbsp;Characters left</span>
                        </small> 
                    </div>                          
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <label class="control-label col-sm-3" style="margin-left:0;">Location</label>   
                    <div class="col-sm-7 pad-left-11">
                        <input name="data[data][event_address]" type="text" tabindex ='13' id="event_address" class="form-control input-sm " onclick="initialize()" onfocusout="codeAddress()" autocomplete='off' required="required">
                    </div>
                    <div style="margin-top: 5px;float: right;font-size:12px;">
                       <a href="javascript:;" class="button" id='map' style="color:#dd4e4e ;"><i class="fa fa-map-marker"></i> Point On map</a>
                   </div>
                     <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">The exact location, choose from dropdown or point on the map.
                                  </div> 
                    </a>
                    <?php 
                    echo $this->Form->input(
                        'data.event_latitude',
                        array('label'=>'Event Latitude',
                            'id'=>'lat',
                            'type'=>'hidden',
                            'div' => false
                        )
                    );
                    ?>
                    <?php 
                    echo $this->Form->input(
                        'data.event_longitude',
                        array('label'=>'Event Longitude',
                            'id'=>'lng',
                            'type'=>'hidden',
                            'div' => false
                        )
                    );
                    ?>
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group" style="margin-left:0px;">
                        <label class="control-label col-sm-3 p-0" style="margin-left:0;">Who Can Attend</label>
                        <div class="col-sm-3 pl-0 who-can-attend" style="margin-left:0px;">
                            <?php 
                                echo $this->Form->input(
                                    'data.audience',
                                array('label' => false,
                                    'id'=>'audience',
                                    'class'=>'form-control input-sm',
                                    'required'=>true,
                                    'tabindex'=>'14',
                                    'options' => array(
                                       'Everyone'=>'Everyone',
                                     'Members Only'=>'Members Only',
                                     'Invitation Only'=>'Invitation Only'
                                        ),
                                        'empty' =>'Select One' 
                                    )
                                );
                            ?> 
                        </div>
                          <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Choose whether everyone can attend or it is members / invite only event</div> 
                    </a>
                    </div>
                </div>
            </div>
            
            
            <p class="bg-primary" style="width: 104%; margin-left: -13px; padding-left: 13px;">Photos For Gallery</p> 
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group ">
                        <label class="control-label col-sm-6 desc">Header Photo</label>
                        <div class="col-sm-4 file-top">
                            <input type="file" name="data[photo][event_photo]" title="Upload a Photo Max. 2MB" id="event_photo" tabindex ='15' required="required">
                            <input type="hidden" name="data[data][event_photo]" id="event_photo_path" class="form-control"> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="event_photo_loader" class="loader">
                    </div>
                    <div id="event_photo_output" class="loader"></div>
                        <div class='loader ml-0'>
                        <a id="event_photo_link"
                        class="test-popup-link thumbnail" style="display:none">
                              <img id="event_photo_display">
                            </a>
                    </div>
                </div>                  
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-sm-6 desc">Photo 1</label>
                        <div class="col-sm-4 file-top">
                            <input type="file" name="data[photo][photo_1]" id="photo_1" tabindex ='16' title="Upload a Photo Max. 2MB (optional)">
                            <input type="hidden" name="data[data][photo_1]" id="photo_1_path" class="form-control"> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="photo_1_loader" class="loader">
                    </div>
                    <div id="photo_1_output" class="loader"></div>
                        <div class='loader ml-0'>
                        <a id="photo_1_remove" style="display:none" >Remove Image
                             </a>
                         <a class="test-popup-link thumbnail" id="photo_1_link" style="display:none">
                             <img id="photo_1_display">
                             
                            </a>
                    </div>
                </div>                                      
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-sm-6 desc">Photo 2</label>
                        <div class="col-sm-4 file-top">
                            <input type="file" name="data[photo][photo_2]" id="photo_2" tabindex ='17' title="Upload a Photo Max. 2MB (optional)">
                            <input type="hidden" name="data[data][photo_2]" id="photo_2_path" class="form-control"> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="photo_2_loader" class="loader">
                    </div>
                    <div id="photo_2_output" class="loader"></div>
                        <div class='loader ml-0'>
                        <a id="photo_2_remove" style="display:none" >Remove Image
                             </a>
                                <a id="photo_2_link" class="test-popup-link thumbnail" style="display:none" >

                              <img id="photo_2_display">
                            </a>
                    </div>
                </div>                                  
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-sm-6 desc">Photo 3</label>
                        <div class="col-sm-4 file-top">
                            <input type="file" name="data[photo][photo_3]" id="photo_3" tabindex ='18' title="Upload a Photo Max. 2MB (optional)">
                            <input type="hidden" name="data[data][photo_3]" id="photo_3_path" class="form-control"> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="photo_3_loader" class="loader">
                    </div>
                    <div id="photo_3_output" class="loader"></div>
                        <div class='loader ml-0'>
                        <a id="photo_3_remove" style="display:none" >Remove Image
                             </a>
                                 <a id="photo_3_link" class="test-popup-link thumbnail" style="display:none">

                              <img id="photo_3_display">
                            </a>
                    </div>
                </div>                                          
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-sm-6 desc">Photo 4</label>
                        <div class="col-sm-4 file-top">
                            <input type="file" name="data[photo][photo_4]" id="photo_4" tabindex ='19' title="Upload a Photo Max. 2MB (optional)">
                            <input type="hidden" name="data[data][photo_4]" id="photo_4_path" class="form-control"> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="photo_4_loader" class="loader">
                    </div>
                    <div id="photo_4_output" class="loader"></div>
                        <div class='loader ml-0'>
                        <a id="photo_4_remove" style="display:none" >Remove Image
                             </a>
                                <a id="photo_4_link" class="test-popup-link thumbnail" style="display:none">

                              <img id="photo_4_display">
                            </a>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
    <div class="panel panel-info" id="organizer_details">
        <div class="panel-heading">
            <b>Organizer Details</b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-sm-5 left-24">Organizer Logo</label>
                        <div class="col-sm-6 file-top">
                            <input type="file" name="data[photo][organizer_logo]" tabindex ='20' title="Upload a Photo Max. 50kb" id="organizer_logo">
                            <input type="hidden" name="data[data][organizer_logo]" id="organizer_logo_path" class="form-control">
                        </div>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div id="organizer_logo_loader" class="loader">
                    </div>
                    <div id="organizer_logo_output" class="loader"></div>
                       <div class='loader ml-0'>
                       <a id="organizer_logo_remove" style="display:none" >Remove Image
                             </a>
                  <a class="test-popup-link thumbnail" id="organizer_logo_link" style="display:none">

                              <img id="organizer_logo_display">
                            </a>
                    </div>
                </div>                  
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-sm-5 desc left-24" style="padding-left: 0px;">Organizer Name</label>
                        <div class="col-sm-6 pad-left-4">
                            <input name="data[data][organizer_name]" class="form-control input-sm" title="Enter Organizer Name" id="organizer_name" tabindex ='21' maxlength="32" required="required">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label desc col-sm-4">Contact No.</label>
                        <div class="col-sm-6">
                            <input name="data[data][organizer_contact]" class="form-control input-sm" title="Enter Organizer Contact No." id="organizer_contact" maxlength="10" tabindex ='22' type="text">
                        </div>
                          <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Enter Organizer's name and their contact number.</div> 
                             </a>
                    </div>
                </div>
            </div>
            <div class="row">               
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label desc col-sm-5 left-24" style="padding-left: 0px;">About Organizer</label>
                        <div class="col-md-6 pad-left-4">
                            <textarea tabindex="23" class="form-control input-sm" title="Enter Short Description about Organizer" name="data[data][organizer_about]" style="resize: vertical; margin-top: 0px; margin-bottom: 5px; height: 68px;" rows="3" id="organizer_about"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label desc col-sm-4">Website</label>
                        <div class="col-sm-6">
                            <input name="data[data][organizer_website]" class="form-control input-sm" title="Enter Organizer Website" id="organizer_website" tabindex ='24' type="url" >
                        </div>
                          <a class="tip2" href="#"> 
                                  <span class="fa fa-info-circle"></span> 
                                  <div class="msg">Enter Organizer's Website address</div> 
                    </a>
                    </div>  
                </div>
            </div>
        </div>
    </div> 
    <div class="panel panel-info" id="notification">
        <div class="panel-heading">
            <b>Notifications</b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">                  
                    <div class='form-group'>
                        <label class="control-label col-sm-5 left-24" tabindex ='25'>Notify?</label>
                        <div class="col-sm-6 pad-left-4">
                            <label class="radio-inline" style="margin-left:-1px;">
                                <input type="radio" name="data[data][notif]" id="optionsRadiosInline1" value="y">Yes
                            </label>
                            <label class="radio-inline" >
                                <input type="radio" name="data[data][notif]" id="optionsRadiosInline2" value="n" checked>No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                        <label class="control-label p-0 col-sm-6" style="margin-left:0;">Date</label>
                        <div class="input-group date p-0 col-sm-6" id="notif" style="padding-left: 12px;">  
                            <input name="data[data][notif_date]" type="text"  class="form-control input-sm" tabindex ='26' id="notif_date" aria-describedby="notif_date_btn" readonly>
                            <span class="input-group-btn">
                                <button class="btn default btn-sm picker" id="notif_date_btn" type="button" disabled>
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>                             
                        </div>
                    </div>
                    <div class="form-group col-sm-6 end-time">
                        <label class="control-label p-0  col-sm-5" style="margin-left:0;"> Time</label>
                        <div class="input-group time col-sm-6" style="padding-left: 12px;">
                            <input name="data[data][notif_time]" readonly type="text" class="form-control input-sm disTime" tabindex ='27' id="notif_time" required aria-describedby="notif_time_btn">
                            <span class="input-group-btn">
                                    <button class="btn default btn-sm picker" type="button" id="notif_time_btn">
                                        <i class="fa fa-clock-o"></i>
                                    </button>
                                </span>
                              
                        </div>
                    </div>
                      <a class="tip2" href="#"> 
                                 <span class="fa fa-info-circle"></span> 
                                <div class="msg">Date and time of sending notification to users.</div> 
                                </a> 
                </div>
                <div class="col-sm-12">                        
                </div>              
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="margin-left:0;">Message</label>
                        <div class="col-sm-9 pad-left-4" >
                            <textarea class="form-control" tabindex="28" title="Message to be sent in Notification" name="data[data][notif_msg]" id='notif_msg' style="resize: vertical; width:66%; margin-top: 0px; margin-bottom: 5px; margin-right: 10px; height: 68px; float: left;" rows="3" maxlength="140" readonly></textarea>
                            <a class="tip2" href="#"> 
                                 <span class="fa fa-info-circle"></span> 
                                <div class="msg">The message to accompany the notification</div> 
                                </a> 
                           <span class="help-block" style="float:right;width: 125px;">Characters Left &nbsp;<div id="notif_msg_char"style="float:right;margin-right:12px;">140</div></span>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="process" style="display:none;">
        <div class="mask">
        </div>
        <div id="loading" >
                <?php echo $this->Html->image('ajax-white.gif'); ?>
        </div>
    </div>
    <center>
        <?php  
            echo $this->Form->button('Create Event',
                                    array('type'=>'submit',
                                          'class'=>'btn btn-success',
                                            'tabindex'=>'28',
                                            'style'=>'width:25%;margin-bottom:10px;',
                                            'id'=>'submit'
                                        )
            );
        ?>
    </center>
</div>
    <?php echo $this->Form->end(); ?>
<?php 
    echo $this->Html->script(array('bootstrap-datepicker',
                                    'clockface',
                                    'custom/datepic',
                                    'main_maps_file',
                                    'gmaps',
                                    'custom/plan',
                                    'custom/image-upload',
                                    'custom/ajax/add',
                                    'jquery.magnific-popup'
                            )
    );
?>
<script>
    $('#map').click(function(){
        $('#myModal').modal({
            backdrop:true
        });
    });
    $('#myModal').on("shown.bs.modal", function () {
        var lat = parseFloat($('#lat').val());
        var lng = parseFloat($('#lng').val());
          google.maps.event.trigger(map, 'resize');
        if(lat&&lng){
          map.setCenter(new google.maps.LatLng(lat, lng));
        }else{
            map.setCenter(new google.maps.LatLng(21.1610859, 79.0725101));
        }

    });
</script>
<script>
    $('.test-popup-link').magnificPopup({ 
  type: 'image'
    // other options
    });
</script>   