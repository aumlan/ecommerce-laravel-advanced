<?php

function setSuccess($message){
    session()->flash('type','success');
    session()->flash('message',$message);
}

function setError($message){
    session()->flash('type','warning');
    session()->flash('message',$message);
}
