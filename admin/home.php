<?php 

if(Session::exists('admin_home')){
    echo '<p class="status">'.Session::flash('admin_home').'</p>';
}