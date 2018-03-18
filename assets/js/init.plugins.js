jQuery(document).ready(function(){

    jQuery("#images-gallery").unitegallery({
        tiles_type:"nested",
        tiles_nested_optimal_tile_width:150,
        tile_enable_shadow:false,
        tile_enable_border:true,
        tiles_space_between_cols:10,
        tiles_justified_space_between:10,
        tiles_col_width:235,
        tile_border_color: "#ffffff",
        tile_enable_outline:true,
        tile_enable_textpanel:true,
        tile_textpanel_bg_color: "#3A85E0",
        tile_textpanel_bg_opacity:0.8,
        tile_textpanel_title_color: "yellow",
        tile_textpanel_title_text_align: "center",
    });

});