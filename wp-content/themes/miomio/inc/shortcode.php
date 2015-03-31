<?php

/*escape space*/
function escape_space($content){

	$content = str_replace("<br />", '', $content);
    $content = str_replace("<br />\n", '', $content);
    $content = str_replace("<b>", '', $content);
    $content = str_replace("</b>\n", '', $content);

    return $content;
}

/*button shortcode
[button link="#" class="alert"]Ok[/button]*/
function button_func( $atts, $content='Button' ){
    $atts = (shortcode_atts( array(
        'link' => '#',
        'class' => ''
    ), $atts ));

    extract($atts);

    $button = '<a href="' . $link . '" class="button ' . $class . ' ">' . esc_html( $content ) . '</a>';
	return $button;
}
add_shortcode( 'button', 'button_func' );

/*button group shortcode
[button_group][button link="#" class="alert"]Ok[/button][/button_group]*/
function button_li_func( $atts, $content='Button' ){
    $atts = shortcode_atts( array(
        'link' => '#',
        'class' => ''
    ), $atts );

    extract($atts);

    $button = '<li><a href="' . $link . '" class="button ' . $class . ' ">' . esc_html( $content ) . '</a></li>';
	return $button;
}
add_shortcode( 'button_li', 'button_li_func' );

function button_group_func( $atts , $content = ''){
    $atts = shortcode_atts( array(
        'class' => ''
    ), $atts );
    
    $content = escape_space($content);

    extract($atts);

    $button_group = '<ul class="button-group ' . $class . '">' . do_shortcode( $content ) . '</ul>';
	return $button_group;
}
add_shortcode( 'button_group', 'button_group_func' );

/*grid shortcode
[row][col class="small-12"]col-12[/col][/row]*/
function col_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'class' => ''
	), $atts);

	extract($atts);

	$columns = '<div class="columns ' . $class . '">' . $content . '</div>';
	return $columns;
}
add_shortcode( 'col', 'col_func' );


function row_func( $atts, $content='' ){

	$content = escape_space($content);

	$row = '<div class="row">' . do_shortcode( $content ) . '</div>';
	return $row;
}
add_shortcode( 'row', 'row_func' );

/*panel shortcode
[panel][panel_cont class="show-for-large-up"]This text is shown on large screens and up.[/panel_cont][/panel]*/
function panel_cont_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'class' => ''
	), $atts);

	extract($atts);

	$panel_cont = '<span class="' . $class . '">' . esc_html( $content ) . '</span>';
	return $panel_cont;
}
add_shortcode( 'panel_cont', 'panel_cont_func' );


function panel_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'class' => ''
	), $atts);

	extract($atts);

	$content = escape_space($content);

	$panel = '<div class="panel ' . $class . '">' . do_shortcode( $content ) . '</div>';
	return $panel;
}
add_shortcode( 'panel', 'panel_func' );

/*button split shortcode
[button_split link="#" class="large" id="" label="Button-Ok"][button_split_li link="#"]link1[/button_split_li][/button_split]*/
function button_split_li_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'link' => '#'
	), $atts);

	extract($atts);

	$button_split_li = '<li><a href="' . $link . '">' . esc_html( $content ) . '</a></li>';
	return $button_split_li;
}
add_shortcode( 'button_split_li', 'button_split_li_func' );


function button_split_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'class' => '',
		'id' => '',
		'label' => 'Button Split'
	), $atts);

	extract($atts);

	$content = escape_space($content);

	$button_split = '<a href="#" class="button split ' . $class . '">' . $label . '<span data-dropdown="' . $id . '"></span></a><br>
	<ul id="' . $id . '" class="f-dropdown" data-dropdown-content>' . do_shortcode( $content ) . '</ul>';
	return $button_split;
}
add_shortcode( 'button_split', 'button_split_func' );

/*button dropdown shortcode
[button_dropdown link="#" class="large" id="" label="Button-Ok"][button_dropdown_li link="#"]link1[/button_dropdown_li][/button_dropdown]*/
function button_dropdown_li_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'link' => '#'
	), $atts);

	extract($atts);

	$button_dropdown_li = '<li><a href="' . $link . '">' . esc_html( $content ) . '</a></li>';
	return $button_dropdown_li;
}
add_shortcode( 'button_dropdown_li', 'button_dropdown_li_func' );


function button_dropdown_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'class' => '',
		'id' => '',
		'label' => 'Button Dropdown'
	), $atts);

	extract($atts);

	$content = escape_space($content);

	$button_dropdown = '<button data-dropdown="' . $id . '" aria-controls="drop", aria-expanded="false" class="button dropdown ' . $class . '">' . $label . '</button><br>
	<ul id="' . $id . '" data-dropdown-content class="f-dropdown" role="menu", aria-hidden="false" tabindex="-1">' . do_shortcode( $content ) . '</ul>';
	return $button_dropdown;
}
add_shortcode( 'button_dropdown', 'button_dropdown_func' );


/*label shortcode
[label class="alert"]Simple[/label]*/
function label_func( $atts, $content='Label' ){
    $atts = (shortcode_atts( array(
        'class' => ''
    ), $atts ));

    extract($atts);

    $label = '<span class="label ' . $class . '">' . esc_html( $content ) . '</span>';
	return $label;
}
add_shortcode( 'label', 'label_func' );


