<?php

/*
Plugin Name: The Events Calendar Mods
Description: This will hold all the modifications done to The Events Calendar that could not be done by simply modifying the template files.
Plugin URI: 
Author: 
Author URI: 
Version: 1.0
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
*/

/*

    Copyright (C) 2015  

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

wp_dequeue_script('tribe-mini-calendar');
wp_enqueue_script('tribe-mini-calendar', plugins_url( 'js/widget-calendar.js', __FILE__), array('jquery', 'tribe-events-pro'), null, true);