<style>
.logo>a {
    font-weight: 700;
    color: {{ env('APP_PRIMARY_COLOR') }};
}
.header-area .seach_icon{
	background: {{ env('APP_PRIMARY_COLOR') }};
}
.boxed-btn4{
	background: {{ env('APP_PRIMARY_COLOR') }};
    color: #fff !important;
}
.boxed-btn4:hover{
	background: {{ env('APP_SECONDARY_COLOR') }};
    color: #fff !important;
}
.header-area .main-header-area .main-menu ul li a:hover {
    color: {{ env('APP_SECONDARY_COLOR') }};
}
.popular_places_area .single_place .thumb .prise, .custom_search_pop .modal-content .serch_form button{
	background: {{ env('APP_PRIMARY_COLOR') }};
}
.popular_places_area .single_place:hover .place_info h3 {
    color: {{ env('APP_SECONDARY_COLOR') }};
}
a.slicknav_btn.slicknav_collapsed{
	margin: 0px !important;
}
</style>