/*orbit shortcode
[orbit options=""][orbit_li src=""]Caption[/orbit_li][/orbit]*/
function orbit_li_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'src' => '#'
	), $atts);

	extract($atts);

	$orbit_li = '<li><img src="' . $src . '" />
    <div class="orbit-caption">' . $content . '</div></li>';
	return $orbit_li;
}
add_shortcode( 'orbit_li', 'orbit_li_func' );


function orbit_func( $atts, $content='' ){
	 $atts = (shortcode_atts( array(
        'options' => ''
    ), $atts ));

	extract($atts);

	$content = escape_space($content);

	$orbit = '<ul class="example-orbit" data-orbit data-options="' . $options . '">' . do_shortcode( $content ) . '</ul>';
	return $orbit;
}
add_shortcode( 'orbit', 'orbit_func' );

/*lightbox shortcode
[lightbox class=""][lightbox_img src="" src_th=""]Caption[/lightbox_img][/lightbox]*/
function lightbox_img_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'src' => '#',
		'src_th' => '#'
	), $atts);

	extract($atts);

	$lightbox_img = '<li><a href="' . $src . '"><img data-caption="' . $content . '" src="' . $src_th . '"></a></li>';
	return $lightbox_img;
}
add_shortcode( 'lightbox_img', 'lightbox_img_func' );


function lightbox_func( $atts, $content='' ){
	 $atts = (shortcode_atts( array(
        'class' => ''
    ), $atts ));

	extract($atts);

	$content = escape_space($content);

	$lightbox = '<ul class="clearing-thumbs ' . $class . '" data-clearing>' . do_shortcode( $content ) . '</ul>';
	return $lightbox;
}
add_shortcode( 'lightbox', 'lightbox_func' );


/*reveal  shortcode
[reveal btn_class="" panel_class="" id="" label=""]Caption[/reveal]*/
function reveal_func( $atts, $content='' ){
	 $atts = (shortcode_atts( array(
		'btn_class' => '',
		'panel_class' => '',
		'id' => '',
		'label' => 'Reveal'
    ), $atts ));

	extract($atts);

	$content = escape_space($content);

	$reveal = '<a href="#" data-reveal-id="' . $id . '" class="button ' . $btn_class . '">' . $label . '</a>
			<div id="' . $id . '" class="reveal-modal ' . $panel_class . '" data-reveal>' . do_shortcode( $content ) . '</div>';
	return $reveal;
}
add_shortcode( 'reveal', 'reveal_func' );


/*tooltip shortcode
[tooltip class="alert" title=""]Simple[/tooltip]*/
function tooltip_func( $atts, $content='Tooltip' ){
    $atts = (shortcode_atts( array(
        'class' => '',
        'title' => ''
    ), $atts ));

    extract($atts);

    $tooltip = '<span data-tooltip aria-haspopup="true" class="has-tip ' . $class . '" title="' . $title . '">' . esc_html( $content ) . '</span>';
	return $tooltip;
}
add_shortcode( 'tooltip', 'tooltip_func' );

/*progress shortcode
[progress class="alert" width="85%"]Simple[/progress]*/
function progress_func( $atts ){
    $atts = (shortcode_atts( array(
        'class' => '',
        'width' => ''
    ), $atts ));

    extract($atts);

    $progress = '<div class="progress ' . $class . '"><span class="meter" style="width: ' . $width . '"></span></div>';
	return $progress;
}
add_shortcode( 'progress', 'progress_func' );



/*video shortcode
[video class=""]video link[/video]*/
function video_func( $atts, $content='' ){
    $atts = (shortcode_atts( array(
        'class' => '',
    ), $atts ));

    extract($atts);

    $video = '<div class="flex-video ' . $class . '">' . $content . '</div>';
	return $video;
}
add_shortcode( 'video', 'video_func' );


/*accordion shortcode
[accordion][accordion_dd class="" id="" title=""]Caption[/accordion_dd][/accordion]*/
function accordion_dd_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'class' => '',
		'id' => '',
		'title' => 'Accordion'
	), $atts);

	extract($atts);

	$accordion_dd = '<dd class="accordion-navigation"><a href="#' . $id . '">' . $title . '</a><div id="' . $id . '" class="content ' . $class . '">' . $content . '</div></dd>';
	return $accordion_dd;
}
add_shortcode( 'accordion_dd', 'accordion_dd_func' );


function accordion_func( $atts, $content='' ){

	$content = escape_space($content);

	$accordion = '<dl class="accordion" data-accordion>' . do_shortcode( $content ) . '</dl>';
	return $accordion;
}
add_shortcode( 'accordion', 'accordion_func' );



/*tab shortcode
[tab][tab_dd class="" id="" text=""]Caption[/tab_dd][/tab]*/
function tab_dd_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'class' => '',
		'id' => '',
		'text' => 'tab'
	), $atts);

	extract($atts);

	$tab_dd = '<dd class="tab-navigation"><a href="#' . $id . '">' . $text . '</a><div id="' . $id . '" class="content ' . $class . '">' . $content . '</div></dd>';
	return $tab_dd;
}
add_shortcode( 'tab_dd', 'tab_dd_func' );


function tab_func( $atts, $content='' ){
	$atts = shortcode_atts( array(
		'class' => '',
		'tabs' => ''
	), $atts);

	extract($atts);

	$content = escape_space($content);

	$tab = '<dl class="tabs ' . $class . '" data-tab></dl>' . do_shortcode( $content ) . '';
	return $tab;
}
add_shortcode( 'tab', 'tab_func' );